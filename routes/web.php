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

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify')->name('login.verify');

Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@execute')->name('register.execute');




Route::group(['prefix' => 'user'], function(){
  Route::get('/', 'User\HomeController@index')->name('user.home');
});

Route::group(['prefix' => 'company'], function(){
  Route::get('/', 'Company\HomeController@index')->name('company.home');
});
