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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', 'LinkController@search')->name('link.search');

Auth::routes();

Route::group([], function(){
    Route::get('link/{link}/upvote', 'LinkController@upvote')->name('link.upvote');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function(){
    Route::resource('link', 'LinkController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');

});

