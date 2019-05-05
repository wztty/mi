@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>商品列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>类别</th>
                    <th>起价</th>
                    <th>图片</th>
                    <th>状态</th>
                    <th>删除</th>
                    <th>修改</th>
                </tr>

                </thead>
                <tbody>
                @foreach($goods as $val)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$val->id}}</td>
                       <td>{{$val->title}}</td>
                       <td>
                       <?php 
                          echo   $names=\App\Http\Controllers\admin\GoodsController::lookcate($val->cate_id);
                        ?> 
                       </td>
                       <td>{{$val->price}}</td>
                       <td><img src="{!!$val->img!!}" alt="" width="60"></td>
                       <td>{{$val->status}}</td>
                       <td><form action="/admingoods/{{$val->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}

            <button type="submit" class="btn btn-success">删除</button>
          </form></td>
                       <td><a href="/admingoods/{{$val->id}}/edit" class="btn btn-info">修改</a></td>
                   </tr>
                @endforeach
                </tbody>
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$goods->appends($request)->render()}}
                </div>
               
        </div>
    </div>
@endsection