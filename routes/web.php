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

Route::get('travel/userdetail','TravelController@index');
Route::get('travel/eventform','TravelController@showform');
Route::post('travel/insertsuccess','TravelController@insertform');
Route::get('travel/detailwait','TravelController@showdetailwait');
Route::get('travel/detailsuccess','TravelController@showdetailsuccess');
Route::get('travel/detailfailed','TravelController@showdetailfailed');

//from guo
Route::get('/index','IndexController@index')->name('index');
Route::get('/signup','UsersController@signup')->name('get_signup');
Route::post('/signup','UsersController@signup')->name('post_signup');
Route::get('/verify/{token}','UsersController@verify')->name('verify');
Route::get('/login','UsersController@login')->name('get_login');
Route::post('/login','UsersController@login')->name('post_login');
Route::get('/logout','UsersController@logout')->middleware('auth')->name('logout');
Route::get('/members','UsersController@members')->middleware('auth')->name('members');
