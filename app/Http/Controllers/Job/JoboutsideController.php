<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JoboutsideController extends Controller
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
        ,'job_fault','job_out_source','job_os_wq_date')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Outside')
        ->get();    
        return view('job.joboutside.index')->with($arr); 
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
    public function edit($outside)
    {
        $jobcard = Jobcard::where('id', $outside)->firstOrFail();        
        return view('job.joboutside.edit')->with(['jobcard' => $jobcard,'outside' => $outside]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $outside)
    {
        $jobcard = Jobcard::where('id', $outside)->firstOrFail();

        if (( $request->job_status_name )  == 'Outside_Estimation') {            
            
            $jobcard->job_status_name = $request->job_status_name;             
            $jobcard->job_service_cost = $request->job_service_cost;  
            $jobcard->job_est_amount = $request->job_est_amount;  
            $jobcard->job_os_est_remark = $request->job_os_est_remark;            
            $today = Carbon::now();
            $jobcard->job_os_est_date = $today;
        }
        else if (( $request->job_status_name )  == 'Received_NR') {            
            
            $jobcard->job_status_name = $request->job_status_name;             
            $today = Carbon::now();
            $jobcard->job_os_rec_date = $today;
            $jobcard->job_return_date = $today;
           
        }
        

        
        $jobcard->save();
        return redirect()->route('job.joboutside.index')->with('info','Transaction updated successfully!');

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
