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


Route::get('registration', 'RegistrationController@create');
Route::get('posts/create', 'PostController@create');
Route::get('/', 'PostController@index')->name('home');

Route::get('posts/minuslike', 'PostController@minusLike');
Route::get('posts/pluslike', 'PostController@plusLike');


Route::get('posts/minusdislike', 'PostController@minusDislike');
Route::get('posts/plusdislike', 'PostController@plusDisLike');


Route::get('posts', 'PostController@store');
Route::get('posts/{post}', 'PostController@show');
Route::post('posts/{post}/comments', 'CommentController@store');


Route::post('registration', 'RegistrationController@store');

Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');

Route::get('logout', 'SessionController@destroy');

