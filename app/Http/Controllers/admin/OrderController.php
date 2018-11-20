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
    	$order = DB::table('orders')->where('pay_status','>',0)->paginate(10);

    	return view('admin.orders.order',['order'=>$order,'request'=>$request->all()]);
    }

    //修改
    public function update(Request $request)
    {
    	$id = $request->input('id');

    	$info = DB::table('orders')->where('id','=',$id)->first();

    	return view('admin.orders.edit',['info'=>$info]);
    }

    //处理修改
    public function doedit(Request $request)
    {
    	$id = $request->input('id');

    	$data['order_status'] = $request->input('order_status');
    	//获得订单详情
    	$info = DB::table('orders')->where('id','=',$id)->first();

    	$status = $info->order_status;
        //dd($status);

        if($status == 0||$status == 2){

            $row = DB::table('orders')->where('id','=',$id)->update($data);

            if($row){

                return redirect('/admin/order')->with('success','修改成功');

            }else{

                return redirect('/update/status')->with('success','修改失败');
            }

        }else{

            return back()->with('error','修改失败已经发货或着客户没有收货');
        }

    }

}
