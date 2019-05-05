<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
class SowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $sowing=DB::table('sowing_map')->paginate(5);
        //加载模块
        return view('admin.sowing.index',['sowing'=>$sowing,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模块
        return  view("admin.sowing.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //获取数据
        $data=$request->except('_token');
       //判断是否具有文件上传
       if($request->hasFile('pic')){
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        $ext=$request->file("pic")->getClientOriginalExtension();
        //移动到指定目录下(提前在public下新建uploads目录)
        $request->file("pic")->move(Config::get('app.uploads'),$name.".".$ext);

       $data['pic'] =(Config::get('app.uploads').'/'.$name.".".$ext);
       
            //执行数据库的插入
            
            if(DB::table('sowing_map')->insert($data)){ 
            // echo "1111";               
             return redirect('/adminsowing')->with('success','添加成功');
 
            }else{                
            // echo "0000";                
            return redirect('/adminsowing')->with('error','添加失败');
 
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
        
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
          $info=DB::table('sowing_map')->where('id','=',$id)->first();         
         // 加载模板        
          return view('admin.sowing.edit',['info'=>$info]);
       
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
          //修改图片
        //获取需要修改的数据        
        $info=DB::table('sowing_map')->where('id','=',$id)->first();        
              
             
        //获取参数       
        $data=$request->except(['_token','_method']);
        //判断是否有文件上传
        if($request->hasFile('pic')){           
         //获取后缀            
         $ext=$request->file('pic')->getClientOriginalExtension();            
         //随机文件名字
         $name=time()+rand(1,10000);            
         $request->file("pic")->move(Config::get('app.uploads'),$name.".".$ext);

       $data['pic'] = Config::get('app.uploads').'/'.$name.".".$ext;       
          //执行数据库的修改操作
        if(DB::table('sowing_map')->where('id','=',$id)->update($data)){                
        //删除原图                
        unlink($info->pic);               
        return redirect('/adminsowing')->with('success','修改成功');            
        }else{ 

                return redirect('/adminsowing')->with('with','修改失败'); 
             }        
        }else{            
        //不修改图片            
        if(DB::table('sowing_map')->where('id','=',$request->input('id'))->update($data))
            {                
                return redirect('/adminsowing')->with('success','修改成功');
 
            }else{ 

                return redirect('/adminsowing')->with('with','修改失败');            
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
          
         //获取需要删除的数据
        $info=DB::table('sowing_map')->where('id','=',$id)->first();
       
        //执行删除  
            // dd($info);
              
        if(DB::table('sowing_map')->where('id','=',$id)->delete()){
        //删除图片
         unlink($info->pic);            
                return redirect('/adminsowing')->with('success','删除成功');
        }else{   
                return redirect('/adminsowing')->with('error','删除失败');
        }
    }
}
