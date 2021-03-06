<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
* function of voting view
* @author tevenfeng
* @param $activity_id the id of the activity that we want to get
*/
Route::get('voting/{activity_id}', 'votingViewController@getAllInfo');

/**
* function of voting processing
* @author tevenfeng
* @param $activity_id the id of the activity that we want to get
*/
Route::post('voting/voteProcessing/{activity_id}', 'votingViewController@voteProcessing');

Route::get('getAllFans', 'getAllFansController@getAllFans');

Route::any('wechat', function(){
	return view('wechat');
});

Route::get('/','admin_loginController@getLogin');

Route::post('index','admin_loginController@postCheck'); 

Route::post('activity','activityController@new_activity');

Route::post('show_activity','activityController@save_activity');