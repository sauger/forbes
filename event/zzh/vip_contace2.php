<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
require_zzh();
$id = intval($_GET['id']);
if(empty($id)){
	redirect('/event/zzh/');die();
}
$member = new table_class('zzh_member');
$member->find($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>福布斯中国增长会</title>
<?php use_jquery_ui();?>
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
										<div class="vip-co-box">	
											 <img class="pic2" src="<?php echo $member->image;?>" />
											 <p class="vip-co-name"><strong><?php echo $member->name;?></strong></p>
											 <p><span class="mark">所属行业：</span><?php echo $member->industry;?></p>
											 <p><span class="mark">公司所在地：</span><?php echo $member->company_location;?></p>
											 <p><span class="mark">公司寻求：</span><?php echo $member->item_type;?></p>
											 <p class="mark"><?php echo $member->company_name;?></p>
										 </div>										
										<div class="r-m-t-two" style="margin-top:80px">
											<div class="main" style="padding:10px 0;">
												<p>
													<span class="t-title"><img src="images/t-list.gif" /><strong>会员详细资料</strong></span>
												</p>						
												<table class="aa">
													<tr>
														<td align="right">职位：</td>
														<td align="left"class="mark"><?php echo $member->post;?></td>
													</tr>
													<tr>
														<td align="right">公司名称：</td>
														<td align="left" class="mark"><?php echo $member->company_name;?></td>
													</tr>
													<tr>
														<td align="right">公司成立时间：</td>
														<td align="left" class="mark"><?php echo $member->created_at;?></td>
													</tr>
													<tr>
														<td align="right">公司规模：</td>
														<td align="left" class="mark"><?php echo $member->company_size;?></td>
													</tr>
													<tr>
														<td align="right">公司注册资本金：</td>
														<td align="left" class="mark"><?php echo $member->capital;?></td>
													</tr>
													<tr>
														<td align="right">公司历史收入：</td>
														<td align="left" class="mark"><?php echo $member->company_name;?></td>
													</tr
														><tr>
														<td align="right"></td>
														<td align="left" class="mark" valign="top">2009年营收：200元人民币</td>
													</tr>
													<tr>
														<td align="right">公司总部所在地：</td>
														<td align="left" class="mark"><?php echo $member->company_location;?></td>
													</tr>
													<tr>
														<td align="right">邮编：</td>
														<td align="left" class="mark"><?php echo $member->zip;?></td>
													</tr>
														<tr>
														<td align="right">联系电话：</td>
														<td align="left" class="mark"><?php echo $member->phone;?></td>
													</tr>
														<tr>
														<td align="right">联系人手机：</td>
														<td align="left" class="mark"><?php echo $member->mobile;?></td>
													</tr>
														<tr>
														<td align="right">联系人邮编：</td>
														<td align="left" class="mark"><?php echo $member->zip;?></td>
													</tr>
														<tr>
														<td align="right">联系人QQ：</td>
														<td align="left" class="mark"><?php echo $member->qq;?></td>
													</tr>
													<tr>
														<td align="right">联系人MSN：</td>
														<td align="left" class="mark"><?php echo $member->msn;?></td>
													</tr>
													<tr>
														<td colspan="2" class="cc" valign="top"></td>
													</tr>
													<tr>
														<td colspan="2" class="mark">项目简介：</td>
													</tr>
													<tr>
														<td colspan="2"><?php echo $member->item_description;?></td>
													</tr>													
												</table>																								
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