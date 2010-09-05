<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$db = get_db();
$investor = $db->query("select * from fb_investor where is_show=1");
if($db->record_count==0){
	$investor = $db->query("select * from fb_investor limit 1");
}
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
										<div class="r-m-t-one clear" >
											<div class="r-m-t-title" style="font-size:12px;color:#464646;margin:0px;"><!-- 标题 begin-->
												<strong>加入增长会成为会员后可以在线查看福布斯增长会投资人理事的联系方式和投资动态，也可以在线留言给各位理事，同时，您也可以以查看其他增长会会员的动态，进行相关会员之间的沟通和经验分享...</strong>
											</div>	
										</div><!-- 标题 end -->		
										<div class="r-m-t-two">
											<div class="main" style="padding:10px 0;">
												<p>
													<span class="more1"><a href="style.php"><img style="margin:0 5px 2px" src="images/more1.gif" />更多理事</a></span>
													<span class="t-title"><img src="images/t-list.gif" /><strong>理事圈子</strong></span>
												</p>						
												<div class="r-m-t-one" style="text-align:right;margin:15px 0">
													<span class="mark">搜索理事</span>
													<input class="input-title" name="" type=""></input>
													<select class="input-title" name=""><option>全部/IT/化工</option></select>
													<input  name="搜索" type="submit" class="sub-but" value="搜索"/>
												</div>	
												<div class="vip-style">
													<div class="vip-style-pic"><img class="vip-style-p" src="<?php echo $investor[0]->image;?>" /><a href="#"><img src="images/Contact-1.gif" /></a></div>
													<p class="mark"><?php echo $investor[0]->name;?></p>
													<p class="mark"><?php echo $investor[0]->post;?></p>
													<p><span class="mark">投资方向：</span><?php echo $investor[0]->invest_zone;?></p>
													<p class="mark">个人介绍：</p>
													<p><?php echo $investor[0]->description;?></p>			</div>
											</div>
										</div>
										<div class="r-m-t-two" style="margin-top:80px">
											<div class="main" style="padding:10px 0;">
												<p>
													<span class="more1"><a href="style.html"><img style="margin:0 5px 2px" src="images/more1.gif" />更多会员</a></span>
													<span class="t-title"><img src="images/t-list.gif" /><strong>会员展示</strong></span>
												</p>						
												<div class="r-m-t-one" style="text-align:right;margin:15px 0">
													<span class="mark">搜索理事</span>
													<input class="input-title" name="" type=""></input>
													<select class="input-title" name=""><option>全部/IT/化工</option></select>
													<input  name="搜索" type="submit" class="sub-but" value="搜索"/>
												</div>	
												<div class="vip-style" style="line-height:20px;">
													<div class="vip-style-pic"><img class="vip-style-p" src="images/style-1.gif" /></div>
													<p class="mark">比尔盖茨</p>
													<p>行业性质：<span class="mark">互联网 IT</span></p>
													<p>公司地点：<span class="mark">上海</span></p>
													<p>公司寻求：<span class="mark">VC/天使投资</span></p>
													<p><span class="mark" style="margin-right:15px">上海智慧文化传播</span><a href="#">详情点击>></a></p><p class="mark">项目介绍</p>智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播
													上海智慧文化传播上海智慧文化传播上海智慧文化传播化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化					传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播上海智慧文化传播</p>		</div>
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