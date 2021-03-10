<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';

    protected $fillable=[
        'id',
        'id_customer',
        'name_customer',
        'phone_customer',
        'address_customer',
    ];

}
