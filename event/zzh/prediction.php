<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$db = get_db();
$old = $db->query("select * from zzh_activity where is_old=1 order by priority asc,created_at desc limit 3");
!$old && $old = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>
<?php 
	use_jquery();
	init_page_items();
?>
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
								<?php for($i=0;$i<2;$i++){$pos_name = "zzh_activity".$i;?>
									<div class="r-m-t-two" <?php show_page_pos($pos_name,'zzh')?>><!-- 活动预告 begin -->
										<p class="t-title"><img src="images/t-list.gif" /><strong>活动预告</strong></p>
										<div class="main">
											<div class="more-activites">
												<img class="pic" src="<?php echo $pos_items->$pos_name->image1;?>" />
												<p><span class="mark">活动名称:</span><?php echo $pos_items->$pos_name->display;?></p>
												<p><span class="mark">活动日期：</span><?php echo $pos_items->$pos_name->title;?></p>
												<p><span class="mark">活动地点：</span><?php echo $pos_items->$pos_name->href;?></p>
												<p style="height:90px;overflow:hidden;line-height:22px;"><span class="mark">活动介绍：</span><a href="<?php echo $pos_items->$pos_name->static_href?>"><?php echo $pos_items->$pos_name->description;?></a></p>
												<p class="right"><a href="<?php echo $pos_items->$pos_name->static_href;?>"><strong>查看详情>></strong></a></p>	
											</div>
											<p><span class="mark">报名资格：</span><?php echo $pos_items->$pos_name->alias?></p>
											<p><span class="mark">报名资格：</span><?php echo $pos_items->$pos_name->reserve?>
										</div>																					
									</div>
								<?php }?>
									<div class="r-m-t-two"><!-- 活动预告 begin -->
										<p><span class="more1"><a href="activites.php"><img style="margin:0 5px 2px" src="images/more1.gif" />更多活动</a></span><span class="t-title"><img src="images/t-list.gif" /><strong>往届回顾</strong></span></p>
										<div class="main" style="padding:40px 5px;">
											<ul class="m-activites">
												<?php foreach($old as $v){?>
												<li><img src="<?php echo $v->image;?>" /><h4 style="margin:10px 0"><a href="#"><strong><?php echo $v->name;?></strong></a></h4><p><span class="mark">活动日期：</span><?php echo substr($v->time,0,10);?></p><p><span class="mark">活动地点：</span><?php echo $v->place?></p><p><span class="mark">活动介绍：</span><?php echo $v->description;?></p></li>
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