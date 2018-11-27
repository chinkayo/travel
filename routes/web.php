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

Route::get('travel/userdetail','TravelController@index')->middleware('auth')->name('user_detail');
Route::get('travel/eventdetail/{event_id}','TravelController@show_event_detail')->name("get_event_detail");
Route::post('travel/apply_event','TravelController@apply_event')->name("post_apply_event")->middleware('auth');
Route::get('travel/eventform','TravelController@showform')->middleware('auth');
Route::post('travel/insertsuccess','TravelController@insertform')->middleware('auth');
Route::get('travel/event_statuses','TravelController@showevent_statuses')->middleware('auth');
Route::get('travel/{application_status_id}','TravelController@show_detail')->middleware('auth')->name("show_detail_status");
Route::get('travel/peoplestatus/{event_id}','TravelController@showe_people_status')->middleware('auth')->name("showe_people_status");

Route::get('/index','IndexController@index')->name('index');
Route::get('/lists','IndexController@lists')->name('lists');
Route::get('/signup','UsersController@signup')->name('get_signup');
Route::post('/signup','UsersController@signup')->name('post_signup');
Route::get('/verify/{token}','UsersController@verify')->name('verify');
Route::get('/login','UsersController@login')->name('get_login');
Route::post('/login','UsersController@login')->name('post_login');
Route::get('/logout','UsersController@logout')->middleware('auth')->name('logout');
Route::post('/newsletter','UsersController@newsletter')->name('newsletter');
Route::get('/admin/mailmagazine','AdminController@mailmagazine')->name('get_mailmagazine');
Route::post('/admin/mailmagazine','AdminController@mailmagazine')->name('post_mailmagazine');
