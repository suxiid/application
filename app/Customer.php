<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;
use App\Estimate;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'telephone',
        'mobile',
        'email',
        'fax',
        'website',
        'vat_no',
        'contact_person',
        'credit_limit',
        'account_sys_id'
    ];

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function estimates()
    {
        return $this->hasMany('App\Estimate');
    }
}
