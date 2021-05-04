<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>志愿活动</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style type="text/css">
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1400px; border-top: solid 1px #DCDEE0; margin-top: 40px;}
		#choose{width: 1200px; text-align: left; margin:25px; margin-top: 60px;}
		#choose #button{margin-left: 20px; float: left; width: 50px; height: 25px; text-align: center; color: gray; font-size: 15px;}
		#choose #button a:hover{color: #000000;}
		#search{clear:both; width:1250px; text-align: left; height: 80px; padding:25px;}
		#search input{border:1px solid gainsboro; }
		#ab{width: 1350px; padding: 25px; border: solid 1px #DCDEE0; border-bottom: 0px;}
        #ab table{border-spacing: 12.79px;}/*使td之间的距离分开*/
        #ab td{border: 2px groove rgba(210,210,210,0.2); text-align: left; padding-top: 0px;}
        #ab td:hover{box-shadow: 1px 2px 4px gainsboro;}
        .state{text-align: center; background-color: lightgreen; position: absolute; margin-top: 160px;  margin-left:111.5px; font-size: 15px; border-radius: 10px; height: 25px; width: 75px; color: #FFFFFF;}
        #word1{border-top: solid 1px grey; font-size: 13px; padding-top: 5px; height: 80px; color: darkgray}
        /*进度条*/
        progress::-webkit-progress-bar{background-color:#d7d7d7;}
        progress::-webkit-progress-value{background-color:rgb(254,67,101);}
        progress{color: rgb(254,67,101); background:rgba(255,255,255,0.5);}
        #worda{text-decoration: none; color: rgba(201,20,16,1); font-weight: bold;}
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
				<a href="#"><span style="color: #000000;">&nbsp;志愿活动</span></a>
			</div>
			{{--<div id="choose">
				<div style="color: #000000; font-weight: bold; float: left;">项目类型</div>
				<div id="button" style="background-color: lightseagreen;">
					<a style="color: #fff;">全部</a>
				</div>
				@foreach($data1 as $val)
				<div id="button">
					<a>{{$val->aclass}}</a>
				</div>
				@endforeach
			</div>--}}
			<div id="search">
				<div>
				<form name="search" method="post" action="{{url('/volunteer')}}" style="margin-top: -20px;">
					@csrf
				活动起止日期
				<input type="date" id="datestart" name="datestart" value="">
				至
				<input type="date" id="dateend" name="dateend" value="">
				活动名称
				<input type="text" id="content" name="key" style="width: 200px; height: 22.5px; text-align: left;">
				<input type="submit" value="搜索" style="width: 50px; height:25px;" id="submit" >
				</form>
				</div>
			</div>
			<div id="ab">
				<form name="ab" method="post" action="#">
					<table width="" cellpadding="0" cellspacing="0" >
						@foreach($data as $val)
						<tr style="float: left">
							<td>
								<a href="{{url('/volunteercontent').$val->id}}">
									<span class="state">招募中</span>
									<img src="{{url($val->img)}}" width="300" height="180">
								</a>
								<span id="wordtitle"><br><br><b>&nbsp;&nbsp;{{$val->activetitle}}</b><br></span>
								<div id="word1">
									报名人数：<b style="color: #000;">{{$val->num1}}</b><br>
									发布时间：<b style="color: #000;">{{$val->created_time}}</b><br>
									<progress value="{{($val->num1/$val->num)*100}}" max="100" style="width: 240px; height: 8px;"></progress>
									进度:<b style="color: #000;">{{($val->num1/$val->num)*100}}%</b><br/>
									<span style="color:rgba(210,20,16,1);">招募结束：
										<b style="color: #000;">{{$val->ended_time}}</b>
									</span>
								</div>
								<a href="{{url('volunteercontent/'.$val->id)}}" id="worda">查看详情</a>
							</td>
						</tr>
							@endforeach
					  </table>
				</form>
			</div>
			<div id="footer"></div>
		</div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('/index/js/caidanyidong.js')}}"></script>
</html>
