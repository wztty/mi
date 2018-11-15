@extends('admin.public.index')
@section('content')<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>Inline Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/commentedit" method="post">
                    		<input type="hidden" name="id" value="{{$id}}">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">回复用户</label>
                    				<div class="mws-form-item" >
                    					<textarea rows="" cols="" class="large" name="content"></textarea>
                    				</div>
                    			</div>
                    		</div>
                    		{{csrf_field()}}
                    		<div class="mws-button-row">
                    			<input type="submit" value="回复" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
 @endsection