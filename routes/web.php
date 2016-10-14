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

Route::resource('admin','AdminController');

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

/**
 * Json urls
 */

Route::get('admin/users/{search_var}', 'AdminController@searchUser');
Route::get('events/lists/all', 'EventController@allevents');
Route::get('events/page/{id}', 'EventController@paginateEvents');
Route::get('events/lists/count', 'EventController@getEventCount');
Route::get('events/status/current', 'EventController@getCurrentEvents');
Route::get('events/status/future', 'EventController@getFutureEvents');