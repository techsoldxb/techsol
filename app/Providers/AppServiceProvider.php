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
        $view->with('paid',\App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 1)->sum('th_bill_amt'));
});

view()->composer('home', function($view)  {
    $view->with('topup',\App\Cashtopup::where('comp_code', auth()->user()->company)->sum('topup_amt'));
});

view()->composer('home', function($view)  {
    $view->with('users',\App\User::where('company', auth()->user()->company)->count('ID'));
});





       
 

    }
  
}
