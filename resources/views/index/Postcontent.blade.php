<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Post</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		body{background-color: #EFEEF0;}
		#content{margin:0 auto; padding: 0px; text-align: center; width: 1050px; margin-top: 80px;}
		#content .leftmenu{width: 75px; margin-top: 100px; position: absolute; text-align: center;}
		.leftmenu .move{position: fixed; z-index: 999; width: 50px; height: 150px; text-align: center; padding: 12.5px; background-color: #fff;}
		.move .word{text-align: center; color: grey; width: 50px; font-size: 15px;}
		#content #container{width: 840px; margin: 85px; margin-top:0px; margin-bottom:0px;background-color: #fff; text-align: center; padding:10px 20px;}
		#container .title{font-size: 30px; font-weight: bold; width: 840px; text-align: left; color: #000;}
		#container .totally{font-size: 17px; color: darkgray; background-color: rgb(247,248,252); width: 820px; text-align: left; margin-top: 30px; padding: 10px;}
		.totally img{width: 16px; height: 16px;}
		#container .time{font-size: 15px; color: darkgray; text-align: center; width: 840px; margin-top: 20px;}
		#container .detail{width: 840px; margin-top: 30px;}
		.detail .word{text-indent: 2em; font-size: 17px; color: gray; word-wrap:break-word; word-break:break-all; width: 800px; text-align: left; padding: 20px;}
		#content #talksend{width: 840px; margin:30px 85px;background-color: #fff; text-align: center; padding:10px 20px; color: gray;}
		#talksend .content{width: 800px; text-align: left; padding: 20px;}
		.content textarea{width: 760px; height: 80px; padding:20px; font-size: 15px; color: gray; margin-top: 10px;}
		.content .button{width: 800px; text-align: right;}
		.button input{background-color: lightseagreen; color: #fff; border:0px; font-size: 16px; font-weight: bold; width: 50px; height: 30px; border-radius: 5px;}
		#content #talk{width: 780px; margin:0 85px;background-color: #fff; text-align: left; padding:40px 50px; color: gray;}
		#talk img{ width: 40px; height: 40px; float: left;}
		#talk table tr td{border-top: 1px solid gainsboro; }
		#talk .username{color: #000;}
		#talk .username:hover{color: #0097EF;}
		#talk .time{color: gray;}
		#talk .talkcontent{width: 740px; text-align: left; color: gray; clear: both; padding: 20px; font-size: 17px;}
		#talk .talkcontent img{width: 30px; height: 30px;}
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
			
			<div class="leftmenu">
				<div class="move">
					<div class="word">
						<a href=""><img src="{{url('/index/img/Post.png')}}" width="50" height="50"></a>
						<br>12345
					</div>
					<div class="word" style="border-top: 1px solid gainsboro; padding-top: 10px;">
						<a href="#top"><img src="{{url('/index/img/Post2.png')}}" width="50" height="50"></a>
					</div>
				</div>
			</div>
			<div id="container">
				<a name="top"><div class="title">标题</div></a>
				<div class="totally">
					来源:官方
					<div style="float: right;">
						<img src="{{url('/index/img/Post.png')}}">&nbsp;0
						&nbsp;&nbsp;&nbsp;
						<img src="{{url('/index/img/Post1.png')}}">&nbsp;22
					</div>
				</div>
				<div class="time">文章发表: {{$data[0]->created_time}}</div>
				<div class="detail">
					<img src="{{url('/'.$data[0]->aimg)}}"><br>
					<div class="word">
						{{$data[0]->acontent}}
					</div>
				</div>
			</div>
			<div id="talksend">
				<div class="content">
					<a name="posttalk">快来评论:<br></a>
					<form name="posttalk" method="post" action="{{url('/sendmessahe/'.$data[0]->id)}}">
						@csrf
						<textarea name="mcontent"></textarea>
						<div class="button">
							<input type="submit" id="submit" value="评论">
						</div>
					</form>
				</div>
			</div>
			<div id="talk">
				<table width="740" cellpadding="0" cellspacing="0">
					@foreach($data1 as $val)
						<tr>
							<td>
								<img src="/{{$data1[0]->img}}">&nbsp;&nbsp;
								<span class="username">{{$data1[0]->nickname}}</span>
								<div class="talkcontent">
										{{$data1[0]->mcontent}}
								</div>
								<div>&nbsp;<br></div>
							</td>
						</tr>
						@endforeach
						</table>
			</div>
		</div>
		<div id="footer"></div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('js/caidanyidong.js')}}"></script>
</html>
