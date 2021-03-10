<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='tbl_user';

    protected $fillable=[
        'id',
        'username',
        'password',
        'name',
        'email',
        'role',
        'phone',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

}
