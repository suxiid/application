<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        //$item = Item::find($this->item);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|unique:items'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'location' => 'required',
                    'quantity' => 'required|numeric',
                    'sale_price' => 'required|numeric',
                    'pre_order_level' => 'required|numeric',
                    'service_only_cost' => 'required|numeric',
                ];
            }
            default:break;
        }
        
        
        /*
        if ($request->is('/items/create')) {
           return [
                'name' => 'required|unique:items'
            ];
        }
        else{
            return [
                'name' => 'required'
            ];
        } */       
    }
}
