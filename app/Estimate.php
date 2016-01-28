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
        return $this->belongsTo('App\Customer');
    }

    public function vehicle(){
        return $this->belongsTo('App\Vehicle');
    }

    public function estimate_details(){
        return $this->hasMany('App\EstimateDetail');
    }

}
