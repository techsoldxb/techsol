<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Account;
use App\Item;
use App\Category;
Use Auth;
Use Gate;

class UnpaidController extends Controller
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
    public function index(Request $request)
    {

        if(!Gate::allows('isAdmin'))
        {
            abort(404,"Sorry you are not allowed");
        }
       // $tdate  = Carbon::now();
        //$fdate  = Carbon::now();
       // $tdate=$request->updated_at;
       //$to = Carbon::createFromFormat('d-m-Y', $fdate);
      // $date  = Carbon::createFromFormat('d-m-Y', $request->th_bill_dt);        
        //$from = Carbon::createFromFormat('Y-m-d H:s:i', $tdate);
        //$diff_in_days = $fdate->diffInDays($tdate);
        //dd($diff_in_days);

        //$arr['accounts'] = Account::where('th_pay_status', 0)->orderBy('th_tran_no','desc')->get();
        $arr['accounts'] = Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 0)->orderBy('th_tran_no','desc')->get();
        return view('admin.unpaidbills.index')->with($arr);    
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
    
    public function edit($unpaidbill)
    {
        $items = Item::where('td_tran_no', $unpaidbill)->get();     
        $account = Account::where('th_tran_no', $unpaidbill)->firstOrFail();
//        $arr['categories'] = Category::all();
            $arr['categories'] = Category::where('exp_group_status',1)->orderBy('exp_group_name','asc')->get();
    
        return view('admin.unpaidbills.edit')->with($arr)
        ->with(['item' => $items, 'account' => $account, 'unpaidbill' => $unpaidbill]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    
    public function update(Request $request, $unpaidbill)
    {       
       $account = Account::where('th_tran_no', $unpaidbill)->firstOrFail();
    
        // or this
        //$account = Account::where('th_tran_no', $request->th_tran_no)->firstOrFail();
        
      
    
        $account->th_supp_name = $request->th_supp_name;     
        $date  = Carbon::createFromFormat('d-m-Y', $request->th_bill_dt);        
        $account->th_bill_dt = $date;                  
        $account->th_bill_no = $request->th_bill_no;
        $account->th_bill_amt = $request->th_bill_amt;
        $account->th_item_type = $request->th_item_type;
        $account->th_purpose = $request->th_purpose;        
        $account->th_pay_status = $request->th_pay_status;    
        $account->th_pay_date = $request->th_pay_date;  
        //$account->th_exp_cat_id = $request->th_exp_cat_id;  

        $record = Category::find(request('th_exp_cat_id'));
        //dd($record);

        if ( $request->th_exp_cat_id == 0) {           
            
                      
            $account->th_exp_cat_id = "0";
            $account->th_exp_cat_name = "Null";
            
        }
        else{            
            
            $account->th_exp_cat_id = $record->id;  
            $account->th_exp_cat_name = $record->exp_group_name;    
            
        }


        //$account->th_exp_cat_id = $record->id;  
        
        

      

        //$account->th_pay_tran_date = $request->th_pay_tran_date;  
        
        if ( !empty ( $request->th_pay_date ) ) {
            
           $pdate  = Carbon::createFromFormat('d-m-Y', $request->th_pay_date);        
          $account->th_pay_date = $pdate; 

            //$pdate  = Carbon::createFromFormat('d-m-Y', $request->th_pay_date);        
          //  $account->th_pay_date = $request->th_pay_date; 

        //  $account->th_pay_date = $request->th_pay_date;
        }
        
        
       

        $tdate  = Carbon::now();
        $account->th_pay_tran_date = $tdate; 

        


        $account->th_pay_remarks = $request->th_pay_remarks;
        $account->th_pay_id = Auth::user()->id;
        $account->th_pay_name = Auth::user()->name;
        $account->save();        
        return redirect()->route('admin.unpaidbills.index')->with('info','Transaction updated successfully!');
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
        return redirect()->route('admin.unpaidbills.index')->with('error','Transaction deleted successfully!');
    }
}
