<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Account;
Use Auth;
use App\User;
use App\Item;
Use Gate;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!Gate::allows('isAdmin'))
        {
            abort(404,"Sorry you are not allowed");
        }
        

        $arr['categories'] = Category::all();
        return view('admin.categories.index')->with($arr);   


       //$arr['categories'] = Category::all();
       //$arr['categories'] = Category::where('th_emp_id', auth()->user()->id)->get();;
       //return view('admin.categories.index')->with($arr);   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category, User $user)
    {
        
        
       
        $category->exp_group_name = $request->exp_group_name;        
        $category->exp_group_desc = $request->exp_group_desc;    
        
        $category->created_id = Auth::user()->id;
        $category->created_name = Auth::user()->name;
        
        $category->save();       

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
            $arr['category'] = $category;
            return view('admin.categories.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->exp_group_name = $request->exp_group_name;
        $category->exp_group_desc = $request->exp_group_desc;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
