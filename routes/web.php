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

Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@store')->name('register.execute');

Route::group(['middleware' => 'access.guest'], function(){
  Route::get('/login', 'LoginController@index')->name('login');
  Route::post('/login', 'LoginController@verify')->name('login.verify');
});

Route::group(['middleware' => 'access.auth'], function(){
  Route::get('teams/details/{id}', 'User\TeamController@details')->name('team.details.company');
  Route::get('profileOf/{id}', 'UserController@profile')->name('profile.view');
  Route::get('contest/{id}', 'Company\ContestController@show_public')->name('contest.public.details');
  Route::get('message/{id}', 'UserController@getMessage')->name('messageOf');
  Route::post('message/{id}', 'UserController@sendMessage')->name('messageOf');

  Route::get('messages', 'UserController@messages')->name('message');

  Route::get('browse/users', 'CommonController@browse_users')->name('browse.users');
  Route::post('browse/users', 'CommonController@search_users')->name('browse.users.search');
  Route::get('browse/teams', 'CommonController@browse_teams')->name('browse.teams');
  Route::post('browse/teams', 'CommonController@search_teams')->name('browse.teams.search');
  Route::get('browse/contests', 'CommonController@browse_contests')->name('browse.contests');
  Route::post('browse/contests', 'CommonController@search_contests')->name('browse.contests.search');


  Route::group(['prefix' => 'user', 'middleware' => 'access.user'], function(){
    Route::get('/', 'User\HomeController@index')->name('user.home');

    Route::resource('profile', 'User\ProfileController', ['except' => 'show']);
    Route::get('profile/change/password', 'User\ProfileController@showchangepass')->name('user.pass.change');
    Route::post('profile/change/password', 'User\ProfileController@changepass')->name('user.pass.changing');
    Route::resource('projects', 'User\ProjectController');

    Route::get('contests', 'User\ContestController@index')->name('user.contests.index');
    Route::post('contests/join', 'User\ContestController@join')->name('user.contests.join');
    Route::post('contests', 'User\ContestController@participate')->name('user.contests.participate');
    Route::delete('contests/cancel', 'User\ContestController@cancel')->name('user.contests.cancel');

    Route::get('teams', 'User\TeamController@index')->name('team');

    Route::get('teams/create', 'User\TeamController@create')->name('team.create');
    Route::post('teams/create', 'User\TeamController@store')->name('team.store');

    Route::get('teams/edit/{id}', 'User\TeamController@edit')->name('team.edit');
    Route::post('teams/edit/{id}', 'User\TeamController@update')->name('team.update');

    Route::get('teams/details/{id}', 'User\TeamController@details')->name('team.details');

    Route::get('teams/searchuser/{id}', 'User\TeamController@searchuser')->name('team.searchuser');
    Route::post('teams/searchuser/{id}', 'User\TeamController@searchresult')->name('team.searchresult');

    Route::get('projects/searchteam/{id}', 'User\ProjectController@searchteam')->name('project.searchteam');
    Route::post('projects/searchteam/{id}', 'User\ProjectController@searchresult')->name('project.searchteam');
    Route::get('projects/leave/{id}/{lid}','User\ProjectController@pro_leave')->name('project.leave');

    Route::get('teams/invite/{teamid}/{userid}', 'User\TeamController@invite')->name('team.invite');
    Route::get('project/invite/{projectid}/{teamid}', 'User\ProjectController@invite')->name('project.invite');

    Route::get('teams/requests', 'User\TeamController@requests')->name('team.requests');
    Route::get('project/requests', 'User\ProjectController@requests')->name('project.requests');

    Route::get('project/decline/{id}', 'User\ProjectController@reqdecline')->name('project.decline');
    Route::get('project/accept/{id}', 'User\ProjectController@reqaccept')->name('project.accept');


    Route::get('teams/accept/{id}', 'User\TeamController@reqaccept')->name('team.accept');
    Route::get('teams/decline/{id}', 'User\TeamController@reqdecline')->name('team.decline');

    Route::get('teams/reqcancel/{teamid}/{userid}', 'User\TeamController@cancel')->name('team.reqcancel');
    Route::get('teams/memremove/{teamid}/{userid}', 'User\TeamController@memremove')->name('team.memremove');

    Route::get('project/requests/details/{projectid}/{teamid}/{userid}', 'User\ProjectController@reqdetails')->name('project.reqdetails');


    Route::get('offers', 'User\OfferController@index')->name('offers');
    Route::get('offers/accept/{id}', 'User\OfferController@accept')->name('offers.accept');
    Route::get('offers/decline/{id}', 'User\OfferController@decline')->name('offers.decline');
    Route::get('offers/details/{id}', 'User\OfferController@companydetails')->name('offers.companydetails');
  });

  Route::group(['prefix' => 'company', 'middleware' => 'access.company'], function(){
    Route::get('/', 'Company\HomeController@index')->name('company.home');

    Route::resource('companyprofile', 'Company\ProfileController', ['except' => 'show']);

    Route::resource('contests', 'Company\ContestController');
    Route::post('contests/request', 'Company\ContestController@request')->name('contests.request');

    Route::get('contests/invitations/list', 'Company\ContestController@show_invitation_list')->name('company.invitations.list');

    Route::post('contests/invitations/accept', 'Company\ContestController@invitation_accept')->name('company.invitations.accept');
    Route::post('contests/invitations/reject', 'Company\ContestController@invitation_reject')->name('company.invitations.reject');

    Route::post('contests/find/company', 'UserController@search_companies_by_name')->name('companies.find.by.name');

    Route::get('contests/{contest_id}/companies/invite', 'Company\ContestController@new_invite')->name('company.new.invite');
    Route::post('contests/companies/invite', 'Company\ContestController@request_invite')->name('company.request.invite');




    Route::get('review/{participant_id}/project/{project_id}/', 'Company\ReviewController@show')->name('company.review.show');
    Route::post('review/declare', 'Company\ReviewController@declare')->name('company.review.declare');
    Route::post('review/reject', 'Company\ReviewController@reject')->name('company.review.reject');

    Route::get('hires', 'Company\HireController@index')->name('hire.index');
    Route::post('hires', 'Company\HireController@searchresult')->name('hire.searchresult');
    Route::get('hires/userdetails/{id}', 'Company\HireController@userdetails')->name('userdetails');
    Route::post('hires/invite/', 'Company\HireController@hire')->name('hire.invite');
    Route::get('hires/invitations', 'Company\HireController@invitelist')->name('invitations');

  });

});
