<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Regist</title>
		<style type="text/css">
			body{text-align: center; background-color: rgba(80,80,80,0.1);}
			table{margin: 0 auto; margin-top: 20px; background-color: white; padding-left:100px; padding-right: 100px;}
			a{text-decoration: none;}
			a:visited{color: grey;}
			input{outline: none; border: 0px; border-bottom: solid 2px gainsboro;}
			input:hover{ border-bottom: solid 2px #27A9E3;}
			#float{float: right;}
			#alert1,#alert2,#alert3,#alert4{text-align: left; font-size: 25px; color: red; margin-left: 75px; }
		</style>
	</head>
	<script language="JavaScript"> 
		//判断是否为空
		function ifnull(place,x){
			if(document.getElementById(place).value==""){
				document.getElementById(place).style.cssText+="border-bottom: solid 2px red;"
				if(place=="nickname"){
				document.getElementById(x).innerHTML="*用户名不能为空";
				return false;
				}
				else if(place=="password"){
				document.getElementById(x).innerHTML="*密码不能为空";
				return false;
				}
				else if(place=="password2"){
				document.getElementById(x).innerHTML="*确认密码不能为空";
				return false;
				}
				else if(place=="tel"){
				document.getElementById(x).innerHTML="*手机号不能为空";
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
		<form name="form1" method="post" action="{{url('/register')}}" >
			@csrf
			<table width="700" height="700" cellpadding="0" cellspacing="0">
				<tr>
					<td style="font-size: 35px; color: #27A9E3; vertical-align: bottom; padding-bottom: 15px;"><b>注册用户</b></td>
				</tr>
				<tr>
					<td style="border-top: 5px solid #27A9E3; vertical-align: bottom; padding-bottom: 20px;"><input type="hidden" name="uid" value="{{$in}}">
						<input  type="text" id="accout_number" style="width: 350px; height: 45px; font-size: 18px;" placeholder="账号" onblur="return ifnull('accout_number','alert1')" value="{{$in}}" disabled="disabled" />
						<div id="alert1"></div>
					</td>
				</tr>
				<tr>
				    <td style="border-top: 5px solid #27A9E3; vertical-align: bottom; padding-bottom: 20px;">
					<input name="nickname" type="text" id="accout_number" style="width: 350px; height: 45px; font-size: 18px;" placeholder="用户名" onblur="return ifnull('accout_number','alert1')"/>
				    </td>
				</tr>
				<tr>
				    <td style=" padding-top: 10px;">
					<input name="password" type="password" id="password1" style="width: 350px; height: 45px; font-size: 18px;" placeholder="密码" onblur="return ifnull('password1','alert2')"/>
					<div id="alert2"></div>
				    </td>
				</tr>
				<tr>
				    <td style=" padding-top: 10px;">
					<input name="password2" type="password" id="password2" style="width: 350px; height: 45px; font-size: 18px;" placeholder="确认密码" onblur="return ifnull('password2','alert3')"/>
					<div id="alert3"></div>
				    </td>
				</tr>
				<tr>
				    <td style=" padding-top: 10px;">
					<input name="tel" type="tel" id="phone" style="width: 350px; height: 45px; font-size: 18px;" placeholder="手机号" onblur="return ifnull('phone','alert4')"/>
					<div id="alert4"></div>
				    </td>
				</tr>
				<tr>
					<td style="vertical-align:middle;">
						<input type="submit" id="submit" style="width: 360px; height: 60px; background-color:#148CF1; border: 1px solid gainsboro; font-size: 20px; color: #fff; border-radius: 5px; " value="注册">
					</td>
				</tr>
				<tr>
					<td style="padding-right: 70px; vertical-align: top;">
						<div id="float">
						<a href="{{url('/login')}}" onclick="return check();" style="font-size: 20px; color: grey; text-decoration: none;">返回登录</a>
						</div>
					</td>
				</tr>

				<tr></tr>
			</table>
		</form>
	</body>
</html>
