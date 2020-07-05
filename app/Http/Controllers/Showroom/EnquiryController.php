<?php

namespace App\Http\Controllers\Showroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;


use App\Enquiry;
use App\Addon;
Use Auth;
use App\User;

Use Gate;

//we need to add the below if we create new excel export
use App\Exports\BookingExport; 
use Maatwebsite\Excel\Facades\Excel; 

class EnquiryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $arr['enquiry'] = Enquiry::All();
        return view('showroom.enquiry.index')->with($arr); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('showroom.enquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Enquiry $enquiry)
    {
        $enquiry->enq_cust_name = $request->enq_cust_name;    
        $enquiry->enq_gender = $request->enq_gender;    
        $enquiry->enq_mobile = $request->enq_mobile;    
        $enquiry->enq_email = $request->enq_email;  
        
        $date  = Carbon::createFromFormat('d-m-Y', $request->enq_date);        
        $enquiry->enq_date = $date;    

        
        //$enquiry->enq_date = $request->enq_date;    
        $enquiry->enq_time = $request->enq_time;    

        $enquiry->enq_purpose = $request->enq_purpose;    
        $enquiry->enq_item_details = $request->enq_item_details;    
        $enquiry->enq_group = $request->enq_group;    
        $enquiry->enq_category = $request->enq_category;   
        $enquiry->enq_comments = $request->enq_comments;  
        
        $enquiry->enq_comp_code = Auth::user()->company;
        

       
        
        $enquiry->save();       

        return redirect()->route('showroom.enquiry.index')->with('success','Transaction created successfully!');
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
    public function destroy(Request $request)
    {
        $enquiry = Enquiry::findOrFail($request->category_id);
        $enquiry->delete();

        return redirect()->route('showroom.enquiry.index')->with('success','Transaction deleted successfully');

    }
}
