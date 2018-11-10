<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    //后台首页
    public function index()
    {

    	//跳转到后台首页
    	return view('admin.index');
    }

    //友情链接管理
    public function link(Request $request)
    {
    	$links=DB::table('links')->paginate(10);

    	return view('admin.link',['links'=>$links,'request'=>$request->all()]);

    }
    //友情链接审核
    public function dolink()
    {
    	$id=$_GET['id'];
    	$data=DB::table('links')->where('id','=',$id)->update(['status'=>1]);
    	if($data){

    		return redirect('/flink')->with('success','通过审核');
    	}else{

    		return redirect('/flink')->with('success','审核失败');	
		}
    }

    //友情链接删除
    public function del()
    {
    	$id=$_GET['id'];
    	$del=DB::table('links')->where('id','=',$id)->delete();

    	if($del){

    		return redirect('/flink')->with('success','删除成功');
    	}else{

    		return redirect('/flink')->with('success','修删除失败');	
		}
    }
}
