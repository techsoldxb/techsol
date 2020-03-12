<?php

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
    return view('welcome');
});

Route::get('/table', function () {
    return view('table');
});

Auth::routes(['verify' => true]);
Route::get('users', 'UserController@index')->name('users');
Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/foh', 'HomeController@icc')->name('homeicc');
Route::get('/coh', 'HomeController@coh')->name('cash');
//Route::get('/admin1', 'HomestaffController@index')->name('homestaff');

//Route::resource('/admin', 'HomeController', ['as'=>'admin']);
Route::get('/about', 'TestController@about')->name('about');


Route::get('/product', 'TestController@product')->name('product');
Route::get('/testhome', 'HomeController@test')->name('testhome');
Route::get('/dashboard', 'TestController@dashboard')->name('dashboard');

Route::resource('/admin/categories', 'Admin\CategoriesController', ['as'=>'admin']);
Route::resource('/admin/cashtopups', 'Admin\CashtopupController', ['as'=>'admin']);
Route::resource('/admin/advances', 'Admin\AdvanceController', ['as'=>'admin']);
Route::resource('/admin/advanceall', 'Admin\AdvanceallController', ['as'=>'admin']);
Route::resource('/admin/advancesettlement', 'Admin\AdvancesettlementController', ['as'=>'admin']);
Route::resource('/admin/advancehistory', 'Admin\AdvancehistoryController', ['as'=>'admin']);
//Route::resource('/admin/alladvancesnew', 'Admin\AdvanceallnewController', ['as'=>'admin']);
Route::resource('/admin/news', 'Admin\NewsController', ['as'=>'admin']);
Route::resource('/admin/accounts', 'Admin\AccountsController', ['as'=>'admin']);
Route::resource('/admin/unpaidbills', 'Admin\UnpaidController', ['as'=>'admin']);
Route::resource('/admin/paidbills', 'Admin\PaidController', ['as'=>'admin']);
Route::resource('/admin/allpaidbills', 'Admin\AllpaidController', ['as'=>'admin']);

Route::get('/admin/accounts/{account}/print', 'Admin\AccountsController@print')->name('admin.accounts.print');

//Booking
Route::resource('/foh/booking', 'Foh\BookingController', ['as'=>'foh'])->middleware('auth');
Route::resource('/foh/bookinghistory', 'Foh\BookinghistoryController', ['as'=>'foh']);
Route::resource('/foh/addon', 'Foh\AddonController', ['as'=>'foh']);
Route::resource('/foh/pending', 'Foh\PendingController', ['as'=>'foh']);
Route::resource('/foh/cancel', 'Foh\CancelController', ['as'=>'foh']);
Route::resource('/foh/cancelled', 'Foh\CancelledController', ['as'=>'foh']);

//HRMS
Route::resource('/hrms/employee', 'Hrms\EmployeeController', ['as'=>'hrms']);
Route::resource('/hrms/survey', 'Hrms\SurveyController', ['as'=>'hrms']);



//Export Route
Route::get('/showdata', 'CsvController@showdata');     
Route::get('/export', 'Admin\AccountsController@export')->name('admin.accounts.export');   
Route::get('/paidbillexport', 'Admin\AccountsController@paidbillexport')->name('admin.accounts.paidbillexport');
Route::get('/cashtopupexport', 'Admin\CashtopupController@cashtopupexport')->name('admin.cashtopups.cashtopupexport');
Route::get('/bookingexport', 'Foh\BookinghistoryController@bookingexport')->name('foh.booking.bookingexport');


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




//Route::get('/admin/accounts/{account}/print/{item}', 'Admin\AccountsController@print')->name('admin.accounts.print');

//Route::get('/admin/accounts/{account}/print', 'Admin\AccountsController@print')->name('admin.accounts.print');




















/*
Route::get('/print', 'AccountsController@print')->name('print');
*/