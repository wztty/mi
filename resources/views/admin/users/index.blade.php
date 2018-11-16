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
                    <th>ID</th>
                    <th>用户名</th>
                    <th>电话</th>
                    <th>邮件</th>
                    <th>权限</th>
                    <th>头像</th>
                    <th>状态</th>
                    <th>删除</th>
                    <th>修改</th>
                </tr>

                </thead>
                <tbody>
                @foreach($users as $val)
                   <tr style="text-align:center;cursor:pointer;">
                       <td>{{$val->id}}</td>
                       <td>{{$val->username}}</td>
                       <td>{{$val->phone}}</td>
                       <td>{{$val->email}}</td>
                       <td>
                        @if($val->level==3)
                          超级管理员
                        @elseif($val->level==2)
                          会员
                        @else
                          普通用户
                        @endif
                       </td>
                       <td><img src="{{$val->pic}}" alt="" width="60"></td>
                       <td>
                        @if($val->status==0)
                          正常
                        @else 
                          封禁
                        @endif
                       </td>
                       <td>
                         <form action="/adminuser/{{$val->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-info">删除</button>
                            
                         </form>
                       </td>
                       <td>
                         
                            <a href="/adminuser/{{$val->id}}/edit" class="btn btn-info">修改权限</a>
                          
                       </td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$users->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection