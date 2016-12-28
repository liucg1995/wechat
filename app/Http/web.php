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
Route::group(['middleware' => ['web']], function(){
Route::group(['namespace' => '\Guo\Wechat\Http\Controllers'], function(){

    Route::get('filelist', 'HomeController@filelist');
    Route::get('dirlist', 'HomeController@dirlist');
    Route::get('getlog', 'HomeController@getlog');
    Route::get('file', 'HomeController@getcontent');
    Route::get('delfile', 'HomeController@delfile');
    Route::get('test', 'HomeController@test');

    //模板消息
    Route::get('ad_wechat/template/index', "TemplateController@index");
    //菜单管理
    Route::any('ad_wechat/menu/index', "MenuController@index");
    Route::any('ad_wechat/menu/setMenu', "MenuController@setMenu");
});
});

