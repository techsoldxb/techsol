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
        ->where('job_status_name','Completed')->orWhere('job_status_name','Outside_Received')
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

            $jobcard->job_inv_created_user = Auth::user()->name;

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
