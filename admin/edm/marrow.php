<?php 
	include "../../frame.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
	$page_type = $page_type ? $page_type : $_REQUEST['page_type'];
	if(empty($page_type)){
		$page_type= 'dynamic';
	}
	if($page_type != 'static'){
		use_jquery();
	}
	init_page_items();
	#$doman = "http://admin.forbeschina.com";
	$doman = "http://127.0.0.1";
	function img_src(){
		global $pos;
		global $pos_items;
		global $doman;
		echo $doman . "/" .$pos_items->$pos->image1;
	}

	function show_href(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></a>
		<?php 		
	}
	function show_desc(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->description ? $pos_items->$pos->description : '&nbsp;';?></a>
		<?php 		
		
	}
	
?>
<style type="text/css">
	a{color:#000000; text-decoration: none;}
	.font1 a{text-decoration: none; color: #ffffff;}
	
</style>
</head>
<body style="margin-left: 0px;	margin-top: 0px;margin-right: 0px;	margin-bottom: 0px; font-size: 12px; font-family:宋体,Arial; line-height:150%;  color:#000000;">
			<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="530"><img src="images/logo.jpg" width="138" height="64" /></td>
			    <td width="120" align="right" valign="bottom"><a href="<?php echo $doman;?>/login/" target="_blank">登陆</a>　| 　<a href="<?php echo $doman;?>/register/" target="_blank">注册</a></td>
			  </tr>
			  <tr>
			    <td height="35" colspan="2" style="background:#125295; color: #FFF;">
				    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
				      <tr class="font1" style="font-weight:bold; color:#FFF;">
				        <td width="99" align="center" valign="middle" style="color: #FFF; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com"  target="_blank">福布斯首页</a></td>
				        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/list/" target="_blank">榜单</a></td>
				        <td width="59" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/billionaires/" target="_blank">富豪</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"> <a href="http://www.forbeschina.com/investment/" target="_blank">投资</a></td>
						<td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/business/" target="_blank">商业</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/entrepreneur/" target="_blank">创业</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/tech/" target="_blank">科技</a></td>
				        <td width="60" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/city/" target="_blank">城市</a></td>
				        <td width="61" align="center" valign="middle" style="color: #FFF; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com/life/" target="_blank">生活</a></td>
				        <td width="70" align="center" valign="middle" style="color: #FFF;"><a href="http://www.forbeschina.com/column/"  target="_blank">专栏</a></td>
				      </tr>
				    </table>
			    </td>
			  </tr>
			  <tr>
			  	<td width="450">
			  	<?php $pos ="marrow_entre_title";?>
			  		<table width=100% <?php show_page_pos($pos);?> style="margin-top:10px;">
			  			<tr>
			  				<td height=24 style="background:#C0C0C0; font-size:14px; font-weight:bold;">
			  					<table width=100%>
			  						<tr>
			  							<td width="90%">&nbsp;<?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></td>
			  							<td width="10%" align="right"><a style="text-decoration: underline;" href="<?php echo $pos_items->$pos->href; ?>">更多</a></td>
			  						</tr>
			  					</table>
			  				</td>
			  			</tr>
			  			<tr>
			  				<td>
			  				<?php $pos ="marrow_entre";?>
			  					<table width=100% <?php show_page_pos($pos);?> style="border:1px dotted #000000; border-top:none; color:#000000;">
			  						<tr>
			  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
			  							<td width=260>
			  								<table width=100%>
			  									<tr>
			  										<td width=98% height=17>
			  											<div style="width:100%; height:17px; font-size:17px; line-height:17px; overflow:hidden; float:left; display:inline;">
			  												<?php show_href(); ?>
			  											</div>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height="27"></td>
			  									</tr>
			  									<tr>
			  										<td width=98% height=52>
			  											<div style="width:100%; height:52px; font-size:13px; line-height:13px; overflow:hidden;  float:left; display:inline;">
			  												<?php show_desc(); ?>
			  											</div>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height="13"></td>
			  									</tr>
			  									<tr>
			  										<td width=100% height=13 align="right">
			  											<a style="text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->href;?>">详细>></a>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height=30></td>
			  									</tr>
			  									<tr>
			  										<td width=100% height=12 align="right"><div style="width:100%; height:12px; line-height:12px; overflow:hidden; float:left; display:inline;">《福布斯》记者：<a style="color:#4649B0; text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->static_href;?>"><?php echo $pos_items->$pos->alias; ?></a>&nbsp;发布于：<?php echo $pos_items->$pos->reserve; ?></div></td>
			  									</tr>
			  								</table>
			  							</td>
			  						</tr>
			  					</table>
			  				</td>
			  			</tr>
			  			<?php for($i=0;$i<3;$i++){
							$pos="marrow_entre_".$i;
			  			?>
			  			<tr><td height=3></td></tr>
			  			<tr <?php show_page_pos($pos); ?>>
			  				<td width=100% height=13>
			  					<div style="width:40%; height:13px; line-height:13px; font-size:13px; overflow:hidden; float:left; display:inline;">
			  						· <?php show_href(); ?>
			  					</div>
			  					<div style="width:60%; height:13px; line-height:13px; font-size:12px; overflow:hidden; float:left; display:inline;">《福布斯》记者： <a style="color:#4649B0; text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->static_href;?>"><?php echo $pos_items->$pos->alias; ?></a> 发布于：<?php echo $pos_items->$pos->reserve; ?></div>
			  				</td>
			  			</tr>
			  			<tr><td height=10></td></tr>
			  			<tr <?php show_page_pos($pos); ?>>
			  				<td width=100% height=45 style="background:#F8F8F8;">
			  					<div style="width:98%; height:26px; margin-left:5px; font-size:13px; line-height:13px; overflow:hidden; float:left; display:inline;">
			  						<?php show_desc(); ?>
			  					</div>
			  				</td>
			  			</tr>
			  			<tr><td height=10></td></tr>
			  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
			  			<?php }?>
			  		</table>
			  		<?php $pos ="marrow_invest_title";?>
			  		<table width=100% <?php show_page_pos($pos);?> style="margin-top:10px;">
			  			<tr>
			  				<td height=24 style="background:#C0C0C0; font-size:14px; font-weight:bold;">
			  					<table width=100%>
			  						<tr>
			  							<td width="90%">&nbsp;<?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></td>
			  							<td width="10%" align="right"><a style="text-decoration: underline;" href="<?php echo $pos_items->$pos->href;?>">更多</a></td>
			  						</tr>
			  					</table>
			  				</td>
			  			</tr>
			  			<tr>
			  				<td>
			  				<?php $pos ="marrow_invest";?>
			  					<table width=100% <?php show_page_pos($pos);?> style="border:1px dotted #000000; border-top:none; color:#000000;">
			  						<tr>
			  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
			  							<td width=260>
			  								<table width=100%>
			  									<tr>
			  										<td width=98% height=17>
			  											<div style="width:100%; height:17px; font-size:17px; line-height:17px; overflow:hidden; float:left; display:inline;">
			  												<?php show_href(); ?>
			  											</div>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height="27"></td>
			  									</tr>
			  									<tr>
			  										<td width=98% height=52>
			  											<div style="width:100%; height:52px; font-size:13px; line-height:13px; overflow:hidden;  float:left; display:inline;">
			  												<?php show_desc(); ?>
			  											</div>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height="13"></td>
			  									</tr>
			  									<tr>
			  										<td width=100% height=13 align="right">
			  											<a style="text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->href;?>">详细>></a>
			  										</td>
			  									</tr>
			  									<tr>
			  										<td height=30></td>
			  									</tr>
			  									<tr>
			  										<td width=100% height=12 align="right"><div style="width:100%; height:12px; overflow:hidden; line-height:12px; float:left; display:inline;">《福布斯》记者：<a style="color:#4649B0; text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->static_href;?>"><?php echo $pos_items->$pos->alias; ?></a>&nbsp;发布于：<?php echo $pos_items->$pos->reserve; ?></div></td>
			  									</tr>
			  								</table>
			  							</td>
			  						</tr>
			  					</table>
			  				</td>
			  			</tr>
			  			<?php for($i=0;$i<3;$i++){
							$pos="marrow_invest_".$i;
			  			?>
			  			<tr><td height=3></td></tr>
			  			<tr <?php show_page_pos($pos); ?>>
			  				<td width=100% height=13>
			  					<div style="width:40%; height:13px; line-height:13px; font-size:13px; overflow:hidden; float:left; display:inline;">
			  						· <?php show_href(); ?>
			  					</div>
			  					<div style="width:60%; height:13px; line-height:13px; font-size:12px; overflow:hidden; float:left; display:inline;">《福布斯》记者： <a style="color:#4649B0; text-decoration: underline;" href="<?php echo $doman . "/" .$pos_items->$pos->static_href;?>"><?php echo $pos_items->$pos->alias; ?></a> 发布于：<?php echo $pos_items->$pos->reserve; ?></div>
			  				</td>
			  			</tr>
			  			<tr><td height=10></td></tr>
			  			<tr <?php show_page_pos($pos); ?>>
			  				<td width=100% height=45 style="background:#F8F8F8;">
			  					<div style="width:98%; height:26px; margin-left:5px; font-size:13px; line-height:13px; overflow:hidden; float:left; display:inline;">
			  						<?php show_desc(); ?>
			  					</div>
			  				</td>
			  			</tr>
			  			<tr><td height=10></td></tr>
			  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
			  			<?php }?>
			  		</table>
			  	</td>
			  <td width=200 valign="top">
			  		<table width=184 style="margin-top:10px;float:right; display:inline;">
			  			<tr>
			  				<td width=184 height=66 ><a href=""><img width=184 height=66 border=0 src="images/dingyeu.jpg" /></a></td>
			  			</tr>
			  			<tr>
			  				<td height=15></td>
			  			</tr>
			  			<tr>
			  				<td><a style="color:#4649B0;" href="">往期福布斯精华查询</a></td>
			  			</tr>
			  			<tr>
			  				<td height=15></td>
			  			</tr>
			  			<?php $pos="marrow_banner"; ?>
			  			<tr >
			  				<td width=184 <?php show_page_pos($pos); ?>><a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>"><img border=0 width=184 src="<?php img_src(); ?>" /></a></td>
			  			</tr>
			  		</table>
			  	</td>
			  </tr>
			  <tr>
			    <td height="10" colspan="2"></td>
			  </tr>
			  <tr>
			    <td height="26" colspan="2" valign="middle"><table width="650" border="0" cellspacing="0" cellpadding="0">
			        <tr>
			          <td valign="middle">您已经订阅了本邮件，如果您想退订，请点击<a href="<?php echo $doman ."/user/user_info.php"?>" style="color:blue">此处</a>，进入“我的设置”进行退订操作。</td>
			        </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td height="20" colspan="2"></td>
			  </tr>
			  <tr>
			    <td height="24" colspan="2" align="center" valign="middle" class="font1" style="background:#2775C3; color: #FFF;"><a href="#"  target="_blank">福布斯首页</a>　　      <a href="#"  target="_blank">榜单</a>　　      <a href="#"  target="_blank">富豪</a>　      　<a href="#"  target="_blank">投资</a>　　      <a href="#" target="_blank">创业</a>　　      <a href="#" target="_blank">科技</a>　　      <a href="#" target="_blank">城市</a>　      　<a href="#" target="_blank">评论</a>　     　<a href="#" target="_blank">奢华</a>　　      <a href="#" target="_blank">专栏</a></td>
			  </tr>
			   <tr>
			    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td height="10" colspan="2"></td>
			        </tr>
			      <tr>
			        <td><img src="images/logo.jpg" width="138" height="64" /></td>
			        <td align="right" valign="top" style="font-size: 10px; font-family: Arial, Helvetica, sans-serif;"><a style="color:#333333;" href="#" target="_blank">Copyright@2001-2010 ShangHai NewEgg E-Business Co.,LTD</a></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr></tr>
			</table>
</body>
</html>