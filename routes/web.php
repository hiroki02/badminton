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
Route::group(['middleware' => ['auth']], function(){
Route::get('/rackets', 'RacketController@index');
Route::get('/', 'RacketController@index');
Route::get('/rackets/create', 'RacketController@create');
Route::get('/rackets/{racket}', 'RacketController@show');
Route::get('/rackets/{racket}/edit', 'RacketController@edit');
Route::put('/rackets/{racket}', 'RacketController@update');
Route::get('/comments/{comment}/edit', 'CommentController@edit');
Route::put('/comments/{comment}', 'CommentController@update');
Route::delete('/rackets/{racket}', 'RacketController@delete');
Route::delete('/comments/{comment}', 'CommentController@delete');
Route::post('/rackets', 'RacketController@store');
Route::post('/rackets/{racket}/comments', 'CommentController@store');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
