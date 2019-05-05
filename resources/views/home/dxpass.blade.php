<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0035)http://mm.com/user.php?act=register -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <style type="text/css">
  .cur{
    border:1px solid red;
  }

  .curs{
    border:1px solid green;
  }
  </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="Generator" content="ECSHOP v2.7.3" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>小米官网</title>

    <link href="/static/homes/common/css/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/static/homes/common/js/common.js"></script>
    <script type="text/javascript" src="/static/homes/common/js/user.js"></script>
    <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
    <style>
        .error_icon{color:red;font-size:16px;margin-top: 5px;display: block;}
    </style>
</head>
<body>

<script type="text/javascript" src="/static/homes/common/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/static/homes/common/js/jquery.json.js"></script>
<script type="text/javascript" src="/static/homes/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="/static/homes/common/js/utils.js"></script>
<script type="text/javascript" src="/static/homes/common/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/static/homes/common/js/xiaomi_common.js"></script>

<div class="register_wrap">
    <div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="/" class="fl-l" style="margin-left:450px;"><img src="/static/homes/common/image/logo.gif" width="55" /></a>
        </div>
    </div>
    <div id="main">
        <div class="n-frame device-frame reg_frame">
            <div class="title-item dis_bot35 t_c">
                <h4 class="title-big">重置密码</h4>
            </div>
            <div class="regbox" id="register_box">
                <form action="/onmjbk" method="get" name="formUser" onsubmit="return submitPwdInfo();">
                    <input type="hidden" value="C4E1AB9A7DE79D7C750E8916875E7DBE" id="validate" />
                    <div class="phone_step1">


                        <input type="hidden" id="sendtype" />

                        <div class="inputbg">
                            <input type="text" value="" name="phone" class="labelbox" style="height:35px;width:330px" placeholder="&nbsp;手机号码" value="{{old('phone')}}"/><span></span>
                            <button style="width:90px;margin-left: 0px;margin-right: 0px;" type="button" class="btn btn332 btn_reg_1" id="btn">发送验证码</button>
                            
                        </div>
                        
                       <div class="inputbg">
                            <input type="text" name="codes" id="codess" class="labelbox" style="height:35px;width:330px" placeholder="&nbsp;输入验证码" value="{{old('code')}}"/><span></span>
                            <span class="t_text">验证码</span>
                            <span class="error_icon">{{$errors->first('codes')}}</span>
                        </div>
                        <div class="err_tip" id="conform_password_notice">
                            <em></em>
                        </div>
                        <div class="ng-link-area">
                            <a href="/pas">邮箱验证</a></div>
                        <div class="fixed_bot mar_phone_dis1">
                            {{csrf_field()}}
                            <input name="Submit" id="ty" type="submit" value="确定提交" class="btn332 btn_reg_1 submit-step" />
                        </div>
                        {{csrf_field()}}
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="n-footer">
        <div class="nl-f-nav">
        </div>
        <p class="nf-intro"><span>&copy;<a href="http://mm.com/user.php?act=register#">mi.com</a> 京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号 <a href="http://mm.com/user.php?act=register#">京网文[2014]0059-0009号</a></span></p>
    </div>
</div>
<script>

 // alert($);
 //获取焦点
 $("input").focus(function(){
  //获取reminder属性值
  reminder=$(this).attr("reminder");
  $(this).next("span").css('color',"red").html(reminder);
  //样式清除
  $(this).removeClass("curs");
  //添加样式
  $(this).addClass('cur');
 });

 //手机号校验
 $("input[name='phone']").blur(function(){
  o=$(this);
  //获取手机号
  p=$(this).val();
  //匹配
  if(p.match(/^\d{11}$/)==null){
    // alert("请输入手机号码");
    $(this).next("span").css('color',"red").html("手机号码不正确");
    o.next("span").next("button").html("发送验证码");
    $(this).addClass('cur');
     o.next("span").next("button").attr("disabled",true);
    
  }else{
    // alert('ok');
    //Ajax 校验手机号码是否重复
    $.get("/xurl",{p:p},function(data){
      // alert(data);
      if(data==1){
        o.next("span").next("button").html("发送验证码"); 
        o.next("span").next("button").attr("disabled",false);
        o.next("span").css('color','green').html("√");
      }else{
        o.next("span").next("button").html("没有该用户");
        o.next("span").next("button").attr("disabled",true);
        o.next("span").css('color','red').html("×");


        
      }
    });
  }
 });
//获取校验码
 $("#btn").click(function(){
    // alert($);
  a=$(this);
  //获取手机号
  pp=$("input[name='phone']").val();

  //Ajax
  $.get("/codeget",{pp:pp},function(data){
     //alert(data.code);
    if(data.codes==000000){
      //执行倒计时
      m=60;
      mytime=setInterval(function(){
        m--;
        //赋值
        $("#btn").html(m+"秒后重新发送");
        //按钮禁用
         $("#btn").attr("disabled",true);
        if(m==0){
          //清除定时器
          clearInterval(mytime);
          $("#btn").html("重新发送");
          //按钮激活
          $("#btn").attr("disabled",false);
        }
      },1000);
    }
  },'json');
 });

 //输入校验码检测
 $("input[name='codes']").blur(function(){
  i=$(this);
  //获取输入的校验码
  codes=$(this).val();
  //Ajax
  $.get("/checkcode",{codes:codes},function(data){
    // alert(data);
    if(data==1){
      i.next("span").css("color",'green').html('√');
      i.addClass("curs");
        
    }else if(data==2){
       i.next("span").css("color",'red').html('×验证码不正确');
      i.addClass("cur");
      
    }else if(data==3){
       i.next("span").css("color",'red').html('×验证码为空');
      i.addClass("cur");
      
    }else{
       i.next("span").css("color",'red').html('×验证码过期');
      i.addClass("cur");
      
    }
  });
 });

$('#ty').click(function(){
    if($('#codes').val()==''){
        $('#ty').attr("disabled",true);
        alert('请输入验证码')
    }else{

    }
})
</script>
</body>
</html>