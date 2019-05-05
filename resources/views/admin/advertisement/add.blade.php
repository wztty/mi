@extends('admin.public.index')
@section('title','添加广告')
@section('content')

   <div class="mws-panel grid_8">

        <div class="mws-panel-header">
            <span>添加广告</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/ggadd" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">广告名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                </div>
                        <div class="mws-form-inline">
                        <div class="mws-form-row" style="width:490px">
                        <label class="mws-form-label">广告图片</label>
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="img" value="{{old('img')}}">
                        </div>
                     </div>
                </div>
                
                <div class="mws-button-row">
                    {{csrf_field()}}
                    <input type="submit" value="保存并添加sku" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection