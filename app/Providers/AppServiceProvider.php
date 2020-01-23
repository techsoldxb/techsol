<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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
     
       

            view()->composer('home', function($view)  {
                $view->with('unpaid',\App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 0)->sum('th_bill_amt'));
    });

    view()->composer('home', function($view)  {
        $view->with('userunpaid',\App\Account::where('th_comp_code', auth()->user()->company)
        ->where('th_emp_id', auth()->user()->id)
        ->where('th_pay_status', 0)->sum('th_bill_amt'));
            });





    

    view()->composer('home', function($view)  {
        $view->with('paid',\App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 1)->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('userpaid',\App\Account::where('th_comp_code', auth()->user()->company)
    ->where('th_emp_id', auth()->user()->id)
    ->where('th_pay_status', 1)
    ->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('topup',\App\Cashtopup::where('comp_code', auth()->user()->company)->sum('topup_amt'));
});

view()->composer('home', function($view)  {
    $view->with('advance',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->where('ca_emp_id', auth()->user()->id)
    ->where('ca_status',0)
    ->sum('ca_adv_amt'));
});

view()->composer('home', function($view)  {
    $view->with('advanceall',\App\Advance::where('ca_comp_code', auth()->user()->company)
    ->where('ca_status',0)
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






       
 

    }
  
}
