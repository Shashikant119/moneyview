<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////////////////////////////////////////////////////////
Route::get('/', 'HomeController@index')->name('home');

Route::get('/Register','UserController@register');
Route::post('/Add-Register','UserController@store');
Route::get('/Users','UserController@index');
Route::get('/Control-Panel','UserController@listcontrolpanel');
Route::get('/UserControlList/{id}','UserController@UserControlList');
Route::get('/changeUserControl','UserController@changeUserControl');
Route::get('/Users/update/{id}', 'UserController@edit');
Route::Post('/Users/update/{id}', 'UserController@update');
Route::get('/Users/delete/{id}', 'UserController@destroy');
Route::Post('/Change-Status-Users', 'UserController@ChangeStatus');



Route::get('/Web-Users','WebUsersController@index');



