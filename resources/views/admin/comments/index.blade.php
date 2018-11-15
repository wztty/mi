@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>评论查看</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>评论内容</th>
                    <th>商品id</th>
                    <th>用户id</th>
                    <th>图片</th>
                     <th>pid</th>
                    <th>path</th>
                    <th>评论星级</th>
                    <th>状态</th>
                    <th>删除</th>
                    <th>修改</th>
                </tr>

                </thead>
                <tbody>
                @foreach($comments as $val)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$val->id}}</td>
                       <td>{{$val->content}}</td>
                       <td>
                          {{$val->good_id}}
                       </td>
                       <td>{{$val->user_id}}</td>
                       <td><img src="{{$val->img}}" alt="" width="60"></td>
                       <td>{{$val->pid}}</td>
                       <td>{{$val->path}}</td>
                       <td>{{$val->star}}</td>
                       <td>{{$val->status}}</td>
                       <td><a href="/commentdel?id={{$val->id}}" class="btn btn-info" id="btn">删除</a></td>
                       <td><a href="/reply?id={{$val->id}}" class="btn btn-info">商家回复</a></td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$comments->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection