<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id',
        'reg_no',
        'make',
        'model',
        'chasis_no',
        'next_service'
    ];

    public function customer()
    {
        return $this->belongsTo('App/Customer');
    }

    public function estimate()
    {
        return $this->belongsTo('App/Estimate');
    }

}

