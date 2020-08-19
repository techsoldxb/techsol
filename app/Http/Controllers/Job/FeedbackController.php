<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreFeedbackRequest;
use Illuminate\Validation\Rule;




use Illuminate\Support\Str;

use App\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('job.jobfeedback.index');
    }

    public function success(Feedback $feedback)
    {
        $feedback= feedback::where('user_id', auth()->id())->find(session('created_id'));
        //dd($feedback);
        return redirect()->route('job.jobfeedback.success',compact('feedback'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.jobfeedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request ,Feedback $feedback)
    {

        
        $validatedData = $request->validate([
            'fb_job_number' => 'unique:feedback',  
            'fb_comments' => 'required',    
            'fb_experience' => 'required',            
        ]);

        $feedback->fb_name = $request->fb_name;  
        $feedback->fb_experience = $request->fb_experience;  
        $feedback->fb_mobile = $request->fb_mobile;  
        $feedback->fb_comments = $request->fb_comments;    
        $feedback->fb_job_number = $request->fb_job_number;    

        $feedback->fb_coupon = Str::random(6);

        $feedback->save();  

        return view('job.jobfeedback.success',compact('feedback'));
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
