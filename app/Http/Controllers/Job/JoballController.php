<?php

namespace App\Http\Controllers\Job;

use Carbon\Carbon;


use App\Jobcard;

Use Auth;
use App\User;

Use Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoballController extends Controller
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
        ,'job_fault','job_invoice_number','job_invoice_amount','job_invoice_date')
        ->where('job_comp_code', auth()->user()->company)
        ->get();
    
        return view('job.joball.index')->with($arr); 
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
    public function show(Jobcard $jobcard)
    {
        return view('job.jobinvoice.show',compact('jobcard'));
     }

     
    public function print(Jobcard $jobcard) 
    { 
       
            
        return view('job.jobinvoice.print')
        ->with(['jobcard' => $jobcard]); 
    
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
