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
    Route::any('wechat/menu', "MenuController@index");
    Route::any('wechat/setMenu', "MenuController@setMenu");
    //模板
    Route::get('/massage/index', 'MassIndexController@massIndex');//正式
    Route::get('/massage/test', 'MassIndexController@massTestIndex');//测试
    //逻辑处理
    Route::group(['prefix' => 'mass'], function () {//KING
        //正式
        Route::post('/sendtext', 'MassController@sendText');//文本
        Route::post('/sendpicture', 'MassController@sendPicture');//图片
        Route::post('/sendpicturetext', 'MassController@sendPictureText');//图文
        Route::post('/template', 'MassController@template');//模板消息
        Route::post('/customer', 'MassController@customer');//客服消息
        //测试
        Route::post('/presendtext', 'MassController@preSendText');//文本
        Route::post('/presendpicture', 'MassController@preSendPicture');//图片
        Route::post('/presendpicturetext', 'MassController@preSendPictureText');//图文
        Route::post('/pretemplate', 'MassController@pretemplate');//模板消息
        Route::post('/precustomer', 'MassController@precustomer');//客服消息
    });
});
});

