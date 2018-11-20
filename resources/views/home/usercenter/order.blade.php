@extends('home.public')
@section('centen')
<html>
 <head>
     <style>
        li{list-style:none;}
        .del{display:block;width:40px;height:20px;margin:10px;margin-left:800px;}
     </style>
     <script src="/static/js/jquery-1.8.3.min.js"></script>
 </head>
 <body>
     <div class="span16"> 
       <div class="uc-box uc-main-box"> 
        <div class="uc-content-box order-list-box"> 
         <div class="box-hd"> 
          <h1 class="title">我的订单<small>请谨防钓鱼链接或诈骗电话，<a href="//www.mi.com/service/buy/antifraud/" target="_blank">了解更多&gt;</a></small></h1> 
          <div class="more clearfix"> 
           <ul class="filter-list J_orderType"> 
            <li class="first"><a href="/user/order">全部有效订单</a></li> 
            <li><a id="J_unpaidTab" href="/user/order?s=0" data-type="0">待支付0</a></li> 
            <li><a id="J_unpaidTab" href="/user/order?s=1" data-type="1">待发货0</a></li> 
            <li><a id="J_sendTab" href="/user/order?s=2" data-type="2">待收货0</a></li>
            <!--
                                        <li><a href="http://dami.com/user/order?s=10" data-type="5">已关闭</a></li> --> 
           </ul> 
          </div> 
         </div> 
         <div class="box-bd"> 
          <div id="J_orderList"> 
           <div class="loading hide">
            <div class="loader"></div>
           </div> 
          </div> 
          <div id="J_orderListPages"> 
           <ul class="order-list">
                @foreach($order as $val )

                <li class="uc-order-item uc-order-item-pay "> 
                   <div class="order-detail">
                    <div class="order-summary"> 
                     <div class="order-status">
                      @if($val->pay_status==0)
                      等待支付
                      @elseif($val->pay_status==1)
                      已支付
                      @endif
                      
                     </div> 
                     <?php 
                          $total = '';

                          $goods = \App\Http\Controllers\home\UserController::getgoods($val->id); 

                          foreach ($goods as $key => $value) {
                            
                            $total += $value->price * $value->num;
                          }


                      ?>
                     <p class="order-desc J_deliverDesc"> 现在支付，预计2-3天送达 <span class="beta">Beta</span> </p> 
                    </div>
                    <table class="order-detail-table"> 
                     <thead> 
                      <tr> 
                       <th class="col-main"> <p class="caption-info"> {{$val->created_at}} <span class="sep">|</span> {{$val->consignee}} <span class="sep">|</span> 订单号： <a href="/user/orderView?num={{$val->order_num}}">{{$val->order_num}}</a> <span class="sep">|</span> 在线支付 </p> </th> 
                       <th class="col-sub"> <p class="caption-price"> 订单金额： <span class="num">{{$total}}</span> 元 </p> </th> 
                      </tr> 
                     </thead> 
                     <tbody> 
                      <tr> 
                       <td class="order-items"> 
                        <ul class="goods-list">
                        

                        @foreach($goods as $value)
                            <?php $imgs = \App\Http\Controllers\home\UserController::getimg($value->sku_id); $num=''; ?>
                             <li> 
                              <div class="figure figure-thumb"> 
                               <a href="/detail?id={{$imgs->id}}" target="_blank"> <img src="{{$imgs->img}}" width="80" height="80" alt="{{$value->goods_name}}" /></a> 
                              </div> <p class="name"> <a target="_blank" href="/detail?id=3">{{$value->goods_name}} </a> </p> <p class="price">{{$value->price}}元 &times; {{$value->num}} = {{$num = $value->price * $value->num}}  </p>  
                            </li>
                            
                        @endforeach
                        </ul> </td> 

                       <td class="order-actions"> <a class="btn btn-small btn-primary" href="/order/pay?id=23" target="_blank">
                       @if($val->pay_status == 0)
                       立即支付
                      @elseif($val->pay_status == 1)
                        已付款
                      @endif
                       </a> 
                       </td>
                      </tr> 
                     </tbody> 
                    </table> 
                   </div> 
                  
                    <a href="javascript:void(0);" class="del">删除</a>
                    <input type="hidden" value="{{$val->id}}" class="int">
            </li>
            @endforeach
           </ul> 

          </div> 
         </div> 
        </div> 
       </div> 
    </div>
 </body>
 <script>
    $('.del').click(function(){

      //获得id
    var id = $(this).next().val();
    var s = $(this).parents('.uc-order-item');
      //使用ajax
    $.get('/delorder',{id:id},function(data){

        if(data == 1)
        {
            s.remove();
            confirm("确认要删除？");
        }else{

          alert('系统繁忙');
        }
    });

    });
 </script>
</html>
@endsection

