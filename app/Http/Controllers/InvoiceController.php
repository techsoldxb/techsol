<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function getAutocompleteData(Request $request){
        if($request->has('term')){
            return Product::where('name','like','%'.$request->input('term').'%')->get();
        }
    }

    public function create(){
        return view('admin.invoices.create');
    }
}