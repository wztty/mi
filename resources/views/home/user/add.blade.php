<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0035)http://mm.com/user.php?act=register -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<script type="text/javascript" src="/static/homes/common/js/jquery.json.js"></script>
<script type="text/javascript" src="/static/homes/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="/static/homes/common/js/utils.js"></script>
<script type="text/javascript" src="/static/homes/common/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/static/homes/common/js/xiaomi_common.js"></script>
<script>
    $(function(){

        //加载清空文本框
        $("input:text,input:password").val("");

        //提示文字隐藏显示效果
        //登录界面
        $(".enter-area .enter-item").focus(function(){
            if($(this).val().length==0){
                $(this).siblings(".placeholder").addClass("hide");
            }
        }).blur(function(){
            if($(this).val().length==0){
                $(this).siblings(".placeholder").removeClass("hide");
            }
        }).keyup(function(){
            if($(this).val().length>0){
                $(this).siblings(".placeholder").addClass("hide");
            }else{
                $(this).siblings(".placeholder").removeClass("hide");
            }
        });
        //注册界面
        $(".inputbg input").focus(function(){
            $('#error').remove();

            if($(this).val().length>0){
                $(this).parent().siblings(".t_text").addClass("hide");
            }
        }).blur(function(){
            if($(this).val().length==0){
                $(this).parent().siblings(".t_text").removeClass("hide");
            }
        }).keyup(function(){
            if($(this).val().length>0){
                $(this).parent().siblings(".t_text").addClass("hide");
            }else{
                $(this).parent().siblings(".t_text").removeClass("hide");
            }
        });

        //其它登录方式
        $("#other_method").click(function(){
            if($(".third-area").hasClass("hide")){
                $(".third-area").removeClass("hide");
            }else{
                $(".third-area").addClass("hide");
            }
        })
    })
</script>
<div class="register_wrap">
    <div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="/" class="fl-l" style="margin-left: 450px"><img src="/static/homes/common/image/logo.gif" width="55" /></a>
        </div>
    </div>
    <div id="main">
        <div class="n-frame device-frame reg_frame">
            <div class="title-item dis_bot35 t_c">
                <h4 class="title-big">添加收货地址</h4>
            </div>
            <div class="regbox" id="register_box">
                <form action="/add" method="post" name="formUser" onsubmit="return submitPwdInfo();">
                    <input type="hidden" value="C4E1AB9A7DE79D7C750E8916875E7DBE" id="validate" />
                    <div class="phone_step1">
                        <style type="text/css">
                            #error{
                                color: orangered;
                                text-align: center;
                            }
                        </style>
                        <input type="hidden" id="sendtype" />
                        <div class="inputbg">
                            <label class="labelbox"> <input type="text" name="consignee" id="consignee" placeholder="收件人" value="{{old('consignee')}}" /> </label>
                            <span class="t_text">收件人</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="username_notice">
                            <em></em>
                        </div>
                        <input type="hidden" id="sendtype" />
                        <div class="inputbg">
                            <label class="labelbox"> <input type="text" name="tel" id="phone" placeholder="手机号码" value="{{old('tel')}}"/> </label>
                            <span class="t_text">手机号码</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="username_notice">
                            <em></em>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox"> <input name="province" type="text" placeholder="省份" value="{{old('province')}}"/> </label>
                            <span class="t_text">省份</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="email_notice">
                            <em></em>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox"> <input type="text" name="city"  onblur="check_password(this.value);" onkeyup="check_password(this.value);checkIntensity(this.value);" placeholder="城市" /> </label>
                            <span class="t_text">城市</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="password_notice">
                            <em></em>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox"> <input name="district" type="text"  onblur="check_conform_password(this.value);" onkeyup="check_conform_password(this.value);" placeholder="区/县" /> </label>
                            <span class="t_text">区/县</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="conform_password_notice">
                            <em></em>
                        </div>
                         <div class="inputbg">
                            <label class="labelbox"> <input name="address" type="text"  onblur="check_conform_password(this.value);" onkeyup="check_conform_password(this.value);" placeholder="详细地址" /> </label>
                            <span class="t_text">详细地址</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="conform_password_notice">
                            <em></em>
                        </div>
                         <div class="inputbg">
                            <label class="labelbox"> <input name="postcode" type="text"  onblur="check_conform_password(this.value);" onkeyup="check_conform_password(this.value);" placeholder="邮政编码" /> </label>
                            <span class="t_text">邮编</span>
                            <span class="error_icon"></span>
                        </div>
                        <div class="err_tip" id="conform_password_notice">
                            <em></em>
                        </div>
                        
                        <div class="err_tip">
                            <em></em>
                        </div>
                        <div class="law">

                        </div>
                        <div class="err_tip">
                            <em></em>
                        </div>
                        <div class="fixed_bot mar_phone_dis1">
                            {{csrf_field()}}
                            <input type="submit" value="添加新地址" class="btn332 btn_reg_1 submit-step" />
                        </div>
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
</body>
</html>