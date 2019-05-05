<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{

    //设置属性
     public $id;


    public static function gainUsername()
    {
    	//得到sseione里的username值
    	 $uid=session('uid');
    	 //根据name查询用户信息
    	 $info=DB::table('users')->where('id','=',$uid)->first();

    	 return $info;
    }


    //查看个人收货地址
    public function address()
    {
         //得到sseione里的username值
         $id=session('uid');
         //dd($name);
         //查询登陆的用户信息
        $info=DB::table('users')->where('id','=',$id)->first();
         //得到uid
         $uid = $info->id;
        //查询收货地址
        $address = DB::table('addresses')->where('user_id','=',$uid)->get();
        //dd($address);
        return view('home.usercenter.address',['address'=>$address]);
    }

    //删除收货地址
    public function deladdress(Request $request)
    {
        //接收id
        $id=$request->input('id');

        if(DB::table('addresses')->where('id','=',$id)->delete()){

            echo 1;
            
        }else{

            echo 2;
        }

    }


    //添加收货地址
    public function add()
    {

        return view('home.usercenter.add');
    }


    //处理添加收货地址
    public function doadd(Request $request)
    {
        //得到sseione里的username值
        $id=session('uid');
         //dd($name);
         //查询登陆的用户信息
        $info=DB::table('users')->where('id','=',$id)->first();

        //dd($request->all());
        $data=$request->except('_token');
        //dd($data);
        $data['user_id']=$info->id;
        //把得到的数据插入数据库
        $row=DB::table('addresses')->insert($data);

        if($row){

            return redirect('/useraddress');

        }else{

            return redirect('/add')->withInput('error','添加失败');
        }
    }

    public static function getgoods($orderid)
    {
        $goods=DB::table('order_goods')->where('order_id','=',$orderid)->get();

        return $goods;
    }

    public static function getimg($skuid)
    {
        $img = DB::table('skus')->where('id','=',$skuid)->first();

        return $img;
    }


    //修改收货地址
    public function editaddress(Request $request)
    {
        $id = $request->input('id');
        //获取要修改地址信息
        $info = DB::table('addresses')->where('id','=',$id)->first();
        //dd($info);
        return view('home.usercenter.edit',['info'=>$info]);
    }

    //处理收货地址修改
    public function doeditaddress(Request $request)
    {
        $data = $request->except('_token','id');
        //dd($data);
        $id = $request->id;
        //修改数据
        $row = DB::table('addresses')->where('id','=',$id)->update($data);

        if($row){

            return redirect('/useraddress')->with('success','修改成功');
        }else{

            return redirect('/useraddress')->with('success','修改失败');
        }
    }

}
