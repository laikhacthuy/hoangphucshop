<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pro_Brand extends Model
{
    protected $table='tbl_pro_brands';

    protected $fillable=[
        'brand_id',
        'name_brand',
        'des_brand',
        'category_id'
    ];

    public $timestamps = false;

    public function Category()
    {
        return $this->belongsTo('App\Models\Pro_Category','category_id','category_id');
    }
}
