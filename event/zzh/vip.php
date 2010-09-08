<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$db = get_db();
$investor = $db->query("select * from fb_investor where is_show=1");
if($db->record_count==0){
	$investor = $db->query("select * from fb_investor limit 1");
}
$user = $db->query("select * from zzh_member where is_show=1");
if($db->record_count==0){
	$user = $db->query("select * from zzh_member limit 1");
}
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
													<div class="vip-style-pic"><a href="vip_contace.php?id=<?php echo $investor[0]->id;?>"><img class="vip-style-p" src="<?php echo $investor[0]->image;?>" /></a><a href="#"><img src="images/Contact-1.gif" /></a></div>
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
													<div class="vip-style-pic"><a href="user.php?id=<?php echo $user[0]->id;?>"><img class="vip-style-p" src="<?php echo $user[0]->image;?>" /></a></div>
													<p class="mark"><?php echo $user[0]->name;?></p>
													<p>行业性质：<span class="mark"><?php echo $user[0]->industry;?></span></p>
													<p>公司地点：<span class="mark"><?php echo $user[0]->address;?></span></p>
													<p>公司寻求：<span class="mark"><?php echo $user[0]->item_type;?></span></p>
													<p><span class="mark" style="margin-right:15px"><?php echo $user[0]->company_name;?></span><a href="user.php?id=<?php echo $user[0]->id;?>">详情点击>></a></p><p class="mark">项目介绍</p><?php echo $user[0]->item_description;?></p>		</div>
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