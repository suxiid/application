<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
