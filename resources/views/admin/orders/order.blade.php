@extends('admin.public.index');
@section('title','订单管理');
@section('content')
				
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
				       <th>物流状态</th> 
				       <th>修改物流状态</th>
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
				       待发货
				       @elseif($val->order_status == 1)
				       正在发货
				       @elseif($val->order_status == 2)
				       确认收货
				       @elseif($val->order_status == 3)
				       交易完成
				       @endif
				       </td>
				       <td><a href="/update/status?id={{$val->id}}" class="btn btn-info">
				      
						修改
				       </a></td>
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