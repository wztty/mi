<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Cate;
use App\Good;
use App\Sku;
class IndexController extends Controller
{
    //设置公共方法
    public static function getcatesbypid($pid)
    {
        $res=DB::table('cates')->where('pid','=',$pid)->get();
        $data=[];
        //遍历得到数据把子类赋值给suv字段
       foreach($res as $key=>$value){
            $value->suv=self::getcatesbypid($value->id);
            $data[]=$value;
        }
        return $data;
    }
    //导入数据去导航
    public static function cate()
    {
        $cate=self::getcatesbypid(0);
        //dd($cate);
        
        return $cate;
    }
    /**
     * Display a listing of the resource.
     *前台首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取小米明星产品
        $star=DB::table('goods')->get();

        //获取智能硬件产品
        $smarty = $this->allGoods(1);
        //导入前台首页
        return view('home.index',['star'=>$star,'smarty'=>$smarty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   private function allGoods($cate_id)
    {
        //声明一个变量接收商品
        $data = [];
        //去goods表中查询所有该类下的所有商品信息
        $goods = Good::where('cate_id',$cate_id)->get()->toArray();
        
        //去分类表中获取他所有子类 子类商品也是属于该类商品的
        $cates = Cate::where('pid',$cate_id)->get();

        //遍历类获取子类商品
        foreach($cates as $k=>$v){
            $temp = Good::where('cate_id',$v->id)->get()->toArray();
            if($temp){
                 $data = array_merge($data,$temp);
            }    
        }

        $data = array_merge($data,$goods);

        $data2 = [];
        //去sku表中表中遍历所有商品
        foreach($data as $key=>$val)
        {
            
            $temp2 = Sku::where('good_id',$val['id'])->get();
       
            if(count($temp2)){

                foreach($temp2 as $k=>$v){
                    $data2[] = $v;
                    //限定个数
                    if(count($data2)>8){
                        $data2 = array_slice($data2,0,8);
                        break 2;
                    }
                }

            } 
        }
        return $data2;
    }

          //友情链接
          public function links()
          {
                $datas=DB::table('links')->where('status','=',1)->get();

                return view('home.link',['datas'=>$datas]);
          }


          public function insertlink(Request $request)
          {
                $title=$request->input('title');
                $url=$request->input('url');
                if(!($title||$url)){
                      return back()->with('error','输入不能为空');
                }

                $data=$request->except('_token');

                $datas=DB::table('links')->where('status','=',1)->insert($data);

                if($datas){

                   return redirect('looklinks')->with('success','正在申请，请耐心等待。');
                }else{
                    return redirect('looklinks')->with('error','系统繁忙');
                }

                
          }
           //前台商品详情
          public function detail(Request $request)
          {
            $id=$_GET['id'];
           
            // $datax=DB::table("goods")->join('skus','goods.cate_id','=','skus.good_id')->where("good_id","=",$id)->get();
            $datax=DB::table("cates")->join('goods','cates.id','=','goods.cate_id')->join('skus','goods.cate_id','=','skus.good_id')->where("cate_id","=",$id)->get();

              return view('home.detail',['datax'=>$datax]);
              
          }
}
