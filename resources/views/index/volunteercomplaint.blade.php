<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>志愿活动投诉</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<link rel="stylesheet" href="{{url('/index/layui-v2.6.4/layui/css/layui.css')}}">
	<style type="text/css">
		body {width: 100%; height: 100%; margin: 0 auto; padding: 0px; text-align: center; background-color: #fff;}
		a{text-decoration: none; color: gray;}
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1000px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#content #container{clear:both; padding: 50px; text-align: center; background-color: #fff; width: 900px; border: solid 1px #DCDEE0; margin-top: 80px;}
		#container table td{text-align:left; border-bottom: 40px solid rgba(255,255,255,0);}
		#container #reason{font-size: 18px; color: #000;}
		#container select{width: 125px; font-size: 18px;}
		#container textarea{width: 600px; height: 250px;}
		#container input{width: 50px; height: 30px; text-align: center; background-color: rgba(178,43,43,0.8); color: #fff; border: 0px; border-radius: 10px; float: right;}
		#container input:hover{background-color:firebrick;}
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
			<li style="background-color: rgba(80,80,80,0.8); font-weight: bold;">
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
			<div style="font-size: 18px; color: grey; float: left;">当前位置:&nbsp;
				<a href="/">首页</a>>
				<a href="/volunteer"><span>&nbsp;志愿活动</span>></a>
				<a href="#"><span>&nbsp;志愿活动详情</span>></a>
				<span style="color: #000000;">&nbsp;志愿活动投诉</span>
			</div>
			<div id="container">
				@if(session()->get('success'))<p style="color: red;">{{session()->get('message')}}</p>@endif
					@if(session()->get('error'))<p style="color: red;">{{session()->get('error')}}</p>@endif
					<form name="complaint" method="post" action="{{url('/volunteercomplaint')}}">
					@csrf
					<input type="hidden" name="uid2" value="{{$id}}">
					<table width="900" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span >投诉原因:&nbsp;&nbsp;</span>
								<select name="reason">
									@foreach($data as $val)
									<option value="{{$val->cname}}">{{$val->cname}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<span style="color: firebrick; font-weight: bold;">注：请详细写出具体情况，否则无法进行核实、判别</span>
								<span id="reason" style="float: left;">具体情况:&nbsp;&nbsp;</span>
								<textarea name="content" id="reasondetail"></textarea><br>
								<input type="submit"  id="dot" value="提交" style="margin-right: 210px;"/>
								<input type="reset"  id="reset" value="重置" style="margin-right: 10px;">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
