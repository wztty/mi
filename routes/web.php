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

// Route::get('/', function () {
//     return view('welcome');
// });

//后台首页
Route::get('/admin','admin\IndexController@index');

//后台登陆界面
Route::any('/admin/login','admin\LoginController@login');
//后台验证码
Route::get('admin/code','admin\LoginController@code');

//后台分类
Route::resource("/admin/cates","admin\CateController"); 
//前台首页
Route::resource("/","home\IndexController"); 

//前台登陆
Route::any('/login','home\LoginController@login');
//处理前台登陆
Route::any('/dologin','home\LoginController@store');