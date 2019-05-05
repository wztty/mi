<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型
use App\Models\Advertisement;
use Config;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          //连接模型
         $data=Advertisement::paginate(5);
         // dd($data);
         return view('admin.advertisement.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //引入添加页面
        return view('admin.advertisement.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取传过来的字段
        $data=$request->only(['name','img']);
        $data['status']=1;
        if($request->hasFile("img")){
            //初始化名字 获取后缀
            $nm=time()+rand(1,10000);
            $ex=$request->file("img")->getClientOriginalExtension();
            //移动到指定的目录下
            $request->file("img")->move(Config::get('app.upload'),$nm.".".$ex);
            //初始化$data
            $data['img']=trim(Config::get('app.upload').'/'.$nm.".".$ex,'.');
        if(DB::table('advertisement')->insert($data))
        {
            return redirect('/gg')->with('success','添加成功');
        }
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('advertisement')->where('id',"=",$id)->first();
        return view('admin.advertisement.update',['data'=>$data]);
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
        $data=$request->only(['name','img']);
        $data['status']=1;
        // dd($data);
        //获取需要修改的数据
        $info=DB::table("advertisement")->where("id","=",$id)->first();
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
             unlink(".".$info->img);
            }else{
                //没有修改图片
               $data['img']=$info->img;
            }
        if(DB::table("advertisement")->where("id","=",$id)->update($data)){
                return redirect("/gg")->with('success','修改成功');    
            }else{
                return redirect("/gg")->with('success','修改成功');    
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
        //删除数据
        $info=DB::table('advertisement')->where('id',"=",$id)->first();
        // dd($info);
        if(DB::table('advertisement')->where('id',"=",$id)->delete()){
            unlink(".".$info->img);
            return redirect('/gg')->with('success','删除成功');
        }
    }
}
