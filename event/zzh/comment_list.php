<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
require_zzh();
$id = intval($_GET['id']);
if(empty($id)){
	redirect('/event/zzh/');die();
}
$investor = new table_class('fb_investor');
$investor->find($id);
$db = get_db();
$comment = $db->paginate("select * from zzh_comment where investor_id=$id and is_adopt=1 order by created_at desc",10);
!$comment && $comment = array();
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
													<span class="more1"><a href="comment_list.php?id=<?php echo $id;?>"><img style="margin:0 5px 2px" src="images/more1.gif" />更多问答</a></span>
													<span class="t-title"><img src="images/t-list.gif" /><strong>会员咨询和留言</strong></span>
												</p>						
												<table class="aa">
												<?php 
													foreach($comment as $v){
												?>
													<tr>
														<td valign="bottom"><span class="vip-co-name"><?php echo $v->nick_name;?> <?php echo $v->created_at?> 说：</span></td>
													</tr>
													<tr>
														<td valign="top"><span class="vip-co-name"><strong>问：<?php echo $v->comment;?></strong></span></td>
													</tr>
													<?php if($v->reply!=''){?>
													<tr>
														<td valign="bottom"><?php echo $v->reply_time;?> 说：</td>
													</tr>
													<tr>
														<td valign="top"><strong>答：<?php echo $v->reply;?></strong></td>
													</tr>
													<?php }?>
													<tr>
														<td class="cc" valign="top"></td>
													</tr>
													<?php }?>
												</table>
											</div>
											<div class="page">
												<?php paginate();?>
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
