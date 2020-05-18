<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Account;
use App\Item;
use App\Category;
Use Auth;
Use Gate;

//we need to add the below if we create new excel export
use App\Exports\AccountExport; 
use App\Exports\PaidbillExport; 
  use Maatwebsite\Excel\Facades\Excel; 
  

class AccountskkdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $arr['accounts'] = Account::where('th_comp_code', '004')
    ->where('th_pay_status', 0)->orderBy('th_tran_no','desc')->get();
    return view('admin.accounts.index')->with($arr);   
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
        
       // Account::destroy($id);                  
       // return redirect()->route('admin.accounts.index')->with('error','Transaction deleted successfully!');  
        
       Account::find($id)->delete();
    

       //Account::find($request->id)->delete();
       return redirect()->route('showroom.accountskkd.index')->with('success','Transaction deleted successfully');
    }
}
