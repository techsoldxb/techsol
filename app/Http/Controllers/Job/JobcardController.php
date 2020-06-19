<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;


use App\Jobcard;

Use Auth;
use App\User;

Use Gate;




class JobcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $arr['jobcard'] = Jobcard::where('job_comp_code', auth()->user()->company)
        ->where('job_status_id','0')
        ->get();
    
        return view('job.jobcard.index')->with($arr); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.jobcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Jobcard $jobcard, User $user)
    {

        $id = Jobcard::where('job_comp_code', auth()->user()->company)
        ->orderByDesc('job_enq_number')->first()->job_enq_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);    


        $jobcard->job_comp_code = Auth::user()->company;
        $jobcard->job_enq_number = $new_id;

        $jobcard->job_cust_name = $request->job_cust_name;
        $jobcard->job_cust_mobile = $request->job_cust_mobile;
        $jobcard->job_cust_email = $request->job_cust_email;

        $jobcard->job_item_details = $request->job_item_details;  
        $jobcard->job_item_brand = $request->job_item_brand;
        $jobcard->job_item_model = $request->job_item_model;
        $jobcard->job_item_serial = $request->job_item_serial;
        $jobcard->job_item_type = $request->job_item_type;
        $jobcard->job_type = $request->job_type;
        $jobcard->job_fault = $request->job_fault;
        $jobcard->job_desc = $request->job_desc;
        $jobcard->job_remarks = $request->job_remarks;

      

        $today = Carbon::now();
        $jobcard->job_year = $today->year;

        $todaymnt = Carbon::now();
        $jobcard->job_month = $todaymnt->month;
        
        $jobcard->job_status_id = '0';
        $jobcard->job_status_name = 'Item Received';

        
        $jobcard->job_enq_created_user = Auth::user()->name;
        

        $jobcard->save();   
        
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
    public function destroy(Request $request)
    {
        
        $jobcard = Jobcard::findOrFail($request->category_id);
        $jobcard->delete();

        return redirect()->route('job.jobcard.index')->with('success','Transaction deleted successfully');

     
    }
}
