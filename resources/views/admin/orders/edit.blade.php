@extends('admin.public.index');
@section('title','物流修改');
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>Block Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/order/edit?id={{$info->id}}" method="post">
                    	{{csrf_field()}}
                    		<div class="mws-form-block">
     	
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">物流状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list">
                    						<li><input type="radio" name="order_status" checked value="1"> <label>正在发货</label></li>
                    						<li><input type="radio" name="order_status" value="3"> <label>交易完成</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="修改" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>
                </div>		
				 
@endsection