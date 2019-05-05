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
                    <th>用户名</th>
                    <th>手机</th>
                    <th>email</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                   
                 @foreach($data as $row)
                  
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->status}}</td>
                        <td></td>
                        <td>
                            <span class="btn-group">
                                <a href="" class="btn btn-small"><i class="icon-pencil"></i>删除</a>
                                <a href="" class="btn btn-small"><i class="icon-trash">修改</i></a>
                            </span>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Panels End -->
@endsection