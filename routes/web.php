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
 *  api routes. I could not put them in api.php.    
 */

Route::post('admin/users/search ', 'AdminController@searchUser');

//Return paginated users i.e /admin/users/1 -> will give you 8 users
Route::get('/admin/users/{id}','AdminController@userPagination');
Route::Post('/volunteer', 'Donate@manageVoulnteer');


Route::get('admin/users/search', 'AdminController@getAllUsers');
Route::get('admin/export/users', 'AdminController@exportUsers');

Route::get('events/lists/all', 'EventController@allEvents');
Route::post('events/page/get/', 'EventController@paginateEvents');
Route::get('events/lists/count', 'EventController@getEventCount');
Route::get('events/status/current', 'EventController@getCurrentEvents');
Route::get('events/status/future', 'EventController@getFutureEvents');
Route::post('events/page/future', 'EventController@paginateUpcomingEvents'); //Get pagination for future events
Route::post('events/page/current', 'EventController@paginateCurrentEvents'); //Get pagination for current events
Route::get('/events/get/titles', 'EventController@getAllETitles');
/**
 * json url project
 */
Route::get('projects/lists/all', 'ProjectController@allProjects');
Route::post('projects/page/{id}', 'ProjectController@paginateProjects');
Route::get('projects/status/current', 'ProjectController@getCurrentProject');
Route::get('projects/status/future', 'ProjectController@getFutureProject');
Route::get('projects/lists/count', 'ProjectController@getProjectCount');
Route::get('projects/page/future/{id}', 'ProjectController@paginateUpcomingProjects'); //Get pagination for future Projects
Route::get('projects/page/current/{id}', 'ProjectController@paginateCurrentProjects'); //Get pagination for current projects
Route::get('projects/page/completed/{id}', 'ProjectController@paginateCompletedProjects'); //Get pagination for completed projects


/**
 *
 *  pagination links
 *  post data to  : localhosts:8000/events/page/get/
 *           data: 1
 */
