<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	// example of protected route
	/*$api->get('protected', ['middleware' => ['api.auth'], function () {
		return \App\User::all();
    }]);*/

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

	$api->get('events', 'App\Api\V1\Controllers\EventController@index');
	$api->get('events/{id}', 'App\Api\V1\Controllers\EventController@show');
	$api->get('stand/{id}', 'App\Api\V1\Controllers\StandController@index');
	$api->post('booking', 'App\Api\V1\Controllers\CompanyController@store');
	$api->post('uploads', 'App\Api\V1\Controllers\ImageController@store');
	$api->get('emails', 'App\Api\V1\Controllers\CompanyController@sendmail');

	$api->group(['middleware' => 'api.auth'], function ($api) {
		$api->post('visit', 'App\Api\V1\Controllers\StandController@visit');
	});

});