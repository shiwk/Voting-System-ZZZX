<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class activityController extends Controller
{
    //
    public function new_activity(){
        $act_name = $_POST['act_name'];
        echo $act_name;
        
    }
}
