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
use App\Http\Controllers\NovelWritingController;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'NovelWritingController@index');
Route::get('/home', 'NovelWritingController@index');

Route::group(['prefix' => 'admin', 'as'=> 'admin.', 'middleware' => 'auth'], function() {
    Route::resource('novel_writings', 'Admin\NovelWritingController');
    
    //追記（3/6）
    Route::get('admin/novel_writings/create','NovelWritingController@add');
    Route::post('admin/novel_writings/create','NovelWritingController@create');
    Route::get('admin/novel_writings','NovelWritingController@index');
    Route::get('admin/novel_writings/delete','NovelWritingController@delete');
    //ここまで追記
    
    Route::get('/novel_writings/{novel_writing}/edit', 'NovelWritingController@edit')->name('novel_writings.edit');
    Route::put('/novel_writings/{novel_writing}/edit', 'NovelWritingController@update')->name('novel_writings.update');

});

Auth::routes();