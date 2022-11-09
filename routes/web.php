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
    
    Route::post('/', 'Admin\NovelWritingController@index');
    Route::post('/create', 'Admin\NovelWritingController@add');
    Route::post('/new', 'Admin\NovelWritingController@create');
    Route::post('/index', 'Admin\NovelWritingController@store');
    Route::get('/index/{id}', 'Admin\NovelWritingController@show');
    Route::get('/edit/{id}', 'Admin\NovelWritingController@edit');
    Route::post('/update/{id}', 'Admin\NovelWritingController@update');
    Route::get('/index/delete', 'Admin\NovelWritingController@delete');
});
Route::get('/index', 'NovelWritingController@index');
Auth::routes();
Route::get('/', 'NovelWritingController@index');