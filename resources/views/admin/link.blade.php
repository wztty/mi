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
                       <td><a href="/dolink/?id={{$val->id}}" class="btn btn-info">通过审核</a></td>
                       <td><a href="/del/?id={{$val->id}}" class="btn btn-info">删除</a></td>
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