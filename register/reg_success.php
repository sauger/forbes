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
		css_include_tag('reg_success','public','colorbox');
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
		<div id="success">
			<div id="content_left">
				<div id=context>
					<p>您已成功注册为福布斯中文网会员，完善您的个人信息并通过审核后，您就可以获得一期《福布斯》
中文版杂志免费赠阅，我们会根据您所提供的个人真实信息将杂志送到您手上。此外，您还将有机会获
得福布斯专属记事本、商务笔、帆布袋等多重惊喜，更有机会赢得一台超炫苹果MP4。更多内容请密切
关注福布斯中文网即将推出的“新会员注册有礼”及“在线转介绍有礼”活动</p>
					<div id="suc_dh">
						<div class="cl"><a href="/">福布斯中文网首页</a></div>
						<div class="cl"><a href="/list/">榜单</a></div>
						<div class="cl"><a href="/billionaires/">富豪</a></div>
						<div class="cl"><a href="/entrepreneur/">创业</a></div>
						<div class="cl"><a href="/tech/">科技</a></div>
						<div class="cl"><a href="/investment/">投资</a></div>
						<div class="cl"><a href="/city/">城市</a></div>
						<div class="cl"><a href="/life/">生活</a></div>
						<div class="cl"><a href="/column/">专栏</a></div>
					</div>
					<div id="subscribe">
						<span>您未订阅福布斯的：</span><br><br>
						　　精华文章（每周发送一次） <a style="font-weight:bold;" href="">查看精华文章版式</a><br>
    　　分类文章精华的： 富豪  创业   商业  科技  生活分类（每周发一次）  <a style="font-weight:bold;" href="">查看精华文章版式</a><br>
    　　如果您要取消订阅，请 <a href="">点击这里</a> ，并时行相关取消设置<br>
					</div>
				</div>
			</div>
			<div id="content_right">
				<div id="context">
					<div id="title">
						福布斯杂志<img src="/images/register/right_icon.jpg">
					</div>
					<div id="magazine">
						<div id="pic"><a href=""><img src="/images/register/1.jpg"></a></div>
						<div id="piccontent">
							<span>7月刊</span><br>
							　《福布斯》中文版与国际品牌研究机构Interbrand首次联合推出中国品牌50强（全榜单见www.forbeschina.com）
						</div>
					</div>
					<select class="sel1"></select><select class="sel2"></select>
					<button class="btn1">在线阅读</button><button class="btn2">申请阅读</button><button class="btn2">查看杂志</button>
					<div class="content">
						<span> ﻿·欧元狂热的极限 </span><br>
　　市场最近几个月对美元走势的看法有很大的转变，特别是美元兑欧元的表现。东方汇理银行全球外汇策略副主管马赫（Daragh Macher）先生在福布斯专栏中发表最新预测，并不看好欧元
					</div>
					<div class="content">
						<span> ﻿·欧元狂热的极限 </span><br>
　　市场最近几个月对美元走势的看法有很大的转变，特别是美元兑欧元的表现。东方汇理银行全球外汇策略副主管马赫（Daragh Macher）先生在福布斯专栏中发表最新预测，并不看好欧元
					</div>
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