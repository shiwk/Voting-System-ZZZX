<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
	protected $table = 'accesstoken';
	public $primaryKey = 'accesstoken_id';
    public $timestamps = false;
}
