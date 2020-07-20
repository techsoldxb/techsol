<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JoboutsideestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $arr['jobcard'] = Jobcard::where('job_comp_code', auth()->user()->company)
        ->where('job_status_name','Outside_Estimation')
        ->get();    
        return view('job.joboutsideest.index')->with($arr); 
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
    public function edit($outsideest)
    {
        
        $jobcard = Jobcard::where('id', $outsideest)->firstOrFail();        
        return view('job.joboutsideest.edit')->with(['jobcard' => $jobcard,'outsideest' => $outsideest]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $outsideest)
    {
        $jobcard = Jobcard::where('id', $outsideest)->firstOrFail();

        if (( $request->job_status_name )  == 'Outside_Received') {            
            
            $jobcard->job_status_name = $request->job_status_name;         
                   
            $today = Carbon::now();
            $jobcard->job_os_rec_date = $today;
        }

        $jobcard->save();
        return redirect()->route('job.joboutsideest.index')->with('info','Transaction updated successfully!');

       
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
