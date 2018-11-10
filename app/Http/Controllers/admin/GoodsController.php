<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    public static function lookcate($cate_id)
    {
        $info=DB::table('cates')->where('id','=',$cate_id)->first();
        $name=$info->name;
        return $name;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //商品列表 admingoods访问
        //查询商品
        $goods=DB::table('goods')->paginate(10);
        //dd($goods);
       return view('admin.goods.index',['goods'=>$goods,'request'=>$request->all()]);
    }


    //sku表
    public function sku(Request $request)
    {
        $skus=DB::table('skus')->paginate(10);

         return view('admin.goods.skus',['skus'=>$skus,'request'=>$request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admingoods/create访问
        //查询分类信息
        $cates=DB::table('cates')->get();

        return view('admin.goods.add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //admingoods访问
        //接受所有提交的数据
        if(empty($request->input('title')&&$request->input('price')))
        {
            return back()->with('error','添加商品不能为空');
        }

        $data=$request->all();
        // dd($data);
        $showimg=$data['showImg']->path.$data['showImg']->originalName;
        echo $showImg;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //admingoods/$id访问
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //admingoods/$id/edit访问
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //admingoods/$id访问
    }
}
