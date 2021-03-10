<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pro_Category extends Model
{
    protected $table='tbl_pro_category';

    protected $fillable=[
        'category_id',
        'name_category',
        'des_category',
    ];

    public $timestamps = false;

    public function Brand()
    {
        return $this->hasMany('App\Models\Pro_Brand','category_id','category_id');
    }
}
