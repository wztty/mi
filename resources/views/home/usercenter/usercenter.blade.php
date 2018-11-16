 @extends('home.public')
  @section('center')
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
           <li> 暂无数据 </li> 
          </ul> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
  @endsection
