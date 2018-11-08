<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    public static function gainUsername()
    {
    	//得到sseione里的username值
    	 $name=session('username');
    	 //根据name查询用户信息
    	 $info=DB::table('users')->where('username','=',$name)->first();
    	 return $info;
    }
}
