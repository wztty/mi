<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Cart;
use App\Order;
use App\OrderGoods;
use App\Address;
class OrderController extends Controller
{
	//存储ajax信息
    private $data = [];
    //总价
    private $allTotal = 0;
    //数量
    private $num = 0;
   

    //Ajax处理订单跳转显示顶单页
    public function postConfirm(Request $request)
    {
    	//判读是否登陆
    	$uid = session('uid');

    	if(empty($uid)){

    		$this->data['status'] = 2;
            $this->data['msg'] = '请登录';
            echo json_encode($this->data);
           
    	}

    	//商品skuid数组
    	$listItem = $request->input('listItem');

    	//将订单商品信息存入到session中
        if(empty($listItem)){
            $this->data['status'] = 4;
            $this->data['msg'] = '购物车为空';
            echo json_encode($this->data);
            
        }

        //如果listitem不为空存入session跳转到显示订单页
        session(['listItem'=>$listItem]);
        \Session::save();
        //dd(session(['listItem'=>$listItem]));
        //跳转去订单确认页面
        $this->data['status'] = 0;
        $this->data['msg'] = '/order/confirms';
        //var_dump($data);exit;
        echo json_encode($this->data);

       // return redirect('/order/confirms');
    }


    //显示订单页
   	public function confirm()
   	{
   		//测试数据
   		//$arr = array(6,8);
   		//session('listItem',$arr);

   		//获得商品的skuid
   		$listItem = session('listItem');
   		//$listItem = array(6,8);
   		//dd($listItem);
   		//用户id
   		$uid = session('uid');
   		//查看用户收货地址
   		$address = DB::table('addresses')->where('user_id','=',$uid)->get();
   		//获取购物车信息
        $carts = Cart::where('user_id',$uid)->whereIn('sku_id',$listItem)->get();
       //dd($carts);
        
        $num = 0;
        $allTotal = 0;
        foreach ($carts as $key => $v) {
        	
        	$num += $v->goods_num;

            $allTotal += $v->goods_num*$v->sku->price; 
        }

        //运费
        $pack_fee = 10;
        if($allTotal>99){
            $pack_fee = 0;
        }

        //加载页面
        return view('home.order.confirm',['address'=>$address,'carts'=>$carts,'num'=>$num,'allTotal'=>$allTotal,'pack_fee'=>$pack_fee]);
   	}


   	//生成订单 (确认订单跳转到订单支付页)
   	public function postCreate(Request $request)
    {
    	//dd($request->all());
        $uid = session('uid');
        $listItem = session('listItem');
        //测试数据
        //$listItem = array(6,8);
        //获取购物车信息
        $carts = Cart::where('user_id',$uid)->whereIn('sku_id',$listItem)->get();

        //将该信息存入到order_goods数据库中
    
        //生成订单信息插入到数据库中
        $order = new Order;
        $order->user_id = $uid;
        $order->order_status = 0;//初始化订单
        $order->pay_status = 0;//未支付
        $order->order_num = time('YmdHis').rand(100000,999999);//订单编号
        $order->pack_fee = $request->input('packFee');//运费
        $order->pack_time = 0;
        $order->total_price = $request->input('totalPrice');//总价
        //通过地址id添加下列信息
        $address = Address::find($request->input('addressId'));

        if(!empty($address)){
            $order->consignee = $address->consignee;
            $order->province = $address->province;
            $order->city = $address->city;
            $order->district = $address->district;
            $order->address = $address->address;
            $order->phone = $address->tel;
        }else{
            $this->data['status'] = 1;
            $this->data['msg'] = '服务异常,请稍后再试';
            echo json_encode($this->data);die;
            \DB::rollBack();
        }
        if(!$order->save()){
            $this->data['status'] = 2;
            $this->data['msg'] = '服务异常,请稍后再试';
            echo json_encode($this->data);die;
            \DB::rollBack();
        }

        //dd($carts);
        //将商品信息插入到数据库中
        foreach($carts as $k=>$v){
            
            $orderGoods = new OrderGoods;
            $orderGoods->order_id = $order->id;
            $orderGoods->sku_id = $v->sku_id;
            $orderGoods->price = $v->sku->price;
            $orderGoods->num = $v->goods_num;
            $orderGoods->goods_name = $v->goods_name;
            $orderGoods->goods_attr = $v->goods_attr;
            $orderGoods->color = $v->sku->color;
            if(!$orderGoods->save()){
                $this->data['status'] = 3;
                $this->data['msg'] = '服务异常,请稍后再试';
                echo json_encode($this->data);die;
                \DB::rollBack();
            }else{
                //清空购物车
                $v->delete();
            }
        }
        //dd($orderGoods);
        //清除session存储的订单sku id信息
        session(['listItem'=>null]);
        $this->data['status'] = 0;
        $this->data['msg'] = $order->id;
        echo json_encode($this->data);die;


    }

    //显示支付页面
     public function getPay(Request $request)
    {
        //查询订单数据库
        $order = Order::where('order_status',0)->findOrFail($request->input('id'));
        //dd($order->id);
        $oid = $order->id;
        //查询
        //创建时间
        $beginTime = strtotime($order->created_at);
        $endTime = $beginTime + (48*3600);
        //现在时间
        $nowTime = time();
        //倒数计时
        $countTime = floor(($endTime-$nowTime)/3600).'小时'.floor(($endTime-$nowTime)/60%60).'分';

        //存储session
        $request->session()->put('order.id',$order->id);
        $request->session()->put('order.totalPrice',$order->total_price);

        return view('home.order.pay',[
                'order'=>$order,
                'countTime'=>$countTime,
                'oid'=>$oid,
            ]);
    }

     /**
     * 发起支付请求
     */
   
    public function pay(Request $request)
    {
        //获得订单id
        $oid = $request->input('id');
        //获取订单信息
        $info = DB::table('orders')->where('id','=',$oid)->first();
        //获取参数
        $order_num = $info->order_num;
        $order_title = '小米手机';
        $total = 0.01;
        $body = '小米手机为发烧而生';
        pay($order_num,$order_title,$total,$body);
    }

    /**
     * 改变订单状态
     */
    public function changeStatus(Request $request)
    {
        
        //获取订单号
        $order_num = $request->input('out_trade_no');
        // 1 -- 代表支付成功
        $status['pay_status'] = 1;
        $status['order_status'] = 1;
        //改变订单状态
        $info = DB::table('orders')->where('order_num','=',$order_num)->update($status);

        if($info){

            return view('home.order.success'); 
        }else{

            echo '系统繁忙';
        }
        
                
      
        
    }

   

   
   
}
