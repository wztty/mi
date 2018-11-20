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
//导入验证类
use App\Http\Requests\StoreBlogPost;
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
        $info = DB::table("users")->where("username",'=',$name)->first();

        $uid = $info->id;
        //dd($uid);
        //判断
        if($info){
            //检测密码
            //哈希数据值检测
            if(Hash::check($password,$info->password)){
                //存储在session里
                session(['uid'=>$uid]);

                return redirect("/")->with('success','登陆成功');            

            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误');
        }

    }

    //前台登陆退出
    public function loginout(Request $request)
    {
        //删除ssesion
       $request->session()->pull('uid');
       return redirect('/');
        
    }


    //引入注册页面
    public function register(Request $request)
    {
        return view('home.register');
    }



    //注册方法
    public function doregister(StoreBlogPost $request)
    {
        $_code=new \Code();
        $Vcode=$_code->get();
      
       
        $code=strtoupper($request->input('code'));
        
        if($code = $Vcode){

            $data=$request->except('_token','repassword','Vcode');
            $data['status']=0;
            $data['level']=1;
            $data['pic']='/static/image/007.jpg';
            //密码处理
            $data['password']=Hash::make($data['password']);
          
            // dd($data);
            $bool=DB::table('users')->insert($data);

            if($bool){

                return redirect('/login')->with('success','注册成功，请登陆');

            }else{
                return redirect('/register')->with('error','注册失败，请重新注册');
            }
           
        }else{

             //跳回注册
            return back()->with('error','验证码错误');
        }

        
    }
}

