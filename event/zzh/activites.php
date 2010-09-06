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
											<li><a href="index.php" onfocus="this.blur()">增长会介绍</a></li>
											<li><a href="vip.php" onfocus="this.blur()">会员专享</a></li>
											<li><a class="bc" href="prediction.php" onfocus="this.blur()">活动专区</a></li>
											<li><a href="cooperation.php" onfocus="this.blur()">合作伙伴</a></li>
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
									<div class="r-m-t-two"><!-- 更多活动 begin -->
										<p class="t-title"><img src="images/t-list.gif" /><strong>更多活动</strong></p>
										<div class="main">
											<ul class="r-m-t-t-main">
											<?php foreach($record as $v){?>
												<li><a href="<?php echo $v->link;?>"><img class="pic" src="<?php echo $v->image;?>" />
													<p><h4><strong><?php echo $v->name;?></strong></h4></a></p>
													<p><strong>时间：</strong><?php echo $v->time;?></p>
													<p><strong>地点：</strong><?php echo $v->place;?></p>
													<p><strong>规模：</strong><?php echo $v->extent?></p>
													<p class="right"><strong><a href="<?php echo $v->link;?>">查看详情>></a></strong></p>											
												</li>
											<?php }?>
											</ul>
										<div class="page">
											<?php paginate();?>
											<!-- 	<ul>
													<li><a class="dd" href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#">5</a></li>
													<li><a href="#">7</a></li>											
												</ul> -->
										
										</div>		
										</div>								
									</div><!-- 增长会介绍 end -->
								</div>										
								<div class="right-bg-bot"><img src="images/right-bot.gif" /></div>
							</div><!-- right end-->
						</div>	<!-- content end -->					
					</div><!-- content-inner end -->
				</div><!-- body-inner-->
			</div><!-- body end -->						
		 </div><!-- container-inner end -->	
	</div><!-- container end -->
<span style="display:none;">
<script src="http://s9.cnzz.com/stat.php?id=2154547&web_id=2154547" language="JavaScript"></script>
</span>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16303233-1");
pageTracker._trackPageview();
} 
catch(err) {}
</script>
</body>
</html>