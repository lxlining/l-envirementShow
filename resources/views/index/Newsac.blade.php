<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>专题活动</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1300px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#search{width:1190px; text-align: left; height: 80px; padding: 30px; padding-bottom: 0px;}
		#ab{width: 1250px; padding: 25px; border: solid 1px #DCDEE0;}
		#ab table{border-spacing: 15px;}/*使td之间的距离分开*/
        #ab table tr td{border: 2px groove rgba(210,210,210,0.2); text-align: left; padding: 15px;}
        #ab td:hover{border-radius: 5px; background-color:rgba(220,220,220,0.2)}
        #wordtitle{font-size: 20px; }
        #word{ font-size: 15px; padding-top: 5px; height: 100px; color: rgba(96,0,48,1); width: 240px;word-break: break-word}
        #worda{text-decoration: none; float: right; color: rgba(201,20,16,1); font-weight: bold;}
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
				<a href="{{url('/newsac')}}"><span style="color: #000000;">&nbsp;专题活动</span></a>
			</div>
			<div id="search">
				<div style="float: left;">
				<form name="search" method="post" action="{{url('/newsac')}}">
					@csrf
				<b>活动名称</b>
				<input type="text" id="content" name="keyword" style="width: 200px; height: 23.5px; text-align: left;">
				<input type="submit" value="搜索" style="width: 50px; height:25px;" id="submit">
				</form>
				</div>
			</div>
			<div id="ab">
			<form name="zhuantihuodong" method="post" action="#" >
        	<table width="" cellpadding="0" cellspacing="0" >
				@foreach($data as $val)
				<tr style="float: left">
					<td>
						<a href="{{url('newsaccontent/'.$val->id)}}"><img src="{{url('/index/img/title1.png')}}{{--{{url($val->img)}}--}}" width="240" height="150"></a>
						<span id="wordtitle"><br><b>标题&nbsp;&nbsp;{{$val->activetitle}}</b><br></span>
						<div id="word">
							{{$val->actives}}
						</div>
						<a href="{{url('newsaccontent/'.$val->id)}}" id="worda">查看</a>
					</td>
				</tr>
				@endforeach
        	</table>
			</form>
				{{$data->links()}}
			</div>

		</div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('/index/js/caidanyidong.js')}}"></script>
</html>
