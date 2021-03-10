<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table= 'tbl_order_detail';
    protected $fillable=[
        'order_detail_id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_qty',
    ];
    public $timestamps = false;
}
