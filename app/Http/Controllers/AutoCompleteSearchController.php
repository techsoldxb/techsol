<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mitem;

class AutoCompleteSearchController extends Controller
{

    public function index()
    {
        return view('search-page');
    }

    public function autocomplete1(Request $request)
    {
          $search = $request->get('term');
     
          $result = Mitem::where('item_name', 'LIKE', '%'. $search. '%')->get();

          return response()->json($result);
           
    } 
}
