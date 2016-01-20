<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = [
        'name',
        'type',
        'location',
        'quantity',
        'sale_price',
        'unit_of_sale',
        'pre_order_level',
        'updated_user',
        'category_id',
        'service_only_cost',
        'updated_at'
    ];
}
