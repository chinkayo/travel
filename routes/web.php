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

Route::get('/index','IndexController@index')->name('index');
Route::get('/signup','UsersController@signup')->name('get_signup');
Route::post('/signup','UsersController@signup')->name('post_signup');
Route::get('/verify/{token}','UsersController@verify')->name('verify');
Route::get('/login','UsersController@login')->name('get_login');
Route::post('/login','UsersController@login')->name('post_login');
Route::get('/logout','UsersController@logout')->middleware('auth')->name('logout');
Route::get('/members','UsersController@members')->middleware('auth')->name('members');

//from chen

Route::get('travel/userdetail','TravelController@index')->middleware('auth')->name('user_detail');
Route::get('travel/eventform','TravelController@showform')->middleware('auth');
Route::post('travel/insertsuccess','TravelController@insertform')->middleware('auth');
Route::get('travel/detailwait','TravelController@showdetailwait')->middleware('auth');
Route::get('travel/detailsuccess','TravelController@showdetailsuccess')->middleware('auth');
Route::get('travel/detailfailed','TravelController@showdetailfailed')->middleware('auth');