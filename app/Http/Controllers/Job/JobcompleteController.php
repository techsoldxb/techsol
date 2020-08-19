<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JobcompleteController extends Controller
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
        ,'job_fault','job_status_name','job_completed_date')
        ->where('job_comp_code', auth()->user()->company)
        ->where(function($query)
        {
            $query->where('job_status_name', '=', 'Completed')
                  ->orWhere('job_status_name', '=', 'Outside_Received');
        }) 
        ->get();
    
        return view('job.jobcomplete.index')->with($arr); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($completed)
    {
        $jobcard = Jobcard::where('id', $completed)->firstOrFail();        
        return view('job.jobcomplete.edit')->with(['jobcard' => $jobcard,'completed' => $completed]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $completed)
    {
        $jobcard = Jobcard::where('id', $completed)->firstOrFail();

        $jobcard->job_cust_name = $request->job_cust_name;   

        if (( $request->job_status_name )  == 'Invoiced') {

            $id = Jobcard::where('job_comp_code', auth()->user()->company)
        ->orderByDesc('job_invoice_number')->first()->job_invoice_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);  

        $todaymnt = Carbon::now();
        $jobcard->job_invoice_date = $todaymnt;       
        
            
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_invoice_number = $new_id;
            $jobcard->job_invoice_amount = $request->job_invoice_amount;            
            $jobcard->job_flex2 = $request->job_flex2;
            $jobcard->job_flex3 = $request->job_flex3;
            $jobcard->job_inv_created_user = Auth::user()->name;

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
        

        //$message = "This is a test message from the PHP API script.";
        $brand = $jobcard->job_item_brand;
        $model = $jobcard->job_item_model;
        $type = $jobcard->job_item_type;
        $numbers = $jobcard->job_cust_mobile;
        $new_id = $jobcard->job_enq_number;
        $handover = $request->job_flex3;
        $job_cust_name = $jobcard->job_cust_name;

     
        //$message = rawurlencode("Dear Customer: Your $brand - $model - $type (Job No - $new_id) handed over to $handover.http://erp.techsolme.com/job/jobfeedback/create?j=$new_id&n=$job_cust_name&=$numbers");  

        //echo $message;    

        $message = rawurlencode("Dear Customer: Your $brand - $model - $type (Job No - $new_id) handed over to $handover . Thank you.");    
            
             $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

            $ch = curl_init('http://api.textlocal.in/send/?');
           curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API        
            curl_close($ch);
           // echo $result;


        }
        else if (( $request->job_status_name )  == 'Estimated') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_est_amount = $request->job_est_amount;
        }
        else if (( $request->job_status_name )  == 'Completed') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_completed_remark = $request->job_completed_remark; 
            $today = Carbon::now();        
            $jobcard->job_completed_date = $today;            
            
        }
        else if (( $request->job_status_name )  == 'Quit') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_quit_remark = $request->job_quit_remark;    
            $jobcard->job_quit_created_user = Auth::user()->name;             
            $today = Carbon::now();        
            $jobcard->job_quit_date = $today;            
        }

        
         $jobcard->save();
        return redirect()->route('job.jobcomplete.index')->with('info','Transaction updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
