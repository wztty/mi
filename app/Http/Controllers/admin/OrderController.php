<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    //导入视图
    public function index(Request $request)
    {
    	//查询所有订单
    	$order = DB::table('orders')->where('order_status','>',0)->where('pay_status','>',0)->paginate(10);

    	return view('admin.orders.order',['order'=>$order,'request'=>$request->all()]);
    }



    //处理修改
    public function doedit(Request $request)
    {
    	$id = $request->input('id');

    	$data['order_status'] = 8;//表示发货等待收货
    	//获得订单详情
    	$info = DB::table('orders')->where('id','=',$id)->first();

    	$status = $info->order_status;
        //dd($status);

        if($status == 1){ //表示已支付等待发货

            $row = DB::table('orders')->where('id','=',$id)->update($data);

            if($row){

                echo 1;

            }else{

                echo 2;
            }

        }else{

            echo 3;
        }

    }


    //后台订单详情
    public function show(Request $request)
    {
        $oid = $request->input('id');

        $goods = DB::table('order_goods')->where('order_id','=',$oid)->paginate(10);

        return view('admin.orders.show',['goods'=>$goods,'request'=>$request->all()]);
    }

}
