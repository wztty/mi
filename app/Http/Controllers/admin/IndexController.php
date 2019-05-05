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
    public function dolink(Request $request)
    {
    	$id = $request->input('id');

    	$data = DB::table('links')->where('id','=',$id)->first()->status;

    	if($data == 0){

            if(DB::table('links')->where('id','=',$id)->update(['status'=>1])){

                echo 1;

            }else{

                echo 2;
            }

    	}else{

    		echo 3;	
		}
    }

    //友情链接删除
    public function del(Request $request)
    {
    	$id = $request->input('id');
        
    	$del=DB::table('links')->where('id','=',$id)->delete();

    	if($del){

    		echo 1;
    	}else{

    		
            echo 2;
		}
    }
   
}
