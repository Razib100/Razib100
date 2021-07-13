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

//travelia controller starts
Route::get('/travelia','TraveliaController@index');
//travelia controller ends

//reg part starts
Route::get('/travelia/registration','TraveliaController@registration');
Route::post('/travelia/registration-submit','TraveliaController@registration_submit');
//reg part ends


//login controller starts
Route::post('/login-submit','LoginController@login_submit');
Route::get('/login','LoginController@index');
//login controller ends

//logout controller starts
Route::get('/logout','LogoutController@index');
//logout controller ends
