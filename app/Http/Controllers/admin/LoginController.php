<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\org\code\Code;

class LoginController extends Controller
{
    //引入登陆界面
    public function login()
    {
    	return view('admin.login');
    }
    //引入验证码
    public function code()
    {
    	$code = new \Code;
        $code->make();
    }
}
