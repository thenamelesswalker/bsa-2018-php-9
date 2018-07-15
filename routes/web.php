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

Auth::routes();

Route::resource('currencies', 'CurrencyController') ;

Route::get('/auth/github', 'GithubAuthController@redirectToProvider');
Route::get('/auth/github/callback', 'GithubAuthController@handleProviderCallback');

//Route::get('/home', 'HomeController@index')->name('home');
