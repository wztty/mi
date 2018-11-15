@extends('home.public')
@section('centen')
        <div class="span16"> 
         <div class="uc-box uc-main-box"> 
          <div class="uc-content-box"> 
           <div class="box-hd"> 
            <h1 class="title">收货地址</h1> 
           </div>

           <div class="box-bd"> 
            <div class="user-address-list J_addressList clearfix"> 
             <div class="address-item address-item-new" data-type="" id="J_newAddress"> 
              <i class="iconfont"></i> <a href="/add">添加新地址</a> 
             </div>

             @if(!empty($address))
             @foreach($address as $val)
              <div class="address-item J_addressItem selected" id="div">
                   <dl>
                    <dt>
                     <em class="uname">{{$val->consignee}}</em>
                    </dt>
                    <dd class="utel">
                     {{$val->tel}}
                    </dd>
                    <dd class="uaddress">
                     {{$val->province}} {{$val->city}} {{$val->district}}
                     <br />{{$val->address}}

                    </dd>
                   </dl>
                   <input type="hidden" value="{{$val->id}}" id="inp">
                   <div class="actions">
                    <a href="javascript:void(0)" data-id="1" class="modify J_addressModify">修改</a>
                    <a href="javascript:void(0)" class="modify J_addressDel del" >删除</a>
                   </div>
                  </div>
              @endforeach
              @endif

            </div> 
           </div> 
          </div> 
         </div> 
        </div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<script>
  $('.del').click(function(){
    //获得id
    id = $(this).parent().prev().val(); 
    //获取祖先元素
    p=$(this).parents('#div');
    //使用ajax
    $.get('/deladdress',{id:id},function(data){

          if(data == 1){

            p.remove();

             alert('删除成功');
          }else{

            alert('系统繁忙');
          }
    });

  });
</script>
@endsection