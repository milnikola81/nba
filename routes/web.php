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
    return view('/news');
});

Route::get('/teams', 'TeamController@index');
Route::get('/teams/{team}', 'TeamController@show');

Route::get('/players/{player}', 'PlayerController@show');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@destroy');

Route::post('/teams/{team}', 'CommentController@store');

Route::get('/verify/{user}', 'RegisterController@verify');

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/news/team/{team}', 'NewsController@showNewsForTeam');
Route::post('/news', 'NewsController@store');

