<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'name', 'username', 'email', 'password', 'usertype'
    ];
    protected $table = "users";
    public $timestamps = false;

    protected $hidden = [
        'password', 'remember_token',
    ];
}
