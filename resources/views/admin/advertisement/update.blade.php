@extends('admin.public.index')
@section('title','修改广告')
@section('content')

   <div class="mws-panel grid_8">

        <div class="mws-panel-header">
            <span>修改广告</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/gg/{{$data->id}}" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">广告名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="name" value="{{$data->name}}">
                        </div>
                    </div>
                </div>
                        <div class="mws-form-inline">
                        <div class="mws-form-row" style="width:490px">
                        <label class="mws-form-label">广告图片</label>
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="img" value="{{$data->img}}">
                        </div>
                     </div>
                </div>
                
                <div class="mws-button-row">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="submit" value="提交修改" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection