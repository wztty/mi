@extends('home.layout.index')
@section('title','个人中心')
@section('css')
<link rel="stylesheet" href="/static/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/static/homes/common/css/main.min.css" />
<link rel="stylesheet" href="/static/homes/common/css/address-edit.min.css" />
@endsection

@section('content')
   <div class="breadcrumbs"> 
   <div class="container"> 
    <a href="//www.mi.com/index.html">首页</a> 
    <span class="sep">&gt;</span> 
    <span>商品评价</span> 
   </div> 
  </div>
    
   <div class="page-main user-main"> 
   <div class="container"> 
    <div class="row"> 
     <div class="span4"> 
      <div class="uc-box uc-sub-box"> 
       <div class="uc-nav-box"> 
        <div class="box-hd"> 
         <h3 class="title">订单中心</h3> 
        </div> 
        <div class="box-bd"> 
         <ul class="uc-nav-list"> 
          <li> <a href="/userorder">我的订单</a> </li> 
          <li> <a href="/usercomment">评价晒单</a> </li> 
         </ul> 
        </div> 
       </div> 
       <div class="uc-nav-box"> 
        <div class="box-hd"> 
         <h3 class="title">个人中心</h3> 
        </div> s
        <div class="box-bd"> 
         <ul class="uc-nav-list"> 
          <li class="active"> <a href="/useraddress">收货地址</a> </li> 
          <li class="active"> <a href="/userdata">个人资料</a> </li>
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
     @section('centen')

      
    @show
    </div> 
   </div> 
  </div>  

@endsection

@section('js')
<script src="/static/homes/common/myjs/jquery.min.js"></script>
<script src="/data/indexNav.js"></script>
<script src="/data/indexData.js"></script>
<script src="/static/homes/common/myjs/common.js"></script>
@endsection
