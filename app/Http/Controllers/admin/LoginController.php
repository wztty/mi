<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\org\code\Code;
use DB;//引入数据库
use Hash;//引入Hash
use App\Http\Requests\UserInsert;
class LoginController extends Controller
{
    //引入登陆界面
    public function login()
    {   
    	return view('admin.login');
    }

    //引入验证码
    public function code()
    {
        $code = new \Code; 
        // dd($code);
        //开启session
        // session_start();
        //创建验证码并返回验证码的值
        $bbb = $code->make();
        
        //存储到session中
        $_SESSION['code']=$bbb;
        //截断 不然乱码
        // die;
    }

    // public function store(Request $request)8
    // {
    //     // 获取登录用户名和密码
    //     $name=$request->input("username");
    //     $password=$request->input("password");
    //     // 要数据表的数据做对比
    //     // 检测用户名
    //     $info=DB::table("users")->where("usernaem",'=',$name)->first();
    //     // 判断
    //     if($info){
    //         // 检测密码
    //         echo "ok";
    //     }else{
    //         // echo "用户名有误";
    //         return back()->with('error','用户名有误');
    //     }
    // }

    
    public function index(Request $request)
    {
        // 退出
        // 销毁session
        $request->session()->pull('username');
        return redirect("/admin/login");
    }

    //登陆方法
    public function store(Request $request)
    {   //获取登陆用户名和密码

        $name=$request->input("username");
        $password=$request->input("password");
        //获取前台用户输入的code值
        $usercode = $request->input('code');
        //开启session
        //获取session值
        $code = $_SESSION['code'];
        if($code != $usercode){
            return back()->with('error','验证码有误');
        }
        //要数据表的数据做对比
        // dd($password,$name);
        //检测用户名
        $info=DB::table("users")->where("username",'=',$name)->first();
        //判断
        if($info){
            //检测密码
            //哈希数据值检测
            // 如果检测到密码跟数据库的密码一致的话
            if(Hash::check($password,$info->password)){
                // 把登录的用户名存储在session
                session(['username'=>$name]); 
                // echo $info->id;
                // 1.获取登陆后台用户所有的权限信息
                $sql="select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and ur.uid={$info->id}";
                // 执行sql
                $list=DB::select($sql);
                // dd($list);
                // echo "<pre>";
                // var_dump($list);exit;
                //2.初始化权限
                // 让所有管理员都具有访问后台首页权限
                $nodelist['IndexController'][]="index"; 
                // 便历
                foreach($list as $key=>$value){
                    //把登录用户的所有权限写入$nodelist 数组里
                    $nodelist[$value->mname][]=$value->aname;
                    // 如果权限列表有crete 添加store
                    if($value->aname=="create"){
                        $nodelist[$value->mname][]="store";
                    }

                    // 如果权限列表有edit 添加update
                    if($value->aname=="edit"){
                        $nodelist[$value->mname][]="update";
                    }

                }   
                // echo "<pre>";
                // var_dump($nodelist);exit;

                // 3.把所有权限信息 存储在session里
                session(['nodelist'=>$nodelist]);
                // 返回路径，session信息弹出登录成功
                return redirect("admin")->with('success','登陆成功');
        }else{
                // 读取页面提交，提示信息密码有误
                return back()->with('error','密码有误');
            }
        }else{
            // 阻止登录
            return back()->with('error','用户名有误');
        }

     }


}
