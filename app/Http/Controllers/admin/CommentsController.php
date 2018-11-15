<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Comment;
class CommentsController extends Controller
{
    //评论列表
    public function index(Request $request)
    {
    	//获得评论
    	$comments=DB::table('comments')->paginate(10);
    	return view('admin.comments.index',['comments'=>$comments,'request'=>$request->all()]);
    }

    //评论删除
    public function del()
    {
    	$id=$_GET['id'];
    	$bool=DB::table('comments')->where('id','=',$id)->delete();
    	if($bool){
    		return redirect('/comments')->with('success','删除成功');
    	}else{

    		return redirect('/comments')->with('success','修删除失败');	
    	}
    	
    }

    public function reply()
    {
    	//获得评论id
    	$id=$_GET['id'];
    	//dd($id);
    	return view('admin.comments.reply',['id'=>$id]);
    }

    //评论修改
    public function edit(Request $request)
    {
    	//获得评论id
    	//dd($_POST);
    	$id=$_POST['id'];
    	//回复的父id等于$id
    	$pid=$id;
    	//根据$id查询父类的path
    	$comment=DB::table('comments')->where('id','=',$id)->first();
    	$path=$comment->path;
    	$good_id=$comment->good_id;
    	//商家id统一为adminid
    	$user_id=1;
    	//dd($path);
    	//子类path
    	$newpath=$pid.','.$path;

    	//获取回复的内容
    	$content=$request->input('content');
    	//dd($content);
    	$data['pid']=$pid;
    	$data['path']=$newpath;
    	$data['status']=1;
    	$data['good_id']=$good_id;
    	$data['user_id']=1;
    	$data['content']=$content;
    	$data['star']='5';
    	// $data['updated_at']=time();
    	//dd($data);
    	$bool=Comment::insert($data);
    	//dd($bool);
    	if($bool){
    		return redirect('/comments')->with('success','回复成功');
    	}
    	
    }
}
