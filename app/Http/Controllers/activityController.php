<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Activity as Activity;

use App\Candidate as Candidate;

class activityController extends Controller
{
    //
    public function new_activity(Request $request){

    	$activity = $request->all();
    
        return view('back_end/new_candidate',['activity' => $activity]);
        
    }

    public function save_activity(Request $request){

    	$input = $request->all();

    	Activity::insert([ 'act_name' => $input['act_name'], 'act_candidate_num' => $input['act_candidate_num'],

    		             'act_vote_upto' => $input['act_vote_upto'], 'act_vote_atleast' => $input['act_vote_atleast'],

    		             'act_start_time' => $input['act_start_time'], 'act_stop_time' => $input['act_stop_time'],

    		             'act_discription' => $input['act_discription'], 'act_rule' => $input['act_rule'],

    		             'act_prizes' => $input['act_prizes'] ]);

    	$activity = Activity::where('act_name',$input['act_name'])->first();

    	for($i = 0; $i < $input['act_candidate_num']; $i++){

    		Candidate::insert([ 'act_id' => $activity->act_id, 'can_name' => $input['can_name_' . $i],

    						'can_student_id' => $input['can_student_id_' . $i],'can_school' => $input['can_school_' . $i],

    						'can_discription' => $input['can_discription_' . $i] ]);

    	}

    	return view('back_end/show_activity',['input' => $input]);
    }
}
