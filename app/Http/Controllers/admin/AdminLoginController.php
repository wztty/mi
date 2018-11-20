<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\org\code\Code;
use DB;//引入数据库
use Hash;//引入Hash
class AdminLoginController extends Controller
{
    //登陆界面引入
    public function index()
    {
    	return view('admin.login');
    }

    //验证码的生成
    public function code()
    {
        $code = new \Code;
        $code->make();
    }

      public function store(Request $request)
    {   
        //获得存在section的验证码
        $code= new \Code;
        $_code=$code->get();

        $Vcode=$request->input('code');

        if(strtoupper($Vcode)!=$_code){
            return back()->with('error','输入的验证码有误');        
        }

        //获取登陆用户名和密码

        $name=$request->input("username");
        $password=$request->input("password");
        //要数据表的数据做对比
        //检测用户名
        $info = DB::table("users")->where("username",'=',$name)->where("level",'>',2)->first();

       // $username = $info->username;
        //dd($uid);
        //判断
        if($info){
            //检测密码
            //哈希数据值检测
            if(Hash::check($password,$info->password)){
                //存储在session里
                session(['username'=>$info->username]);

                return redirect("/admin")->with('success','登陆成功');           

            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误或着你不是超级管理员');
        }

    }

     //后台登陆退出
    public function loginout(Request $request)
    {
        //删除ssesion
       $request->session()->pull('username');
       return redirect('/admin/login');
        
    }

}
