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
// 左側がURL　右側がコントローラーの場所　@コントローラー内のメソッドpublic function の塊
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// viewファイル画面に表示→コントローラー→処理の内容→routeでくっつける
// get post 通信の違い
// get重要な情報がない時　post重要な情報がある時

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::post('post/create','PostsController@create');
