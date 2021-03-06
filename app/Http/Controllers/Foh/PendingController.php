<?php

namespace App\Http\Controllers\Foh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;


use App\Booking;
use App\Addon;
Use Auth;
use App\User;

Use Gate;


class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['booking'] = Booking::where('tb_date', '>=', date('Y-m-d'))->where('tb_status', 0)->get();
        return view('foh.pending.index')->with($arr); 
        
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
        
        $this->authorize('isAdmin');

        $booking = Booking::find($id);
        return view('foh.pending.edit')->with('booking',$booking);

        
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
        $booking = Booking::find($id);

        $booking->tb_cust_name = $request->tb_cust_name;        
        $booking->tb_cust_addr = $request->tb_cust_addr;       
        $booking->tb_cust_contact = $request->tb_cust_contact;
        $booking->tb_cust_mobile = $request->tb_cust_mobile;
        $booking->tb_cust_email = $request->tb_cust_email;

        $date  = Carbon::createFromFormat('d-m-Y', $request->tb_date);        
        $booking->tb_date = $date;    


        
        $booking->tb_time = $request->tb_time;
        $booking->tb_kids = $request->tb_kids;
        $booking->tb_adult = $request->tb_adult;
        $booking->tb_pay_mode = $request->tb_pay_mode;
        $booking->tb_reference = $request->tb_reference;
        $booking->tb_category = $request->tb_category;

        $booking->tb_comment = $request->tb_comment;
        $booking->tb_student_qty = $request->tb_student_qty;
        $booking->tb_teacher_qty = $request->tb_teacher_qty;
        $booking->tb_adult_qty = $request->tb_adult_qty;
        $booking->tb_student_price = $request->tb_student_price;
        $booking->tb_teacher_price = $request->tb_teacher_price;
        $booking->tb_adult_price = $request->tb_adult_price;

        $booking->tb_total = 
        $request->tb_student_qty * $request->tb_student_price + 
        $request->tb_teacher_qty * $request->tb_teacher_price + 
        $request->tb_adult_qty * $request->tb_adult_price ;     
        //$booking->tb_status = 0;   
        

        if ( !empty ( $request->tb_status ) )
        {
            $booking->tb_status = $request->tb_status;
            $booking->tb_appr_user_id = Auth::user()->id;
            $booking->tb_appr_user_name = Auth::user()->name;
        } 
            
               
        $tdate  = Carbon::now();
        $booking->tb_appr_date = $tdate; 

        $booking->save();
        return redirect()->route('foh.pending.index')->with('info','Transaction updated successfully!');
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
