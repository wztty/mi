<?php

//发送短信校验码
function sendsphone($phone){
//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='fc2345e5ebdb1c244789627b0623cb25';
//填写在开发者控制台首页上的Auth Token
$options['token']='8f632969038add6338709a9ef91eeae4';
//初始化 $options必填
$ucpass = new Ucpaas($options);
$appid = "ed3185d8f4ea45a493e0d0fedbd8252b"; //应用的ID，可在开发者控制台内的短信产品下查看
$templateid = "396344"; //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID

$param = rand(1,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
\Cookie::queue('scode',$param,1);
$mobile = $phone;
$uid = "";
//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}
 ?>