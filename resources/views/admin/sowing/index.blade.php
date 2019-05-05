@extends('admin.public.index');
@section('title','轮播图列表');
@section('content')
	<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>轮播图列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
     </div>
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
     </div>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row" style="text-align:center">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 350px;">图片路径</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 100px;">图片状态</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">操作</th>
       </tr> 
      </thead>

      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($sowing as $val)
       <tr class="odd"> 
       
        <td class="  sorting_1">{{$val->id}}</td> 
        <td class=" "><img  width="100px" src="{{$val->pic}}" alt=""></td> 
        <td class=" ">{{$val->status}}</td>
        <td class=" ">

          <form action="/adminsowing/{{$val->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}

            <button type="submit" class="btn btn-success">删除</button>
          </form>

        
        <a href="adminsowing/{{$val->id}}/edit" class="btn btn-info">修改</a></td> 
       </tr>
     @endforeach
      </tbody>
     </table>
     <!-- 分页效果 -->
     <div class="dataTables_info" id="pages">
  {{$sowing->appends($request)->render()}}
     </div>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 
 </script>
</html>
@endsection