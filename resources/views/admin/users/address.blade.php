@extends('admin.public.index')
@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>用户收货地址</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>收货人</th>
                    <th>电话</th>
                    <th>省份</th>
                    <th>城市</th>
                    <th>区/县</th>
                    <th>详细地址</th>
                    <th>邮编</th>
                    <th>删除</th>
                </tr>

                </thead>
                <tbody>
                @foreach($address as $val)
                   <tr style="text-align:center;cursor:pointer;">
                      <td>{{$val->id}}</td>                  
                      <td>  <?php  echo $user = \App\Http\Controllers\admin\UserController::lookcate($val->user_id);?></td>
                      <td>{{$val->consignee}}</td>
                      <td>{{$val->tel}}</td>
                      <td>{{$val->province}}</td>
                      <td>{{$val->city}}</td> 
                      <td>{{$val->district}}</td>
                      <td>{{$val->address}}</td>
                      <td>{{$val->postcode}}</td>
                      <td><a href="/addressdel?id={{$val->id}}" class="btn btn-info">删除</a></td>
                   </tr>
                @endforeach
                </tbody>

            </table>
                <div class="dataTables_paginate paging_full_numbers" id="pages">
              {{$address->appends($request)->render()}}
                </div>
        </div>
    </div>
@endsection