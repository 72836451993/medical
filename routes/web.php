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

Route::get('/','HomeController@index');
Route::get('/login',['as'=>'login','uses'=>'LoginController@index']);
Route::post('/login','LoginController@login');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/logout','LoginController@logout');
    Route::post('/add','DashboardController@add_medicine');

});