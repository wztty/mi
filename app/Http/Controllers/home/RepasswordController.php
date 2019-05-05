<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;//导入mail类
use DB;
use Hash;
class RepasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("home.password");
    }
    //验证账号和邮箱
    public function yemail(Request $request)
    {//接收发送过来的值验证
        $name=$request->only(['username','email']);
        // dd($data);
        $use=$name['username'];
        $email=$name['email'];
        $info=DB::table('users')->where("username","=",$use)->first();
        // dd($info->id);
        if($info){
            $inf=DB::table('users')->where('email',"=",$email)->first();
            if($inf){
                $id=$inf->id;
                // dd($id);
                return redirect("/sends?id={$id}&email={$email}")->with('suceess','验证用过,请前往邮箱进行重置密码');
            }else{
                return redirect("/pas")->with('error','用户名或者邮箱不存在');
            }
        }else{
            return redirect("/pas")->with('error','用户名或者邮箱不存在');
        }
        
        
    }
    //测试邮件发送
    // public function send()
    // {
    //     // echo 11; $message 是消息生成器
    //     Mail::raw('quancheng',function($message){
    //         //接受方
    //         $message->to("809446379@qq.com");
    //         //发送主题
    //         $message->subject('lvelvelve');
    //     });
    // }

    public function sends(Request $request)
    {   
        // dd($request->all());
        $id=$request->only(['id']);
        // dd($id);
        $email=$request->only(['email']);
        // dd($email);
        
    //模版在视图home下的Register文件夹下的xxx.blade.php
        Mail::send('home.xxx',['id'=>$id],function($message) use($email){
            $message->to($email['email']);
            $message->subject('密码找回');
        });
        return redirect("/login")->with('success','验证通过,请前往邮箱进行重置密码');
    }

    public function czpass(Request $request)
    {
        //引入重置密码
        $id=$request->only(['id']);
        return view('home.czpass',['id'=>$id]);
    }

    //处理重置密码
    public function czpas(Request $request)
    {
        // dd($request->only(['id']));
        $data=$request->except(['repassword','_token','submit']);
        $id=$request->only(['id']); 
        // dd($data);
        $data['password']=Hash::make($data['password']);

        if(DB::table('users')->where('id',"=",$id)->update($data)){

              return redirect("/login")->with('success','修改成功');
            }


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
