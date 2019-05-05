<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //导入列表
        $users=DB::table('users')->paginate(10);

        return view('admin.users.index',['users'=>$users,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     * 个人中心
     * @return \Illuminate\Http\Response
     */
    
     public static function lookcate($uid)
    {
        $info = DB::table('users')->where('id','=',$uid)->first();
        
        $name = $info->username;
        // dd($name);

        return $name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $user=DB::table('users')->where('id','=',$id)->first();
            //$level=$user->level;
            //dd($level);
        return view('admin.users.edit',['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $level=$request->input('level');

        $row=DB::table('users')->where('id','=',$id)->update(['level'=>$level]);

        if($row){

            return redirect('/adminuser')->with('success','修改成功');
        }else{

            return redirect('/adminuser')->with('error','修改成功');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //删除用户
        $bool=DB::table('users')->where('id','=',$id)->delete();
        //判断
        if($bool){

            return redirect('/adminuser')->with('success','删除成功');

        }else{

            return redirect('/adminuser')->with('error','系统繁忙');
        }

    }

    //ajax删除
    public function del(Request $request)
    {
        $id = $request->input('id');

        $row = DB::table('users')->where('id','=',$id)->delete();

        if($row){

            echo 1;

        }else{

            echo 2;
        }
    }

    //个人信息
    public static function userdata($name)
    {

        $info = DB::table('users')->where('username','=',$name)->first();

        return $info;
    }


    //密码修改
    public function updatepass()
    {
        $name = session('username');

        $info = DB::table('users')->where('username','=',$name)->first();

        return view('admin.password',['info'=>$info]);
    }

    //处理密码修改
    public function newpass(Request $request)
    {
        $name = session('username');
        //得到旧密码
        $pass = $request->input('password');
        //得到新密码
        $newpass['password'] = Hash::make($request->input('newpass'));

        $info = DB::table('users')->where('username','=',$name)->first();
        //dd($info);
        //判断旧密码是否正确
        if(Hash::check($pass,$info->password)){

           $row = DB::table('users')->where('username','=',$name)->update($newpass);

           if($row){

                return redirect('/admin/login')->with('success','修改成功请重新登陆');
           }else{

                 return redirect('/updatepass')->with('error','修改失败');
           }

        }else{

            return back()->with('error','你输入的旧密码有误');
        }
    }


    //个人中心
    public function center(Request $request)
    {
        $name = session('username');

        $info = DB::table('users')->where('username','=',$name)->first();

        return view('admin.center.index',['info'=>$info]);
    }

    //个人中心修改
     public function dataedit(Request $request)
    {
        //得到sseione里的username值
         $name = session('username');
         //dd($name);
         //查询登陆的用户信息
        $info = DB::table('users')->where('username','=',$name)->first();
         //dd($info);
         $id=$info->id;
         //dd($id);
        //的到上传数据
        $data=$request->only('nikename','email','phone');
        //判断是否有图片上传
        if($request->hasFile('pic')){

            //获的上传文件后缀
            $ext=$request->file('pic')->getClientOriginalExtension();
            //获得新图片名字
            $name=time().rand(1000,9999);
            //设置上传路径
           $request->file('pic')->move('./static/image/', $name.'.'.$ext);
            //拼接头像路径
            $data['pic']='./static/image/'.$name.'.'.$ext;
             //删除老图片
            //unlink($info->pic);
        }else{

            //老图片路径
            $data['pic']=$info->pic;
        }
        //dd($data);
        //修改数据
        $row=DB::table('users')->where('id','=',$id)->update($data);

        if($row){

           

             return redirect('/users')->with('success','更新成功');

        }else{

            return redirect('/users')->with('error','更新失败');
        }
    }
    
}
