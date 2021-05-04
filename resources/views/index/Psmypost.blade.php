<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心-我的发帖</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<link rel="stylesheet" href="{{url('/index/css/psmenu.css')}}">
	<link rel="stylesheet" href="{{url('/index/layui-v2.6.4/layui/css/layui.css')}}">
	<style type="text/css">
		body{background-color: #EFEEF0;}
		#content{margin:0 auto; padding: 0px; text-align: center; width: 1050px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#main .title{width: 735px; padding: 10px 25px; text-align: left; font-size: 19px; border-bottom: 1px solid gainsboro; color: #000;}
		#main .detail{width: 715px; padding:40px 35px; text-align: left; color: lightseagreen;}
		.detail table tr td img{width: 20px; height: 20px;}
		.detail table tr td{border-bottom: 1px solid darkgray;}
		.detail table tr td .titled{font-size: 20px; font-weight: bold; color: #000;}
		.detail table tr td .content{color: gray; font-size: 17px; word-wrap:break-word; word-break:break-all;}
		.detail table tr td .icon{font-size: 16px; color: gray; text-align: right;}
		.icon img{width: 15px; height: 15px;}
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
		<div id="menu">
			<ul class="layui-nav layui-nav-tree" lay-filter="test" style="width: 250px; background-color: #fff;">
				<!-- 侧边导航: <ul class="layui-nav layui-nav-tree layui-nav-side"> -->
				<li class="layui-nav-item layui-nav-itemed">
					<div class="title">个人中心</div>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/personal')}}">
						<img src="{{url('/index/img/psicon4.png')}}">
						&nbsp;编辑资料
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/pspwchange')}}">
						<img src="{{url('/index/img/psicon2.png')}}"/>
						&nbsp;修改密码
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/psmypost')}}">
						<img src="{{url('/index/img/psicon3.png')}}"/>
						&nbsp;我的发帖
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/psmytalk')}}">
						<img src="{{url('/index/img/psicon1.png')}}"/>
						&nbsp;我的评论
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/pssendevent')}}">
						<img src="{{url('/index/img/psicon5.png')}}"/>
						&nbsp;上报事件
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/pseventspend')}}">
						<img src="{{url('/index/img/psicon7.png')}}"/>
						&nbsp;事件进度
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/psvttake')}}">
						<img src="{{url('/index/img/psicon8.png')}}"/>
						&nbsp;参与活动
					</a>
				</li>
				<li class="layui-nav-item">
					<a href="{{url('/loginout')}}">
						<img src="{{url('/index/img/psicon6.png')}}"/>
						&nbsp;退出登录
					</a>
				</li>
			</ul>
		</div>

			<div id="main">
				<div class="title">我的发帖</div>
				<div class="detail">
					<table width="715" cellpadding="0" cellspacing="0">
						@foreach($data as $val)
						<tr>
							<td>
								<div><br></div>
								<img src="{{session()->get('uimg')}}" />
								&nbsp;&nbsp;2021-04-11<br>
								<div class="titled">
									{{$val->atitle}}
								</div>
								<div class="content">
									{{$val->acontent}}
								</div>
								<div class="icon">
									<img src="{{url('/index/img/Post.png')}}">&nbsp;&nbsp;<?php echo rand(20,100) ?>
								</div>
								<div><br></div>
							</td>
						</tr>
						@endforeach
					</table>	
				</div>
				{{$data->links()}}
			</div>
		</div>
		<div id="footer"></div>
	</body>
</html>
