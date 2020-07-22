<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Jobcard;
Use Auth;
use App\User;
Use Gate;

class JobinvtotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $jobcard = Jobcard::selectRaw('date(job_invoice_date) as date, sum(job_invoice_amount) as total,sum(job_service_cost) as cost')
        ->where('job_comp_code', auth()->user()->company)
        ->where('job_status_name', 'Invoiced')
        ->groupBy('date')
        ->orderBy('date','desc')
        ->get();
   
   return view('job.jobinvtotal.index', compact('jobcard')); 
    }

    public function indexkkd()
    {
        
        $jobcard = Jobcard::selectRaw('date(job_invoice_date) as date, sum(job_invoice_amount) as total,sum(job_service_cost) as cost')
        ->where('job_comp_code', 004)
        ->where('job_status_name', 'Invoiced')
        ->groupBy('date')
        ->orderBy('date','desc')
        ->get();
   
   return view('job.jobinvtotal.index', compact('jobcard')); 
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
