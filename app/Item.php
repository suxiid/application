<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'type',
        'location',
        'quantity',
        'sale_price',
        'unit_of_sale',
        'pre_order_level',
        'created_by',
        'category_id',
        'service_only_cost',
        'updated_at'
    ];
}
