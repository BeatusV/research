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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/search', 'SearchController@index')->name('search')->middleware('auth');

Route::post('/search', 'SearchController@search')->name('searchPost')->middleware('auth');
Route::post('/search/addFriend', 'SearchController@createFriendship')->name('addFriend')->middleware('auth');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile')->middleware('auth');
Route::get('/discover', 'SearchController@discover')->name('discover')->middleware('auth');