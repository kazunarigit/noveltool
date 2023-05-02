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
Route::get('/', 'NovelWritingController@index');

Route::group(['prefix' => 'admin', 'as'=> 'admin.', 'middleware' => 'auth'], function() {
    Route::resource('novel_writings', 'Admin\NovelWritingController');
    
    Route::get('/novel_writings/{novel_writing}/edit', 'NovelWritingController@edit')->name('novel_writings.edit');
    Route::put('/novel_writings/{novel_writing}', 'NovelWritingController@update')->name('novel_writings.update');

});

Auth::routes();