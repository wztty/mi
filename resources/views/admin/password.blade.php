@extends('admin.public.index')
@section('content')

  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>Inline Form</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/newpass" method="post"> 
		{{csrf_field()}}
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="username"  value="{{$info->username}}" disabled="true" /> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">旧密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="small" name="password" placeholder="旧密码"/> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">新密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="small" name="newpass" placeholder="新密码/最少六位"/> 
       </div> 
      </div> 

     <div class="mws-button-row"> 
      <input type="submit" value="修改" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>

@endsection