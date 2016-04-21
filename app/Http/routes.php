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

Route::get('/', function () {
    return view('welcome');
});

// function of voting view
// @activity_id the id of the activity that we want to get
Route::get('voting/{activity_id}', 'votingViewController@getAllInfo');

Route::post('voting/voteProcessing/{activity_id}', 'votingViewController@voteProcessing');