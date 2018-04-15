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


Auth::routes();

Route::get('/', function () { return redirect('/login'); });
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@postReq')->name('postReq');
Route::get('/ucr/{id}', 'HomeController@ucr');
Route::post('/addRequest', 'HomeController@addRequest')->name('addRequest');
Route::post('/approveRequest', 'HomeController@approveRequest')->name('approveRequest');
