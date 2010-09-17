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
		css_include_tag('new_register','public','colorbox');
		use_jquery_ui();
		js_include_tag('register/register','public','jquery.colorbox-min.js');
		$db = get_db();
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
		<table class="rtable">
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
			<table class="rtable">
			<tr>
				<td class=td1><span style="color:red;">* </span>姓名</td>
				<td class=td3><input class="txt" maxlength="40" name="order[xm]" id="nick_name" type="text"></td>
				<td class=td2>
					<div id="check_nickname" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请输入真实姓名</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>性别</td>
				<td class=td3><div class="radio_div"><input value='男' name="order[xb]" checked=checked id="gender1" type="radio"><label for="gender1">男</label></div><div class="radio_div"><input value='女' name="order[xb]" id="gender2" type="radio"><label for="gender2">女</label></div></td>
				<td class=td2>
					<div id="check_gender" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择性别</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>出生年月</td>
				<td class=td3>
					<input class="txt" readonly="readonly" maxlength="40" name="user[year]" id="user_year" type="text">
				<td class=td2>
					<div id="check_year" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择出生年月</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>教育程度</td>
				<td class=td3>
					<select  class="sel2" name="order[xl]" id="edu">
						<OPTION value=""></OPTION> 
						<OPTION value="1.博士">1.博士</OPTION> 
						<OPTION value="2.硕士">2.硕士</OPTION> 
						<OPTION value="3.大学本科 大学专科">3.大学本科/大学专科</OPTION> 
						<OPTION value="4.高中 中专">4.高中/中专</OPTION> 
						<OPTION value=5.其他>5.其他</OPTION>
					</select>
				</td>
				<td class=td2>
					<div id="check_edu" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择教育程度</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>地　　区</td>
				<td class=td3>
					<select id="province" name="order[sf]" class="sel2">
						<option value=""></option>
						<?php
							$province = $db->query("select * from fb_chinafar where region_type=1");
							for($i=0;$i<count($province);$i++){
						?>
						<option value="<?php echo $province[$i]->id;?>"><?php echo $province[$i]->name;?></option>
						<?php 
							}
						?>
					</select>省　
					<select id="city" name="order[cs]" class="sel2">
						
					</select></td>
				<td class=td2>
					<div id="check_place" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择地区</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>职　　位</td>
				<td class=td3>
					<select id="post" class="sel2" name="order[zw]">
						<option value=""></option>
						<OPTION value="1.董事长 总裁 行政总裁 首席执行官 董事">1.董事长/总裁/行政总裁/首席执行官/董事</OPTION> 
						<OPTION value="2.副总裁 执行董事">2.副总裁/执行董事</OPTION> 
						<OPTION value="3.总经理 副总经理 厂长 副厂长">3.总经理/副总经理/厂长/副厂长</OPTION> 
						<OPTION value="4.企业所有人 企业合伙人">4.企业所有人/企业合伙人</OPTION> 
						<OPTION value="5.财务总监 总会计师">5.财务总监/总会计师</OPTION> 
						<OPTION value="6.信息系统总监 首席信息官">6.信息系统总监/首席信息官</OPTION> 
						<OPTION value="7.人事经理 行政经理">7.人事经理/行政经理</OPTION> 
						<OPTION value="8.总工程师 高级工程师">8.总工程师/高级工程师</OPTION> 
						<OPTION value="9.市场营销 销售总监">9.市场营销/销售总监</OPTION> 
						<OPTION value=10.部门经理>10.部门经理</OPTION> 
						<OPTION value="11.专业人士 会计师 律师 经济师 教授等">11.专业人士（会计师，律师，经济师，教授等）</OPTION> 
						<OPTION value=12.政府机构官员>12.政府机构官员</OPTION> 
						<OPTION value=13.其他>13.其他</OPTION>
					</select>
				</td>
				<td class=td2>
					<div id="check_post" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择职位</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>公司类型</td>
				<td class=td3>
					<select id="company" class="sel2" name="order[gsxz]">
						<option value=""></option>
						<option value="1.国有/国有控股企业">1.国有/国有控股企业</option>
						<option value="2.事业单位">2.事业单位</option>
						<option value="3.民营企业">3.民营企业</option>
						<option value="4.外商独资企业">4.外商独资企业</option>
						<option value="5.中外合资/合作企业">5.中外合资/合作企业</option>
						<option value="6.其他（请说明）">6.其他（请说明）</option>
					</select>
				</td>
				<td class=td2>
					<div id="check_type" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择公司类型</div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">* </span>所处行业</td>
				<td class=td3>
					<select id="industry" class="sel2" name="order[hy]">
						<option value=""></option>
						<OPTION value=1.制造业>1.制造业</OPTION> 
						<OPTION value=2.进出口贸易>2.进出口贸易</OPTION> 
						<OPTION value="3.批发 零售分销">3.批发/零售/分销</OPTION> 
						<OPTION value=4.产品代理>4.产品代理</OPTION> 
						<OPTION value="5.银行 金融">5.银行/金融</OPTION> 
				        <OPTION value=6.保险业>6.保险业</OPTION>
						<OPTION value=7.电信服务业>7.电信服务业</OPTION> 
						<OPTION value=8.邮政服务>8.邮政服务</OPTION> 
				        <OPTION value="9.网络 信息服务 电子商务">9.网络/信息服务/电子商务</OPTION> 
						<OPTION value=10.公用事业>10.公用事业</OPTION> 
						<OPTION value="11.酒店 旅游">11.酒店/旅游</OPTION> 
						<OPTION value=12.房地产>12.房地产</OPTION> 
				        <OPTION value=13.建筑>13.建筑</OPTION> 
						<OPTION value=14.政府机构>14.政府机构</OPTION> 
						<OPTION value="15.文化 教育 培训">15.文化/教育/培训</OPTION> 
						<OPTION value="16.交通运输 航空 船务 铁路 货运等 ">16.交通运输(航空，船务，铁路，货运等)</OPTION> 
						<OPTION value="17.法律 会计">17.法律/会计</OPTION> 
						<OPTION value="18.商业咨询 顾问服务">18.商业咨询/顾问服务</OPTION> 
						<OPTION value="19.媒体 公关 出版 广播 广告等 ">19.媒体/公关（出版，广播，广告等）</OPTION> 
						<OPTION value="20.其他">20.其他</OPTION>
					</select>
				</td>
				<td class=td2>
					<div id="check_industy" class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请选择所处行业</div>
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
		<table class="rtable">
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
		<table class="rtable">	
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