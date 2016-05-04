<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin as Admin;

class admin_loginController extends Controller
{
    //
    public function getLogin(){

    	return view('back_end/login');   	

    }

    public function postCheck(){

    	$admin_username = $_POST['form-username'];

    	$admin_password = $_POST['form-password'];

    	$user = Admin::where(['admin_username'=>$admin_username,'admin_password'=>$admin_password])->first();
        
        if($user){    

            return view('back_end/new_activity');   

    	}

    	else{

            return view('back_end/login');     
                    
    	}
    }

}
