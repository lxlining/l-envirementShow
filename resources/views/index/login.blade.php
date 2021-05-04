<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<style type="text/css">
			body{text-align: center; background-color: rgba(80,80,80,0.1);}
			table{margin: 0 auto; margin-top: 20px; background-color: white; padding-left:100px; padding-right: 100px;}
			a{text-decoration: none;}
			a:visited{color: grey;}
			input{outline: none; border: 0px; border-bottom: solid 2px gainsboro;}
			input:hover{ border-bottom: solid 2px #27A9E3;}
			#float{float: right;}
			#ct1,#ct2{text-align: left; font-size: 18px; color: #808080; margin-left: 75px;}
			#alert1,#alert2{text-align: left; font-size: 25px; color: red; margin-left: 75px; }
		</style>
	</head>
	<script language="JavaScript"> 
		function ifnull(place,x){
			if(document.getElementById(place).value==""){
				document.getElementById(place).style.cssText+="border-bottom: solid 2px red;"
				if(place=="accout_number"){
				document.getElementById(x).innerHTML="*账号不能为空";
				return false;
				}
				else if(place=="password"){
				document.getElementById(x).innerHTML="*密码不能为空";
				return false;
				}
			}
			else{
				document.getElementById(place).style.cssText+="border-bottom: solid 2px gainsboro;"	
				document.getElementById(x).innerHTML="";
			}
		}
	</script>
	<body>
		<div>
			<img src="{{url('/index/img/Logo.png')}}">
		</div>
		@if(session()->get('error'))<td style="font-size: 20px">{{session()->get('error')}}</td>@endif
		<form name="form1" method="post" action="{{url('/login')}}" >
			@csrf
			<table width="700" height="650" cellpadding="0" cellspacing="0">
				<tr>
					<td style="font-size: 35px; color: #27A9E3; vertical-align: bottom; padding-bottom: 15px;"><b>密码登录</b></td>
				</tr>
				<tr>
				    <td style="border-top: 5px solid #27A9E3; vertical-align: bottom; padding-bottom: 20px;">
				    <div id="ct1"></div>
					<input name="uid" type="text" id="accout_number" style="width: 350px; height: 45px; font-size: 18px;" placeholder="账号" onblur="return ifnull('accout_number','alert1')"/>
					<div id="alert1"></div>
				    </td>
				</tr>
				<tr>
				    <td style=" padding-top: 20px;">
				    <div id="ct2"></div>
					<input name="password" type="password" id="password" style="width: 350px; height: 45px; font-size: 18px;" placeholder="密码" onblur="return ifnull('password','alert2')"/>
					<div id="alert2"></div>
				    </td>
				</tr>
				<tr>
					<td style="vertical-align:middle;">
						<input type="submit" id="submit" style="width: 360px; height: 60px; background-color:#148CF1; border: 1px solid gainsboro; font-size: 20px; color: #fff; border-radius: 5px; " value="登录">
					</td>
				</tr>
				<tr>
					<td style="padding-right: 70px; vertical-align: top;">
						<div id="float"><a href="{{url('/register')}}" style=" font-size: 20px; color: grey;">立即注册  |</a>
							<a href="{{url('/')}}" onclick="return check();" style="font-size: 20px; color: grey; text-decoration: none;">返回</a>
						</div>
					</td>
				</tr>
				<tr></tr>
				<tr></tr>
			</table>
		</form>
	</body>
</html>
