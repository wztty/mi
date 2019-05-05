@extends('admin.public.index')
@section('title','订单管理')
@section('content')
				<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
				  <div class="mws-panel grid_8"> 
				   <div class="mws-panel-header"> 
				    <span><i class="icon-table"></i>订单管理</span> 
				   </div> 
				   <div class="mws-panel-body no-padding"> 
				    <table class="mws-table" > 
				     <thead> 
				      <tr> 
				       <th>ID</th> 
				       <th>收件人</th> 
				       <th>电话</th>
				       <th>商品总价</th>
				       <th>详细地址</th> 
				       <th>支付状态</th> 
				       <th>订单状态</th> 
				       <th>发货</th>
				       <th>订单详情</th>
				      </tr> 
				     </thead> 
				     <tbody> 
					@foreach($order as $val)
				      <tr style="text-align:center;"> 
				       <td>{{$val->id}}</td> 
				       <td>{{$val->consignee}}</td> 
				       <td>{{$val->phone}}</td> 
				       <td>{{$val->total_price}}</td> 
				       <td>{{$val->address}}</td> 
				       <td>
				       @if($val->pay_status == 0)
				       未支付
				       @elseif($val->pay_status == 1)
				       已支付
				       @endif
				       </td> 
				       <td>
				       @if($val->order_status == 0)
				       提交订单
				       @elseif($val->order_status == 1)
				       未发货
				       @elseif($val->order_status == 2)
				       待收货
				       @elseif($val->order_status == 3)
				       已收货
				       @elseif($val->order_status == 4)
					   退货中
				       @elseif($val->order_status == 8)
					   正在发货
				       @elseif($val->order_status == 6)
				       订单完成
				       @elseif($val->order_status == 6)
				       退货完成
				       @endif
				       </td>
				       <td><a href="javascript:void(0);" class="btn btn-info update"> 
						发货
				       </a></td>
				       <td><a href="/showorder?id={{$val->id}}" class="btn btn-info">订单详情</a></td>
				      </tr> 
				    @endforeach  
				     </tbody> 
				    </table> 
				    <div class="dataTables_paginate paging_full_numbers" id="pages">
				      {{$order->appends($request)->render()}}
				     </div>
				   </div> 
				  </div>
@endsection

@section('js')
<script>
	$('.update').click(function(){
		//找到id
		id = $(this).parents('tr').find("td:first").html();
		//定义本身
		a = $(this);
		b = $(this).parent().prev();
		//使用ajax
		$.get('/order/edit',{id:id},function(data){

			if(data == 1){

				a.html('已发货');
				b.html('已发货');
				a.attr('disabled',true);
			}else if(data == 2){

				alert('系统繁忙');
			}else if(data == 3)
			{
				alert('商品已经发货了');
				a.attr('disabled',true);
			}
		});
	});
</script>
@endsection