@extends('admin.public.index')
@section('title','轮播图添加')
@section('content')
<html>
	<head></head>
	<body>
   <div class="mws-panel grid_8">

		<div class="mws-panel-header">
			<span>轮播图添加</span>
		</div>
		<div class="mws-panel-body no-padding">
			<form class="mws-form" action="/adminsowing" method="post" enctype="multipart/form-data">
				上传图片:<input type="file" name="pic"><br/>
					
			<div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <input type="radio" title="" name="status" value="1" checked>上架
                            <input type="radio" title="" name="status" va1ue="0">下架
                        </div>
                    </div>
			
				
					{{csrf_field()}}
				 <input type="submit" value="提交" calss="btn btn-success">
				
			</form>
		</div>
	</div>
	</body>
	<script type="text/javascript">
 
 </script>
	</html>
@endsection