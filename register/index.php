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
				<td class="td5" style="color:#000000; text-align:center;">会员注册意味着您已接受<a id="info_text" href="#">《福布斯中文网用户注册协议》</a>，注册成为免费会员</td>
			</tr>
			<tr>
				
				<td class=td5 style="text-align:center;"><button id="tj" type="button">提交注册申请</button></td>
			</tr>
		</table>
		</form>
	</div>
<div style="display:none">
<div id="register_info">
<p><b>1、服务使用条款的接受</b></p><p>
</p><p>1.1 
福布斯中文网站（以下简称“福布斯中文网”，域名为：www.forbeschina.com）为注册地和主营业地位于上海的智惠文化传播有限公司所独立
拥有，福布斯中文网提供的服务完全按照其发布的服务条款和操作规则。上海的智惠文化传播有限公司享有对福布斯中文网上一切活动的监督、提示、检查、纠正及
处罚等权利。服务使用人（以下称“用户”）在使用福布斯中文网提供的各项服务之前，应仔细阅读本用户协议。</p>
<p>1.2 用户必须同意本协议的全部条款并按照页面上的提示完成注册程序。如果用户在注册程序过程中点击“我同意”按钮即表示用户自愿与福布斯中文网达成协议，完全接受本协议项下的全部条款。</p>
<p>1.3 如果并未注册，却在现实中使用了福布斯中文网服务，在此情况下，用户理解并同意福布斯中文网视用户自使用服务时起接受本条款。在有关任何服务的用户界面上福布斯中文网都将向用户提供的选择处，以便用户查阅并点击以接受或同意本协议。</p>
<p>1.4 除非用户与福布斯中文网另有书面协议，否则用户与福布斯中文网的协议将始终至少包括本文件中陈述的条款和条件。如果用户不接受本协议则不可使用福布斯中文网的服务。</p>
<p>1.5 用户可以打印或在本地保存本协议作为备案。</p>
<p><b>2、服务及条款的变更和修改</b></p>
<p>福布斯中文网有权随时对服务条款进行修改，并且一旦发生服务条款的变动，福布斯中文网将在页面上提示修改的内容；当用户使用福布斯中文网的特殊服务
时，应接受福布斯中文网随时提供的与该特殊服务相关的规则或说明，并且此规则或说明均构成本服务条款的一部分。用户如果不同意服务条款的修改，可以主动取
消已经获得的网络服务；如果用户继续享用网络服务，则视为用户已经接受服务条款的修改。</p>
<p><b>3、服务说明</b></p>
<p>3.1 
福布斯中文网网运用自己的操作系统通过国际互联网向用户提供丰富的网上资源，包括各种新闻信息、网上论坛、个性化内容（含博客、微博、相册）等服务（以下
简称“本服务”）。除非另有明确规定，增强或强化目前服务的任何新功能，包括新产品，均无条件地适用本服务条款。</p>
<p>3.2 福布斯中文网对网络服务不承担任何责任，即用户对网络服务的使用承担风险。福布斯中文网不保证服务一定会满足用户的使用要求，也不保证服务不会受中断，对服务的及时性、安全性、准确性也不作担保。</p>
<p>3.3 为使用本服务，用户必须自行配备进入国际互联网所必需的设备，除此之外与相关网络服务有关的设备(如电脑、调制解调器及其他与接入互联网有关的装置)及所需的费用(如为接入互联网而支付的电话费及上网费)均应由用户自行负担。</p>
<p>3.4 用户接受本服务须同意：</p>
<p>a. 提供完整、真实、准确、最新的个人资料；</p>
<p>b. 不断更新注册资料，以符合上述a的要求；</p>
<p>c. 若用户提供任何错误、不实、过时或不完整的资料，并为福布斯中文网所确知；或者福布斯中文网有合理理由怀疑前述资料为错误、不实、过时或不完整，福布斯中文网有权暂停或终止用户的帐号，并拒绝现在或将来使用本服务的全部或一部分；</p>
<p>d. 如果因注册信息不符合上述要求而引起的问题，并对问题发生带来的后果，福布斯中文网不负任何责任。</p>
<p>3.5 用户享有本站用户的各种权利，可享受本站提供的各项服务；用户同时有权对福布斯中文网管理提出批评、意见、建议；有疑问或者认为自己在福布斯中文网的权益受到侵害，可以向在线管理员或客服咨询或投诉。</p>
<p><b>4、用户应遵守以下法律及法规：</b></p>
<p>4.1 
用户同意遵守中华人民共和国相关法律法规、规章及司法解释，包括但不限于《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》、《最高
人民法院关于审理涉及计算机网络著作权纠纷案件适用法律若干问题的解释(法释[2004]1号)》、《全国人大常委会关于维护互联网安全的决定》、《互联
网电子公告服务管理规定》、《互联网新闻信息服务管理规定》、《互联网著作权行政保护办法》和《信息网络传播权保护条例》等有关计算机互联网规定和知识产
权的法律和法规、实施办法。在任何情况下，福布斯中文网合理地认为用户的行为可能违反上述法律、法规、规章及司法解释，福布斯中文网可以在任何时候，经事
先通知终止向该用户提供服务。</p>
<p>4.2 用户应了解国际互联网的无国界性，应特别注意遵守当地所有有关的法律和法规。</p> 
<p><b>5、用户隐私权制度</b></p>
<p>5.1 
当用户注册福布斯中文网的服务时，用户须提供个人信息。福布斯中文网收集个人信息的目的是为用户提供尽可能多的个人化网上服务以及为广告商提供一个方便的
途径来接触到适合的用户，并且可以发送具有相关性的内容和广告。在此过程中，广告商绝对不会接触到用户的个人信息。尊重用户个人隐私信息的私有性是福布斯
中文网的重点原则，福布斯中文网将会采取合理的措施保护用户的个人隐私信息。福布斯中文网不会在未经合法用户授权时，公开、编辑或透露其个人信息及保存在
福布斯中文网中的非公开内容，除非有下列情况： </p>
<p>a. 有关法律规定或福布斯中文网合法服务程序规定；</p>
<p>b. 在紧急情况下，为维护用户及公众的权益；</p>
<p>c. 为维护福布斯中文网的合法权益权；</p>
<p>d. 其他需要公开、编辑或透露个人信息的情况。</p>
<p>5.2 在以下（包括但不限于）几种情况下，用户同意福布斯中文网使用用户的个人信息：</p>
<p>a. 
福布斯中文网可能会与合作方合作向用户提供相关的服务，在此情况下，如该合作方同意承担与福布斯中文网同等的保护用户隐私的责任，则福布斯中文网可将用户
的注册资料等提供给该合作方； b.在不透露单个用户隐私资料的前提下，福布斯中文网有权对整个用户数据库进行分析并对用户数据库进行商业上的利用；</p>
<p>b. 福布斯中文网可以将用户信息与第三方数据匹配；</p>
<p>c. 福布斯中文网会通过透露用户统计数据，向未来的合作伙伴、广告商及其他第三方以及为了其他合法目的而描述福布斯中文网的服务；</p>
<p>d. 福布斯中文网会向用户发送关于福布斯中文网不同产品和服务的信息或者福布斯中文网认为用户会感兴趣的其他产品和服务。如果用户不希望收到这样的电子邮件（本协议中的“电子邮件”包含“站内信件”），只需在提供个人信息时或其他任何时候告知即可。</p>
<p>另外，福布斯中文网会竭尽全力保护用户的信息，但福布斯中文网不能确信或保证任何个人信息的安全性，用户须自己承担风险。比如用户联机公布可被公众
访问的个人信息时，用户有可能会收到未经用户同意的消息；福布斯中文网的合作伙伴和可通过福布斯中文网访问的第三方因特网站点和服务得知用户个人信息的其
他第三方会进行独立的数据收集工作等活动，福布斯中文网对用户及其他任何第三方的上述行为，不负担任何责任。</p>
<p><b>6、用户帐号、密码和安全</b></p>
<p>6.1 福布斯中文网社区提倡、鼓励用户实名注册，但亦尊重使用笔名注册的权利；但同时要求：</p>
<p>a. 用户在本站注册时，请使用汉字、数字、拼音或英文做笔名；</p>
<p>b. 如非本人，请勿以知名人士的真实姓名、字号、艺名、笔名注册</p>
<p>c. 如未经授权，请勿以国家机构或其他机构的名称注册；</p>
<p>d. 请勿注册与名人或其他网友用户名相近、相仿的笔名，以免造成混淆和误会；</p>
<p>e. 请勿注册不文明、不健康或令人有道德上反感之笔名；</p>
<p>f. 请勿注册易产生歧义、引起他人误解之笔名；</p>
<p>g. 请勿注册超过四个汉字或8个字节或图形符号的笔名；</p>
<p>h. 违反上述规定而注册的用户名将被禁止使用或注销，其发布信息将可能被删除。</p>
<p>6.2 用户一旦注册成功，便成为福布斯中文网的合法用户，将得到一个密码和帐号的使用权，其所有权仍然归福布斯中文网所有。用户承担用户账号与密码的保管责任，并就其帐号及密码项下之一切活动负全部责任；因此所衍生的任何损失或损害，福布斯中文网无法也不负担任何责任。</p>
<p>6.3 用户的密码和帐号遭到未授权的使用或发生其他任何安全问题，用户可以立即通知福布斯中文网，并且用户在每次连线结束，应结束帐号使用，否则用户可能得不到福布斯中文网的安全保护。</p>
<p><b>7、对用户信息的存储和限制</b></p>
<p>福布斯中文网不对用户所发布信息的删除或储存失败负责，同时有权利在下述情况下，对内容进行保存或披露： </p>
<p>a. 法律程序所规定或政府主管部门提出要求；</p>
<p>b. 本服务条款规定；</p>
<p>c. 被侵害的第三人提出权利主张；</p>
<p>d. 为保护福布斯中文网、其使用者及社会公众的权利、财产或人身安全。</p>
<p>e. 其他福布斯中文网认为有必要的情况。</p>
<p><b>8、福布斯中文网禁止用户从事以下行为：</b></p>
<p>8.1 所有用户不得在福布斯中文网任何板块发布、登载、转载或以其它任何方式发送以下含有下列内容之一的信息，包括但不限于资讯、资料、文字、软件、音乐、照片、图形、信息或其他资料： </p>
<p>a. 违反宪法确定的基本原则的；</p>
<p>b. 危害国家安全，泄漏国家机密，颠覆国家政权，破坏国家统一的；</p>
<p>c. 损害国家荣誉和利益的；</p>
<p>d. 煽动民族仇恨、民族歧视，破坏民族团结的；</p>
<p>e. 破坏国家宗教政策，宣扬邪教和封建迷信的；</p>
<p>f. 散布谣言，扰乱社会秩序，破坏社会稳定的；</p>
<p>g. 散布淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；</p>
<p>h. 侮辱或者诽谤他人,侵害他人合法权益的；</p>
<p>i. 煽动非法集会、结社、游行、示威、聚众扰乱社会秩序的；</p>
<p>j. 以非法民间组织名义活动的；</p>
<p>k. 非法、有害、胁迫、骚扰、侵害、中伤、粗俗、猥亵、诽谤、淫秽、侵害他人因隐私、种族歧视或其他道德上令人反感的信息;</p>
<p>l. 含有法律、法规、规章、条例以及任何具有法律效力之规范所限制或禁止的其他内容的。 </p>
<p>8.2 以任何方式危害未成年人。</p>
<p>8.3 冒充任何人或机构，或以虚伪不实的方式谎称或使人误认为与任何人或任何机构有关。 </p>
<p>8.4 伪造标题或以其他方式操控识别资料，使人误认为该内容为福布斯中文网所传送，或者冒充福布斯中文网管理人员发布信息。</p>
<p>8.5 将无权传送的内容（例如内部资料、秘密资料）进行上载、张贴、发送电子邮件或以其他方式传送。 </p>
<p>8.6 将侵犯任何人的专利、商标、著作权、商业秘密或其他专属权利之内容加以上载、张贴、发送电子邮件或以其他方式传送。 </p>
<p>8.7 将广告函件、促销资料、“垃圾邮件”等，加以上载、张贴、发送电子邮件或以其他方式传送。供前述目的使用的专用区域除外。</p>
<p>8.8 将有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料，加以上载、张贴、发送电子邮件或以其他方式传送。</p>
<p>8.9 干扰或破坏本服务或与本服务相连的服务器和网络，或不遵守本服务网络使用之规定。</p>
<p>8.10 故意或非故意违反任何相关的中国法律、法规、规章、条例等其他具有法律效力的规范。</p>
<p>8.11 跟踪或以其他方式骚扰他人。</p>
<p>8.12 本站管理人员对于含有上述内容的信息，有权直接进行删除、删节、修改或屏蔽，还包括有权对该用户账号进行禁止发言、禁止访问、删除账号、封IP等处理。同时，福布斯中文网还保留将含有上述内容的信息向有关国家机关检举揭发或向利害关系人通报并协助处理的权利。</p>
<p><b>9、福布斯中文网网不欢迎包含但不限于下列内容的信息</b></p>
<p>9.1 缺乏理性讨论诚意、无理纠缠、恶意灌水等浪费版面资源的信息；</p>
<p>9.2 明显缺乏章法、错别字过多、无关符号过多、内容晦涩、空泛的信息；</p>
<p>9.3 重复内容、测试性质、过于私人化的聊天信息等影响用户浏览的内容或格式；</p>
<p>9.4 破坏本站社区（论坛、博客或微博）讨论和管理秩序、侵害本站利益的信息；</p>
<p>9.5 包含影响用户正常浏览的内容或格式的信息 </p>
<p>9.6 未经公开报道、未经证实的有可能造成社会影响或者损害到第三人利益的消息（发布本人亲身经历的事件请注明并将联络办法告知管理员）</p>
<p>9.7 对于上述信息，福布斯中文网有权在不通知的情况下直接删除相关内容和信息，甚至做出禁止发言、禁止访问、删除账号等处理。用户注明拒绝管理人员上述管理行为的，管理人员有权拒绝该信息的发布。</p>
<p><b>10、避风港原则</b></p>
<p>当第三方认为用户上传或者发表于福布斯中文网的信息侵犯其权利，并根据《信息网络传播权保护条例》或者相关法律规定向福布斯中文网发送权利通知书
时，用户同意福布斯中文网可以自行判断决定删除涉嫌侵权的用户上传或者发表于福布斯中文网的信息，除非收到符合相关法律规定且可以证明福布斯中文网不承担
任何法律责任的书面说明，福布斯中文网将不会自动恢复上述删除的信息。</p>
<p><b>11、赔偿责任</b></p>
<p>11.1 
如用户在使用网络服务时违反上述任何规定，福布斯中文网有权要求用户改正或直接采取一切必要的措施（包括但不限于删除用户张贴的内容、回收用户账号、暂停
或终止用户使用网络服务的权利）以减轻用户不当行为而造成的影响。因此导致福布斯中文网损失的，福布斯中文网有权保留相关记录并要求用户赔偿，用户所产生
的一切损失自行承担。</p>
<p>11.2 用户同意保障和维护福布斯中文网及其他用户的利益，如因用户违反有关法律、法规或本协议项下的任何条款而给福布斯中文网或任何其他第三人造成损失，用户同意承担由此造成的损害赔偿责任。</p>
<p><b>12、公开使用区域的权利与责任</b></p>
<p>12.1 “公开使用区域”指一般公众可以使用的区域，福布斯中文网鼓励用户充分利用这一平台自由地张贴和共享自己的信息；</p>
<p>12.2 
用户对于其创作并在福布斯中文网公开使用区域张贴上的合法信息依法享有著作权及其相关权利；但这也同时意味着用户授权福布斯中文网在全世界范围内具有永久
性的、不可撤销的权利和免许可费、可完全转授的权利。福布斯中文网有权为展示、散布及推广前述张贴的内容之服务目的，对上述内容进行复制、修改、改编、出
版。用于平面出版等商业性用途时，将按同行业的稿费标准支付稿酬并于使用前先知会作者。 </p>
<p>12.3 因用户进行上述张贴，而导致任何第三方提出索赔要求或衍生的任何损害或损失，用户承担全部责任。如用户违反本协议造成福布斯中文网被第三人索赔的，用户同意全额补偿福布斯中文网（包括但不限于各种赔偿费用和律师费、公证费、鉴定费等）。</p>
<p><b>13、商业交易</b></p>
<p>用户经由本服务与广告商进行通讯联系或商业往来或参与促销活动，完全属于用户与广告商之间的行为，与福布斯中文网没有任何关系，对于前述交易或前述广告商因本服务所生之任何损害或损失，福布斯中文网不承担任何责任。</p>
<p>除非与福布斯中文网单独签订合同，否则用户不得将福布斯中文网社区等平台用于商业目的；用户也不得对本服务进行复制、出售或用作其他商业用途。 </p>
<p><b>14、接受有关金融的相关服务</b></p>
<p>用户可以从福布斯中文网接受有关新闻信息、公司商情、股票评析、投资方向等资料，但福布斯中文网对上述资料的正确性、适用性，均不负任何责任。基于上述资料，用户所进行的交易或投资决定，由用户承担全部后果和责任。</p>
<p><b>15、关于链接</b></p>
<p>本服务可能会提供与其他国际互联网网站或资源进行链接。对于前述网站或资源是否可以利用，福布斯中文网不予担保。因使用或依赖上述网站或资源所生的损失或损害，福布斯中文网也不负担任何责任。 </p>
<p><b>16、知识产权及其他权利</b></p>
<p>16.1 福布斯中文网对本服务及本服务所使用的软件包含受知识产权或其他法律保护的资料享有相应的权利；</p>
<p>16.2 经由本服务传送的资讯及内容，受到著作权法、商标法、专利法或其他法律的保护；未经福布斯中文网明示授权许可，用户不得进行修改、出租、散布或衍生其他作品。 </p>
<p>16.3 用户对本服务所使用的软件有非专属性使用权，但自己不得或许可任何第三方复制、修改、出售或衍生产品。 </p>
<p>16.4 福布斯中文网及其设计图样、域名以及第福布斯中文网经任何商号、商标、服务标记、标识及其他显著品牌特征的权利均为第上海智惠文化传播有限公司所有。未经书面授权，任何人不得使用、复制或用作其他用途。 </p>
<p><b>17、服务的修改和终止</b></p>
<p>17.1 福布斯中文网不断创新以向用户提供最佳体验，包括但不限于资讯、社区、互动交流。用户认知并同意福布斯中文网提供的服务的形式和本质可不经事先通知而不时变换和更新。</p>
<p>17.2 福布斯中文网有权在任何时候，暂时或永久地终止本服务（或任何一部分），无论是否通知。福布斯中文网对本服务的终止对用户和任何第三人不承担任何责任。</p>
<p>17.3 福布斯中文网有权基于任何法定或者本协议约定的理由，终止用户的帐号、密码或使用本服务，或删除、转移用户存储、发布在本服务的内容，福布斯中文网采取上述行为均不需通知，并且对用户和任何第三人不承担任何责任。</p>
<p>17.4 如因系统维护或升级的需要而需暂停网络服务、服务功能的调整，福布斯中文网将尽可能事先在网站上进行通告，但这不作为必须履行的义务。 </p>
<p><b>18、免责声明</b></p>
<p>18.1 
福布斯中文网对于任何包含、经由或连接、下载或从任何与有关本服务所获得的任何内容、信息或广告，不声明或保证其正确性或可靠性；并且对于用户经本服务上
的广告、展示而购买、取得的任何产品、信息或资料，福布斯中文网不负保证责任。用户自行负担使用本服务的风险。</p>
<p>18.2 用户在接受本服务时，有可能会接触到令人不快、不适当或令人不快的内容。在任何情况下，福布斯中文网均不对任何内容负责，包括但不限于任何内容发生任何错误或纰漏以及衍生的任何损失或损害。福布斯中文网有权（但无义务）自行拒绝或删除经由本服务提供的任何内容。</p>
<p>18.3 福布斯中文网有权但无义务，改善或更正本服务任何部分之任何疏漏、错误。</p>
<p>18.4 福布斯中文网网保证（包括但不限于）： </p>
<p>a. 本服务一定能满足用户的使用要求；</p>
<p>b. 本服务不受干扰，及时、安全、可靠或不出现错误，包括黑客入侵，网络中断，电信问题及其他不可抗力等；</p>
<p>c. 用户经由本服务取得的任何产品、服务或其他材料符合用户的期望； </p>
<p>18.5 用户使用经由本服务下载的或取得的任何资料，其风险自行负担；因该使用而导致用户电脑系统损坏或资料流失，用户应负完全责任；</p>
<p>18.6 基于以下原因而造成的利润、商业信誉、资料损失或其他有形或无形损失，福布斯中文网不承担任何直接、间接、附带、衍生或惩罚性的赔偿：</p>
<p>a. 本服务使用或无法使用；</p>
<p>b. 经由本服务购买或取得的任何产品、资料或服务；</p>
<p>c. 用户资料遭到未授权的使用或修改；</p>
<p>d. 其他与本服务相关的事宜。</p>
<p>18.7 
互联网是一个开放平台，用户如将照片等个人资料上传到互联网上，有可能会被其他组织或个人复制、转载、擅改或做其它非法用途，用户必须充分意识此类风险的
存在。用户明确同意其使用福布斯中文网服务所存在的风险将完全由其自己承担；因其使用福布斯中文网服务而产生的一切后果也由其自己承担，福布斯中文网对用
户不承担任何责任。 </p>
<p><b>19、通知和送达</b></p>
<p>19.1 本协议项下所有的通知均可通过重要页面公告、电子邮件或常规的信件传送等方式进行；服务条款的修改或其他事项变更时，福布斯中文网将会以上述形式进行通知。该等通知于发送之日视为已送达收件人。</p>
<p>19.2 用户对于福布斯中文网的通知应当通过福布斯中文网对外正式公布的通信地址、电子邮件地址等联系信息进行送达。 </p>
<p><b>20、法律的适用和管辖</b></p>
<p>本服务条款的生效、履行、解释及争议的解决均适用中华人民共和国法律。本协议签订地为上海，如双方就本协议内容或其执行发生任何纠纷或争议，首先双
方应尽量友好协商解决；协商不成时，用户在此完全同意将纠纷或争议提交福布斯中文网所在地即上海有管辖权的人民法院管辖。本服务条款因与中华人民共和国现
行法律相抵触而导致部分无效，不影响其他部分的效力。 </p>
<p><b>21、其他规定</b></p>
<p>21.1 本协议构成双方对本协议之约定事项及其他有关事宜的完整协议，除本协议规定的之外，未赋予本协议各方其他权利。</p>
<p>21.2 用户知晓并且同意，如果福布斯中文网未行使或未强制执行包含在本条款中的（或福布斯中文网在任何适用法律下有权享受的）任何法定权利或救济，不可视为对福布斯中文网权利的正式放弃，这些权利或救济仍对福布斯中文网有效。 </p>
<p>21.3 如本协议中的任何条款无论因何种原因完全或部分无效或不具有执行力，本协议的其余条款仍应有效并且有约束力。</p>
<p>21.4 本协议的所有标题仅仅是为了醒目及阅读方便，本身并无实际涵义，不能作为本协议涵义解释之依据。 </p>
<p>a. 法律程序所规定或政府主管部门提出要求；</p>
<p><b>22、解释权</b></p>
<p>本协议版权由福布斯中文网所有，福布斯中文网保留一切解释权利。</p></div></div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>