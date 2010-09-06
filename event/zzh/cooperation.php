<?php 
	include_once( dirname(__FILE__) .'/../../frame.php');
	$db = get_db();
	$partner = $db->query("select * from zzh_partner order by priority asc,created_at desc;");
	!$partner && $partner = array();
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
											<li><a href="prediction.php" onfocus="this.blur()">活动专区</a></li>
											<li><a class="bc" href="cooperation.php" onfocus="this.blur()">合作伙伴</a></li>
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
										<div class="r-m-t-title" style="text-align:center;"><!-- 标题 begin-->
										<img src="images/t-left-1.gif" /><strong>福布斯中国增长会合作伙伴</strong><img src="images/t-left-2.gif" />
									</div><!-- 标题 end -->
										<div class="r-cooperation">
											<ul class="r-m-t-t-main">
												<?php foreach($partner as $p){?>
												<li class="aa"><a class="aa-pic" href="<?php echo $p->link;?>"><img src="<?php if($p->image!=''){echo $p->image;}else{?>images/cooperation-1.gif<?php }?>" /></a><strong><a href="<?php echo $p->link;?>"><?php echo $p->title;?></a></strong></li>
												<?php }?>	
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