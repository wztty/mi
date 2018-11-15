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

Route::get('/', function () {
    return view('welcome');
});

//后台首页


// 中间件
Route::group(['middleware'=>'adminlogin'],function(){
// 后台管理员管理
Route::resource("/admin_userss","admin\AdminuserController");
Route::get('/admin','admin\IndexController@index');
	
});





//后台验证码
Route::get('/admin/code','admin\LoginController@code');

//后台登陆界面
Route::any('/admin/login','admin\LoginController@login');

//后台登录方法
Route::any('/admin/store','admin\LoginController@store');

//后台退出方法
Route::any('/admin/exit', 'admin\LoginController@index');

// 后台用户模块
Route::any('/admin/','admin\user\userController@login');
