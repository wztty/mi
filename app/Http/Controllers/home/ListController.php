<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sku;
use App\Cate;
use App\Good;
class ListController extends Controller
{
    public function index()
    {
    	//加载列表页
    	//查询所需数据
    	$cateid=$_GET['id'];
    	//dd($cateid)
    	//根据得到的分类id查询所有子类的cate_id
    	$catesid=DB::table('cates')->where('pid','=',$cateid)->get();
    	//dd($catesid);
    	//的到所有的子类id
    	$arr=array();
    	foreach ($catesid as $key => $value) {

    		$arr[]=$value->id;
    	}
    	//dd($arr);
    	 $goods = DB::table('goods')->whereIn('cate_id',$arr)->get();
    	 //dd($goods);
    	return view('home.lists.list',['goods'=>$goods]);
    }



    // 获取用户信息
    public static function getuser($uid)
    {
        $user=DB::table('users')->where('id','=',$uid)->first();
        return $user;
    }



    public function detail(Request $request)
    {
       //dd($request->only('id'));
        //查询的到商品
        $good = Good::find($request->only('id')['id']);
        //dd($good);
       //$gid = $good->id;

        if(!$good){
            echo '<script>alert("暂无数据");window.location.href="/";</script>';
            
        }
        //把图片由字符串转化成数组
        $good->img = explode(',',$good->img);
        //获得skus表信息
        $skus = $good->skus ;

        //使用$arr存储商品型号
        $arr = [];
        foreach ($skus as $key => $value) {
            $arr[] = $value->attr;
        }
        //函数移除数组中的重复的值，并返回结果数组 返回的数组中键名不变
        $attr = array_unique($arr);
        //使用数组存储颜色 和详情
        $color = [];
        $info = [];

        $i = 0;
        //遍历型号数组
        foreach ($attr as $key => $value) {
            //把遍历型号对 的信息存储
            $info[$value] = Sku::where('attr',$value)->first()->info;
            //得到型号对应的颜色
            foreach (Sku::where('attr',$value)->get() as $k => $v ){

                $color[$value][$k] = $v->color;
            }

            $i++;
        }

        $good->attr = $color;
        //dd($good->attr);
        $good->info = $info;
        //得到skuid
        $skuid = $good->skus()->where('attr',$attr)->first()->id;
       //dd($good->info);
        //获取所有评论
        $comments = DB::table('comments')->where('good_id','=',$good->id)->get();
        //dd($comments);
        //最新评论
        $newcommend = DB::table('comments')->orderBy('created_at','desc')->take('2')->get();
        //dd($newcommend);
        return view('home.lists.detail',['good'=>$good,'title'=>'详情','comments'=>$comments,'newcommend'=>$newcommend,'skuid'=>$skuid]);
    }

    //商品查询
    public function List_Search(Request $request)
    {
        $data = $request->all();

//        dd($data['kWord']);

//        /**测试**/ $data['kWord'] = '手机'; /**结束**/

        $cates = Cate::where('pid',0)->get();


        $cate = Cate::where('name','like','%'.$data['kWord'].'%')->get();


//        dd($cate);

        $pid = [];

        foreach ($cate as $key => $value) {
            $pid[] = $value->id;
        }



        $cate = Cate::whereIn('pid',$pid)->get();


        if($cate->count()) {
            $id = [];
            foreach ($cate as $key => $value) {
                $id[] = $value->id;
            }
            $search_goods = Good::whereIn('cate_id',$id )->Get();

        }else{
            $search_goods = Good::whereIn('cate_id', $pid)->Get();
        }



        $goods = Good::take('10')->orderBy('created_at','desc')->get();

        return view('home.list_search',['cates'=>$cates,'search_goods'=>$search_goods,'goods'=>$goods,'title'=>'小米商城']);
    }
}
