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

    public function postCheck(Request $request){
    	$admin_username = $request->input('form-username');
    	$admin_password = $request->input('form-password');
    	$user = Admin::where(['admin_username'=>$admin_username,'admin_password'=>$admin_password])->first();
        
        if($user){    
            return view('back_end/template');      		
    	}
    	else{
            return view('back_end/login');             
    	}
    }
}
