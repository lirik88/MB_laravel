<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function(){
	Route::get('/index', 'DashboardController@index');
	
	Route::resource('/consumers', 'ConsumersController');
	Route::resource('/users', 'UsersController');
	Route::resource('/devicetypes', 'DevicetypesController');
	Route::resource('/devices', 'DevicesController');
	Route::resource('/stamps', 'StampsController');
	
	Route::get('/acts/act_of_control/{consumer_id}', 'ActsController@act_of_control')
		->name('acts.act_of_control');
	Route::get('/acts/act_of_stamps/{consumer_id}', 'ActsController@act_of_stamps')
		->name('acts.act_of_stamps');
	Route::get('/acts/act_of_program/{consumer_id}', 'ActsController@act_of_program')
		->name('acts.act_of_program');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
