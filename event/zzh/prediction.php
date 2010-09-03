<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$db = get_db();
$record = $db->paginate("select * from zzh_activity order by priority asc,created_at desc",5);
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
											<li><a href="vip.html" onfocus="this.blur()">会员专享</a></li>
											<li><a href="prediction.html" class="bc" onfocus="this.blur()">活动专区</a></li>
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
									<div class="r-m-t-two"><!-- 活动预告 begin -->
										<p class="t-title"><img src="images/t-list.gif" /><strong>活动预告</strong></p>
										<div class="main">
											<div class="more-activites">
												<img class="pic" src="images/pic.gif" />
												<p><span class="mark">活动名称:</span>2010中国最佳品牌发布会</p>
												<p><span class="mark">活动日期：</span>2010年7月6日</p>
												<p><span class="mark">活动地点：</span>北京朝阳区亮马桥路50号凯宾斯基大酒店</p>
												<p style="height:90px;overflow:hidden;line-height:22px;"><span class="mark">活动介绍：</span><a href="#">活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍</a></p>
												<p class="right"><a href="#"><strong>查看详情>></strong></a></p>	
											</div>
											<p><span class="mark">报名资格：</span>增长会员/所有用户</p>
											<p><span class="mark">报名资格：</span>增长会员免费（非增长会员300元/人）
										</div>																					
									</div>		
									<div class="r-m-t-two"><!-- 活动预告 begin -->
										<p class="t-title"><img src="images/t-list.gif" /><strong>活动预告</strong></p>
										<div class="main">
											<div class="more-activites">
												<img class="pic" src="images/pic.gif" />
												<p><span class="mark">活动名称:</span>2010中国最佳品牌发布会</p>
												<p><span class="mark">活动日期:</span>2010年7月6日</p>
												<p><span class="mark">活动地点:</span>北京朝阳区亮马桥路50号凯宾斯基大酒店</p>
												<p style="height:90px;overflow:hidden;line-height:22px;"><span class="mark">活动介绍：</span><a href="#">活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍</a></p>
												<p class="right"><a href="#"><strong>查看详情>></strong></a></p>	
											</div>
											<p><span class="mark">报名资格：</span>增长会员/所有用户</p>
											<p><span class="mark">报名资格：</span>增长会员免费（非增长会员300元/人）
										</div>																					
									</div>
									<div class="r-m-t-two"><!-- 活动预告 begin -->
										<p><span class="more1"><a href="activites.html"><img style="margin:0 5px 2px" src="images/more1.gif" />更多活动</a></span><span class="t-title"><img src="images/t-list.gif" /><strong>活动预告1</strong></span></p>
										<div class="main" style="padding:40px 5px;">
											<ul class="m-activites">
												<li><img src="images/mor-pic.gif" /><h4 style="margin:10px 0"><a href="#"><strong>2010年中国最佳品牌发布会</strong></a></h4><p><span class="mark">活动日期：</span>2010年7月6日</p><p><span class="mark">活动日期：</span>北京朝阳区亮马桥路50号凯宾斯基大酒店</p><p><span class="mark">活动介绍：</span>活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍</p></li>
												<li><img src="images/mor-pic2.gif" /><h4 style="margin:10px 0"><a href="#"><strong>2010年中国最佳品牌发布会</strong></a></h4><p><span class="mark">活动日期：</span>2010年7月6日</p><p><span class="mark">活动日期：</span>北京朝阳区亮马桥路50号凯宾斯基大酒店</p><p><span class="mark">活动介绍：</span>活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍</p></li>
												<li><img src="images/mor-pic3.gif" /><h4 style="margin:10px 0"><a href="#"><strong>2010年中国最佳品牌发布会</strong></a></h4><p><span class="mark">活动日期：</span>2010年7月6日</p><p><span class="mark">活动日期：</span>北京朝阳区亮马桥路50号凯宾斯基大酒店</p><p><span class="mark">活动介绍：</span>活动介绍活动介绍活动介绍活动介绍活动介绍活动介绍</p></li>	
											</ul>	
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