@extends('admin.public.index')
@section('title','订单详情')
@section('content')
				<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
				  <div class="mws-panel grid_8"> 
				   <div class="mws-panel-header"> 
				    <a href="/admin/order"><i class="icon-bended-arrow-left"></i></a> 
				   </div> 
				   <div class="mws-panel-body no-padding"> 
				    <table class="mws-table" > 
				     <thead> 
				      <tr> 
				       <th>商品名</th> 
				       <th>型号</th> 
				       <th>颜色</th>
				       <th>数目</th>
				       <th>单价</th> 
				       <th>下单时间</th> 
				      </tr> 
				     </thead> 
				     <tbody> 
				 @if(!empty($goods))
					@foreach($goods as $val)
				      <tr style="text-align:center;"> 
				       <td>{{$val->goods_name}}</td> 
				       <td>{{$val->goods_attr}}</td> 
				       <td>{{$val->color}}</td> 
				       <td>{{$val->num}}</td> 
				       <td>{{$val->price}}</td> 
				       <td>{{$val->created_at}}</td> 
				      </tr> 
				    @endforeach 
				  @else
				  <td colspan="6">暂无数据</td>

				  @endif 
				     </tbody> 
				    </table> 
				    <div class="dataTables_paginate paging_full_numbers" id="pages">
				      {{$goods->appends($request)->render()}}
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