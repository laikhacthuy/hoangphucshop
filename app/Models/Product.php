<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='tbl_products';

    protected $fillable=[
        'id',
        'name_product',
        'des_product',
        'price',
        'discount',
        'image_avatar',
        'images_list',
        'count',
        'brand_id',
    ];

    public $timestamps = false;

    public function Brand_Product()
    {
        return $this->hasMany('App\Models\Pro_Brand','brand_id','id');
    }
}
