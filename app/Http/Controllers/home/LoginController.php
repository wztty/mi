<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\org\code\Code;
//导入数据
use DB;
//导入Hash类
use Hash;
//导入校验类
use App\Http\Requests\UserInsert;
//导入要调用的模型类
use App\Models\Users;
class LoginController extends Controller
{
    //引入登陆界面
    public function login()
    {
        return view('home.login');
    }
    //引入验证码
    public function code()
    {
        $code = new \Code;
        $code->make();
    }
    //登陆方法
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
        $info=DB::table("users")->where("username",'=',$name)->first();
        //判断
        if($info){
            //检测密码
            //哈希数据值检测
            if(Hash::check($password,$info->password)){
                //存储在session里
                session(['username'=>$name]);
                return redirect("/")->with('success','登陆成功');

                session(['username'=>$name]);
               

            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误');
        }

    }

    
    //引入注册页面
    public function register(Request $request)
    {
        return view('home.register');
    }
    //注册方法
    public function create(Request $request)
    {
        $data=$request->except('_token','confirm_password','Submit','Vcode');
        $data['status']=0;
        $data['level']=0;
        $data['pic']='/image/upload/user.png';
        //密码处理
        $data['password']=Hash::make($data['password']);
      
        if(Users::create($data)){
            return redirect("home/login")->with('success','注册成功');
        }else{
            return redirect("home/register")->with('error','添加失败');
        }
    }
}

