<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function feedback(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('feedback');
    }

    
}
