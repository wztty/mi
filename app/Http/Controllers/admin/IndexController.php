<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function index()
    {

    	//跳转到后台首页
    	return view('admin.index');
    }
}
