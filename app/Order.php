<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'supplier_id',
        'created_by'
    ];

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function order_details(){
        return $this->hasMany('App\OrderDetail');
    }
}
