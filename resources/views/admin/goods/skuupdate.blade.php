@extends('admin.index')
@section('title','sku修改')
@section('content')

   <div class="mws-panel grid_8">

        <div class="mws-panel-header">
            <span>修改sku</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/adminskus/{{$data->id}}" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="title" value="{{$data->title}}">
                            
                            
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">配置</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr" value="{{$data->attr}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">颜色</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="color" value="{{$data->color}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">主价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="falsePrice" multiple value="{{$data->falsePrice}}">
                        </div>
                    </div>

                   <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">副价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="price" multiple value="{{$data->price}}">
                        </div>
                    </div>

                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">图片</label>
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="img" multiple value="">
                        </div>
                    </div>
                   

                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>

                    <div class="mws-form-row">
                        <label class="mws-form-label">详情</label>
                        <div class="mws-form-item">
                            <!-- 加载编辑器的容器 -->
                            <script id="editor" name="info"  type="text/plain" style="width:650px;height:300px;">{!!$data->info!!}</script>
                        </div>
                    </div>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor', {
                            toolbars: [
                                [ 'undo', 'redo', 'bold','italic','formatmatch','fontfamily','fontsize', 'emotion','spechars','searchreplace', 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'forecolor', 'backcolor','fullscreen','lineheight','simpleupload', 'insertimage','imagenone','imageleft','imageright', 'imagecenter' ,'scrawl']
                            ]
                        });
                    </script>

                </div>
                <div class="mws-button-row">
                     {{csrf_field()}}
                     {{method_field('PUT')}}
                      <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="submit" value="保存并添加sku" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection