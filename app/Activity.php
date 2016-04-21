<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    public $primaryKey = 'act_id';
    public $timestamps = false;
}
