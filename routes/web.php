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
    
    Route::get('/index', 'Admin\NovelController@index');
    Route::get('/index/create', 'Admin\NovelController@crerate');
    Route::post('/index', 'Admin\NovelController@store');
    Route::get('/index/confirm', 'Admin\NovelController@show');
    Route::get('/index/edit', 'Admin\NovelController@edit');
    Route::get('/index/delete', 'Admin\NovelController@destroy');
});

Auth::routes();
Route::get('/', 'NovelController@index');