<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Request;
use App\Item;
use App\Http\Requests\ItemRequest;
use App\ItemCategory;

class ItemsController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $items = Item::all();
        $catagories = ItemCategory::all(['id', 'cat_name']);
        return view('items.items', compact('items', 'catagories'));
    }

    public function  create(){
        $catagories = ItemCategory::lists('cat_name', 'id');        
        return view('items.create')->with('catagories', $catagories);
    }
    
    public function  store(ItemRequest $request){
        
        $input = $request->all();
        $user_id = '1';      
        $item = new Item();
        $item->name = $input['name'];
        $item->type = $input['type'];
        $item->location = $input['location'];
        $item->quantity = $input['quantity'];
        $item->sale_price = $input['sale_price'];
        $item->unit_of_sale = $input['unit_of_sale'];
        $item->pre_order_level = $input['pre_order_level'];
        $item->updated_user = $user_id;
        $item->category_id = $input['category_id'];
        $item->service_only_cost = $input['service_only_cost'];
        $item->save($request->all());
        
        return redirect('/items');
    }
    
    public function edit($id){
        $item = Item::findOrFail($id);
        $catagories = ItemCategory::lists('cat_name', 'id'); 
        return view('items.edit', compact('item', 'catagories'));
    }
    
    public function update($id, ItemRequest $request){
	$item = Item::findOrFail($id);
	$item->update($request->all());
	return redirect('items');        
    }
    
}
