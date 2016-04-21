<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity as Activity;
use App\Candidate as Candidate;

class votingViewController extends Controller
{
	// function to get all the information we need by activity id
	// @activity_id the id of the specific activity
    public function getAllInfo($activity_id){
    	$act_info = Activity::find($activity_id);
    	$can_info = Candidate::where('act_id', '=', $activity_id)->get();

    	$data = [ 'act_info' => $act_info, 'can_info' => $can_info ];

    	return view('voting', ['data' => $data]);
    }

    // function to store voting numbers into the database
    // @activity_id the id of activity that's being processed
    public function voteProcessing($activity_id){
    	if(isset($_POST['candidate'])){
    		$cans_selected = $_POST['candidate'];
    	}

    	try{
	    	foreach($cans_selected as $candidate_selected){
	    		$can = Candidate::where('act_id', $activity_id)
	    					->where('can_id', $candidate_selected)->first();
	    		$vote = $can->can_voting_number + 1;
	    		Candidate::where('act_id', $activity_id)
	    					->where('can_id', $candidate_selected)
	    					->update(['can_voting_number' => $vote]); 					
	    	}
    	}catch(Exception $e){
    		
    	}    	

    	//return view('test', ['can' => $can]);
    }

}
