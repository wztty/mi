<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sku;
use App\Good;
use App\Comment;
class CommentsController extends Controller
{
	//添加评论
    public function setComment(Request $request)
    {
    	//dd($request->all());
        $data = $request->all();

        $sku = Sku::find($data['id']);
        //dd($sku);
        $order_id = $data['order_id'];

        $gid = $request->input('gid');

        return view('home.comment',['sku'=>$sku,'order_id'=>$order_id,'gid'=>$gid]);
    }

    //插入评论
    public function addComment(Request $request)
    {
    	//dd($request->all());
    	
    	$data = $request->all();
        $comment = new Comment();
        $comment->star = round($data['score']*10)/10;
        $comment->content = $data['content'];
        $comment->good_id = $data['good_id'];
        $comment->useless = $data['order_id'];
        $comment->user_id = session('uid');
        $comment->pid = 0;
        $comment->path = 0;
        $comment->save();


        return redirect('/detail?id='.$data['good_id'].'&&#comment');




    }
}
