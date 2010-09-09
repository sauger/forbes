<?php
	session_start();
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('register/register','public','jquery.colorbox-min.js');
		css_include_tag('new_register','public','colorbox');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>

	<div id=register>
		<div class="title">
			<div class="title_left">新用户注册</div>
			<div class="title_right">
				<div class="content">注册流程</div>
				<div class="content1">Step1: 填写个人基本信息</div>
				<div class="arrow1"></div>
				<div class="content">Step2: 接收验证mail</div>
				<div class="arrow"></div>
				<div class="content">Step3: 完善个人资料</div>
				<div class="arrow"></div>
				<div class="content">注册成功</div>
			</div>
		</div>
		<form id="re_form" action="register.post.php" method="post">
		<table>
			<tr>
				<td class=td1><span style="color:red;">* </span><label for="user_name">用户名</label></td>
				<td class=td3><input class="txt" maxlength="20" id="user_name" name="user[name]" type="text"></td>
				<td class=td2>
					<div id="user1" class="display1 name_check">4-20位，包含英文大小写字母和数字组成</div>
					<div id="user2" class="display2 name_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">用户名可用</div></div>
					<div id="user3" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">用户名已存在请重新设置用户名</div></div>
					<div id="user4" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">4-20位，包含英文大小写字母和数字组成</div></div>
					<div id="user5" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">只能包含英文大小写字母和数字</div></div>
				</td>
			</tr>
			
			<tr>
				<td class=td1><span style="color:red;">* </span><label for="user_pass">登陆密码</label></td>
				<td class=td3><input class="txt" maxlength="20" id="user_pass" name="user[password]" type="password"></td>
				<td class=td2>
					<div id="pass1" class="display1 pass_check">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号的组合</div>
					<div id="pass2" class="display2 pass_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">密码可用</div></div>
					<div id="pass3" class="display3 pass_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">出现不可用字符请修改密码</div></div>
					<div id="pass4" class="display3 pass_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号的组合</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>确认密码</td>
				<td class=td3><input class="txt" maxlength="20" id="password2" type="password"></td>
				<td class=td2>
					<div id="check_pass1" class="display2 pass_check2"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">输入一致</div></div>
					<div id="check_pass2" class="display3 pass_check2"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请输入相同密码</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span><label for="user_email">电子邮箱</label></td>
				<td class=td3><input class="txt" maxlength="40" name="user[email]" id="user_email" type="text"></td>
				<td class=td2>
					<div id="email1" class="display1 email_check">邮箱作为您找回密码的唯一凭证，请填写真实有效地邮箱地址并妥善保管！</div>
					<div id="email2" class="display2 email_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">邮箱填写正确</div></div>
					<div id="email3" class="display3 email_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">邮箱格式不正确请重新填写</div></div>
					<div id="email4" class="display3 email_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">该邮箱已经注册过，请重新设置</div></div>
				</td>
			</tr>
			</table>
			<div class="title"></div>
			<table>
			<tr>
				<td class=td1><span style="color:red;">* </span>姓名</td>
				<td class=td3><input class="txt" maxlength="40" name="user[nick_name]" id="nick_name" type="text"></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>性别</td>
				<td class=td3><div class="radio_div"><input value='男' name="user[gender]" checked=checked id="gender1" type="radio"><label for="gender1">男</label></div><div class="radio_div"><input value='女' name="user[gender]" id="gender2" type="radio"><label for="gender2">女</label></div></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>出生年月</td>
				<td class=td3><select id="year" name="user[year]" class="sel2" ></select>年　<select id="month" name="user[month]" class="sel2" ></select>月　<select id="day" name="user[day]" class="sel2" ></select>日</td>
				<td class=td2>
					<div id="year1" class="display1 year_check">请选择出生年月</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>教育程度</td>
				<td class=td3><select  class="sel2" ></select></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>地　　区</td>
				<td class=td3><select  class="sel2" ></select>省　<select  class="sel2" ></select></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>职　　位</td>
				<td class=td3><select  class="sel2" ></select></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>公司类型</td>
				<td class=td3><select  class="sel2" ></select></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>所处行业</td>
				<td class=td3><select  class="sel2" ></select></td>
				<td class=td2>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>验证码</td>
				<td class=td3>
					<div id="yzm_input"><input id="rvcode" maxlength="4" name="rvcode" class="txt" type="text"></div>
					<div id=yzm><img id="pic" src="yz.php"></div>
					<div id="chang_pic">看不清楚？换张图片</div>
				</td>
				<td class=td2>
					
				</td>
			</tr>
		</table>
		<div class="dash"></div>
		<table>
			<tr>
				<td class=td5>是否愿意订阅福布斯精华推荐（一周发送一次）</td>
				<td class=td2><a href="/images/register/email.jpg" class="colorbox">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td6><input type="checkbox" name="jhtj" checked=checked id="order1"><label for="order1">我愿意订阅</label><input id="order2" class="ck" type="checkbox"><label for="order2">不，暂时不考虑</label></td>
			</tr>
			<tr>
				<td class=td5>是否愿意订阅福布斯分类文章（一周发送一次）</td>
				<td class=td2><a href="/images/register/news.jpg" class="colorbox">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td6><input type="checkbox" class="n_order" name="fh" id="order3" checked=checked><label for="order3">富豪</label><input id="order4" type="checkbox" checked=checked name="cy" class="ck n_order"><label for="order4">创业</label><input type="checkbox" checked=checked name="sy" id="order5" class="ck n_order"><label for="order5">商业</label><input checked=checked type="checkbox" id="order6" name="kj" class="ck n_order"><label for="order6">科技</label><input name="tz" id="order7" type="checkbox" checked=checked class="ck n_order"><label for="order7">投资</label><input id="order8" type="checkbox" name="sh" checked=checked class="ck n_order"><label for="order8">生活</label><input id="order9" class="ck" type="checkbox"><label for="order9">不，暂时不考虑</label></td>
			</tr>
		</table>
		<div class="dash"></div>
		<table>	
			<tr>
				<td class="td5" style="color:#000000; text-align:center;">会员注册意味着您已接受<a href="">《福布斯中文网用户注册协议》</a>，注册成为免费会员</td>
			</tr>
			<tr>
				
				<td class=td5 style="text-align:center;"><button id="tj" type="button">提交注册申请</button></td>
			</tr>
		</table>
		</form>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>