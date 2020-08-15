<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
Use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {    

        Carbon::setLocale(config('app.locale'));

       

            view()->composer('home', function($view)  {
                $view->with('expense',\App\Account::where('th_comp_code', auth()->user()->company)
                ->where('th_pay_status', 0)
                ->where('th_tran_code','EXPJV')
                ->sum('th_bill_amt'));
    });

    view()->composer('home', function($view)  {
        $view->with('cashpayment',\App\Account::where('th_comp_code', auth()->user()->company)
        ->where('th_pay_status', 0)
        ->where('th_tran_code','CPV')
        ->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('cashpaymenta',\App\Account::where('th_pay_status', 0)
    ->where('th_tran_code','CPV')
    ->sum('th_bill_amt'));
});


    view()->composer('home', function($view)  {
        $view->with('expenseskkd',\App\Account::where('th_comp_code', '004')->where('th_pay_status', 0)->where('th_tran_code','EXPJV')->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('expensesbash',\App\Account::where('th_comp_code', '003')->where('th_pay_status', 0)->where('th_tran_code','EXPJV')->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('expensesche',\App\Account::where('th_comp_code', '002')->where('th_pay_status', 0)->where('th_tran_code','EXPJV')->sum('th_bill_amt'));
});

view()->composer('job.jobinvoice.index', function($view)  {
    $view->with('sc_inv_today',\App\Jobcard::where('job_comp_code', auth()->user()->company)
    ->whereDate('job_invoice_date', Carbon::today()->toDateString())
    ->where('job_status_name','Invoiced')->sum('job_invoice_amount'));
});

view()->composer('job.jobinvoice.index', function($view)  {
    $view->with('sc_inv_cash',\App\Jobcard::where('job_comp_code', auth()->user()->company)
    ->where('job_flex2', 'Cash')
    ->whereDate('job_invoice_date', Carbon::today()->toDateString())
    ->where('job_status_name','Invoiced')->sum('job_invoice_amount'));
});

view()->composer('job.jobinvoice.index', function($view)  {
    $view->with('sc_inv_online',\App\Jobcard::where('job_comp_code', auth()->user()->company)
    ->where('job_flex2', 'Online')
    ->whereDate('job_invoice_date', Carbon::today()->toDateString())
    ->where('job_status_name','Invoiced')->sum('job_invoice_amount'));
});

view()->composer('home', function($view)  {
    $view->with('jobinvamount',\App\Jobcard::where('job_comp_code', auth()->user()->company)
    ->where('job_status_name', 'Invoiced')
    ->where('job_flex2', 'Cash')
    ->sum('job_invoice_amount'));
});


view()->composer('home', function($view)  {
    $view->with('jobinvamountkkd',\App\Jobcard::where('job_comp_code', 004)
    ->where('job_status_name', 'Invoiced')
    ->where('job_flex2', 'Cash')
    ->sum('job_invoice_amount'));
});

//this will display the count in the left menu


view()->composer('homejob', function($view)  {    
    $view->with('receivedtotalrmd',\App\Jobcard::where('job_comp_code','003')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {    
    $view->with('receivedtotalkkd',\App\Jobcard::where('job_comp_code','004')
    ->count('ID'));
});

view()->composer('*', function($view)  {    
    $view->with('received',\App\Jobcard::where('job_status_name', 'Received')
    ->where('job_comp_code',optional(auth()->user())->company)
    ->count('ID'));
});

view()->composer('homejob', function($view)  {    
    $view->with('receivedkkd',\App\Jobcard::where('job_status_name', 'Received')
    ->where('job_comp_code','004')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('inspected',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Inspected')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('inspectedkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Inspected')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('work',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Work')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('workkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Work')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('completed',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)    
    ->where(function($query)
    {
        $query->where('job_status_name', '=', 'Completed')
              ->orWhere('job_status_name', '=', 'Outside_Received');
    })     
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('completedkkd',\App\Jobcard::where('job_comp_code', '004')    
    ->where(function($query)
    {
        $query->where('job_status_name', '=', 'Completed')
              ->orWhere('job_status_name', '=', 'Outside_Received');
    })     
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('wfp',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'WFP')    
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('wfpkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'WFP')    
    ->count('ID'));
});






view()->composer('*', function($view)  {
    $view->with('invoiced',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Invoiced')
    ->whereDate('job_invoice_date', Carbon::today()->toDateString())
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('invoicedkkdtoday',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Invoiced')
    ->whereDate('job_invoice_date', Carbon::today()->toDateString())
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('invoicedrmd',\App\Jobcard::where('job_comp_code', '003')
    ->where('job_status_name', 'Invoiced')   
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('invoicedkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Invoiced')  
    ->count('ID'));
});


view()->composer('*', function($view)  {
    $view->with('return',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where(function($query)
    {
        $query->where('job_status_name', '=', 'Return')
              ->orWhere('job_status_name', '=', 'Received_NR');
    })       
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('returnkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where(function($query)
    {
        $query->where('job_status_name', '=', 'Return')
              ->orWhere('job_status_name', '=', 'Received_NR');
    })       
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('quit',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Quit')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('quitkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Quit')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('outside',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Outside')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('outsidekkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Outside')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('outside_est',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Outside_Estimation')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('outside_estkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Outside_Estimation')
    ->count('ID'));
});

view()->composer('*', function($view)  {
    $view->with('delivered',\App\Jobcard::where('job_comp_code', optional(auth()->user())->company)
    ->where('job_status_name', 'Delivered')
    ->count('ID'));
});

view()->composer('homejob', function($view)  {
    $view->with('deliveredkkd',\App\Jobcard::where('job_comp_code', '004')
    ->where('job_status_name', 'Delivered')
    ->count('ID'));
});










view()->composer('home', function($view)  {
    $view->with('jobinvamountrmd',\App\Jobcard::where('job_comp_code', 003)
    ->where('job_status_name', 'Invoiced')
    ->where('job_flex2', 'Cash')
    ->sum('job_invoice_amount'));
});






    view()->composer('home', function($view)  {
        $view->with('userunpaid',\App\Account::where('th_comp_code', auth()->user()->company)
        ->where('th_emp_id', auth()->user()->id)
        ->where('th_pay_status', 0)->sum('th_bill_amt'));
            });







    

    view()->composer(['home','cash'], function($view)  {
        $view->with('paid_ob',\App\Account::where('th_comp_code', auth()->user()->company)
        ->whereMonth('th_pay_date', '<', date('m'))->where('th_pay_status', 1)->sum('th_bill_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('paid_cm',\App\Account::where('th_comp_code', auth()->user()->company)->whereMonth('th_pay_date', date('m'))->where('th_pay_status', 1)->sum('th_bill_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('paid',\App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 1)->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('userpaid',\App\Account::where('th_comp_code', auth()->user()->company)
    ->where('th_emp_id', auth()->user()->id)
    ->where('th_pay_status', 1)
    ->sum('th_bill_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('topup_ob',\App\Cashtopup::where('comp_code', auth()->user()->company)->whereMonth('topup_dt', '<', date('m'))->sum('topup_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('topup_cm',\App\Cashtopup::where('comp_code', auth()->user()->company)->whereMonth('topup_dt', date('m'))->sum('topup_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('topup',\App\Cashtopup::where('comp_code', auth()->user()->company)->sum('topup_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('topupche',\App\Cashtopup::sum('topup_amt'));
});

view()->composer(['home','cash'], function($view)  {
    $view->with('wob',\App\Cash::where('td_comp_code', auth()->user()->company)->sum('td_doc_amt'));
});


view()->composer(['home','cash'], function($view)  {
    $view->with('wobkkd',\App\Cash::where('td_comp_code','004')->sum('td_doc_amt'));
});


view()->composer(['home','cash'], function($view)  {
    $view->with('wobbash',\App\Cash::where('td_comp_code','003')->sum('td_doc_amt'));
});


view()->composer(['home','cash'], function($view)  {
    $view->with('wobche',\App\Cash::where('td_comp_code','002')->sum('td_doc_amt'));
});




view()->composer('home', function($view)  {
    $view->with('advance',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->where('ca_emp_id', auth()->user()->id)
    ->where('ca_status',0)
    ->where('ca_pay_status',0)
    ->sum('ca_adv_amt'));
});

view()->composer('home', function($view)  {
    $view->with('advanceall',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->where('ca_status',0)
    ->where('ca_pay_status',0)
    ->sum('ca_adv_amt'));
});

view()->composer(['home', 'cash'], function($view)  {
    $view->with('advancepaid_ob',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->whereMonth('ca_pay_tran_date' ,'<', date('m'))
    ->where('ca_status',0)
    ->where('ca_pay_status',1)
    ->sum('ca_adv_amt'));
});

view()->composer(['home', 'cash'], function($view)  {
    $view->with('advancepaid_cm',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->whereMonth('ca_pay_tran_date', date('m'))
    ->where('ca_status',0)
    ->where('ca_pay_status',1)
    ->sum('ca_adv_amt'));
});

view()->composer(['home', 'cash'], function($view)  {
    $view->with('advancepaid',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->where('ca_status',0)
    ->where('ca_pay_status',1)
    ->sum('ca_adv_amt'));
});






view()->composer('home', function($view)  {
    $view->with('users',\App\User::where('company', auth()->user()->company)->count('ID'));
});

view()->composer('home', function($view)  {
    $view->with('accusers',\App\User::where('company', auth()->user()->company)->where('user_type','admin')->count('ID'));
});



view()->composer('home', function($view)  {
    $view->with('categories',\App\Category::count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_count',\App\Booking::count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_cancel',\App\Booking::where('tb_flex1','1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_manal_count',\App\Booking::where('tb_reference','manal')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_gelan_count',\App\Booking::where('tb_reference','gelan')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_icc_count',\App\Booking::where('tb_reference','ICC')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_foh_count',\App\Booking::where('tb_reference','FOH')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_icc_amount',\App\Booking::where('tb_reference','ICC')->whereNull('tb_flex1')->sum('tb_total'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_manal_amount',\App\Booking::where('tb_reference','manal')->whereNull('tb_flex1')->sum('tb_total'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_gelan_amount',\App\Booking::where('tb_reference','gelan')->whereNull('tb_flex1')->sum('tb_total'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_foh_amount',\App\Booking::where('tb_reference','foh')->whereNull('tb_flex1')->sum('tb_total'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_student_count',\App\Booking::whereNull('tb_flex1')->sum('tb_student_qty'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_teacher_count',\App\Booking::whereNull('tb_flex1')->sum('tb_adult'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_total_amount',\App\Booking::whereNull('tb_flex1')->sum('tb_total'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_school_count',\App\Booking::where('tb_type','School Trip')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_corporate_count',\App\Booking::where('tb_type','Corporate Booking')->whereNull('tb_flex1')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('booking_events_count',\App\Booking::where('tb_type','Events')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('enqkkdtotal',\App\Enquiry::where('enq_comp_code','004')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('enqkkdtoday',\App\Enquiry::where('enq_comp_code','004')->where('enq_date',date('Y-m-d'))->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('enqrmdtotal',\App\Enquiry::where('enq_comp_code','003')->count('ID'));
});

view()->composer('homeicc', function($view)  {
    $view->with('enqrmdtoday',\App\Enquiry::where('enq_comp_code','003')->where('enq_date',date('Y-m-d'))->count('ID'));
});



















       
 

    }
  
}
