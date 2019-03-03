<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    
    protected $fillable = [
        'username',
        'nim',
        'nama',
        'alamat',
        'email',
        'no_telpon',
        'avatar',
        'last_login',
        'permissions',
        'remember_token',
    ];
}
