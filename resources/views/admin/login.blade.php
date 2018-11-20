<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/static/login/css/ch-ui.admin.css">
	<link rel="stylesheet" href="/static/login/font/css/font-awesome.min.css">
	<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
</head>
<body /static/login="background:#F3F3F4;">
	<div class="login_box">
		<h1>admin</h1>
		<h2>欢迎使用后台管理平台</h2>
		<div class="form">
			
			<p /static/login="color:red"></p>
			<form action="/admin/store" method="post">
				@if(session('error'))
				{{session('error')}}
				@elseif(session('success'))
				{{session('success')}}
				@endif
				<ul>
					<li>

					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('/admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?Math.random()'" style="cursor:pointer">
					</li>
					<li>
						{{csrf_field()}}
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2018 Powered by <a href="http://www.muzi.com" target="_blank">http://www.muzi.com</a></p>
		</div>
	</div>
</body>
</html>