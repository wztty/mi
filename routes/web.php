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


	//后台个人中心
	Route::get('/users','admin\UserController@center');
	//后台个人中心
	Route::post('/update/data','admin\UserController@dataedit');

	//后台订单查看
	Route::get('/admin/order','admin\OrderController@index');
	//订单物流状态修改
	Route::get('/order/edit','admin\OrderController@doedit');
	//后台订单详情
	Route::get('/showorder','admin\OrderController@show');


	//后台分类
	Route::resource("/admin/cates","admin\CateController"); 

	//后台用户
	Route::resource("/adminuser","admin\UserController");
	//后台ajax删除
	Route::get('/userdel',"admin\UserController@del");


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


	//公告模块
	Route::resource("/adminannource","admin\AnnourceController");
	//公告批量删除
	Route::get("/annourcedel","admin\AnnourceController@annourcedel");
	//公告修改页面
	Route::get("/annourceedit","admin\AnnourceController@edit");
	//轮播图管理
	Route::resource("/adminsowing","admin\SowingController");
	//轮播图批量删除
	Route::get("/sowingdel","admin\SowingController@sowingdel");
	//轮播图修改页面
	Route::get("/sowingedit","admin\SowingController@edit");

	//sku添加
	Route::get('/adminaddsku',"admin\SkusController@store");
	//处理sku添加
	Route::post('/addskus',"admin\SkusController@shangc");
	//skus删改
	Route::resource('/adminskus',"admin\SkusController");
	Route::get('/skus/store',"admin\SkusController@store");
	//广告模块
	Route::resource('/gg',"admin\AdvertisementController");
	//广告添加
	Route::post('/ggadd',"admin\AdvertisementController@store");
	//广告修改
	Route::post('/gg/edit',"admin\AdvertisementController@store");

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
//商品搜索
Route::get('/list_search','home\ListController@List_Search');
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

//短信注册
Route::get('/xurl','home\LoginController@xurl');
//jajx验证
Route::get('/codeget','home\LoginController@codeget');
//验证码验证
Route::get('/checkcode','home\LoginController@checkcode');
//短信忘记密码页面
Route::get('/dxzc','home\ZzmmController@index');
//验证通过跳转到重置页面
Route::get('/onmjbk','home\ZzmmController@onmjbk');
//引入重置页面
Route::get('/ojbk','home\ZzmmController@ojbk');
//处理密码修改
Route::post('/odd','home\ZzmmController@odd');

//发送邮箱测试
Route::get("/repassword",'home\RepasswordController@send');
//发送邮箱，传递连接重置密码
Route::get("/sends",'home\RepasswordController@sends');

//找回密码
Route::resource("/pas",'home\RepasswordController');
//验证找回密码账号和邮箱地址方法
Route::post("/pass",'home\RepasswordController@yemail');
//引入重置新密码页面
Route::get("/czpass",'home\RepasswordController@czpass');
//重置密码处理
Route::post("/czpas",'home\RepasswordController@czpas');




//前台路由群组需要登陆才能访问
Route::group(['middleware'=>'login'],function(){
	//个人资料
	Route::get('/userdata','home\CenterController@index');
	//个人资料修改
	Route::post('/dataedit','home\CenterController@dataedit');


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




	//个人评价
	Route::get('/user/comment','home\CenterController@getComment');


	//我的订单
	Route::get('/user/order/','home\CenterController@getOrder');
	//确认收货
	Route::get('/user/packin','home\CenterController@getPackin');
	//处理订单请求
	Route::post('/order/confirm','home\OrderController@postConfirm');
	//显示订单页
	Route::get('/order/confirms','home\OrderController@confirm');
	//生成订单
	Route::post('/order/create','home\OrderController@postCreate');



	//发起支付
	Route::get('/order/pay','home\OrderController@getPay');
	//支付宝接口调用
	Route::get('/pay','home\OrderController@pay');
	//支付成功后返回页面
	Route::get('/returnurl','home\OrderController@changeStatus');


	//商品评论页面
	Route::get('/comment','home\CommentsController@setComment');
	//评论插入
	Route::post('/comment/insert','home\CommentsController@addComment');
});


