<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
<<<<<<< HEAD
use Hash;
=======
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
<<<<<<< HEAD
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        //加载模板
         

        // 会员列表
        $data=DB::table("users")->paginate(5);
        // 这是后台会员列表

        return view('admin.user.index',['data'=>$data]);
=======
     *用户列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //导入列表
        $users=DB::table('users')->paginate(10);

        return view('admin.users.index',['users'=>$users,'request'=>$request->all()]);
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
    }

    /**
     * Show the form for creating a new resource.
<<<<<<< HEAD
=======
     * 个人中心
     * @return \Illuminate\Http\Response
     */
    


    /**
     * Show the form for creating a new resource.
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
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
<<<<<<< HEAD
        //
=======
         $user=DB::table('users')->where('id','=',$id)->first();
            //$level=$user->level;
            //dd($level);
        return view('admin.users.edit',['user'=>$user]);
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
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
<<<<<<< HEAD
        //
=======
        $level=$request->input('level');

        $row=DB::table('users')->where('id','=',$id)->update(['level'=>$level]);

        if($row){

            return redirect('/adminuser')->with('success','修改成功');
        }else{

            return redirect('/adminuser')->with('error','修改成功');
        }
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        //
=======
        //删除用户
        $bool=DB::table('users')->where('id','=',$id)->delete();
        //判断
        if($bool){

            return redirect('/adminuser')->with('success','删除成功');

        }else{

            return redirect('/adminuser')->with('error','系统繁忙');
        }
>>>>>>> c5c61eb9980eba58ae5f468b7c90f74109f50324
    }
}
