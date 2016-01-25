<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'mileage_in',
        'net_amount',
        'parent_estimate_id',
        'department',
        'created_by'
    ];

    public function customer(){
        return $this->hasOne('App/Customer');
    }

    public function vehicle(){
        return $this->hasOne('App/Vehicle');
    }

}
