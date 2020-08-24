<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobcard;
use App\User;
use DataTables;



class JobhistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    Public function index(Request $request)
    {
         if ($request->ajax()) {
             $data = Jobcard::select('*');
             return Datatables::of($data)
                     ->addIndexColumn()
                     ->addColumn('status', function($row){
                          if($row->job_status_name){
                             return '<span class="badge badge-primary">Received</span>';
                          }else{
                             return '<span class="badge badge-danger">Inspected</span>';
                          }
                     })
                     ->filter(function ($instance) use ($request) {
                         if ($request->get('job_status_name') == 'Received' || $request->get('job_status_name') == 'Inspected' 
                         || $request->get('job_status_name') == 'Work' || $request->get('job_status_name') == 'Completed'
                         || $request->get('job_status_name') == 'Invoiced' || $request->get('job_status_name') == 'WFP') {
                             $instance->where('job_status_name', $request->get('job_status_name'));
                         }
                         
                         if (!empty($request->get('search'))) {
                              $instance->where(function($w) use($request){
                                 $search = $request->get('search');
                                 $w->orWhere('job_enq_number', 'LIKE', "%$search%")
                                 ->orWhere('job_cust_name', 'LIKE', "%$search%");
                             });
                         }
                     })
                     ->rawColumns(['job_status_name'])
                     ->make(true);
         }
         
        // dd($request);
         
         return view('job.jobhistory.index');
     }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
