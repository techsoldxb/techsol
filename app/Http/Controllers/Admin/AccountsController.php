<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Account;
use App\Item;

class AccountsController extends Controller
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
        $arr['accounts'] = Account::all();
        return view('admin.accounts.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Account $account, Item $item)
    {    
        

        
        $id = Account::orderByDesc('th_tran_no')->first()->th_tran_no ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);      


        if($request->th_attach->getClientOriginalName())
        {
            $ext = $request->th_attach->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->th_attach->storeAs('public/categories',$file);
        }    
        else
        {
            $file='';
        }
        $account->th_attach = $file;
        $account->th_supp_name = $request->th_supp_name;
        $account->th_emp_name = $request->th_emp_name;
        $account->th_item_type = $request->th_item_type;
        $account->th_bill_dt = $request->th_bill_dt;
        $account->th_bill_amt = $request->th_bill_amt;
        $account->th_bill_no = $request->th_bill_no;
        $account->th_pay_mode = $request->th_pay_mode;
        $account->th_purpose = $request->th_purpose;
        $account->th_item_type = $request->th_item_type;
        $account->th_tran_no = $new_id;
        $account->save();       
        
        foreach ($request->td_item_desc as $key =>$name) 
        {
            $item = resolve(Item::class);     
            $item->td_item_desc = trim($name,'"');    
            $item->td_qty = $request->td_qty[$key] ;    
            $item->td_unit_price = $request->td_unit_price[$key] ; 
            $item->save();
        }         
        return redirect('admin/accounts');
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
    public function edit(Account $account)
    {
        $arr['account'] = $account;
        return view('admin.accounts.edit')->with($arr);
    }

    public function print()
    {
        return view('admin.accounts.print');
    }
  
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->th_supp_name = $request->th_supp_name;
        $account->th_bill_dt = $request->th_bill_dt;
        $account->th_bill_no = $request->th_bill_no;
        $account->th_bill_amt = $request->th_bill_amt;
        $account->th_item_type = $request->th_item_type;
        $account->th_purpose = $request->th_purpose;        
        $account->save();
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::destroy($id);
        return redirect()->route('admin.accounts.index');
    }
}
