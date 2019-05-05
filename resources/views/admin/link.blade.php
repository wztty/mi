@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>友情链接表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>链接名字</th>
                    <th>地址</th>
                    <th>状态</th>
                    <th>审核</th>
                    <th>删除</th>
                </tr>

                </thead>
                <tbody>
                @foreach($links as $val)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$val->id}}</td>
                       <td>{{$val->title}}</td>
                       <td>{{$val->url}}</td>
                       <td>
                        @if($val->status==0)
                          正在审核
                        @else
                         用过审核
                        @endif
                       </td>
                       <td><a href="javascript:void(0);" class="btn btn-info change">通过审核</a></td>
                       <td><a href="javascript:void(0);" class="btn btn-info del">删除</a></td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$links->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
<script>
  $('.change').click(function(){
    var id = $(this).parents('tr').find('td:first').html();
    var s = $(this).parent().prev();
    //alert(id);
    $.get('/dolink',{id:id},function(data){

        if(data == 1){
          s.html('用过审核');
          alert('用过审核');
        }else if(data == 2)
        {
          alert('系统繁忙');
        }else{
          alert('网站已经审核过了');
        }
    });
  });
</script>

<!-- ajax删除 -->
<script>
    $('.del').click(function(){

      var id = $(this).parents('tr').find('td:first').html();
      var p = $(this).parents('tr');

      $.get('/del',{id:id},function(data){

        if(data == 1){
          p.remove();
          alert('删除成功');
        }else{
          alert('删除失败');
        }
      });
    });
</script>
@endsection