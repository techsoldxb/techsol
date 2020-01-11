<?php

namespace App\Http\Controllers; 
  use App\Exports\UserExport; 
  use Maatwebsite\Excel\Facades\Excel; 
  use Illuminate\Http\Request; 
  use App\User; 
  class CsvController extends Controller 
  {
    public function export(){
      return Excel::download(new UserExport, 'users.csv'); 
    } 

    public function showdata(){
      $data = User::all(); 
      return view('users',['users'=>$data]); 
    }
  } 