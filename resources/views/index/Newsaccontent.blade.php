<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>专题活动详情</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		body{background-color: #EFEEF0;}
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1000px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#content #container{padding: 50px; text-align: center; background-color: #fff; width: 900px; border: solid 1px #DCDEE0; margin-top: 80px;}
		#container .title{font-size: 30px; font-weight: bold; width: 700px; padding: 0 100px;}
		#container .time{font-size: 15px; color: darkgray; text-align: left; width: 900px; margin-top: 10px;}
		#container .detail{padding: 25px 50px; width: 800px; border-top: 1px solid gainsboro; margin-top: 20px;}
		.detail .word{text-indent: 2em; font-size: 15px; color: #000; word-wrap:break-word; word-break:break-all; width: 700px; padding:20px 50px; text-align: left;}
		#footer{height: 50px; width: 100%; clear: both;}
	</style>
	<body>
	<div id="mynav">
		<div id="left">
			<a href="#"><img src="{{url('/index/img/Logo.png')}}" width="150px" height="70px"></a>
		</div>
		<ul>
			<li>
				<a href="{{url('/')}}">首页</a>
			</li>
			<li>
				<a href="{{url('/volunteer')}}">志愿活动</a>
			</li>
			<li style="background-color: rgba(80,80,80,0.8); font-weight: bold;">
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
			<div style="font-size: 18px; color: grey; float: left;">当前位置:&nbsp;
				<a href="{{url('/')}}">首页</a>>
				<a href="{{url('/newsac')}}"><span>&nbsp;专题活动</span>></a>
				<span style="color: #000000;">&nbsp;专题活动详情</span>
			</div>
			<div id="container">
				<div class="title">{{$data[0]->activetitle}}</div>
				<div class="time">时间:{{$data[0]->created_time}}</div>
				<div class="detail">
					<img src="{{url($data[0]->img)}}" width="700px">
					<div class="word">
						{{$data[0]->activeinfo}}
					</div>
				</div>
			</div>
		</div>
		<div id="footer"></div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('/index/js/caidanyidong.js')}}"></script>
</html>
