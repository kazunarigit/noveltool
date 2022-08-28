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
    
    Route::get('/index', 'Admin\NovelWritingController@index')->name('novelwriting.list');
    // Route::get('/create', 'Admin\NovelWritingController@add')->name('novelwriting.add');
    Route::post('/index/new', 'Admin\NovelWritingController@create')->name('novelwriting.new');
    Route::post('/index', 'Admin\NovelWritingController@store')->name('novelwriting.store');
    // Route::get('/index/confirm', 'Admin\NovelWritingController@show');
    Route::get('/edit/{id}', 'Admin\NovelWritingController@edit')->name('novelwriting.edit');
    Route::post('/update/{id}', 'Admin\NovelWritingController@update')->name('novelwriting.update');
    Route::delete('/index/{id}', 'Admin\NovelWritingController@destroy')->name('novelwriting.delete');
});
Route::get('/index', 'NovelWritingController@index');
Auth::routes();
Route::get('/', 'NovelWritingController@index');