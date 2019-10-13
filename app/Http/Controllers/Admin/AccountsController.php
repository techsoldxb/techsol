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
        
        if($request->attach->getClientOriginalName())
        {
        $ext = $request->attach->getClientOriginalExtension();
        $file = date('YmdHis').rand(1,99999).'.'.$ext;
        $request->attach->storeAs('public/categories',$file);
        }    
        else
        {
            $file='';
        }
        $account->attach = $file;
        $account->supp_name = $request->supp_name;
        $account->emp_name = $request->emp_name;
        $account->item_type = $request->item_type;
        $account->bill_date = $request->bill_date;
        $account->bill_amt = $request->bill_amt;
        $account->bill_no = $request->bill_no;
        $account->pay_mode = $request->pay_mode;
        $account->purpose = $request->purpose;
        $account->item_type = $request->item_type;
        $account->save();             
        
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
        $account->supp_name = $request->supp_name;
        $account->bill_date = $request->bill_date;
        $account->bill_no = $request->bill_no;
        $account->bill_amt = $request->bill_amt;
        $account->item_type = $request->item_type;
        $account->purpose = $request->purpose;        
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
