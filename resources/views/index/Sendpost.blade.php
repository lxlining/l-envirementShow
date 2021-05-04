<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发布帖子</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		body{background-color: #EFEEF0;}
		#content{margin:0 auto; padding: 25px; text-align: center; width: 1000px; margin-top: 40px; background-color: #fff;}
		#content .title{width: 980px; font-size: 20px; color: #000; text-align: left; font-weight: bold; padding: 10px; border-bottom: 1px solid gainsboro;}
		#content #container{padding: 50px 100px; width: 780px; text-align: left;}
		#container input{width: 600px; margin-left: 100px; border: 1px solid gainsboro; padding: 10px;}
		#container textarea{width: 605px; margin-left: 100px; border: 1px solid gainsboro; padding: 10px; height: 200px; margin-top: 0px; text-align: left; font-size: 18px; color: gray; word-wrap:break-word; word-break:break-all;}
		#container .btn{text-align: center; margin-top: 20px;}
		#container .btn input{width: 150px; height: 40px; padding: 10px; background-color: #0097EF; color: #fff;}
		#footer{height: 50px; width: 100%; clear: both;}
	</style>
	<body>
	<div id="mynav">
		<div id="left">
			<a href="#"><img src="{{url('/index/img/Logo.png')}}" width="150px" height="70px"></a>
		</div>
		<ul>
			<li style="background-color: rgba(80,80,80,0.8); font-weight: bold;">
				<a href="{{url('/')}}">首页</a>
			</li>
			<li>
				<a href="{{url('/volunteer')}}">志愿活动</a>
			</li>
			<li>
				<a href="{{url('/newsac')}}">专题活动</a>
			</li>
			<li>
				<a href="{{url('/pssendevent')}}">上报事件</a>
			</li>
			<li>
				<a href="{{url('/post')}}">贴吧</a>
			</li>
			<li>
				<a href="{{url('/evsilght')}}">环境观测</a>
			</li>
			<li style="float:right;" id="btn">
				@if(session()->get('uid'))
					<a href="{{url('personal')}}">
						<img src="{{session()->get('uimg')}}"  width="50" height="50"/>
					</a>
				@else
					<a href="{{url('login')}}">
						<img src="{{url('/index/img/signLogin.png')}}"  width="50" height="50"/>
					</a>
				@endif
			</li>
			<li style="color: white;float: right">
				{{session()->get('user')}}--{{session()->get('uid')}}
			</li>
		</ul>
	</div>

	<div id="content">
			<div class="title">发布帖子</div>
			<div id="container">
				<form name="Sendpost" method="post" action="{{url('/sendpost')}}" enctype="multipart/form-data">
					@csrf
					标题:
					<input type="text" name="atitle" id="title" placeholder="标题(必填)">
					<br><br><br>
					图片：
					<input type="file" name="aimg" id="title" placeholder="图片" style="margin-left: 87px;">
					<br><br><br>
					<div style="float: left;">内容:</div>
					<textarea name="acontent" id="content"></textarea>
					<div class="btn">
					<input type="submit" id="submit" value="发布">
					</div>
				</form>
			</div>
		</div>
		<div id="footer"></div>
	</body>
</html>
