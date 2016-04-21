<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $primaryKey = 'user_openid';
    public $timestamps = false;
}
