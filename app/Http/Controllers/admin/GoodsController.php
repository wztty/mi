<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Addshop;
use Config;


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
        $goods=DB::table('goods')->paginate(5);
        //dd($goods);
       return view('admin.goods.index',['goods'=>$goods,'request'=>$request->all()]);
    }


    //sku表
    public function sku(Request $request)
    {
        $skus=DB::table('skus')->paginate(5);

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
        //商品添加
       
        $data=$request->except('_token');
        
        $data=$request->only(['title','cate_id','price','content','img','showimg','status']); 
        // dd($data);
        $data['sub_title']='';
        if($request->hasFile("img")){
            //初始化名字获取后缀
            $name=time()+rand(1,10000);
            $ext=$request->file("img")->getClientOriginalExtension();
            //移动到置顶目录下
            $request->file("img")->move(Config::get('app.uploads'),$name.".".$ext);
            //初始化$data
            $data['img']=trim(Config::get('app.uploads').'/'.$name.".".$ext,'.');
            // dd($data['cate_id']);
            
           
            }
        

        if($request->hasFile("showimg")){
            //初始化名字获取后缀
            $name=time()+rand(1,10000);
            $ext=$request->file("showimg")->getClientOriginalExtension();
            //移动到置顶目录下
            $request->file("showimg")->move(Config::get('app.uploads'),$name.".".$ext);
            //初始化$data
            $data['showimg']=trim(Config::get('app.uploads').'/'.$name.".".$ext,'.');
            // dd($data['cate_id']);
            //执行数据库的插入
            
            if(DB::table("goods")->insert($data)){
                //获取返回刚刚插入的id
            $id = DB::getPdo()->lastInsertId();
            
                // dd($id);
                return redirect("/adminaddsku?id=$id")->with('success','添加成功');
            }
        
        }
        //admingoods访问
        //接受所有提交的数据
        if(empty($request->input('title')&&$request->input('price')&&$request->input('content')&&$request->input('img')&&$request->input('showimg')))
        {
            return back()->with('error','添加商品不能为空');
        }



        // $data=$request->all();
        // // dd($data);
        // $showimg=$data['showimg']->path.$data['showimg']->originalName;
        // echo $showimg;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
       


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cates=DB::table('cates')->get();

        $goods=DB::table("goods")->where("id","=",$id)->first();
          // dd($goods);
        return view("admin.goods.update",['goods'=>$goods,'cates'=>$cates]);
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
        //获取参数
        // $data=$request->all();
        // dd($data);
        $data=$request->only(['title','price','content','img','showimg','status']);
        $data['sub_title']='';
        // dd($data);
        //获取需要修改的数据
        $info=DB::table("goods")->where("id","=",$id)->first();
        //如果有新图片上传
      
        if($request->hasFile("img")){

            //初始化名字 获取后缀
            $name=time()+rand(1,10000);
            $ext=$request->file("img")->getClientOriginalExtension();
            //移动到指定的目录下
            $request->file("img")->move(Config::get('app.uploads'),$name.".".$ext);
            //初始化$data
            $data['img']=trim(Config::get('app.uploads').'/'.$name.".".$ext,'.');
            // dd($data);
            //执行数据库的修改
            unlink(".".$info->img);
            }else{
                $data['img'] = $info->img;
            }

            if($request->hasFile("showimg")){

            //初始化名字 获取后缀
            $name=time()+rand(1,10000);
            $ext=$request->file("showimg")->getClientOriginalExtension();
            //移动到指定的目录下
            $request->file("showimg")->move(Config::get('app.uploads'),$name.".".$ext);
            //初始化$data
            $data['showimg']=trim(Config::get('app.uploads').'/'.$name.".".$ext,'.');
            // dd($data);
                unlink(".".$info->showImg);

          }else{
            $data['showimg'] = $info->showImg;
          }
          //执行数据库的修改
            if(DB::table("goods")->where("id","=",$id)->update($data)){
                
                return redirect("/admingoods")->with('success','修改成功');
              }else{
            //没有图片修改
                return redirect("/admingoods")->with('error','修改失败');
            }   
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
        //获取需要删除的数据
        
        $info=DB::table("goods")->where("id","=",$id)->first();
        $inf=DB::table("skus")->where("good_id","=",$id)->first();
        // dd($info->img);
        //echo $info->pic;
        if(DB::table("goods")->where("id","=",$id)->delete()){
            DB::table("skus")->where("good_id","=",$id)->delete();
            //干掉图片
            unlink(".".$info->img);
            // unlink($info->showimg);
            unlink(".".$inf->img);
            unlink(".".$info->showImg);
            return redirect("/admingoods")->with('success','删除成功');
        }
    }
}
