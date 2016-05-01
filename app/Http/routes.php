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
	$data = [
		'page_title' => 'Home',
	];
    return view('event/index', $data);
});

Route::resource('events', 'EventController');

Route::get('/api', function () {
	$events = DB::table('events')->select('id', 'name', 'title', 'start_time as start', 'end_time as end')->get();
	foreach($events as $event)
	{
		$event->title = $event->title . ' - ' .$event->name;
		$event->url = url('events/' . $event->id);
	}
	return $events;
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('manual', function () {
	$data = [
		'page_title' => 'manual',
	];
    return view('manual/manual', $data);
});

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// PasswordReset route...
Route::controllers([
   'password' => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'Event', 'middleware'=>'auth'], function() {
	Route::controller('/', 'EventController');
});

//upload and download
Route::get('events/{filename}','DownloadController@download');
