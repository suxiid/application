<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Item;

class ItemsController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('items.items')->with('items', $items);
    }

    public function  create(){
        $catagories = \App\ItemCategory::all(['id', 'cat_name']);        
        return view('items.new-item')->with('catagories', $catagories);
    }
    
    public function  store(Requests\CreateItemRequest $request){
        
        $input = Request::all();
        $user_id = '1';      
        $item = new Item();
        $item->name = $input['name'];
        $item->type = $input['item-type'];
        $item->location = $input['item-location'];
        $item->quantity = $input['item-quantity'];
        $item->sale_price = $input['sale-price'];
        $item->unit_of_sale = $input['item-unit'];
        $item->pre_order_level = $input['po-level'];
        $item->updated_user = $user_id;
        $item->category_id = $input['item-category'];
        $item->service_only_cost = $input['so-cost'];
        $item->save($request->all());
        
        return redirect('/items');
    }
}
