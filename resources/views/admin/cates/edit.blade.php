@extends('admin.public.index')
@section('title','添加分类')
@section('content')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>添加分类</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincates/{{$info->id}}" method="post"  enctype="multipart/form-data"> 
    {{method_field('PUT')}}
        <input type="hidden" value="{{$info->status}} name="status" ">
        <input type="hidden" value="{{$info->img}} name="img" ">
     <div class="mws-form-block"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" placeholder="不选择父类默认为顶级分类" name="name" value="{{$info->name}}" /> 
       </div> 
      </div> 
        
      <div class="mws-form-row"> 
       <label class="mws-form-label">选择父类</label> 
       <div class="mws-form-item"> 
        <select class="small" name="pid"> 
        <option value="0">--请选择--</option> 
		@foreach($data as $val)
        <option value="{{$val->id}}">{{$val->name}}</option> 
		@endforeach
         </select> 
       </div> 
      </div> 
       <div class="mws-form-row"> 
       <label class="mws-form-label">原图片</label> 
       <div class="mws-form-item"> 
        <img src="{{$info->img}}" alt="" width="200">
       </div> 
      </div> 

      <div class="mws-form-row"> 
	       <label class="mws-form-label">上传图片</label> 
	       <div class="mws-form-item"> 
	  文件:<input type="file" name="img" style="width:200px;"><br> 
	       </div> 
       </div>

     </div> 
     <div class="mws-button-row"> 
    {{csrf_field()}}
      <input type="submit" value="修改" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection