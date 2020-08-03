<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AutoCompleteSearchController extends Controller
{

    public function index()
    {
        return view('search-page');
    }

    public function autocomplete(Request $request)
    {
          $search = $request->get('term');
     
          $result = User::where('name', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);
           
    } 
}
