@extends('admin.index')
@section('title','修改轮播图')
@section('content')
<html>
<head></head>
<body>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改轮播图</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/adminsowing/{{$info->id}}" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                 <div class="mws-form-row" style="width: 490px;" >
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="pic" multiple>
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <input type="radio" title="" name="status" value="1" checked>上架
                            <input type="radio" title="" name="status" va1ue="0">下架
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                   
                    <input type="submit" value="修改" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
@endsection