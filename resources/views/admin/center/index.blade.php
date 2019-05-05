@extends('admin.public.index')
@section('title','个人资料')
@section('content')
<html>
 <head></head>
 <body>
  
        <div class="mws-panel grid_4" style="border-top:1px solid red">
              <!--  <div class="mws-panel-header">
               <span>个人资料</span> 
              </div>  -->
               @if(session('success'))
                <div class="mws-form-message success">
                  {{session('success')}}
                </div>
                @endif
                @if(session('error'))
                <div class="mws-form-message error">
                    {{session('error')}}
                </div>
                @endif 
              <div class="mws-panel-body no-padding"> 
               <form class="mws-form" action="/update/data" method="post" enctype="multipart/form-data"> 
                {{csrf_field()}}
                <div class="mws-form-inline"> 
                 <div class="mws-form-row bordered"> 
                  <label class="mws-form-label">昵称</label> 
                  <div class="mws-form-item"> 
                   <input type="text" class="large" value="{{$info->nikename}}" name="nikename" /> 
                  </div> 
                 </div> 
                 <div class="mws-form-row bordered"> 
                  <label class="mws-form-label">头像</label> 
                  <div class="mws-form-item"> 
                   <img src="{{$info->pic}}" alt="头像" width="100"> 
                  </div> 
                 </div> 
                 <div class="mws-form-row bordered " > 
                  <label class="mws-form-label">修改头像</label> 
                  <div class="mws-form-item" > 
                   <input type="file" name="pic" ><br>
                  </div> 
                 </div> 

                 <div class="mws-form-row bordered"> 
                  <label class="mws-form-label">权限</label> 
                  <div class="mws-form-item"> 
                   @if($info->level==1)
                   普通用户
                   @elseif($info->level==2)
                   会员
                   @else
                   管理员
                   @endif

                  </div> 
                 </div> 
                 
                  <input type="hidden" value="{{$info->status}} name="status" ">

                  <div class="mws-form-row bordered"> 
                  <label class="mws-form-label">邮箱</label> 
                  <div class="mws-form-item"> 
                   <input type="text" class="large" name="email" value="{{$info->email}}" /> 
                  </div> 
                 </div> 

                  <div class="mws-form-row bordered"> 
                  <label class="mws-form-label">手机</label> 
                  <div class="mws-form-item"> 
                   <input type="text" class="large" name="phone"  value="{{$info->phone}}" /> 
                  </div> 
                 </div> 
                <div class="mws-button-row"> 
                 <input type="submit" value="修改" class="btn btn-danger" /> 
                 <input type="reset" value="重置" class="btn " /> 
                </div> 
               </form> 
              </div> 
 </body>
</html>

@endsection