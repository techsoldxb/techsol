<?php

use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\Newslack;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::resource('/admin/accounts', 'AccountsController');

*/

Route::get('/', function () {
   // Alert::success('Welcome', 'Welcome');

    return view('welcome');
});

Route::get('/table', function () {
    return view('table');
});

Route::post('/order', 'OrderController@store')->name('order')->middleware('auth');



//All unknows request will go to test.blade.php
//Route::any('{abcd}', function () {
  //  return view('test');
//});

Route::get('/slack', function () {

    $user = App\User::first();
    
    $user->notify(new Newslack());
    
       echo "A slack notification has been send";
    
    });

    Route::get('/send-sms',['as'=>'send.sms','uses'=>'SendSMSController@sendSMS']);



Auth::routes([
    'verify' => true,
    'register' => false,
    
    ]);
    
Route::get('users', 'UserController@index')->name('users')->middleware('auth');
Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/foh/homeicc', 'HomeController@icc')->name('homeicc')->middleware('auth');
Route::get('/coh', 'HomeController@coh')->name('cash')->middleware('auth');







Route::get('/dashboard', 'TestController@dashboard')->name('dashboard');

Route::resource('/admin/categories', 'Admin\CategoriesController', ['as'=>'admin'])->middleware('auth');
Route::resource('/admin/cashtopups', 'Admin\CashtopupController', ['as'=>'admin'])->middleware('auth');

Route::resource('/admin/accounts', 'Admin\AccountsController', ['as'=>'admin'])->middleware('auth');
Route::resource('/admin/expense', 'Admin\ExpenseController', ['as'=>'admin'])->middleware('auth');



Route::get('/admin/accounts/{account}/print', 'Admin\AccountsController@print')->name('admin.accounts.print');

//HRMS
Route::resource('/hrms/employee', 'Hrms\EmployeeController', ['as'=>'hrms'])->middleware('auth');



//Showroom - Enquiry
Route::resource('/showroom/enquiry', 'Showroom\EnquiryController', ['as'=>'showroom'])->middleware('auth');
//Route::get('/showroom/enquiry/index1', 'Showroom\EnquiryController@index1', ['as'=>'showroom'])->middleware('auth');
Route::get('/showroom/enqkkdtotal', 'Showroom\EnquiryController@enqkkdtotal')->name('showroom.enqkkdtotal');   
Route::get('/showroom/enqkkdtoday', 'Showroom\EnquiryController@enqkkdtoday')->name('showroom.enqkkdtoday');  

Route::get('/showroom/enqrmdtotal', 'Showroom\EnquiryController@enqrmdtotal')->name('showroom.enqrmdtotal');   
Route::get('/showroom/enqrmdtoday', 'Showroom\EnquiryController@enqrmdtoday')->name('showroom.enqrmdtoday');  

Route::resource('/showroom/cash', 'Showroom\CashController', ['as'=>'showroom'])->middleware('auth');
Route::resource('/showroom/cashkkd', 'Showroom\CashkkdController', ['as'=>'showroom'])->middleware('auth');
Route::resource('/showroom/accountskkd', 'Admin\AccountskkdController', ['as'=>'showroom'])->middleware('auth');

//Job - Service Center
Route::resource('/job/jobcard', 'Job\JobcardController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobinspect', 'Job\JobinspectController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobestimate', 'Job\JobestimateController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobcomplete', 'Job\JobcompleteController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobinvoice', 'Job\JobinvoiceController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobinvtotal', 'Job\JobinvtotalController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobreturn', 'Job\JobreturnController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/joboutside', 'Job\JoboutsideController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/joboutsideest', 'Job\JoboutsideestController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobfault', 'Job\JobfaultController', ['as'=>'job'])->middleware('auth');
Route::resource('/job/jobwork', 'Job\JobworkController', ['as'=>'job'])->middleware('auth'); //Work in Progress
Route::resource('/job/jobwfp', 'Job\JobwfpController', ['as'=>'job'])->middleware('auth'); //Waiting for parts
Route::get('/jobcard/jobquit', 'Job\JobcardController@jobquit')->name('jobcard.quit'); 

Route::resource('/job/jobhistory', 'Job\JobhistoryController', ['as'=>'job'])->middleware('auth');

Route::get('/jobinvtotal/indexkkd', 'Job\JobinvtotalController@indexkkd')->name('jobinvtotal.indexkkd'); 

Route::get('/job/jobinvoice/{jobcard}/print', 'Job\JobinvoiceController@print')->name('job.jobinvoice.print');
//Route::get('/jobcard/invoice', 'Job\JobcardController@invoice')->name('jobcard.invoice'); 
//Route::get('/jobcard/joboutside', 'Job\JobcardController@joboutside')->name('jobcard.outside'); 
//Route::get('/jobcard/print', 'Job\JobcardController@print')->name('jobcard.print');  



//POS - Items / GRN / Sales
Route::resource('/pos/items', 'Pos\ItemsController', ['as'=>'pos'])->middleware('auth');
Route::resource('/pos/grn', 'Pos\GrnController', ['as'=>'pos'])->middleware('auth');



//autocomplete



//Route::get('query', 'AutoCompleteSearchController@index');
//Route::get('autocomplete', 'AutoCompleteSearchController@autocomplete');
 Route::get('autocomplete', 'GrnController@autocomplete');
 Route::get('query', 'GrnController@index1');






//Export Route

Route::get('/export', 'Admin\AccountsController@export')->name('admin.accounts.export');   
Route::get('/paidbillexport', 'Admin\AccountsController@paidbillexport')->name('admin.accounts.paidbillexport');
Route::get('/cashtopupexport', 'Admin\CashtopupController@cashtopupexport')->name('admin.cashtopups.cashtopupexport');




View::Composer(
    ['*'],function($view)
    {
        $user = Auth::user();
        $view->with('user',$user); 
    }
    );

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });

    Route::resource('calendar', 'CalendarController');





















/*
Route::get('/print', 'AccountsController@print')->name('print');
*/