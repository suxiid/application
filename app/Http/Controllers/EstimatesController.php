<?php

namespace App\Http\Controllers;

use App\EstimateDetail;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estimate;
use App\Customer;
use App\Department;
use App\Item;
use App\Http\Requests\EstimateRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\VehiclesController;

class EstimatesController extends Controller
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
       $estimates = Estimate::all();
       $customers = Customer::all();
       $vehicles = Vehicle::all();
       $departments = Department::all();
       return view('estimates.estimates', compact('estimates', 'customers', 'vehicles', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_list = Customer::lists('name', 'id')->all();
        $departments = Department::lists('name', 'id');
        $items = Item::lists('name', 'id');
        return view('estimates.create', compact('customer_list', 'departments', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstimateRequest $request)
    {

        $user_id = '1';

        $input = $request->all();

        if($input['vehicle_id'] != null){
            $estimate = new Estimate();
            $estimate->customer_id = $input['customer_id'];
            $estimate->vehicle_id = $input['vehicle_id'];
            $estimate->mileage_in = $input['mileage_in'];
            $estimate->department = $input['department'];
            $estimate->created_by = $user_id;
            $estimate->save($request->all());
        }else{
            /*$vehicle = Vehicle::create([
                'customer_id' => $request->get('customer_id'),
                'reg_no' => $request->get('reg_no'),
                'make' => $request->get('make'),
                'model' => $request->get('model'),
                'created_by' => $user_id
            ]);*/
            $vehicle = new Vehicle();
            $vehicle->customer_id = $input['customer_id'];
            $vehicle->reg_no = $input['reg_no'];
            $vehicle->make = $input['make'];
            $vehicle->model = $input['model'];
            $vehicle->created_by = $user_id;
            //$vehicle->save($request->all());

            $estimate = new Estimate();
            $estimate->customer_id = $input['customer_id'];
            $estimate->mileage_in = $input['mileage_in'];
            $estimate->department = $input['department'];
            $estimate->created_by = $user_id;

            $estimate_detail = new EstimateDetail();
            /*$estimate_detail->item_id = $input['[item_id]'];
            $estimate_detail->item_description = $input['[item_description]'];
            $estimate_detail->units = $input['[units]'];
            $estimate_detail->rate = $input['[rate]'];
            $estimate_detail->amount = $input['[amount]'];*/

            $vehicle->save($request->all());
            $vehicle->estimate()->save($estimate);

            foreach ($estimate_detail as $item_row) {
                $estimate->estimate_details()->save($item_row);
            }

            //$estimate->estimate_details()->save($estimate_detail);
            //var_dump($estimate_detail);die;
            /*

            foreach ($input['item_id'] as $item) {

                $estimate->items()->save(new Item($item));

            }
            */
            //$vehicle->estimate()->save($estimate);
        }

        return redirect('/estimates');
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
