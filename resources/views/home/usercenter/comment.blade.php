@extends('home.public')
@section('centen')
     <div class="span16"> 
       <div class="uc-box uc-main-box"> 
        <div class="uc-content-box"> 
         <div class="box-hd"> 
          <h1 class="title">商品评价</h1> 
          <div class="more clearfix"> 
           <ul class="filter-list J_addrType"> 
            <li class="first "> <a href="/user/comment?filter=1">待评价商品（0）</a> </li> 
            <li class=" "> <a href="/user/comment?filter=2">已评价商品（0）</a> </li> 
           </ul> 
          </div> 
         </div> 
         <div class="box-bd"> 
          <div class="xm-goods-list-wrap"> 
           <ul class="xm-goods-list clearfix">
        @foreach($comment as $val)
            <li class="item-rainbow-1" data-id="134117576"> 
               <div class="user-image"> 
                <img src="{{$pic}}" alt="" width="80" /> 
               </div> 
               
               <div class="user-emoj">
                <i class="iconfont"></i> 
               </div> 
               <div class="user-name-info"> 
                <span class="user-time">{{$val->created_at}}</span> 
               </div> 
               <dl class="user-comment"> 
                <dt class="user-comment-content J_commentContent"> 
                 <p class="content-detail"> {{$val->content}} </p> 
                </dt> 
               </dl> 
            </li>
        @endforeach
           </ul> 
          </div> 
         </div> 
        </div> 
       </div> 
  </div>

@endsection
