<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'WelcomeController@show');

Route::resource('events', 'EventController');

Route:: resource('education', 'EducationController');

Route::resource('donates', 'Donate');


Route::resource('contact', 'ContactController');

Route::resource('projects', 'ProjectController');

Route::get('/userprofile', 'userProfileController@profile');

Route::post('/userprofile', 'userProfileController@updateUser' );

Route::get('/select', 'Donate@showselectproject');

Route::get('/setproject', function (){
	/**
	 * Set the selected project id or name in the session here.
	 */

	return view('/donates/create');


});
Route::post('/recipte', 'Donate@showRecipte');

/*
 * Resource for About us
 */
Route::get('/aboutus', function (){

	return view ('about/create');
});

/*
 * Resource for About us
 */
Route::get('/events', 'EventController@create');


Auth::routes();

Route::get('/home', 'HomeController@index');
