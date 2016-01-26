<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimateDetail extends Model
{
    protected $fillable = [
        'estimate_id',
        'item_id',
        'item_description',
        'units',
        'rate',
        'labor_amount_final',
        'initial_amount',
        'task_status'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function estimate()
    {
        return $this->belongsTo('App\Estimate');
    }
}
