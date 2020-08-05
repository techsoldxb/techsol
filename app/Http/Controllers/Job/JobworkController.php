<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JobworkController extends Controller
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
        ,'job_fault','job_ins_remark','job_work_date')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Work')
        ->get();
    
        return view('job.jobwork.index')->with($arr); 
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
    public function edit($work)
    {
        $jobcard = Jobcard::where('id', $work)->firstOrFail();        
        return view('job.jobwork.edit')->with(['jobcard' => $jobcard,'work' => $work]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $work)
    {
        $jobcard = Jobcard::where('id', $work)->firstOrFail();

        if (( $request->job_status_name )  == 'Completed') {

            $jobcard->job_status_name = $request->job_status_name; 
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_completed_date = $today;        
            $jobcard->job_completed_remark = $request->job_completed_remark; 
            $jobcard->job_engr = $request->job_engr; 
            $jobcard->job_comp_created_user = Auth::user()->name;
    
        }
        else if (( $request->job_status_name )  == 'Return') 
        {
            $jobcard->job_status_name = $request->job_status_name;    
            $jobcard->job_tech_remark = $request->job_tech_remark;             
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
        else if (( $request->job_status_name )  == 'Quit') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_quit_remark = $request->job_quit_remark; 
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_quit_date = $today;
            $jobcard->job_quit_created_user =  Auth::user()->name;
            
        }
        else if (( $request->job_status_name )  == 'WFP') 
        {
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_flex1 = $request->job_flex1; 
            $jobcard->job_parts = $request->job_parts; 
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_waiting_date = $today; //Outside service date  
                    
        }



        
        $jobcard->save();
        return redirect()->route('job.jobwork.index')->with('info','Transaction updated successfully!');
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
