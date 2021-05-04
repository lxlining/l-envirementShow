<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>志愿活动</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<link rel="stylesheet" href="{{url('/index/layui-v2.6.4/layui/css/layui.css')}}">
	<style type="text/css">
		body {width: 100%; height: 100%; margin: 0 auto; padding: 0px; text-align: center; background-color: #fff;}
		a{text-decoration: none; color: gray;}
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1250px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		/*左半部分的内容*/
		#content #container{clear:both; padding: 0px; text-align: center; background-color: #fff; width: 850px; border: solid 1px #DCDEE0; margin-top: 80px; float: left;}	
		/*1.志愿详情*/
		#content #container #detail{padding: 25px; width: 770px; height: 200px; padding-left: 55px;}	
		#detail .title{color: #000; font-size: 30px; width: 250px; height: 45px; margin-left: 20px; float: left; text-align: left; font-weight: bold; margin-top: 30px;}
		#detail .state{color: #fff; font-size: 20px; width: 100px; height: 45px; margin-left: 10px; float: left; text-align: center; font-weight: bold; background-color: limegreen; line-height: 45px; border-radius: 10px; margin-top: 30px;}
		#detail .biginform{width:360px; height: 100px; font-size: 18px; text-align: left; float: left; margin-left: 20px; margin-top: 10px; color: grey;}
		#detail .biginform .word{color: #000;}
		#detail .biginform .classif{ height: 20px; border: 1px solid rgba(201,20,16,1); text-align: center; padding:5px; color:rgba(201,20,16,1);}
		#detail .deinform{width:650px; height: 150px; font-size: 18px; text-align: left; border: 1px solid gainsboro; color: grey; padding: 30px;}
		#detail .deinform .word{color: #000;}
		/*2.报名登记*/
		#content #container #informpeople table td{text-align: center; border:1px solid gainsboro; padding: 10px; color: gray;}
		#content #container #informpeople table td .color{color:rgba(201,20,16,1);}
		/*3.讨论区*/
		#content #container #talk{padding: 40px; width: 770px; color: #000;}
		#talk img{float: left; width: 50px; height: 50px;}
		#talk table tr td{border-bottom: 40px solid rgba(255,255,255,0);}
		#talk .user{color: #0097EF; font-size: 18px; font-weight: bold;}
		#talk .time{color: gray;}
		#talk .talkcontent{width: 700px; text-align: left; float: left;}
		#talk textarea{width: 750px; height: 80px;}
		#talk input{width: 50px; height: 30px; text-align: center; background-color: rgba(178,43,43,0.8); color: #fff; border: 0px; border-radius: 10px; float: right; margin-right: 15px;}
		#talk input:hover{background-color: firebrick;}
		#talk .content{width:700px; border-top:1px solid gainsboro; margin-top: 10px; word-wrap:break-word; word-break:break-all;}
		#content #right{width: 330px; margin-top: 80px; float: right; margin-right: 30px;}
		#content #right .title{width: 320px; border-left:10px solid rgba(201,20,16,1); text-align: left; font-size: 25px; font-weight: bold;}
		#content #right .content{width: 320px; border-left:10px solid rgba(201,20,16,0); text-align: left; font-size: 20px; margin-top: 10px;}
		#right .btn{width: 320px; text-align: center; margin-top: 100px;}
		.btn input{width: 150px; height: 50px; background-color: rgba(201,20,16,0.85); border: 0px; color: #fff; font-size: 20px; border-radius: 10px;}
		.btn input:hover{background-color: rgba(201,20,16,1);}
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
						<img src="{{url(session()->get('uimg'))}}"  width="50" height="50"/>
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
				<a href="{{url('/volunteer')}}"><span>&nbsp;志愿活动</span>></a>
				<span style="color: #000000;">&nbsp;志愿活动详情</span>
			</div>
			<div id="container">
				<div class="layui-tab">
					<ul class="layui-tab-title">
						<li class="layui-this">志愿项目详情</li>
						<li>报名信息</li>
						<li>讨论区</li>
					</ul>
				<div class="layui-tab-content">
					<div class="layui-tab-item layui-show">
						<div id="detail">
							<img src="{{url($data[0]->img)}}" style="float: left;" width="180px"/>
							<div class="title">{{$data[0]->activetitle}}</div>
							<div class="state">招募中</div>
							<div class="biginform">
								项目编号:&nbsp;&nbsp;<span class="word">{{$data[0]->id}}</span><br><br>
								{{--服务类别:&nbsp;&nbsp;<span class="classif">类别</span>--}}
							</div>
						</div>
						<div id="detail" style="margin-top: 20px;">
							<div class="deinform">
								项目简介:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">{{$data[0]->actives}}</span><br>
								项目地点:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">{{$data[0]->address}}</span><br>
								发布时间:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">{{$data[0]->created_time}}</span><br>
								服务对象:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">其他</span><br>
								招募时间:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">{{$data[0]->created_time}}至{{$data[0]->ended_time}}</span><br>
								服务时间:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">2021年4月9日下午15:00至18:00</span><br>
								志愿者保障:&nbsp;&nbsp;&nbsp;&nbsp;<span class="word">志愿者服务工具,志愿者服装,提供饮用水</span><br>
							</div>
						</div>
					</div>
					<div class="layui-tab-item">
						<div id="informpeople">
						<table width="850" cellpadding="0" cellspacing="0">
							<tr>
								<td>姓名</td>
								<td>服务内容</td>
								<td>服务时长(h)</td>
								<td>报名时间</td>
								<td>操作</td>
							</tr>
							<div>
								@foreach($data3 as $val)
								<tr>
								<td><span class="color">{{$val->nickname}}</span></td>
								<td>捡垃圾</td>
								<td><?php echo rand(4,6);?></td>
								<td>2021.04.08....</td>
									@if(session()->get('uid')!=$val->uid)
								<td><a href="{{url('/volunteercomplaint/'.$val->uid)}}" class="color">投诉</a></td>
										@else  <td>不可操作</td>@endif
								</tr>
								@endforeach
							</div>
						</table>
						</div>
					</div>
					<div class="layui-tab-item">
						<div id="talk">
							<table width="770" cellpadding="0" cellspacing="0">
							@foreach($data4 as $val)
							<tr>
								<td>
								<img src="{{url('/index/img/icon1.png')}}">
								<div class="talkcontent">
									<span class="user">{{$val->uid}}</span>&nbsp;&nbsp;
									<span class="time">{{$val->created_time}}</span><br>
									<div class="content">
										{{$val->ccontent}}
									</div>
								</div>
								</td>
							</tr>
							@endforeach
							</table>
							<form name="talk" method="post" action="{{url('/addcomment')}}">
								@csrf<input type="hidden" name="id" value="{{$id}}">
										<textarea name="ccontent" id="talkcontent"> </textarea>
										<input type="submit" id="submit1" value="发出">
							</form>
							@if(session()->get('error')) {{session()->get('error')}}@endif
						</div>
					</div>
				</div>
				</div>
			</div>
			<div id="right">
				<div class="title">活动发起人</div>
				<div class="content">{{$data1[0]->truename}}</div>
				<br><br><br><br>
				<div class="title">联系方式</div>
				<div class="content">{{$data1[0]->tel}}</div>
				@if($data2[0]->uid !=session()->get('uid'))
				<div class="btn">
					<form method="post" action="{{url('/addactive')}}">
						@csrf
						<input type="hidden" name="aid" value="{{$data[0]->id}}">
						<input type="submit" value="报名">
					</form>
				</div>
				@else
					<div class="btn">
						<form method="post" action="">

							<input type="hidden" name="aid" value="{{$data[0]->id}}">
							<input type="submit" value="已报名" disabled="disabled">
						</form>
					</div>
				@endif
				@if(session()->has('error')) <div>{{session()->get('error')}}</div>@else @endif
			</div>
		</div>
		<div id="footer"></div>
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
	</body>
</html>
