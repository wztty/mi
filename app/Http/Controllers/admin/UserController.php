<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *用户列表
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
}
