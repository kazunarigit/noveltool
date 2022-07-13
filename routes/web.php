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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/index', 'Admin\NovelWritingController@index');
    Route::get('/index/create', 'Admin\NovelWritingController@crerate');
    // Route::post('/index', 'Admin\NovelWritingController@store');
    // Route::get('/index/confirm', 'Admin\NovelWritingController@show');
    Route::get('/index/edit', 'Admin\NovelWritingController@edit');
    Route::get('/index/delete', 'Admin\NovelWritingController@destroy');
});

Auth::routes();
Route::get('/', 'NovelWritingController@index');