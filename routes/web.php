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



//后台登陆界面
Route::any('/admin/login','admin\LoginController@login');
//后台验证码
Route::get('admin/code','admin\LoginController@code');

//后台路由群组
Route::group([],function(){

	//后台首页
	Route::get('/admin','admin\IndexController@index');

	//后台分类
	Route::resource("/admin/cates","admin\CateController"); 

	//后台商品模块
	Route::resource('/admingoods',"admin\GoodsController");
	//后台商品添加模块
	Route::get('/admin/show',"admin\GoodsController@show");
	

	//后台skus模块
	Route::get('/adminsku',"admin\GoodsController@sku");
	//友情链接
	Route::get('/flink',"admin\IndexController@link");
	//友情链接审核
	Route::get('/dolink',"admin\IndexController@dolink");
	//友情链接删除
	Route::get('/del',"admin\IndexController@del");

});










	//前台首页
Route::resource("/","home\IndexController"); 
Route::get('/detail',"home\IndexController@detail");
//前台登陆
Route::any('/login','home\LoginController@login');
//处理前台登陆
Route::any('/dologin','home\LoginController@store');
//前台退出登陆
Route::get('/user/logout','home\LoginController@loginout');
//注册
Route::get('/register','home\LoginController@register');
Route::get('/doregister','home\LoginController@create');

//友情链接
Route::get('/looklinks',"home\IndexController@links");
Route::post('/insertlink',"home\IndexController@insertlink");