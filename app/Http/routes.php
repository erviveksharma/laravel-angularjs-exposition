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
// get report for the admin to be run in cron
Route::get('reports','CompanyController@reports');

//all page should land on index page for angular to do its work
Route::get('/', function () {
    return view('index');
});
