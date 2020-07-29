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

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                

        if (  ( Auth::user()->id )  == 7) {            
            
    $arr['enquiry'] = Enquiry::All();
            }
            else {
                
    $arr['enquiry'] = Enquiry::where('enq_comp_code', auth()->user()->company)
    ->orderBy('enq_tran_no','desc')->get();
            }

            


    return view('showroom.enquiry.index')->with($arr);    
    


    }

    

    public function enqkkdtotal()
    {      
        
        $arr['enquiry'] = Enquiry::where('enq_comp_code', '004')                                    
                                    ->get();   
      
    
    return view('showroom.enquiry.index')->with($arr); 
    }

    public function enqkkdtoday()
    {      
        

    $arr['enquiry'] = Enquiry::where('enq_comp_code', '004')                                    
    ->where('enq_date', date('Y-m-d'))
    ->get();    
    
    return view('showroom.enquiry.index')->with($arr); 
    }

    public function enqrmdtotal()
    {      
        
        $arr['enquiry'] = Enquiry::where('enq_comp_code', '003')->get();   
    
    return view('showroom.enquiry.index')->with($arr); 
    }

    public function enqrmdtoday()
    {      
        
    
        $arr['enquiry'] = Enquiry::where('enq_comp_code', '003')                                    
        ->where('enq_date', date('Y-m-d'))
        ->get();   
    
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

        $id = Enquiry::where('enq_comp_code', auth()->user()->company)
        ->orderByDesc('enq_tran_no')->first()->job_enq_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);    
               
        $enquiry->enq_tran_no = $new_id;

       


        $enquiry->enq_cust_name = $request->enq_cust_name;    
        $enquiry->enq_gender = $request->enq_gender;    
        $enquiry->enq_mobile = $request->enq_mobile;    
        $enquiry->enq_email = $request->enq_email;  
        
        $date  = Carbon::createFromFormat('d-m-Y', $request->enq_date);        
        $enquiry->enq_date = $date;    

        
       //$time  = Carbon::createFromFormat('H:i', $request->enq_time);        
       // $enquiry->enq_time = $time;    

        
        //$enquiry->enq_date = $request->enq_date;    
        $enquiry->enq_time = $request->enq_time;    

        $enquiry->enq_purpose = $request->enq_purpose;    
        $enquiry->enq_item_details = $request->enq_item_details;    
        $enquiry->enq_group = $request->enq_group;    
        $enquiry->enq_category = $request->enq_category;   
        $enquiry->enq_comments = $request->enq_comments;  
        
        $enquiry->enq_comp_code = Auth::user()->company;
        $enquiry->enq_comp_name = Auth::user()->flex1;
        

       
        
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
