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
    return view('login');
});

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify')->name('login.verify');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@store')->name('register.execute');





Route::get('/team', 'User\TeamController@index')->name('team');

Route::get('/team/create', 'User\TeamController@create')->name('team.create');
Route::post('/team/create', 'User\TeamController@store')->name('team.store');

Route::get('/team/edit/{id}', 'User\TeamController@edit')->name('team.edit');
Route::post('/team/edit/{id}', 'User\TeamController@update')->name('team.update');

Route::get('/team/details/{id}', 'User\TeamController@details')->name('team.details');

Route::get('/team/searchuser/{id}', 'User\TeamController@searchuser')->name('team.searchuser');
Route::post('/team/searchuser/{id}', 'User\TeamController@searchresult')->name('team.searchresult');

Route::get('/team/invite/{teamid}/{userid}', 'User\TeamController@invite')->name('team.invite');

Route::get('/team/requests', 'User\TeamController@requests')->name('team.requests');

Route::get('/team/accept/{id}', 'User\TeamController@reqaccept')->name('team.accept');
Route::get('/team/decline/{id}', 'User\TeamController@reqdecline')->name('team.decline');

Route::get('/team/reqcancel/{teamid}/{userid}', 'User\TeamController@cancel')->name('team.reqcancel');
Route::get('/team/memremove/{teamid}/{userid}', 'User\TeamController@memremove')->name('team.memremove');







Route::group(['prefix' => 'user'], function(){
  Route::get('/', 'User\HomeController@index')->name('user.home');

  Route::resource('projects', 'User\ProjectController');
});

Route::group(['prefix' => 'company'], function(){
  Route::get('/', 'Company\HomeController@index')->name('company.home');

  Route::resource('contests', 'Company\ContestController');
});
