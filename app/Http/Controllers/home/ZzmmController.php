<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入短信类
use Ucpass;
use DB;
use Hash;
class ZzmmController extends Controller
{	
	//引入重置密码首页
	public function index()
	{
		return view('home.dxpass');
        //获取验证码
	}
	//判断重置密码的手机号码查询id
	public function onmjbk(Request $request)
	{	
		// $phone=$request->except(['_token','submit']);
		$phone=$request->only(['phone']);

		$data=DB::table('users')->where('phone',"=",$phone)->first();
		// dd($data);
		// dd($data->id);
		$id = $data->id;
		// dd($id);

			return redirect("/ojbk?id={$id}")->with('success','通过验证');	
	}
	//验证通过引入重置密码页面
	public function ojbk(Request $request)
	{
		// dd($request->all());
		$id=$request->only(['id']);

		return view('home.ojbk',['id'=>$id]);
	}
	//处理传过来的新密码重置处理
	public function odd(Request $request)
	{	
		$id=$request->only(['id']);
		$data=$request->only(['password']);
		$data['password']=Hash::make($data['password']);
		// dd($data);
		if(DB::table('users')->where('id',"=",$id)->update($data)){
			return redirect('/login')->with('success','重置成功');
		}
	}
}

