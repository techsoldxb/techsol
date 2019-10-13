<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function product()
    {
        return view('product');
    }

    public function admin()
    {
        return view('admin');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function print()
    {
        return view('admin.accounts.print');
    }
}

