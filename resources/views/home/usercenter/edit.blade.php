<html>
 <head>
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0" /> 
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
 </head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>收货地址修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/doeditaddress" method="post"> 
       <input type="hidden" class="small" name="id" value="{{$info->id}}" /> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">收件人</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="consignee" value="{{$info->consignee}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">收件人电话</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="tel" value="{{$info->tel}}"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">省会</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="province" value="{{$info->province}}"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">城市</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="city" value="{{$info->city}}"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">区/县</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="district" value="{{$info->district}}"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">详细地址</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="address" value="{{$info->address}}"  /> 
       </div> 
      </div>
       <div class="mws-form-row"> 
       <label class="mws-form-label">邮政编码</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="postcode" value="{{$info->postcode}}"  /> 
       </div> 
      </div>  
      
      {{csrf_field()}}
     <div class="mws-button-row"> 
      <input type="submit" value="修改" class="btn btn-danger" /> 
      <input type="reset" value="重置" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>