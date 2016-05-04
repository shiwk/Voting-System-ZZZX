<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

use App\Http\Requests;
use LaneWeChat\Core\UserManage;
use App\User as User;

include 'lanewechat.php';

class getAllFansController extends Controller
{
    /**
     * function to sync fans list
     * @author tevenfeng
     */
    public function getAllFans(){
    	$fans = UserManage::getFansList();
    	$total = $fans['total'];
    	$count = $fans['count'];
    	$fans_list = $fans['data']['openid'];
    	$next_openid = $fans['next_openid'];

    	while($count < $total){
    		$fans = UserManage::getFansList($next_openid);
    		$count = $count + $fans['count'];
			$fans_list = array_merge($fans_list, $fans['data']['openid']);
			$next_openid = $fans['next_openid'];
    	}

    	foreach ($fans_list as $key => $openid) {
    		try{
    			$user_in_DB = User::where('user_openid', '=', $openid)->firstOrFail();
    		}catch(ModelNotFoundException $e){
    			$fan_info = UserManage::getUserInfo($openid);
    			$user = new User;
    			$user->user_openid = $fan_info['openid'];
    			$user->user_subscribe = $fan_info['subscribe'];
    			$user->user_nickname = $fan_info['nickname'];
    			$user->save();
    		}
    	}

    	return view('back_end/getAllFans', ['AllFans' => $fans_list]);
    }
}
