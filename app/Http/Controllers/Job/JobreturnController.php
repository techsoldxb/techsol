<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JobreturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $arr['jobcard'] = Jobcard::where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Return')->orWhere('job_status_name','Received_NR')
        ->get();
    
        return view('job.jobreturn.index')->with($arr); 
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
    public function edit($delivered)
    {
        $jobcard = Jobcard::where('id', $delivered)->firstOrFail();

        
        return view('job.jobreturn.edit')->with(['jobcard' => $jobcard,'delivered' => $delivered]); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$delivered)
    {

        $jobcard = Jobcard::where('id', $delivered)->firstOrFail();

        $jobcard->job_status_name = $request->job_status_name;      
        $today = Carbon::now()->toDate('Y-m-d h:i');
        $jobcard->job_delivery_date = $today;

        $jobcard->job_delivery_remark = $request->job_delivery_remark; 
        $jobcard->job_delivery = Auth::user()->name;

        $jobcard->save();
        return redirect()->route('job.jobreturn.index')->with('info','Transaction updated successfully!');

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
