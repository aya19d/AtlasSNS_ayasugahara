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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/top', 'PostsController@post');
Route::get('/top/{id}/delete','PostsController@delete');
Route::post('/top/{id}/update-form', 'PostsController@update');

Route::get('/profile','UsersController@profile');
Route::get('/profile','UsersController@update');
Route::get('/profile/{id}','UsersController@profile');
Route::get('/myprofile/{id}','UsersController@userProfile');
Route::post('/myprofile','UsersController@update');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::get('/follow-list','PostsController@follow');
Route::get('/follower-list','PostsController@follower');



//フォロー状態の確認
Route::get('/follow/status/{id}','FollowsController@check_following');

//フォロー付与
Route::post('/follow/{id}/add','FollowsController@following');

//フォロー解除
Route::post('/follow/{id}/remove','FollowsController@unfollowing');
