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
Route::get('/rakets/{racket}', 'RacketController@show');
Route::get('/', 'RacketController@index');
Route::get('/rackets/create', 'RacketController@create');
Route::post('/rackets', 'RacketController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
