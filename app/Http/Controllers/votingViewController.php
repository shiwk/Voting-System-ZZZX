<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity as Activity;
use App\User as User;
use App\Vote as Vote;
use App\Candidate as Candidate;
use App\AccessToken as Access_Token;
use LaneWeChat\Core\WeChatOAuth;
use LaneWeChat\Core\UserManage;
use DB;

include 'lanewechat.php';

class votingViewController extends Controller
{
	/**
     * function to get all the information we need by activity id
     * @author tevenfeng
	 * @param $activity_id the id of the specific activity
     */
    public function getAllInfo($activity_id){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {

            $code = $_GET['code'];
            $openId = WeChatOAuth::getAccessTokenAndOpenId($code);

            try{
                $user_in_DB = User::where('user_openid', '=', $openId['openid'])->firstOrFail();
                $userInfo['subscribe'] = $user_in_DB->user_subscribe;
                $userInfo['openid'] = $openId['openid'];
            }catch(ModelNotFoundException $e){
                $userInfo['subscribe'] = 0;
            }

            try{
                $has_user_voted = Vote::where('user_openid', '=', $openId['openid'])
                                      ->where('act_id', '=', $activity_id)
                                      ->firstOrFail();
                $userInfo['voted'] = 1;
            }catch(ModelNotFoundException $e){
                $userInfo['voted'] = 0;
            }

        	$act_info = Activity::find($activity_id);
        	$can_info = Candidate::where('act_id', '=', $activity_id)->get();
        	$data = [ 'act_info' => $act_info, 'can_info' => $can_info, 'user_info' => $userInfo];

        	return view('voting', ['data' => $data]);
        }
        else{
            return view('wxPlz');
        }
    }

    /**
     * function to store voting numbers into the database
     * @author tevenfeng
     * @param $activity_id the id of activity that's being processed
     */
    public function voteProcessing($activity_id){
        if(isset($_POST['user_openid'])){
            $voter_openid = $_POST['user_openid'];
        }
    	if(isset($_POST['candidate'])){
    		$cans_selected = $_POST['candidate'];
    	}

    	try{
	    	foreach($cans_selected as $candidate_selected){
                DB::insert('insert into votes values(?, ?, ?)', [$voter_openid, $candidate_selected, $activity_id]);
                $can = Candidate::where('act_id', $activity_id)
                                ->where('can_id', $candidate_selected)->first();
                $vote = $can->can_voting_number + 1;
                Candidate::where('act_id', $activity_id)
                         ->where('can_id', $candidate_selected)
                         ->update(['can_voting_number' => $vote]);
	    	}
    	}catch(Exception $e){

    	}

    	return view('welcome');
    }

}
