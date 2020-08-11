<?php

namespace App\Http\Controllers\Job;

use App\Fault;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\AccountApproved;
use App\Notifications\Received;

use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;
use Illuminate\Notifications\Notifiable;




class JobcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $arr['jobcard'] = Jobcard::select('id','job_enq_number','job_enq_date'
        ,'job_cust_name','job_cust_mobile','job_item_type','job_item_brand','job_item_model'
        ,'job_fault','job_type')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Received')
        ->get();
    
        return view('job.jobcard.index')->with($arr); 
        
    }

    public function invoice()
    {
        
        $arr['jobcard'] = Jobcard::where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Invoiced')
        ->get();
    
        return view('job.jobcard.invoice')->with($arr); 
        
    }

    public function jobquit()
    {
        
        $arr['jobcard'] = Jobcard::select('id','job_enq_number','job_quit_date'
        ,'job_cust_name','job_cust_mobile','job_item_type','job_item_brand','job_item_model',
        'job_fault','job_quit_remark','job_quit_created_user')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Quit')
        ->get();
    
        return view('job.jobcard.quit')->with($arr); 
        
    }

    public function joboutside()
    {
        
        $arr['jobcard'] = Jobcard::where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Outside')
        ->get();
    
        return view('job.jobcard.outside')->with($arr); 
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['faults'] = Fault::where('job_fault_status',1)
        ->where('job_fault_group','Internal')
        ->orderBy('job_fault_desc','asc')->get();
        return view('job.jobcard.create')->with($arr);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request, Jobcard $jobcard,User $user)
    {

        $this->validate($request,['job_cust_mobile'=>'required|digits:10']);

        $id = Jobcard::where('job_comp_code', auth()->user()->company)
        ->orderByDesc('job_enq_number')->first()->job_enq_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);    


        $jobcard->job_comp_code = Auth::user()->company;
        $jobcard->job_enq_number = $new_id;

        $today = Carbon::now()->toDate('Y-m-d h:i');
        $jobcard->job_enq_date = $today;
        
        $countrycode = 91;
        $customer = $request->job_cust_mobile;
        $numbers = $countrycode.$customer; // A single number or a comma-seperated list of numbers

        $jobcard->job_cust_name = strtoupper($request->job_cust_name);
        $jobcard->job_cust_mobile = $numbers;
        $jobcard->job_cust_email = $request->job_cust_email;

        $jobcard->job_item_details = $request->job_item_details;  
        $jobcard->job_item_brand = $request->job_item_brand;
        $jobcard->job_item_model = $request->job_item_model;
        $jobcard->job_item_serial = $request->job_item_serial;
        $jobcard->job_item_type = $request->job_item_type;
        $jobcard->job_type = $request->job_type;
        $jobcard->job_fault = $request->job_fault;
        $jobcard->job_est_amount = $request->job_fault_price;
        $jobcard->job_desc = $request->job_desc;
        $jobcard->job_remark = $request->job_remark;

      

        $today = Carbon::now();
        $jobcard->job_year = $today->year;

        $todaymnt = Carbon::now();
        $jobcard->job_month = $todaymnt->month;
        
        $jobcard->job_status_id = '0';
        $jobcard->job_status_name = 'Received';

        
        $jobcard->job_enq_created_user = Auth::user()->name;

        $jobcard->save();  


       // auth()->user()->notify(new Received());
        
        //The below code to send the SMS
        // Authorisation details.
        $username = "bhhussain@gmail.com";
        $username = urlencode($username);
        $hash = "dbe35455acb1be736b354f31be40ccdad84b9140358d269c95f183be1b5ee055";
        $apiKey = urlencode('A7s0+DhGAqs-gK1nBO52AFN9V4KUM1ENStdkMAjBnL');

        
       

        // Config variables. Consult http://api.textlocal.in/docs for more info.
       // $test = "0";
    
        // Data for text message. This is the text message data.
        $sender = urlencode('TECCOM'); // This is who the message appears to be from.
        
        //$todaysms = Carbon::now()->toDate('d-m-Y');
        $todaysms = "2020-08-09";
        $todaysms = urlencode($todaysms);

       // $jobid = urlencode($new_id);

        //$message = "This is a test message from the PHP API script.";
        $brand = $request->job_item_brand;
        $model = $request->job_item_model;
        $type = $request->job_item_type;
        //$message = "Dear Customer: Your product $brand-$model-$type is registered for service. Your Job No is $new_id.Thank you";
        //$message = "Dear%20Customer%20Your%20product%20HP%20Pro%20Desk%20Laptop%20Job%20No%20%24jobid%20is%20repaired%20and%20ready%20to%20collect%20Thank%20you";

        if (  ( Auth::user()->company )  == 003) {
            
            $message = rawurlencode('Dear Customer: Your product is registered for service. Please contact 9944942308 to know the status. Thank you');
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

            $ch = curl_init('http://api.textlocal.in/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API        
            curl_close($ch);
    
        }
        else if (  ( Auth::user()->company )  == 004) {

            $message = rawurlencode('Dear Customer: Your product is registered for service. Please contact 9600350030 to know the status. Thank you');
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

            $ch = curl_init('http://api.textlocal.in/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API        
            curl_close($ch);
            
            // echo $result;
        }

        

        
        //$message = rawurlencode($message);
        //echo $message;
        
        
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        //$message = urlencode($message);
        
        //$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers;
       
       // echo $result;
        
        return redirect()->route('job.jobcard.index')->with('success','Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jobcard $jobcard)
    {
        return view('job.jobcard.show',compact('jobcard'));
     }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobcard $jobcard)
    {
        
        $arr['jobcard'] = $jobcard;
        return view('job.jobcard.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Jobcard $jobcard,User $user)
    
    {

        
        



        

        if (( $request->job_status_name )  == 'Invoiced') {

            $id = Jobcard::where('job_comp_code', auth()->user()->company)
        ->orderByDesc('job_invoice_number')->first()->job_invoice_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);  

        $today = Carbon::now()->toDate('Y-m-d h:i');
        $jobcard->job_invoice_date = $today;
        
        
            
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_invoice_number = $new_id;
            $jobcard->job_invoice_amount = $request->job_invoice_amount;
        }
        else if (( $request->job_status_name )  == 'Estimated') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_est_amount = $request->job_est_amount;
        }
        else if (( $request->job_status_name )  == 'Inspected') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_ins_remark = $request->job_ins_remark; 

            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_ins_date = $today;

            $jobcard->job_ins_created_user = Auth::user()->name;
            
            
        }
        else if (( $request->job_status_name )  == 'Quit') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_quit_remark = $request->job_quit_remark; 
            $jobcard->job_quit_created_user = Auth::user()->name;
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_quit_date = $today;
            
        }
        else if (( $request->job_status_name )  == 'Outside') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_os_flag = 1; 
            $jobcard->job_out_source = $request->job_out_source;   
            $jobcard->job_os_wq_remark = $request->job_os_wq_remark;             
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_os_wq_date = $today; //Outside service date
            
        }
        else if (( $request->job_status_name )  == 'Update') 
        {
          
            $jobcard->job_cust_name = $request->job_cust_name;   
            $jobcard->job_cust_mobile = $request->job_cust_mobile;   
            $jobcard->job_cust_email = $request->job_cust_email;   
            $jobcard->job_item_model = $request->job_item_model;   
            $jobcard->job_item_serial = $request->job_item_serial; 
            $jobcard->job_item_details = $request->job_item_details;   
            $jobcard->job_remark = $request->job_remark;     
            
        }

       // $jobcard->job_est_amount = $request->est_amount; 
        
          
        
        $jobcard->save();
        return redirect()->route('job.jobcard.index')->with('info','Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('isAdmin');
        $jobcard = Jobcard::findOrFail($request->category_id);
        $jobcard->delete();

        return redirect()->route('job.jobcard.index')->with('success','Transaction deleted successfully');

     
    }
}
