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
        $jobs = DB::table('jobs')
            ->join('estimates', 'estimates.id', '=', 'jobs.estimate_id')
            ->join('customers', 'customers.id', '=', 'estimates.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'estimates.vehicle_id')
            ->join('stakeholders', 'stakeholders.id', '=', 'jobs.s_adviser')
            ->selectRaw('jobs.*, jobs.id as job_id, customers.*, customers.name as cname, vehicles.*, stakeholders.*, stakeholders.name as sname')
            ->orderBy('jobs.id','DESC')->get();
        //var_dump($jobs); die;
        return view('jobs.jobs', compact('jobs'));
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
        $estimate_details = DB::table('estimate_details')->where('estimate_id', '=', $est_id)->get();
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
        //
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
        $job = Job::findOrFail($id);
        //var_dump($job); die;
        $estimate = Estimate::findOrFail($job->estimate_id);
        $estimate_details = DB::table('estimate_details')->where('estimate_id', '=', $job->estimate_id)->get();
        $department = Department::findOrFail($estimate->department);
        $s_advisor_list = DB::table('stakeholders')->where('role', '=', 's_advisor')->lists('name', 'id');
        $sec_incharge_list = DB::table('stakeholders')->where('role', '=', 'sec_incharge')->lists('name', 'id');
        $customer = Customer::findOrFail($estimate->customer_id);
        $vehicle = Vehicle::findOrFail($estimate->vehicle_id);

        return view('jobs.single-job', compact('job', 'estimate', 'estimate_details', 'department', 's_advisor_list', 'customer', 'vehicle', 'sec_incharge_list'));
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
