@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>用户表</span>
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
                       <td><img src="{{$val->showImg}}" alt="" width="60"></td>
                       <td>{{$val->status}}</td>
                       <td><a href="" class="btn btn-info">删除</a></td>
                       <td><a href="" class="btn btn-info">修改</a></td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$goods->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection