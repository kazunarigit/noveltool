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

Route::group(['prefix' => 'admin', 'as'=> 'admin', 'middleware' => 'auth'], function() {
    Route::resource('novel_writings', 'Admin\NovelWritingController');
    
    
    Route::get('/novel_writings/', 'Admin\NovelWritingController@index');
    Route::get('/novel_writings/create', 'Admin\NovelWritingController@add');
    Route::post('/novel_writings/new', 'Admin\NovelWritingController@create');
    Route::post('/novel_writings/index', 'Admin\NovelWritingController@store');
    Route::get('/novel_writings/index/{id}', 'Admin\NovelWritingController@show');
    Route::get('/novel_writings/edit/{id}', 'Admin\NovelWritingController@edit');
    Route::post('/novel_writings/update/{id}', 'Admin\NovelWritingController@update');
    Route::get('/novel_writings/delete/{id}', 'Admin\NovelWritingController@delete');
    
});
Route::get('/index', 'NovelWritingController@index');
Auth::routes();
Route::get('/', 'NovelWritingController@index');