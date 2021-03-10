<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pro_Specifi extends Model
{
    protected $table='tbl_pro_specifis';

    protected $fillable=[
        'id',
        'name_product',
        'screen',
        'os',
        'camera_pre',
        'camera_affter',
        'cpu',
        'gpu',
        'ram',
        'rom',
        'battery',
        'weight',
    ];

    public $timestamps = false;
}
