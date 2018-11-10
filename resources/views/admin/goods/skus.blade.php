@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>skus表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>型号</th>
                    <th>颜色</th>
                    <th>原价</th>
                    <th>现价</th>
                    <th>图片</th>
                    <th>库存</th>
                    <th>状态</th>
                    <th>删除</th>
                    <th>修改</th>
                </tr>

                </thead>
                <tbody>
                @foreach($skus as $val)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$val->id}}</td>
                       <td>{{$val->title}}</td>
                       <td>{{$val->attr}}</td>
                       <td>{{$val->color}}</td>
                       <td>{{$val->falsePrice}}</td>
                       <td>{{$val->price}}</td>
                       <td><img src="{{$val->img}}" alt="" width="60"></td>
                       <td>{{$val->stock}}</td>
                       <td>{{$val->status}}</td>
                       <td><a href="" class="btn btn-info">删除</a></td>
                       <td><a href="" class="btn btn-info">修改</a></td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$skus->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection