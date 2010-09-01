<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$id = intval($_GET['id']);
$investor = new table_class('fb_investor');
$investor->find($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>

<link href="css/basic.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
		<div id="container-inner"><!-- container-inner begin -->
			<div id="body"><!-- body begin -->					
				<div id="body-inner"><!-- body-inner begin -->
					<div id="content"><!-- content begin -->
						<div id="content-inner" class="clear"><!-- content-inner begin -->
							<div id="body-left"><!-- body-left begin -->
								<div class="logo"><img src="images/logo.gif" /></div>
								<div class="left-main">
									<div class="left-application"><a href="#"></a></div>
									<div class="left-nav">
										<ul>
											<li><a href="index.html" onfocus="this.blur()">增长会介绍</a></li>
											<li><a href="vip.html" class="bc" onfocus="this.blur()">会员专享</a></li>
											<li><a href="prediction.html" onfocus="this.blur()">活动专区</a></li>
											<li><a href="cooperation.html" onfocus="this.blur()">合作伙伴</a></li>
											<li><a href="contact us.html" onfocus="this.blur()">联系我们</a></li>
										</ul>
									</div>
									<div class="left-calendar"><img src="images/calendar.gif" /></div>
									<div class="left-part">
										<div class="left-part-top">部分会员</div>
										<div class="left-part-c">
										<a class="left-part-pic" href="#"><img src="images/logo0.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo2.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo3.gif" /></a>
										<a class="left-part-pic" href="#"><img src="images/logo2.gif" /></a>
									</div>
										<div class="left-part-bot"><img src="images/part-bot.gif" /></div>	
									</div>
									<!--<div class="left-banner"><img src="images/banner.gif" /></div>-->
								</div>	
							</div><!-- left end-->
							<div id="body-right"><!-- right begin-->
								<div class="right-bg-top"><img src="images/right-top.gif" /></div>
									<div class="right-warp">
										<div class="vip-co-box">	
											 <img class="pic1" src="<?php echo $investor->image;?>" />
											 <p class="vip-co-name"><strong><?php echo $investor->name;?></strong></p>
											 <p><span class="mark">所在公司：</span><?php echo $investor->company;?></p>
											 <p><span class="mark">身份：</span><?php echo $investor->post;?></p>
											 <p><span class="mark">投资方向：</span><?php echo $investor->invest_zone?></p>
											 <p class="mark">个人介绍</p>
										     <p><?php echo $investor->description;?></p>
										</div>										
										<div class="r-m-t-two" style="margin-top:80px">
											<div class="main" style="padding:10px 0;">
												<p>
													<span class="more1"><a href="style.html"><img style="margin:0 5px 2px" src="images/more1.gif" />更多问答</a></span>
													<span class="t-title"><img src="images/t-list.gif" /><strong>会员咨询和留言</strong></span>
												</p>						
												<table class="aa">
													<tr>
														<td valign="bottom"><span class="vip-co-name">张** 2010-7-23 18:45 说：</span></td>
													</tr>
													<tr>
														<td valign="top"><span class="vip-co-name"><strong>问：请问邓先生，是否有意向来看下我的投资项目</strong></span></td>
													</tr>
													<tr>
														<td valign="bottom">2010-7-23 18:45 说：</td>
													</tr>
													<tr>
														<td valign="top"><strong>答：你可以通过福布斯增长会在线提交你的方案和计划书，我们会收到你的计划书后您联系</strong></td>
													</tr>
													<tr>
														<td class="cc" valign="top"></td>
													</tr>
												  	<tr>
														<td valign="bottom"><span class="vip-co-name">张** 2010-7-23 18:45 说：</span></td>
													</tr>
													<tr>
														<td valign="top"><span class="vip-co-name"><strong>问：请问邓先生，是否有意向来看下我的投资项目</strong></span></td>
													</tr>
													<tr>
														<td valign="bottom">2010-7-23 18:45 说：</td>
													</tr>
													<tr>
														<td valign="top"><strong>答：你可以通过福布斯增长会在线提交你的方案和计划书，我们会收到你的计划书后您联系</strong></td>
													</tr>
													<tr>
														<td class="cc" valign="top"></td>
													</tr>

													<tr>
														<td valign="bottom"><span class="vip-co-name">张** 2010-7-23 18:45 说：</span></td>
													</tr>
													<tr>
														<td valign="top"><span class="vip-co-name"><strong>问：请问邓先生，是否有意向来看下我的投资项目</strong></span></td>
													</tr>
													<tr>
														<td valign="bottom">2010-7-23 18:45 说：</td>
													</tr>
													<tr>
														<td valign="top"><strong>答：你可以通过福布斯增长会在线提交你的方案和计划书，我们会收到你的计划书后您联系</strong></td>
													</tr>
													<tr>
														<td class="cc" valign="top"></td>
													</tr>
												</table>
												<div class="main" style="padding:10px 0;border:none;">
												 	<p><strong>向理事咨询和提问</strong></p> 
													<input type="" name="" class="tex-tarea2" style="margin-bottom:8px"></input>
													<input name="" type="radio" value="" /><span style="margin-right:10px">匿名</span><input type="submit" class="sub-but2" value="发表回复" />
													</input>												
												</div>												
											</div>
										</div>											
									</div>					
								<div class="right-bg-bot"><img src="images/right-bot.gif" /></div>
				 			</div><!-- right end-->
						</div>	<!-- content end -->					
					</div><!-- content-inner end -->
				</div><!-- body-inner-->
			</div><!-- body end -->						
		 </div><!-- container-inner end -->	
	</div><!-- container end -->	
</body>
</html>