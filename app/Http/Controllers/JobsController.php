<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estimate;
use App\EstimateDetail;
use App\Department;
use App\Stakeholder;
use DB;
use App\Vehicle;
use App\Http\Requests\JobRequest;

class JobsController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
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
        return view('jobs.jobs');
    }

    /**
     * Show the form for creating a new job.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_job($est_id)
    {
        $job = DB::table('jobs')->where('estimate_id', '=', $est_id)->get();
        $estimate = Estimate::findOrFail($est_id);
        $estimate_details = EstimateDetail::where('estimate_id', '=', $est_id)->firstOrFail();
        $department = Department::findOrFail($estimate->department);
        $s_advisor_list = DB::table('stakeholders')->where('role', '=', 's_advisor')->lists('name', 'id');
        $sec_incharge_list = DB::table('stakeholders')->where('role', '=', 'sec_incharge')->lists('name', 'id');
        $customer = Customer::findOrFail($estimate->customer_id);
        $vehicle = Vehicle::findOrFail($estimate->vehicle_id);
        if($job != null){
            return view('jobs.single-job', compact('job', 'estimate', 'estimate_details', 'department', 's_advisor_list', 'customer', 'vehicle', 'sec_incharge_list'));
        }else{
            return view('jobs.create', compact('estimate', 's_advisor_list', 'customer', 'vehicle', 'sec_incharge_list'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $input = $request->all();
        $user_id = '1';
        $job = new Job();
        $job->estimate_id = $input['estimate_id'];
        $job->promised_date = $input['promised_date'];
        $job->section_incharge = $input['section-incharge'];
        $job->s_adviser = $input['advisor'];
        $job->remarks = $input['remark'];
        $job->status = 'open';
        $job->created_by = $user_id;
        $job->save($request->all());

        return redirect('/jobs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobs.single-job');
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
