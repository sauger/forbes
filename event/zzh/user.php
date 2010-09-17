<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$id = intval($_GET['id']);
$user = new table_class('zzh_member');
$user->find($id);
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
										<div class="vip-co-box">	
											 <img class="pic2" src="<?php echo $user->image;?>" />
											 <p class="vip-co-name"><strong><?php echo $user->name;?></strong></p>
											 <p><span class="mark">行业性质：</span><?php echo $user->industry;?></p>
											 <p><span class="mark">公司所在地：</span><?php echo $user->address;?></p>
											 <p><span class="mark">公司寻求：</span><?php echo $user->item_type;?></p>
											 <p class="mark"><?php echo $user->company_name;?></p>
										 </div>										
										<div class="r-m-t-two" style="margin-top:80px">
											<div class="main" style="padding:10px 0;">
												<p>
													<span class="t-title"><img src="images/t-list.gif" /><strong>会员详细资料</strong></span>
												</p>						
												<table class="aa">
													<tr>
														<td align="right">职位：</td>
														<td align="left"class="mark"><?php echo $user->post;?></td>
													</tr>
													<tr>
														<td align="right">公司名称：</td>
														<td align="left" class="mark"><?php echo $user->company_name;?></td>
													</tr>
													<tr>
														<td align="right">公司成立时间：</td>
														<td align="left" class="mark"><?php echo $user->company_created;?></td>
													</tr>
													<tr>
														<td align="right">公司规模：</td>
														<td align="left" class="mark"><?php echo $user->company_size;?></td>
													</tr>
													<tr>
														<td align="right">公司注册资本金：</td>
														<td align="left" class="mark"><?php echo $user->capital;?></td>
													</tr>
													<?php 
														$db = get_db();
														$income = $db->query("select * from zzh_member_income where sign_id=$id and type=1 order by year");
														!$income && $income = array();
														foreach($income as $i => $v){
													?>
														<tr>
														<td align="right"><?php if($i==0){?>公司历史收入：<?php }?></td>
														<td align="left" class="mark"><?php echo $v->year;?>年营收：<?php echo $v->income;?>万人民币</td>
													</tr>
													<?php }?>
													<tr>
														<td align="right">公司总部所在地：</td>
														<td align="left" class="mark"><?php echo $user->company_location;?></td>
													</tr>
													<tr>
														<td align="right">邮编：</td>
														<td align="left" class="mark"><?php echo $user->zip;?></td>
													</tr>
														<tr>
														<td align="right">联系电话：</td>
														<td align="left" class="mark"><?php echo $user->phone;?></td>
													</tr>
														<tr>
														<td align="right">联系人手机：</td>
														<td align="left" class="mark"><?php echo $user->mobile;?></td>
													</tr>
														<tr>
														<td align="right">联系人邮编：</td>
														<td align="left" class="mark"><?php echo $user->zip;?></td>
													</tr>
														<tr>
														<td align="right">联系人QQ：</td>
														<td align="left" class="mark"><?php echo $user->qq;?></td>
													</tr>
													<tr>
														<td align="right">联系人MSN：</td>
														<td align="left" class="mark"><?php echo $user->msn;?></td>
													</tr>
													<tr>
														<td colspan="2" class="cc" valign="top"></td>
													</tr>
													<tr>
														<td colspan="2" class="mark">项目简介：</td>
													</tr>
													<tr>
														<td colspan="2"><?php echo $user->item_description;?></td>
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