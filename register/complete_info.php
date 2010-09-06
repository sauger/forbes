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
		js_include_tag('public','jquery.colorbox-min.js');
		css_include_tag('complete_info','public','colorbox');
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
				<div class="content">Step1: 填写个人基本信息</div>
				<div class="arrow"></div>
				<div class="content">Step2: 接收验证mail</div>
				<div class="arrow"></div>
				<div class="content1">Step3: 完善个人资料</div>
				<div class="arrow1"></div>
				<div class="content">注册成功</div>
			</div>
		</div>
		<div id="info">
			<div id="content">
				<div id="content_left">
					<div class="context">我的收藏</div>
					<div class="context">订阅信息</div>
					<div class="context select">个人信息</div>
					<div class="context" style="margin-bottom:0px;">修改密码</div>
				</div>
				<div id="content_right">
					<span>您已成功注册会员，现在完善您的个人信息后，您就可以获得《福布斯》中文杂志一期，我们会根据您填写的个人真实信息送至您手上</span>
					<table>
						<tr>
							<td align="right">姓　　名：</td>
							<td colspan="3"><input class="txt1" type="text" /></td>
						</tr>
						<tr>
							<td width="120" align="right">性　　别：</td>
							<td width="200"><div class="radio_div"><input value='男' name="user[gender]" checked=checked id="gender1" type="radio"><label for="gender1">男</label></div><div class="radio_div"><input value='女' name="user[gender]" id="gender2" type="radio"><label for="gender2">女</label></div></td>
							<td width="100" align="right">学　　历：</td>
							<td><select class="sel1" /></select></td>
						</tr>
						<tr>
							<td align="right">工作单位：</td>
							<td colspan="3"><input class="txt2" type="text" /></td>
						</tr>
						<tr>
							<td align="right">所在部门：</td>
							<td colspan="3"><input class="txt2" type="text" /></td>
						</tr>
						<tr>
							<td align="right">公司性质：</td>
							<td><select class="sel2"></select></td>
							<td align="right">员工规模：</td>
							<td><select class="sel3" /></select></td>
						</tr>
						<tr>
							<td align="right">上市公司：</td>
							<td><select class="sel2"></select></td>
							<td align="right">制造的产品：</td>
							<td><select class="sel2" /></select></td>
						</tr>
						<tr>
							<td align="right">年营业额：</td>
							<td><select class="sel2"></select></td>
							<td align="right">个人年收入：</td>
							<td><select class="sel2" /></select></td>
						</tr>
						<tr>
							<td align="right">年营业额：</td>
							<td><select class="sel2"></select></td>
							<td colspan="2"><select class="sel2" /></select></td>
						</tr>
						<tr>
							<td align="right">通信地址：</td>
							<td colspan="3"><input class="txt2" type="text" /></td>
						</tr>
						<tr>
							<td align="right">邮　　编：</td>
							<td colspan="3"><input class="txt3" type="text" /></td>
						</tr>
						<tr>
							<td align="right">固定电话：</td>
							<td colspan="3"><input class="txt3" type="text" />　<input class="txt3" type="text" />　<input class="txt3" type="text" /></td>
						</tr>
						<tr>
							<td align="right">手　　机：</td>
							<td colspan="3"><input class="txt1" type="text" /></td>
						</tr>
						<tr>
							<td align="right">MSN：</td>
							<td colspan="3"><input class="txt1" type="text" /></td>
						</tr>
						<tr>
							<td align="right">QQ：</td>
							<td colspan="3"><input class="txt1" type="text" /></td>
						</tr>
						<tr>
							<td align="right">验证码：</td>
							<td colspan="3">
								<div><input id="rvcode" maxlength="4" name="rvcode" class="txt3" type="text"></div>
								<div id=yzm><img id="pic" src="yz.php"></div>
								<div id="chang_pic">看不清楚？换张图片</div>
							</td>
						</tr>
					</table>
				</div>
				<div id="content_bottom">
					<button>提　　交</button>　　
					<button>跳过，以后再说</button>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>