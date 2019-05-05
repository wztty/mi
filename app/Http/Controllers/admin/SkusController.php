<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Skus;
use Config;
class SkusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //删除skus数据
        // dd($request->all());
        $id=$request->only(['id']);
        // dd($id);
        $data=DB::table("skus")->where("id","=",$id)->first();
        if(DB::table("skus")->where("id","=",$id)->delete()){

            return redirect("/adminsku")->with('success','删除成功');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=$request->input('id');
        // echo 1;
        return view('admin.goods.addsku',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $id=$request->only(['id']);
        // dd($id);
        $data=DB::table('goods')->where("id","=",$id)->first();
        // dd($data);
        return view('admin.goods.adskus',['data'=>$data]);
    }

    public function shangc(Request $request)
    {
        $data=$request->only(['title','good_id','attr','color','falsePrice','price','img','info']);
        // dd($data);
        $data['stock']=100;
        $data['status']=1;
            // dd($data['cate_id']);
            
            //执行数据库的插入
            if($request->hasFile("img")){
            //初始化名字 获取后缀
            $nm=time()+rand(1,10000);
            $ex=$request->file("img")->getClientOriginalExtension();
            //移动到指定的目录下
            $request->file("img")->move(Config::get('app.upload'),$nm.".".$ex);
            //初始化$data
            $data['img']=trim(Config::get('app.upload').'/'.$nm.".".$ex,'.');
            if(DB::table("skus")->insert($data)){
                // dd($id);
                return redirect("/adminsku")->with('success','添加成功');
            }   
         }  
         if(empty($request->input('title')&&$request->input('price')&&$request->input('falsePrice')&&$request->input('img'))){
            return back()->with('error','添加商品不能为空');
             } 

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
    public function edit(Request $request, $id)
    {
       
        // dd($id);
       $data=DB::table('skus')->where("id","=",$id)->first();
       // dd($data);
       return view('admin.goods.skuupdate',['data'=>$data]);
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
        $data=$request->only(['title','attr','color','falsePrice','price','info']);
        
        $data['status']=1;
        $data['stock']=100;
        
        //获取需要修改的数据
        $info=DB::table("skus")->where("id","=",$id)->first();
        //如果有新图片上传
      
        if($request->hasFile("img")){
            //初始化名字 获取后缀
            $name=time()+rand(1,10000);
            $ext=$request->file("img")->getClientOriginalExtension();
            //移动到指定的目录下
            $request->file("img")->move(Config::get('app.upload'),$name.".".$ext);
            //初始化$data
            $data['img']=trim(Config::get('app.upload').'/'.$name.".".$ext,'.');
            // dd($data);
            //执行数据库的修改
            if(DB::table("skus")->where("id","=",$id)->update($data)){
                //删除原图
                unlink(".".$info->img);
                return redirect("/adminsku")->with('success','修改成功');
            }
        }else{
            //没有图片修改
             if(DB::table("skus")->where("id","=",$id)->update($data)){
                return redirect("/adminsku")->with('success','修改成功');
            }   
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
        //
    }
}
