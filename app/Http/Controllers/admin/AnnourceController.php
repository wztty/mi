<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
class AnnourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $annource=DB::table('articles')->paginate(5);
       
        //加载模块
        return view("admin.annource.index",['annource'=>$annource,'request'=>$request->all()]);
    }
    public function annourcedel(Request $request){
        //获取参数 删除数据的id
        $arr=$request->input('arr');
        //判断$arr
        if($arr==""){
            echo "请至少选中一条数据";exit;
        }
        //遍历
        foreach($arr as $key=>$value){
            DB::table("articles")->where("id",'=',$value)->delete();
        }

        echo 1;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模块
        return view("admin.annource.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取数据
        $data=$request->except(['_token']);
        //执行插入
        if(DB::table("articles")->insert($data)){
            return redirect("/adminannource")->with('success','添加成功');
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
           
        $info=DB::table("articles")->where("id",'=',$id)->first();
        
       
        return view("admin.annource.edit",['info'=>$info]);
             
              
             
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
          //修改图片
               
              
             
        //获取参数       
        // $data=$request->except(['_token','_method']);
        $data=$request->only(['title','descr']);
        // dd($data);
        //获取需要修改的数据        
        $info=DB::table('articles')->where("id","=",$id)->first(); 
        //判断是否有文件上传
         if($request->hasFile('descr')){           
         //获取后缀            
         $ext=$request->file('descr')->getClientOriginalExtension();            
       //   //随机文件名字
           $name=time()+rand(1,10000);            
          $request->file("descr")->move(Config::get('app.uplode'),$name.".".$ext);

        $data["descr"] = Config::get('app.uplode').'/'.$name.".".$ext;    
       //    //执行数据库的修改操作
       if(DB::table("articles")->where("id","=",$id)->update($data)){ 
                     
       //删除原图               
        unlink($info->descr);
      
                return redirect("/adminannource")->with('success','修改成功'); 

             }  

        }else{ 

        if(DB::table("articles")->where("id","=",$id)->update($data)){

                return redirect("/adminannource")->with('success','修改成功'); 
       //       }        
       //  }else{            
       //  //不修改图片            
       //  if(DB::table('articles')->where('id','=',$request->input('id'))->update($data))
       //      {                
       //          return redirect('/adminannource')->with('success','修改成功');
 
       //      }else{ 

       //          return redirect('/adminannource')->with('with','修改失败');            
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
        //获取需要删除数据 
        $info=DB::table("articles")->where("id",'=',$id)->first();
        echo $info->descr;

        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->descr,$arr);
        if(DB::table("articles")->where("id",'=',$id)->delete()){
            //遍历
            if(isset($arr[1])){
                foreach($arr[1] as $key=>$value){
                    unlink(".".$value);
                }
            }
            return redirect("/adminannource")->with('success','删除成功');
        }
    }
}
