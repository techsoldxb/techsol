<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JobwfpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (  ( Auth::user()->id )  == 7) {
            
            
        $arr['jobcard'] = Jobcard::select('id','job_enq_number','job_waiting_date'
        ,'job_cust_name','job_cust_mobile','job_item_type','job_item_brand','job_item_model',
        'job_fault','job_ins_remark','job_flex1','job_parts','job_enq_created_user')        
        ->where('job_status_name','WFP')
        ->get();
        }
        else {
            
        $arr['jobcard'] = Jobcard::select('id','job_enq_number','job_waiting_date'
        ,'job_cust_name','job_cust_mobile','job_item_type','job_item_brand','job_item_model',
        'job_fault','job_ins_remark','job_flex1','job_parts','job_enq_created_user')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','WFP')
        ->get();
        }


        
    
        return view('job.jobwfp.index')->with($arr); 
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
    public function edit($wfp)
    {
        
        $jobcard = Jobcard::where('id', $wfp)->firstOrFail();        
        return view('job.jobwfp.edit')->with(['jobcard' => $jobcard,'wfp' => $wfp]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $wfp)
    {
        $jobcard = Jobcard::where('id', $wfp)->firstOrFail();

        if (( $request->job_status_name )  == 'Work') {        
        
            $jobcard->job_status_name = $request->job_status_name; 
            $jobcard->job_work_remark = $request->job_work_remark; 
            $today = Carbon::now()->toDate('Y-m-d h:i');
            $jobcard->job_work_date = $today; //Outside service date  
        }

         
        $jobcard->save();
        return redirect()->route('job.jobinspect.index')->with('info','Transaction updated successfully!');
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
