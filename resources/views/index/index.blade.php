<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>环境保护</title>
	</head>
	<link rel="stylesheet" href="{{url('/index/css/menu.css')}}">
	<style>
		body {width: 100%; height: 100%; margin: 0 auto; padding: 0px; text-align: center; background-color: #EFEEF0;}
		/*内容*/
		#content{margin:0 auto; padding: 0px; text-align: center; background-color: #fff; width: 1250px;}
        #top{width: 660px; margin: 0 auto; background-color: #EFEEF0; float: left; padding: 0px;}
        #top1{width: 550px; padding: 20px; background-color: #EFEEF0; height: 410px; float: right;}
        #top1 #button{width: 380px; height: 220px; background: #FFFFFF; margin-top: 45px; margin-left: 60px; box-shadow: 1px 1px gainsboro; padding: 50px; text-align: center;}
        #top1 #button .icon{width: 90px; height: 70px; text-align: center;  float: left;}
        #top1 #button .icon img{margin-left: 5px;}
        #top1 #button a{text-decoration: none; color: #000000; font-size: 20px; font-weight: bold;}
        #top1 #button a:hover{color: #27A9E3;}
        #title{clear: both; width: 1243px; height:45px; font-size: 25px; text-align: left; margin: 0 auto; border-left: 7px solid lightseagreen;}
        #title1{width: 1243px; height:45px; font-size: 25px; text-align: left; margin: 0 auto; border-left: 7px solid rgb(221,0,27); clear: both;}
        #title2{width: 1243px; height:45px; font-size: 25px; text-align: left; margin: 0 auto; border-left: 7px solid #00A0E9; margin-top: 20px; float:left;}
        /*志愿者活动*/
        #zhiyuanhuodong{margin:0 auto; width: 1250px; border-top: solid 1px #DCDEE0; margin-top: 15px;
			margin-left: 10px;}
        #zhiyuanhuodong table{border-spacing: 20px;}/*使td之间的距离分开*/
        #zhiyuanhuodong td{border: 2px groove rgba(210,210,210,0.2); text-align: left; padding-top: 0px;}
        #zhiyuanhuodong td:hover{box-shadow: 1px 2px 4px gainsboro;}
        .state{text-align: center; background-color: lightgreen; position: absolute; margin-top: 200px;  margin-left:140px; font-size: 15px; border-radius: 10px; height: 25px; width: 75px; color: #FFFFFF;}
		#zhiyuanhuodong table td img{
			width: 352px;
			height: 220px;}
        #word1{border-top: solid 1px grey; font-size: 13px; padding-top: 5px; height: 80px; color: darkgray}
        /*专题活动*/
        #zhuantihuodong{margin:0 auto; width: 1250px; border-top: solid 1px #DCDEE0; margin-top: 15px;}
        #zhuantihuodong table{border-spacing: 15.5px;}/*使td之间的距离分开*/
        #zhuantihuodong td{border: 2px groove rgba(210,210,210,0.2); text-align: left; padding: 15px;}
        #zhuantihuodong td:hover{border-radius: 5px; background-color:rgba(220,220,220,0.2)}
        #wordtitle{font-size: 20px; }
        #word{border: dashed 1px grey; font-size: 15px; padding-top: 5px; height: 100px; color: rgba(96,0,48,1);}
        #worda{text-decoration: none; float: left; color: rgba(201,20,16,1); font-weight: bold;}
        /*进度条*/
        progress::-webkit-progress-bar{background-color:#d7d7d7;}
        progress::-webkit-progress-value{background-color:rgb(254,67,101);}
        progress{color: rgb(254,67,101); background:rgba(255,255,255,0.5);}
        #new{clear:both; margin:0 auto; width: 820px; border-top: solid 1px #DCDEE0; margin-top: 20px; float: left; text-align: left; height: 375px; margin-bottom: 20px; box-shadow: 1px 1px gainsboro;}
        #new a{text-decoration: none;}
        #new a li{margin:20px; font-size: 25px; font-weight: bold; color: gainsboro; margin-left: 0px;}
        #new a li span{color: #000000;}
        #new a li span:hover{color: #27A9E3;}
        #newGM{margin:0 auto; width: 400px; border-top: solid 1px #DCDEE0; height: 150px; float: left; margin-left: 20px; margin-top: 20px; text-align: center; padding-top: 10px; box-shadow: 1px 1px gainsboro;}
        .wordchange{color: #000000; font-size: 20px; font-weight: bold;}
        #newGM #aclick{margin-top:15px; width: 180px; text-align: center; background-color: rgb(255,231,51); margin-left:110px; padding:10px 0; font-size: 20px;}
        #newGM #aclick a{text-decoration: none; color: #000000; font-weight: bold;}
        #newG{margin:0 auto; width: 370px; border-top: solid 1px #DCDEE0; height: 165px; float: left; margin-left: 20px; margin-top: 20px; text-align: left; padding:15px; box-shadow: 1px 1px gainsboro;}
        #newG #des{margin-top: 10px;}
        #newG a{text-decoration: none; color: grey; font-size: 15px;}
        .btn{
			margin: 20px;
			font-size: 16px;
		}
	</style>
	<link type="text/css" rel="stylesheet" href="{{url('/index/css/imgmove.css')}}">
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
				@if (session('success'))
					<li>
						{{ session('success') }}
					</li>
				@endif
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
			<div id="top">
				<script type="text/javascript" src="{{url('/index/js/imgmove.js')}}">/*图片的移动*/</script>
				<div id="container">
					<div id="list" style="left:-600px;">
					<img src="{{url('/index/img/title4.png')}}" alt="5.pg"/>
					<img src="{{url('/index/img/title1.png')}}" alt="5.pg"/>
					<img src="{{url('/index/img/title2.png')}}" alt="5.pg"/>
					<img src="{{url('/index/img/title3.png')}}" alt="5.pg"/>
					<img src="{{url('/index/img/title4.png')}}" alt="5.pg"/>
					<img src="{{url('/index/img/title1.png')}}" alt="5.pg"/>
					</div>
					<div id="buttons">
					<span index="1"class="on"> </span>
					<span index="2"></span>
					<span index="3"></span>
					<span index="4"></span>
					</div>
					<a href="javascript:;" class="arrow" id="prev">&lt;</a>
					<a href="javascript:;" class="arrow" id="next">&gt;</a>
				</div>
			</div>
			<div id="top1">
				<div id="button">
					<div class="icon" style="margin-left: 75px;" >
						<a href="{{url('/volunteer')}}">
							<img src="{{url('/index/img/icon1.png')}}"><br>
							<span>志愿活动</span>
						</a>
					</div>
					<div class="icon" style="margin-left: 60px;">
						<a href="{{url('post')}}">
							<img src="{{url('/index/img/icon2.png')}}"><br>
							<span>贴吧</span>
						</a>
					</div>
					<div class="icon" style="margin-left: 0px;">
						<br><br><br>
						<a href="{{url('/evsilght')}}">
							<img src="{{url('/index/img/icon3.png')}}"><br>
							<span>观测枢</span>
						</a>
					</div>
					<div class="icon" style="margin-left: 55px;">
						<br><br><br>
						<a href="{{url('/newsac')}}">
							<img src="{{url('/index/img/icon4.png')}}"><br>
							<span>专题活动</span>
						</a>
					</div>
					<div class="icon" style="margin-left: 45px;">
						<br><br><br>
						<a href="{{url('/pssendevent')}}">
							<img src="{{url('/index/img/icon5.png')}}"><br>
							<span>&nbsp;上报事件</span>
						</a>
					</div>
				</div>
			</div>
			<div id="title1">
				志愿活动
				<a style="float: right; font-size: 20px; text-decoration: none; color: darkgrey;" href="{{url('/volunteer')}}">更多>>&nbsp;</a>
			</div>
			<div id="zhiyuanhuodong">
				<form name="zhiyuanhuodong" method="post" action="#">
					<table width="1250" cellpadding="0" cellspacing="0" >
						@foreach($data as $val)
						<tr style="float: left">
							<td>
								<a href="{{url('volunteercontent/'.$val->id)}}">
									<span class="state">招募中</span>
									<img src="{{url('/index/img/zhiyuanzhe.png')}}">
								</a>
								<span id="wordtitle"><br><br><b>&nbsp;&nbsp;{{$val->activetitle}}</b><br></span>
								<div id="word1">
									招募人数：<b style="color: #000;">{{$val->num}}</b><br>
									报名人数：<b style="color: #000;">{{$val->num1}}</b><br>
									发布时间：<b style="color: #000;">{{$val->created_time}}—{{$val->ended_time}}</b><br>
									<progress value="{{($val->num1/$val->num)*100}}" max="100" style="width: 283px; height: 8px;"></progress>
									召集进度<b style="color: #000;"></b><br/>

								</div>
								<a href="{{url('volunteercontent/'.$val->id)}}" id="worda">查看详情</a>
							</td>
						@endforeach

					  </table>
				</form>
			</div>
			<div id="title2">
				帖子
				<a style="float: right; font-size: 20px; text-decoration: none; color: darkgrey;" href="{{url('/post')}}">更多>>&nbsp;</a>
			</div>
			<div id="new">
				<div style="font-weight: bold; font-size: 26px; color:#00A0E9;">最新资讯</div>
				<ul>
					@foreach($data2 as $val)
					<a href="{{url('/postcontent/'.$val->id)}}"><li><span>{{$val->atitle}}</span></li></a>

					@endforeach
				</ul>
			</div>
			<div id="newGM">
				<div class="wordchange">发布</div>
				<div style="color: gainsboro;">—— —— ——— —— —— ——— ———</div>
				<div id="aclick">
					<a href="{{url('/sendpost')}}">✎ &nbsp;&nbsp;发布帖子&nbsp;&nbsp;></a>
				</div>
				<div style="color: gray">讨论、 分析、 宣传</div>
			</div>
			<div id="newG">
				<div class="wordchange">官方资讯</div>
				<div style="color: gainsboro;">—— —— ——— —— —— ——— ———</div>
				<div>
					@foreach($data3 as $val)
						<a href="{{url('/postcontent/'.$val->id)}}"><li><span>{{$val->atitle}}</span></li></a>

					@endforeach
				</div>
			</div>
			<div id="title">
				专题活动
				<a style="float: right; font-size: 20px; text-decoration: none; color: darkgrey;" href="{{url('/newsac')}}">更多>>&nbsp;</a>
			</div>
			<div id="zhuantihuodong">
			<form name="zhuantihuodong" method="post" action="#" >
        	<table width="" cellpadding="0" cellspacing="0" >
        		@foreach($data1 as $val)
				<tr style="float: left">
					<td>
						<a href="{{url('newsaccontent/'.$val->id)}}"><img src="{{url('/index/img/themo1.png')}}" width="240" height="150"></a>
						<span id="wordtitle"><br><b>&nbsp;&nbsp;标题：{{$val->activetitle}}</b><br></span>
						<div >
							<p cols="30" rows="6" disabled="disabled">
								内容：{{$val->actives}}
							</p>
						</div>
						<a href="{{url('newsaccontent/'.$val->id)}}" id="worda">查看</a>
					</td>
				</tr>
				@endforeach
        	</table>
        </form>
			</div>
		</div>
	<div class="footer">
		<p>友情链接：<a href="" class="btn btn-info">aaaaa</a><a href="" class="btn btn-info">aaaaa</a></p>
		<p>Copyright © cqnu 2021-  </p>

	</div>
	</body>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>	
	<script type="text/javascript" src="{{url('/index/js/caidanyidong.js')}}"></script>
</html>