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

Route::get('travel/userdetail','TravelController@index')->middleware('auth')->name('user_detail');;
Route::get('travel/eventdetail','TravelController@show_event_detail')->middleware('auth');
Route::get('travel/eventform','TravelController@showform')->middleware('auth');
Route::post('travel/insertsuccess','TravelController@insertform')->middleware('auth');
Route::get('travel/event_statuses','TravelController@showevent_statuses')->middleware('auth');
Route::get('travel/{application_status_id}','TravelController@show_detail')->middleware('auth')->name("show_detail_status");


Route::get('/index','IndexController@index')->name('index');
Route::get('/lists','IndexController@lists')->name('lists');
Route::post('/lists/search','IndexController@search')->name('search');
Route::get('/signup','UsersController@signup')->name('get_signup');
Route::post('/signup','UsersController@signup')->name('post_signup');
Route::get('/verify/{token}','UsersController@verify')->name('verify');
Route::get('/login','UsersController@login')->name('get_login');
Route::post('/login','UsersController@login')->name('post_login');
Route::get('/logout','UsersController@logout')->middleware('auth')->name('logout');
