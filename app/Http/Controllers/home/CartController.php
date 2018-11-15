<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //添加购物车操作
    public function addcart(Request $request)
    {
    	dd(session('uid'));
    }
}
