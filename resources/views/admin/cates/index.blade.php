@extends('admin.public.index');
@section('title','后台分类列表');
@section('content')
	<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>分类信息查看</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
      <label>Show <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
     </div>
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <form action="/admin/cates" method="get">
      <label>搜索: <input type="text" aria-controls="DataTables_Table_1"  name="keyword" value="{{$request['keywords'] or ''}}" /><button class="btn btn-info">搜索</button></label>
      </form>
     </div>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row" style="text-align:center">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 188px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 350px;">分类名称</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 100px;">删除</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">修改</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($list as $val)
       <tr class="odd" style="text-align:center"> 
        <td class="  sorting_1">{{$val->id}}</td> 
        <td class=" ">{{$val->name}}</td> 

        <td class=" ">
          <form action="/admin/cates/{{$val->id}}" method="post">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button type="submit" class="btn btn-info">删除</button>
        </form>
        </td>

        <td class=" "><a href="admin/create/{{$val->id}}/edit" class="btn btn-info">修改</a></td> 
       </tr>
     @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      查看分页数据
     </div>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$list->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection