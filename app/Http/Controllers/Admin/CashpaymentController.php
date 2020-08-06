<?php

use RealRashid\SweetAlert\Facades\Alert;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Account;
use App\Item;
use App\Category;
Use Auth;
Use Gate;
use App\Mail\NewBill;

class CashpaymentController extends Controller
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
        
    $arr['accounts'] = Account::where('th_comp_code', auth()->user()->company)
    ->where('th_tran_code', 'CPV')
    ->orderBy('id','desc')->get();
    return view('admin.cashpayment.index')->with($arr);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $arr['category'] = Category::where('exp_group_status',1)->orderBy('exp_group_name','asc')->get();
        
        return view('admin.cashpayment.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Account $account)
    {
        $id = Account::where('th_comp_code', auth()->user()->company)
        ->orderByDesc('th_tran_no')->first()->th_tran_no ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);  
        $account->th_tran_no = $new_id;    




            $filename='';

            if( $request->hasFile('th_attach'))
                {
                  $file = $request->file('th_attach');
                  $ext = $file->getClientOriginalExtension();
                  $filename = date('YmdHis').rand(1,99999).'.'.$ext;
                  $file->storeAs('public/categories', $filename);
                }
     

       
      
    

        $account->th_attach = $filename;
        $account->th_tran_code = 'CPV';
        $account->th_supp_name = $request->th_supp_name;

        $pdate  = Carbon::createFromFormat('d-m-Y', $request->th_pay_date);  
        $account->th_pay_date = $pdate;   

       // $date  = Carbon::createFromFormat('Y-m-d', $request->th_bill_dt); 
       $date  = Carbon::createFromFormat('d-m-Y', $request->th_bill_dt);        
       $account->th_bill_dt = $date;    
       // $account->th_bill_dt = $request->th_bill_dt;    
        
        $account->th_bill_amt = $request->th_bill_amt;
        $account->th_bill_total = $request->th_bill_total;
        $account->th_bill_no = $request->th_bill_no;
        $account->th_pay_mode = $request->th_pay_mode;
        $account->th_purpose = $request->th_purpose;
        
        $account->th_emp_id = Auth::user()->id;
        $account->th_emp_name = Auth::user()->name;
        $account->th_dept_code = Auth::user()->dept;
        $account->th_comp_code = Auth::user()->company;

        $account->th_exp_cat_name = $request->th_exp_cat_name;

        $today = Carbon::now();
        $account->th_acc_year = $today->year;

        $todaymnt = Carbon::now();
        $account->th_acc_month = $todaymnt->month;
        

        if (  ( Auth::user()->company )  == 001) {
            
            $account->th_comp_name = 'Techsol Group';
        }
        else if (  ( Auth::user()->company )  == 002) {

            $account->th_comp_name = 'Techsol India';

        }

        else if (  ( Auth::user()->company )  == 003) {

            $account->th_comp_name = 'Bash Computers';

        }

        else if (  ( Auth::user()->company )  == 004) {

            $account->th_comp_name = 'Techsol KKD';

        }


        $account->th_pay_status = 0;
        
        
        
        $account->save();       
        
        //dd($request->td_item_desc); 


       // return $account;
        // Commented due to email hacked
      //  Mail::send(new NewBill($account));

       // Alert::success('Success Title', 'Success Message');
        

        return redirect('admin/cashpayment')->with('success','Transaction created successfully!');
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
    public function edit($cashpayment)
    {
        $account = Account::where('id', $cashpayment)->firstOrFail();        
        return view('admin.cashpayment.edit')->with(['account' => $account,'cashpayment' => $cashpayment]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$cashpayment)
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
