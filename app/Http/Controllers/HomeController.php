<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Account;
use App\Cashtopup;
use App\Item;
Use Auth;
Use Gate;
use PDF;



use Carbon\Carbon;
use App\Jobcard;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('home');
    }

    public function coh(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('cash');
    }

    public function icc(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('homeicc');
    }

    public function feedback(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('feedback');
    }

    

    public function job(Request $request)
    {
        //Users::where('id', 1)->count();
        //return view('homejob');


        $homejob = [];

    //$cards = Jobcard::select([
     //   'job_comp_code',
      //  \DB::raw("DATE_FORMAT(job_enq_date, '%Y-%m') as month"),
      //  \DB::raw('COUNT(id) as invoices'),
      //  \DB::raw('SUM(job_invoice_amount) as amount')
    //])
    //->groupBy('job_comp_code')
    //->groupBy('month')
    //->get();

// $cards->each(function($item) use (&$homejob) {
   //     $homejob[$item->month][$item->job_comp_code] = [
     //       'count' => $item->invoices,
       //     'amount' => $item->amount
       // ];
   // });


    $cards = Jobcard::select([
       'job_comp_code',
      \DB::raw("DATE_FORMAT(job_invoice_date, '%Y-%m') as month"),      
      \DB::raw('SUM(job_invoice_amount) as amount')
    ])
    ->groupBy('job_comp_code')
    ->groupBy('month')
    ->get();

$cards->each(function($item) use (&$homejob) {
        $homejob[$item->month][$item->job_comp_code] = [            
            'amount' => $item->amount
        ];
    });



$job_comp_codes = $cards->pluck('job_comp_code')->sortBy('job_comp_code')->unique();

return view('homejob', compact('homejob', 'job_comp_codes'));


    }



    

    public function about()
    {
        return view('about');
    }

    public function test()
    {
        return view('testhome');
    }

    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('bill.pdf');
    }

    
 
}
