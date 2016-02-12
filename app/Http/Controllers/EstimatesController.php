<?php

namespace App\Http\Controllers;

use App\EstimateDetail;
use App\Job;
use App\User;
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
use DB;

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
       $estimates = Estimate::orderBy('id','DESC')->get();
       $customers = Customer::all();
       $vehicles = Vehicle::all();
       $departments = Department::all();
        $users = User::all();

       return view('estimates.estimates', compact('estimates', 'customers', 'vehicles', 'departments', 'users'));
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
        $items = Item::lists('name', 'id')->all();
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
            $estimate->net_amount = $input['net_amount'];
            $estimate->created_by = $user_id;

            /*$estimate_detail = new EstimateDetail();
            $estimate_detail->item_id = $input['item_id'];
            $estimate_detail->item_description = $input['item_description'];
            $estimate_detail->units = $input['units'];
            $estimate_detail->rate = $input['rate'];
            $estimate_detail->initial_amount = $input['amount'];*/



            /*$estimate_detail->item_id = 1;
            $estimate_detail->item_description = 'asdqwe';
            $estimate_detail->units = 10;
            $estimate_detail->rate = 10;
            $estimate_detail->initial_amount = 100;*/

           /*$records = [new EstimateDetail([
                        'item_id' => $input['item_id'],
                        'item_description' => $input['item_description'],
                        'units' => $input['units'],
                        'rate' => $input['rate'],
                        'amount' => $input['amount']
                    ])];*/
            /*$num_elements = 0;
            $estimate_detail = array();
            while($num_elements < count($input['item_id']))
            {
                $estimate_detail[] = array(
                'item_id' => $input['item_id'][$num_elements],
                'item_description' => $input['item_description'][$num_elements],
                'units' => $input['units'][$num_elements],
                'rate' => $input['rate'][$num_elements],
                'amount' => $input['amount'][$num_elements]
                );
                $num_elements++;
            }*/



            $estimate->save($request->all());

            for($i=0;$i<count($input['item_id']);$i++)
            {
                $estimate_detail = new EstimateDetail();
                $estimate_detail->item_id = $input['item_id'][$i];
                $estimate_detail->item_description = $input['item_description'][$i];
                $estimate_detail->units = $input['units'][$i];
                $estimate_detail->rate = $input['rate'][$i];
                $estimate_detail->initial_amount = $input['amount'][$i];

                $estimate->estimate_details()->save($estimate_detail);
            }
            /*
            $data = [];
            for($i=0;$i<count($input['item_id']);$i++)
            {
                $data[] = array(
                    'estimate_id' => $estimate_id,
                    'item_id' => $input[$i]['item_id'],
                    'item_description' => $input[$i]['item_description'],
                    'units' => $input[$i]['units'],
                    'rate' => $input[$i]['rate'],
                    'amount' => $input[$i]['amount']
                );
            }
            EstimateDetail::insert($data);*/
            //DB::table('estimate_details')->insert($data);
            //$estimate->estimate_details()->save($estimate_detail);
            //$estimate->estimate_details()->save($estimate_detail);
            //foreach($records as $record){
                //$estimate->estimate_details()->saveMany($records);
           // }


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
            $estimate->net_amount = $input['net_amount'];
            $estimate->created_by = $user_id;

            $vehicle->save($request->all());
            $vehicle->estimate()->save($estimate);

            for($i=0;$i<count($input['item_id']);$i++)
            {
                $estimate_detail = new EstimateDetail();
                $estimate_detail->item_id = $input['item_id'][$i];
                $estimate_detail->item_description = $input['item_description'][$i];
                $estimate_detail->units = $input['units'][$i];
                $estimate_detail->rate = $input['rate'][$i];
                $estimate_detail->initial_amount = $input['amount'][$i];

                $estimate->estimate_details()->save($estimate_detail);
            }

            /*foreach ($estimate_detail as $item_row) {
                $estimate->estimate_details()->save($item_row);
            }*/

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
        $estimate = Estimate::findOrFail($id);
        $estimate_details = DB::table('estimate_details')->where('estimate_id', '=', $id)->get();
        $department = Department::where('id', '=', $estimate->department)->firstOrFail();
        $customer = Customer::where('id', '=', $estimate->customer_id)->firstOrFail();
        $vehicle = Vehicle::where('id', '=', $estimate->vehicle_id)->firstOrFail();
        return view('estimates.single-estimate', compact('estimate', 'estimate_details', 'department', 'customer', 'vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = Estimate::findOrFail($id);
        $vehicles = Vehicle::lists('reg_no', 'id')->all();
        $customer_list = Customer::lists('name', 'id')->all();
        $departments = Department::lists('name', 'id');
        $items = Item::lists('name', 'id')->all();
        $estimate_details = DB::table('estimate_details')->where('estimate_id', '=', $id)->get();
        return view('estimates.edit', compact('estimate', 'vehicles', 'estimate_details', 'customer_list', 'departments', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstimateRequest $request, $id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->update($request->all());

        DB::table('estimate_details')->where('estimate_id', '=', $id)->delete();

        $input = $request->all();

        for($i=0;$i<count($input['item_id']);$i++)
        {
            if($input['item_id'][$i] != null) {
                $estimate_detail = new EstimateDetail();
                $estimate_detail->item_id = $input['item_id'][$i];
                $estimate_detail->item_description = $input['item_description'][$i];
                $estimate_detail->units = $input['units'][$i];
                $estimate_detail->rate = $input['rate'][$i];
                $estimate_detail->initial_amount = $input['amount'][$i];

                $estimate->estimate_details()->save($estimate_detail);
            }
        }
        return redirect('estimates');
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
