<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
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
