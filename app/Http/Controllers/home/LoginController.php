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
//导入短信类
use Ucpass;

class LoginController extends Controller
{   //判断是否开启session 如果没有就开启
    public function __construct()
    {
        if (!isset($_SESSION)) session_start();
    }
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
        
        $info = DB::table("users")->where("username",'=',$name)->orWhere("email",'=',$name)->orWhere("phone",'=',$name)->first();
        // dd($info['id']);
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

            $data=$request->except('_token','repassword','Vcode','codes');
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




    public function xurl(Request $request)
    {
        //检测手机号码是否重复
        $p=$request->input('p');
        // echo $p;
        // 获取phone字段
        $phone=DB::table('users')->pluck('phone');
        //对象集合转换为数组
        foreach($phone as $key=>$v){
            $arrs[$key]=$v;
        }
        if(in_array($p,$arrs)){
            echo 1;//手机号码重复
        }else{
            echo 0;//手机号码可用
        }
    }
    //获取验证码
    public function codeget(Request $request)
    {
        $pp=$request->input('pp');
        //调用短信接口
        $options['accountsid']='fc2345e5ebdb1c244789627b0623cb25';
//填写在开发者控制台首页上的Auth Token
        $options['token']='8f632969038add6338709a9ef91eeae4';
        //初始化 $options必填
        // $aa = new A();
        $ucpass = new Ucpass($options);
        $appid = "ed3185d8f4ea45a493e0d0fedbd8252b"; //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "396344"; //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID

        $param = rand(1,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
        \Cookie::queue('scode',$param,1);
        $mobile = $pp;
        $uid = "";
        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费

        echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);        
    }
    //检测发送的验证码
    public function checkcode(Request $request)
    {
        //获取输入的验证码
        $codes=$request->input("codes");
        //判断
        if(isset($_COOKIE['scode']) && !empty($codes)){
            //获取系统验证码
            $scode=$request->cookie('scode');
            //对比
            if($codes==$scode){
                echo 1;//验证码OK
            }else{
                echo 2;//验证码有误
            }
        }elseif(empty($codes)){
            echo 3;//验证码为空
        }else{
            echo 4;//验证码过期
        }

    }
}

