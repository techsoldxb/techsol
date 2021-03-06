<?php

use RealRashid\SweetAlert\Facades\Alert;


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Account;
use App\Item;
use App\Category;
Use Auth;
Use Gate;
use App\Mail\NewBill;

//we need to add the below if we create new excel export
use App\Exports\AccountExport; 
use App\Exports\PaidbillExport; 
  use Maatwebsite\Excel\Facades\Excel; 
  
  




class AccountsController extends Controller
{

    public function export()
    {
    return Excel::download(new AccountExport, 'Expense.xls'); 
    } 
    

    public function paidbillexport()
    {
    return Excel::download(new PaidbillExport, 'Paid.xls'); 
    } 


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.     *
     * @return \Illuminate\Http\Response
     */

  


    public function index()
    { 
        
           
    $arr['accounts'] = Account::where('th_comp_code', auth()->user()->company)
    ->where('th_tran_code','EXPJV')
    ->orderBy('id','desc')->get();
    return view('admin.accounts.index')->with($arr);    
    
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['category'] = Category::where('exp_group_status',1)->orderBy('exp_group_name','asc')->get();
        
        return view('admin.accounts.create')->with($arr);

        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request, Account $account, Item $item)
    {    
        
      

        
        $id = Account::where('th_comp_code', auth()->user()->company)
        ->orderByDesc('th_tran_no')->first()->th_tran_no ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);  
        //$account->th_tran_no = $new_id;    


        $lastAccountForCurrentYear = Account::where('th_comp_code', auth()->user()->company)
    ->where('th_tran_no', 'like', date('Y') . '%') // filter for current year numbers
    ->orderByDesc('th_tran_no', 'desc') // the biggist one first
    ->first();

    $account->th_tran_no = $lastAccountForCurrentYear
    ? ($lastAccountForCurrentYear->th_tran_no + 1) // just increase value to 1
    : (date('Y') . $digitRepresentingASerie . '00001');



            $filename='';

            if( $request->hasFile('th_attach'))
                {
                  $file = $request->file('th_attach');
                  $ext = $file->getClientOriginalExtension();
                  $filename = date('YmdHis').rand(1,99999).'.'.$ext;
                  $file->storeAs('public/categories', $filename);
                }
     

       
      
    

        $account->th_attach = $filename;
        $account->th_tran_code = 'EXPJV';
        $account->th_supp_name = $request->th_supp_name;
        $account->th_dept_code = $request->th_dept_code;   

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

        foreach ($request->td_item_desc as $key =>$name) 
        {

            if($request->td_qty[$key]) {
                $item = resolve(Item::class);     
                $item->td_item_desc = trim($name,'"');    
                $item->td_qty = $request->td_qty[$key] ;    
                $item->td_unit_price = $request->td_unit_price[$key] ;
                $item->td_unit_amt = $item->td_unit_price * $item->td_qty ;
                $item->td_comp_name = Auth::user()->company;
                $item->td_tran_no = $new_id; 
                $item->save();
                $account->item()->save($item);
              }

     
        }  

       // return $account;
        // Commented due to email hacked
      //Mail::send(new NewBill($account));

       // Alert::success('Success Title', 'Success Message');
        

        return redirect('admin/accounts')->with('success','Transaction created successfully!');
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
    public function edit(Account $account, Item $item)
    {
        //$arr['account'] = $account;
        //$arr['item'] = $item;
        //return view('admin.accounts.edit')->with($arr);

        $arr['category'] = Category::where('exp_group_status',1)->orderBy('exp_group_name','asc')->get();

        $items = Item::where('td_tran_no', $account->th_tran_no)
        ->where('td_comp_name', Auth::user()->company)->Get();   
        
        
        

        return view('admin.accounts.edit')->with(['item' => $items, 'account' => $account])->with($arr); 

        
    


    }


    public function print(Account $account, Item $item) 
    { 
       
        $items = Item::where('td_tran_no', $account->th_tran_no)->orderBy('id','asc')->Get();     
        $items_total = $items->sum('td_unit_amt'); 
            
        return view('admin.accounts.print')
        ->with(['item' => $items,'items_total' => $items_total,'account' => $account]); 
    
    }

    
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account, Item $item)
    {

        $filename='test';

        if( $request->hasFile('th_attach'))
            {
              $file = $request->file('th_attach');
              $ext = $file->getClientOriginalExtension();
              $filename = date('YmdHis').rand(1,99999).'.'.$ext;
              $file->storeAs('public/categories', $filename);
            }

           

       // $account->th_attach = $filename;
        $account->th_supp_name = $request->th_supp_name;   
        $account->th_supp_contact = $request->th_supp_contact;    

       $date  = Carbon::createFromFormat('d-m-Y', $request->th_bill_dt);        
       $account->th_bill_dt = $date;          
        
        $account->th_bill_no = $request->th_bill_no;
        $account->th_bill_amt = $request->th_bill_amt;
       
        $account->th_item_type = $request->th_item_type;
        $account->th_exp_cat_name = $request->th_exp_cat_name;    
        $account->th_purpose = $request->th_purpose;        
        $account->save();
        
        return redirect()->route('admin.accounts.index')->with('info','Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy($id)
   public function destroy(Request $request)
    {
        
        //echo "Delete Data";
        //dd($request->category_id);
        $account = Account::findOrFail($request->category_id);
        $account->delete();

        return redirect()->route('admin.accounts.index')->with('success','Transaction deleted successfully');

       // Account::destroy($id);                  
       // return redirect()->route('admin.accounts.index')->with('error','Transaction deleted successfully!');  
        
      //  
      
    

    //Account::find($request->id)->delete();
    //Account::find($id)->delete();
    //return redirect()->route('admin.accounts.index')->with('success','Transaction deleted successfully');

    }
}
