<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分类列表
        //获取搜索关键词
        $keywords=$request->input('keyword');
        //连贯操作 查询需要的数据
        $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$keywords.'%')->orderBy('paths')->paginate(8);
        //遍历数据
        foreach($list as $key=>$value){
            //转换为数组
            $arr=explode(",",$value->path);
            //获取逗号个数
            $num=count($arr)-1;
            //重复字符串函数
            $list[$key]->name=str_repeat("--",$num).$value->name;
        }

        return view('admin.cates.index',['list'=>$list,'request'=>$request->all()]);
    }



        public static function getcates()
        {
            $list=DB::table("cates")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历数据
        foreach($list as $key=>$value){

            //转换为数组
            $arr=explode(",",$value->path);
            //获取逗号个数
            $len=count($arr)-1;
            //重复字符串函数
            $list[$key]->name=str_repeat("--",$len).$value->name;
        }

        return $list;

        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //导入添加视图
        //$data=DB::table('cates')->get();
        $data=self::getcates();
        //dd($data);
        return view('admin.cates.add',[
            'data'=>$data,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //处理分类添加
        $info=$request->except('_token');
        //dd($info);
        //判断是否有文件上传
        if($request->hasFile('img')){
            //获取文件上传后缀
            $ext=$request->file('img')->getClientOriginalExtension();
            //随机图片的名字
            $name=time().rand(1000,9999);
            //把图片移动到指定目录下
            $request->file('img')->move('./static/image/', $name.'.'.$ext);
            //拼接路劲
            $imgpath = './static/image/'.$name.'.'.$ext;
            
            //dd($imgpath);
        }


        $pid=$request->input('pid');
        if($pid == 0){

            $info['path']='0';
            $info['status']=1;
            $info['img']='';

        }else{
            //根据pid得到父类
            $list=DB::table('cates')->where('id','=',$pid)->first();
            //拼接path
            $info['path']=$list->path.",".$list->id;
            $info['status']=1;
            $info['img']=$imgpath;

        }

        if(DB::table('cates')->insert($info)){
           return redirect('/admin/cates')->with('success','添加成功');
        }else{
          return  redirect('/admin/cates/create')->with('error','添加失败');
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
         //修改分类
        $info=DB::table('cates')->where('id','=',$id)->first();
        //得到全部分类
        $data=DB::table('cates')->get();
        return view('admin.cates.edit',['info'=>$info,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
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
        //dd($_POST);
        //根据id查询原数据
        $info=DB::table('cates')->where('id','=',$id)->first();
        //dd($info);
        //得到原数据状态
        $data['status']=$info->status;
         //得到原数据图片路径以便删除
        $imgpath=$info->img;
        //得到数据的父id
        $data['pid']=$_POST['pid'];
        //得到分类名
        $data['name']=$_POST['name'];
        //dd($data);
        //根据父id查询父类路劲
        $path=DB::table('cates')->where('id','=',$data['pid'])->first()->path;
        //拼接新路径
        $data['path']=$path.','.$data['pid'];
        //dd($data);
        //判断是否有图片上传
        if($request->hasFile('img')){

            //获取文件上传后缀
            $ext=$request->file('img')->getClientOriginalExtension();
            //随机图片的名字
            $name=time().rand(1000,9999);
            //把图片移动到指定目录下
            $request->file('img')->move('./static/image/',$name.'.'.$ext);
            //拼接新的路劲
            $data['img']='./static/homes/common/image/'.$name.'.'.$ext;
            //删除老图片
            @unlink($imgpath);
        }else{
            //得到老图片路径
            $data['img']=$info->img;
        }

        //dd($data);
        $bool=DB::table('cates')->where('id','=',$id)->update($data);

        if($bool){

            return redirect('/admincates')->with('success','修改成功');

        }else{

            return redirect('/admincates')->with('success','修改失败');
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
        
        //echo $id;
        //根据的到的id判断数据是否有子类
        $bool=DB::table('cates')->where('pid','=',$id)->get();
        //dd($bool);
        if(count($bool)!=0){
           return redirect('/admin/cates')->with('error','请先删除子类'); 
        }

        if(DB::table("cates")->where("id",'=',$id)->delete()){
            return redirect('/admin/cates')->with('success','删除成功');
        }else{
            return redirect('/admin/cates')->with('error','删除失败');
        }

    }
}
