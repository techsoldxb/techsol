<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Advance;
Use Auth;


class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['advances'] = Advance::all();
        return view('admin.advance.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advance $advance)
    {
       // $advance->ca_adv_date = $request->ca_adv_date;        
        $advance->ca_adv_amt = $request->ca_adv_amt;

        $date  = Carbon::createFromFormat('d-m-Y', $request->ca_adv_date);        
        $advance->ca_adv_date = $date;  
        $advance->ca_purpose = $request->ca_purpose;

        $advance->ca_emp_id = Auth::user()->id;
        $advance->ca_emp_name = Auth::user()->name;        
        $advance->ca_comp_code = Auth::user()->company;

        
        $today = Carbon::now();
        $advance->ca_acc_year = $today->year;

        $todaymnt = Carbon::now();
        $advance->ca_acc_month = $todaymnt->month;


        if (  ( Auth::user()->company )  == 1) {
            
            $advance->th_comp_name = 'Al Jarwani';
        }
        else if (  ( Auth::user()->company )  == 2) {

            $advance->ca_comp_name = 'Mall Of Muscat';

        }

        else if (  ( Auth::user()->company )  == 3) {

            $advance->ca_comp_name = 'Oman Aquarium';

        }

        else if (  ( Auth::user()->company )  == 4) {

            $advance->ca_comp_name = 'Snow Village';

        }



        $advance->save();       

        return redirect()->route('admin.advances.index');
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
