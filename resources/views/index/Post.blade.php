<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>贴吧</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/layui-v2.6.4/layui/css/layui.css')}}">
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1050px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#search{width:990px; text-align: left; height: 80px; padding: 30px; padding-bottom: 0px;}
		#content #container{padding: 25px; text-align: center; background-color: #fff; width: 1000px; border: solid 1px #DCDEE0; margin-top: 30px;}
		#container #talk{width: 900px; text-align: left; padding: 50px; padding-top: 20px;}
		#talk img{ width: 20px; height: 20px;}
		#talk table tr td{border-top: 1px solid gainsboro; }
		#talk .user{color: #000; font-size: 21px; font-weight: bold;}
		#talk .user:hover{color: #0097EF;}
		#talk .username{color: #000;}
		#talk .username:hover{color: #0097EF;}
		#talk .time{color: gray;}
		#talk .talkcontent{width: 900px; text-align: left; color: gray;}
		#talk .talkcontent img{width: 20px; height: 20px;}
		#talk .title{text-align: right; width: 900px;}
		#talk .title img{width: 20px; height: 20px;}
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
			<li>
				<a href="{{url('/pssendevent')}}">上报事件</a>
			</li>
			<li style="background-color: rgba(80,80,80,0.8); font-weight: bold;">
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
				<a href="#"><span style="color: #000000;">&nbsp;贴吧</span></a>
			</div>
			<div id="search">
				<div style="float: left;">
				<form name="search" method="post" action="{{url('/post')}}">
				<b>贴子名称</b>
				<input type="text" id="content" name="key" style="width: 200px; height: 23.5px; text-align: left;">
				<input type="submit" value="搜索" style="width: 50px; height:25px;" id="submit">
				</form>
				</div>
			</div>
			<div id="container">
				<div class="layui-tab">
					<ul class="layui-tab-title" style="font-size: 20px; font-weight: bold; color: lightseagreen;">
						<li class="layui-this">资讯</li>
						<li>官方资讯</li>
					</ul>
				<div class="layui-tab-content">
					<div class="layui-tab-item layui-show">
						<div id="talk">
						<table width="900" cellpadding="0" cellspacing="0">
							@foreach($data as $val)
						<tr>
							<td>
								<img src="{{$val->img}}">&nbsp;&nbsp;
								<span class="username">{{$val->nickname}}</span>&nbsp;&nbsp;
								<span class="time">{{$val->created_time}}</span><br>
								<div class="talkcontent">
									<a href="{{url('postcontent/'.$val->id)}}"><span class="user">&nbsp;{{$val->atitle}}</span><br></a>
									<div>
										{{$val->acontent}}
									</div>
									<div class="title">
										<img src="{{url('/index/img/Post.png')}}">&nbsp;<?php echo rand(0,10)?>
										<img src="{{url('/index/img/Post1.png')}}">&nbsp;<?php echo rand(10,50)?>
									</div>
									<div>&nbsp;<br></div>
								</div>
						
							</td>
						</tr>
						@endforeach
						</table>
						</div>
					</div>
					<div class="layui-tab-item">
						<div id="talk">
						<table width="900" cellpadding="0" cellspacing="0">
						@foreach($data1 as $val)
						<tr>
							<td>
								<div class="talkcontent">
									<a href="{{url('/postcontent').$val->id}}"><span class="user">&nbsp;{{$val->atitle}}</span><br></a>
									<div>
										{{$val->acontent}}
									</div>
									<br>
									<img src="{{url('index/img/Post.png')}}">&nbsp;<?php echo rand(20,100)?>&nbsp;&nbsp;
									<span>2021-04-19</span>
									<div>&nbsp;<br></div>
								</div>
						
							</td>
						</tr>
						@endforeach
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{url('/index/layui-v2.6.4/layui/layui.js')}}"></script>
		<script>
			layui.use('element', function(){
				var $ = layui.jquery,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
				//触发事件
				var active = {
					tabChange: function(){
						//切换到指定Tab项
						element.tabChange('demo', '22'); //切换到：用户管理
					}
				};
				$('.site-demo-active').on('click', function(){
					var othis = $(this), type = othis.data('type');
					active[type] ? active[type].call(this, othis) : '';
				});
				//Hash地址的定位
				var layid = location.hash.replace(/^#test=/, '');
				element.tabChange('test', layid);
				element.on('tab(test)', function(elem){
					location.hash = 'test='+ $(this).attr('lay-id');
				});
			});
		</script>
		</div>
		<div id="footer"></div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('/index/js/caidanyidong.js')}}"></script>
</html>
