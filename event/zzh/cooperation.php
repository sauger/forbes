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
<?php 
	use_jquery_ui();
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
								<?php include 'left.php';?>
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