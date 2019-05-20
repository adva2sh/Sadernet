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


//Auth::routes();

Route::get('/', 'PagesController@main');
Route::get('/index', 'PagesController@main');

Route::get('/update', 'PagesController@update');
Route::post('/doupdate', 'PagesController@doupdate');

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::post('/dologin', 'Auth\LoginController@dologin');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'PagesController@register');
Route::post('/doregister', 'PagesController@doregister');

Route::get('order', 'PagesController@order');
Route::post('/doorder', 'PagesController@doorder');
Route::post('/makereport', 'PagesController@makereport');
Route::get('/manageorders', 'PagesController@manage');
Route::get('/problem/{car_number}', 'PagesController@problem');
Route::get('/problems/{car_number}', 'PagesController@problems');
Route::get('/allusers', 'PagesController@allusers');
Route::get('/take', 'PagesController@take');
Route::get('/return', 'PagesController@return');
Route::post('/doproblem', 'PagesController@doproblem');
Route::post('/dosanction', 'PagesController@dosanction');

Route::get('/cars', 'PagesController@cars');
Route::get('/reports', 'PagesController@reports');
Route::get('/sanctions', 'PagesController@sanctions');

Route::get('/edit/{order_id}', 'PagesController@edit');
Route::post('/doedit', 'PagesController@doedit');
Route::post('/deleteorder/{order_id}', 'PagesController@deleteorder');
Route::get('/tremps', 'PagesController@tremps');
Route::post('/filtertremps', 'PagesController@filtertremps');
Route::get('/takeorreturn', 'PagesController@takeorreturn');

// facebook socialite
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// google socialite
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');


