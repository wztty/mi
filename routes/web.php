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
Route::any('/admin/login','admin\AdminLoginController@index');

//后台验证码
Route::get('/admin/code','admin\AdminLoginController@code');
//后台首页跳转
Route::post('/admin/store','admin\AdminLoginController@store');

//后台路由群组需要登陆才能访问
Route::group(['middleware'=>'adminlogin'],function(){

	//后台首页
	Route::get('/admin','admin\IndexController@index');
	//后台首页跳转
	Route::get('/admin/logout','admin\AdminLoginController@loginout');
	//管理员密码修改
	Route::any('/updatepass','admin\UserController@updatepass');
	//处理管理员密码修改
	Route::post('/newpass','admin\UserController@newpass');
	//后台订单查看
	Route::get('/admin/order','admin\OrderController@index');
	//订单物流状态修改
	Route::get('/update/status','admin\OrderController@update');
	Route::post('/order/edit','admin\OrderController@doedit');
	//后台分类
	Route::resource("/admincates","admin\CateController"); 
	//后台用户
	Route::resource("/adminuser","admin\UserController");
	//收货地址
	Route::get('/address','admin\AddressController@index');
	//收货地址删除
	Route::get('/addressdel','admin\AddressController@del');
	//后台商品模块
	Route::resource('/admingoods',"admin\GoodsController");
	//后台skus模块
	Route::get('/adminsku',"admin\GoodsController@sku");
	//友情链接
	Route::get('/flink',"admin\IndexController@link");
	//友情链接审核
	Route::get('/dolink',"admin\IndexController@dolink");
	//友情链接删除
	Route::get('/del',"admin\IndexController@del");
	//后台评论
	Route::get('/comments',"admin\CommentsController@index");
	//后台删除
	Route::get('/commentdel',"admin\CommentsController@del");
	//后台回复
	Route::get('/reply',"admin\CommentsController@reply");
	Route::post('/commentedit',"admin\CommentsController@edit");

});









//前台首页
Route::resource("/","home\IndexController"); 

//前台登陆
Route::any('/login','home\LoginController@login');
//处理前台登陆
Route::any('/dologin','home\LoginController@store');
//前台退出登陆
Route::get('/user/logout','home\LoginController@loginout');
//注册
Route::get('/register','home\LoginController@register');
//处理注册验证
Route::post('/doregister','home\LoginController@doregister');

//友情链接
Route::get('/looklinks',"home\IndexController@links");

Route::post('/insertlink',"home\IndexController@insertlink");

//前台列表
Route::get('/list','home\ListController@index');
//商品详情
Route::get('/detail','home\ListController@detail');
//商品评价
Route::get('/home/comments','home\CommentsController@index');

//添加购物车
Route::get('/cart/ajaxaddcart','home\CartsController@ajaxAddCart');
//显示购物车
Route::get('/cart','home\CartsController@index');
//购物车删除操作
Route::get('/cart/delcart','home\CartsController@getDelcart');
//购物车增减操作
Route::get('/cart/addproduct','home\CartsController@getAddproduct');

//前台路由群组需要登陆才能访问
Route::group(['middleware'=>'login'],function(){
	//个人中心
	Route::get('/user/comment',"home\UserController@usercenter");
	//个人资料
	Route::get('/userdata','home\UserController@index');
	//个人资料修改
	Route::post('/dataedit','home\UserController@dataedit');
	//前台查看收货地址
	Route::get('/useraddress','home\UserController@address');
	//前台删除收货地址
	Route::get('/deladdress','home\UserController@deladdress');
	//前台添加收货地址
	Route::get('/add','home\UserController@add');
	//处理前台添加收货地址
	Route::post('/doadd','home\UserController@doadd');
	//修改收货地址
	Route::get('/editaddress','home\UserController@editaddress');
	//处理收货地址修改
	Route::post('/doeditaddress','home\UserController@doeditaddress');
	//前台订单查看
	Route::get('/userorder','home\UserController@userorder');
	//前台订单删除
	Route::get('/delorder','home\UserController@delorder');
	//前台用户评论查看
	Route::get('/usercomment','home\UserController@usercomment');
	//处理订单请求
	Route::post('/order/confirm','home\OrderController@postConfirm');
	//显示订单页
	Route::get('/order/confirms','home\OrderController@confirm');
	//生成订单
	Route::post('/order/create','home\OrderController@postCreate');
	//发起支付
	Route::get('/order/pay','home\OrderController@getPay');
});