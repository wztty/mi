@extends('admin.public.index')
@section('content')
    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Block Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/adminuser/{{$user->id}}" method="post">
                            <div class="mws-form-block">
                            
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择权限</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list">
                                            <li><input type="radio" value="1" name="level" checked> <label>普通用户</label></li>
                                            <li><input type="radio" value="2" name="level"> <label>会员</label></li>
                                            <li><input type="radio" value="3" name="level"> <label>超级管理员</label></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}} 
                            {{method_field('PUT')}} 
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>
                </div>
@endsection