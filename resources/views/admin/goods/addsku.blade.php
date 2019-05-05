@extends('admin.public.index')
@section('title','sku添加')
@section('content')

   <div class="mws-panel grid_8">

        <div class="mws-panel-header">
            <span>添加sku</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/addskus" method="get" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="title" value="">
                            
                            <input type="hidden" name="good_id" value="{{$data}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">配置</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr" value="">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">颜色</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="color">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">主价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="falsePrice" multiple>
                        </div>
                    </div>

                   <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">副价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="price" multiple>
                        </div>
                    </div>

                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">图片</label>
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="img" multiple>
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
                            <script id="editor" name="info" type="text/plain" style="width:650px;height:300px;"></script>
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
                    <input type="submit" value="保存并添加sku" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection