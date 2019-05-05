@extends('home.public')
@section('title','个人中心')
@section('css')
<link rel="stylesheet" href="/static/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/static/homes/common/css/main.min.css" />
<link rel="stylesheet" href="/static/homes/common/css/address-edit.min.css" />
 <!-- Plugin Stylesheets firs to ease overrides --> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/plugins/colorpicker/colorpicker.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/custom-plugins/wizard/wizard.css" media="screen" /> 
  <!-- Required Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/bootstrap/css/bootstrap.min.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/fonts/ptsans/stylesheet.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/fonts/icomoon/style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/mws-style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/icons/icol16.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/icons/icol32.css" media="screen" /> 
  <!-- Demo Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/demo.css" media="screen" /> 
  <!-- jQuery-UI Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/jui/css/jquery.ui.all.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/jui/jquery-ui.custom.css" media="screen" /> 
  <!-- Theme Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/mws-theme.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/themer.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admin/b/css/my.css" media="screen" />

@endsection

@section('centen')
   
        

      <!--   个人资料 -->

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
               <form class="mws-form" action="/dataedit" method="post" enctype="multipart/form-data"> 
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
 
@endsection

@section('js')
<script src="/static/homes/common/myjs/jquery.min.js"></script>
<script src="/data/indexNav.js"></script>
<script src="/data/indexData.js"></script>
<script src="/static/homes/common/myjs/common.js"></script>
<script src="/static/admin/b/js/libs/jquery-1.8.3.min.js"></script> 
  <script src="/static/admin/b/js/libs/jquery.mousewheel.min.js"></script> 
  <script src="/static/admin/b/js/libs/jquery.placeholder.min.js"></script> 
  <script src="/static/admin/b/custom-plugins/fileinput.js"></script> 
  <!-- jQuery-UI Dependent Scripts --> 
  <script src="/static/admin/b/jui/js/jquery-ui-1.9.2.min.js"></script> 
  <script src="/static/admin/b/jui/jquery-ui.custom.min.js"></script> 
  <script src="/static/admin/b/jui/js/jquery.ui.touch-punch.js"></script> 
  <!-- Plugin Scripts --> 
  <script src="/static/admin/b/plugins/datatables/jquery.dataTables.min.js"></script> 
  <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]--> 
  <script src="/static/admin/b/plugins/flot/jquery.flot.min.js"></script> 
  <script src="/static/admin/b/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script> 
  <script src="/static/admin/b/plugins/flot/plugins/jquery.flot.pie.min.js"></script> 
  <script src="/static/admin/b/plugins/flot/plugins/jquery.flot.stack.min.js"></script> 
  <script src="/static/admin/b/plugins/flot/plugins/jquery.flot.resize.min.js"></script> 
  <script src="/static/admin/b/plugins/colorpicker/colorpicker-min.js"></script> 
  <script src="/static/admin/b/plugins/validate/jquery.validate-min.js"></script> 
  <script src="/static/admin/b/custom-plugins/wizard/wizard.min.js"></script> 
  <!-- Core Script --> 
  <script src="/static/admin/b/bootstrap/js/bootstrap.min.js"></script> 
  <script src="/static/admin/b/js/core/mws.js"></script> 
  <!-- Themer Script (Remove if not needed) --> 
  <script src="/static/admin/b/js/core/themer.js"></script> 
  <!-- Demo Scripts (remove if not needed) --> 
  <script src="/static/admin/b/js/demo/demo.dashboard.js"></script>  
@endsection
aaaaaaaaaaaaaaaas