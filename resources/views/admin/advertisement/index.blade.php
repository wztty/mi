@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>广告列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>广告名</th>
                    <th>图片</th>
                    <th>状态</th>
                    <th>添加</th>
                    <th>修改</th>
                    <th>删除</th>
                </tr>

                </thead>
                <tbody>
                @foreach($data as $value)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$value->id}}</td>
                       <td>{{$value->name}}</td>
                       <td><img width="100px" src="{{$value->img}}"></td>
                       <td>{{$value->status}}</td>
                       <td><a href="/gg/create" class="btn btn-info">添加</a></td>
                       <td><a href="/gg/{{$value->id}}/edit" class="btn btn-info">修改</a></td>
                       <td><form action="/gg/{{$value->id}}" method="post">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <button type="submit" class="btn btn-success">删除</button>
                       </form></td>
                   </tr>
                @endforeach
                </tbody>
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </table>
                <div class="goodsTables_paginate paging_full_numbers" id="pages">
              {{$data->appends($request)->render()}}
                </div>
               
        </div>
    </div>
@endsection