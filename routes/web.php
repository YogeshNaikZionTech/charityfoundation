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
Route::get('/welcome', 'WelcomeController@show');
Route::resource('events', 'EventController');

Route:: resource('education', 'EducationController');

Route::resource('donates', 'Donate');

Route::resource('contact', 'ContactController');

Route::resource('projects', 'ProjectController');

Route::get('/userprofile', 'userProfileController@profile');

Route::post('/userprofile', 'userProfileController@updateUser' );

Route:: resource('showhistory', 'HistoryController');

Route::resource('admin','AdminController');

Route::get('/select', 'Donate@showselectproject');



Route::get('/setproject', function (){
	/**
	 * Set the selected project id or name in the session here.
	 */

	return view('/donates/create');


});
Route::get('/vreceipt', 'Donate@VoulnteerRecipte');
Route::get('/dreceipt', 'Donate@donateRecipte');
Route::get('/areceipt', 'Donate@affReceipt');
Route::get('showevents', 'EventController@showEventPage');
Route::get('showprojects', 'ProjectController@showProjectPage');
Route::get('userprofile/preset', 'userProfileController@showupdatePassword');
Route::post('userprofile/preset', 'userProfileController@updatePassword');
Route::post('/unsubscribe/payment/monthly', 'userProfileController@unSubscribemonthlyPayment');


/**
 * show the history for admin and user
 */
Route::get('/history/project/user', 'HistoryController@getDHistory');// history of project donation for logged in user
Route::get('/history/voulnteer/user', 'HistoryController@getVHistory');//history of project voulnteer for logged in user
Route::get('/history/aaf/user', 'HistoryController@getAAFHistory'); //history of project aaf for logged in user
Route::get('/history/project/all','AdminController@donationTable');//this will give you the donation view json. use ajax to get this.
Route::get('/history/aaf/all','AdminController@getAllAFFHistory');//get all AAf donation for all the users
Route::get('/history/voulnteer/all','AdminController@getAllVhistory');
Route::post('/donation/serach/','AdminController@searchdonationTable');

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

Route::post('admin/users/search', 'AdminController@searchUser');

//Return paginated users i.e /admin/users/1 -> will give you 8 users
Route::get('/admin/users/{id}','AdminController@userPagination');
Route::Post('/volunteer', 'Donate@manageVoulnteer');


Route::get('admin/users/search/all', 'AdminController@getAllUsers');
Route::get('admin/export/users', 'AdminController@exportUsers');
    Route::get('admin/donation/all', 'AdminController@donationTable');

Route::get('events/lists/all', 'EventController@allEvents');
Route::post('events/page/get/', 'EventController@paginateEvents');
Route::get('events/lists/count', 'EventController@getEventCount');
Route::get('events/status/current', 'EventController@getCurrentEvents');
Route::get('events/status/future', 'EventController@getFutureEvents');
Route::post('events/page/future', 'EventController@paginateUpcomingEvents'); //Get pagination for future events
Route::post('events/page/completed', 'EventController@paginateCompletedEvents'); //Get pagination for current events
Route::get('/events/get/titles', 'EventController@getAllETitles');
Route::get('/history/contact/all', 'AdminController@getContactData');
Route::get('/history/suggest/all', 'AdminController@getSuggestData');
Route::post('/suggestion', 'ContactController@storeSuggestion');
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
Route::get('/projects/get/titles', 'ProjectController@getAllPTitles');
Route::post('putevents', 'EventController@updateEvent');
Route::post('putprojects','ProjectController@updateProject');

Route::get('exportd','AdminController@exportDonation'); // link to the export button on the donation: Admin page

