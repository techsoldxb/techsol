<?php

namespace App\Http\Controllers\Hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Survey;

Use Auth;
use App\User;

Use Gate;


class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['survey'] = Survey::All();
        return view('hrms.survey.index')->with($arr); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrms.survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Survey $survey)
    {
        
        $survey->a1 = $request->a1;        
        $survey->a2 = $request->a2;        
        $survey->a3 = $request->a2;      

        $survey->b1 = $request->b2;      
        $survey->b2 = $request->b2;      
        $survey->b3 = $request->b3;      

        $survey->c1 = $request->c1;      
        $survey->c2 = $request->c2; 
        $survey->c3 = $request->c3; 

        $survey->d1 = $request->d1; 
        $survey->d2 = $request->d2; 
        $survey->d3 = $request->d3; 

        $survey->e1 = $request->e1; 
        $survey->e2 = $request->e2; 
        $survey->e3 = $request->e3; 

        $survey->f1 = $request->f1; 
        $survey->f2 = $request->f2; 
        $survey->f3 = $request->f3; 

        $survey->user_id = Auth::user()->id;        
        $survey->user_name = Auth::user()->name;        
        $survey->save();       
        return redirect()->route('hrms.survey.create');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
