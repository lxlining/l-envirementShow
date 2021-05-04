<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心-上报事件</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<link rel="stylesheet" href="{{url('/index/css/psmenu.css')}}">
	<link rel="stylesheet" href="{{url('/index/layui-v2.6.4/layui/css/layui.css')}}">
	<script src="{{url('/index/js/Address.js')}}"></script>
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
	<style type="text/css">
		body{background-color: #EFEEF0;}
		#content{margin:0 auto; padding: 0px; text-align: center; width: 1050px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#main .title{width: 735px; padding: 10px 25px; text-align: left; font-size: 19px; border-bottom: 1px solid gainsboro; color: #000;}
		#main .detail{width: 735px; padding:50px 25px; text-align: center; color: lightseagreen;}
		.detail .container{width:685px; padding:10px 25px; text-align: left; color: gray; font-size: 17px; border: 1px solid gainsboro;}
		.container input:hover{border:1px solid lightseagreen}
		.container select{width: 200px; margin-top: 10px; color: gray;}
		.container textarea{width: 635px; height: 80px; word-wrap:break-word; word-break:break-all; padding: 10px 25px; color: gray;}
		.container .but{width:635px; padding:0 25px; text-align: center; margin-top: 15px;}
		.but input{width: 80px; height: 40px; background-color: #fff; color: lightseagreen; border: 1px solid lightseagreen;}
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
			<li>
				<a href="{{url('/newsac')}}">专题活动</a>
			</li>
			<li style="background-color: rgba(80,80,80,0.8); font-weight: bold;">
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
				<div class="title">上报事件</div>
				<div class="detail">
					<div class="container">
						<form name="edit" method="post" action="{{url('/pssendevent')}}" enctype="multipart/form-data">
							@csrf
							<div>
								<div>所在地址:</div>
								<div>
									<div>
										<select name="input_province" id="input_province">
											<option value="">--请选择--</option>
										</select>
										<select name="input_city" id="input_city" style="margin-left: 20px;">
											<option value="">--请选择--</option>
										</select>
									</div>
								</div>
							</div>
							<br>详细地址:&nbsp;&nbsp;&nbsp;&nbsp;<br>
							<input type="text" name="addetail" id="addetial" style="width: 400px;"><br/><br/>
							<div>
								<br>照片:&nbsp;&nbsp;&nbsp;&nbsp;<br>
								<input type="file" name="img" id="addetial" style="width: 400px;"><br/><br/>
								<div>
								<div>类别:</div>
								<div>
									<div>

										<select name="sort" style="margin-left: 20px;">
											<option value="">--请选择--</option>
											@foreach($data as  $val)
												<option value="{{$val->eventclass}}">--{{$val->eventclass}}--</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<br><br>问题:&nbsp;&nbsp;&nbsp;&nbsp;<br>
							<input type="text" name="problem1" id="problem">
							<br><br>问题简述:&nbsp;&nbsp;&nbsp;&nbsp;<br>
							<input type="text" name="problem" id="problem">
							<br><br>问题详情:&nbsp;&nbsp;&nbsp;&nbsp;<br>
							<textarea name="problemdetail" id="problemdetail"></textarea>
							<div class="but">
								<input type="submit" id="submit" value="上报">
							</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{url('/index/js/Addressuse.js')}}"></script>
		<div id="footer"></div>
	</body>
</html>
