<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
    //收货地址首页
    public function index(Request $request)
    {
    	$address=DB::table('addresses')->paginate(10);

    	return view('admin.users.address',['address'=>$address,'request'=>$request->all()]);
    }

    //收货地址删除
    public function del()
    {
    	$id=$_GET['id'];
    	//dd($id);
    	$bool=DB::table('addresses')->where('id','=',$id)->delete();

    	if($bool){

    		return redirect('/address')->with('success','删除成功');

    	}else{

    		return redirect('/address')->with('error','删除失败');
    	}
    	
    }
}
