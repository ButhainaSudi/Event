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
    return view('auth.login');
});

Route::get('profile', function () {
    return 'done';
});

Auth::routes();

Route::get('/home', 'EventController@index')->name('home');
Route::resource('events','EventController')->middleware('auth');
Route::resource('comments','CommentController')->middleware('auth');
