<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'item_id',
        'item_description',
        'quantity',
        'price'
    ];

    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
