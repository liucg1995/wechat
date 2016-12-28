<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('filelist', '\Guo\File\Http\Controllers\HomeController@filelist');
Route::get('dirlist', '\Guo\File\Http\Controllers\HomeController@dirlist');
Route::get('getlog', '\Guo\File\Http\Controllers\HomeController@getlog');
Route::get('file', '\Guo\File\Http\Controllers\HomeController@getcontent');
Route::get('delfile', '\Guo\File\Http\Controllers\HomeController@delfile');
Route::get('test', '\Guo\File\Http\Controllers\HomeController@test');

