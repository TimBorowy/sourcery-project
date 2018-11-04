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

Route::group(['middleware' => 'web'], function(){

    Route::get('/', 'HomeController@index')->name('index');
    Route::post('/', 'LinkController@search')->name('link.search');
    Route::get('/link/{link}', 'LinkController@show')->name('public.link.show');

    Route::get('/rules', 'HomeController@rules')->name('rules');

    Auth::routes();

    Route::group(['middleware' => ['auth'], 'prefix' => 'account'], function () {
        Route::post('link/{link}/vote', 'LinkController@vote')->name('link.vote')->middleware('can.vote');
        Route::resource('link', 'LinkController')->except('index');
    });
    Route::resource('account', 'AccountController')->middleware('auth');

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::resource('link', 'LinkController')->only('index');
        Route::resource('category', 'CategoryController');
    });
});

