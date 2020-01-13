<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Cashtopup;
use App\Item;
Use Auth;
Use Gate;
use PDF;

class HomestaffController extends Controller
{
    public function index(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('homestaff');
    }

}
