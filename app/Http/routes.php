<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('send','UserController@send');
Route::get('active','UserController@active');
Route::get('/','IndexController@index');

Route::get('/home','IndexController@index');


Route::group(["middleware" => 'auth'], function() {
    //收益路由
    Route::get('mysy','ProController@mysy');

//还款账单路由
    Route::get('myzd','ProController@myzd');
//投资路由
    Route::get('mytz','ProController@mytz');
//项目路由
    Route::get('mypro','ProController@mypro');
//编辑项目路由
    Route::get('edit/{pid}','ProController@edit');    
//删除项目路由
    Route::get('delete/{pid}','ProController@delete');    

//借款路由
    Route::get('jie','ProController@jie');
    Route::post('jie','ProController@jiePost');
//投标页
    Route::get('pro/{pid}','ProController@pro');
    Route::post('touzi/{pid}','ProController@touzi');

    //个人中心
    Route::get('user','UserController@user');
    //查看更多
	Route::get('more','IndexController@more');

});


//收益路由
Route::get('payrun','GrowController@run');
//注册路由
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
//登录路由
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
//退出的路由
Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('auth/user','Auth\AuthController@user');
//验证码路由
Route::get('captcha/{tmp}','TestController@captcha');




 //审核路由
Route::get('prolist','CheckController@prolist');
Route::get('check/{pid}','CheckController@check');
Route::post('check/{pid}','CheckController@checkPost');
