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
	$doman = "http://www.forbeschina.com";
	#$doman = "http://localhost:8081";
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
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" style="color:#17599C; text-decoration:none" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></a>
		<?php 		
	}
	function show_href2(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" style="color:#333333; text-decoration:none" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->display ? $pos_items->$pos->display : '&nbsp;';?></a>
		<?php
	}
	function show_desc(){
		global $doman;
		global $pos;
		global $pos_items; ?>
		<a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>" style="color:#666666; text-decoration:none" target="_blank" title="<?php echo $pos_items->$pos->title;?>"><?php echo $pos_items->$pos->description ? $pos_items->$pos->description : '&nbsp;';?></a>
		<?php 		
		
	}
	
?>
<style type="text/css">
	a{color:#000000; text-decoration: none;}
	.font1 a{text-decoration: none; color: #ffffff;}
	
</style>
</head>
<body>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="558"><img src="http://www.forbeschina.com/images/edm/logo.jpg" width="138" height="64" /></td>
    <td width="92" align="right" valign="bottom" style="font-family: Arial; font-size:12px;"><a style="text-decoration: none; color: #666666;" href="<?php echo $doman;?>/login/" target="_blank">登录</a>　| 　<a style="text-decoration: none; color: #666666;" href="<?php echo $doman;?>/register/" target="_blank">注册</a></td>
  </tr>
  <tr>
    <td height="35" colspan="2" style="background:#125295; color: #FFF;">
	    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
	      <tr class="font1">
	        <td width="99" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-right:1px solid #0F4382;"><a href="http://www.forbeschina.com"  target="_blank" style="text-decoration: none; color: #fff;">福布斯首页</a></td>
	        <td width="61" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/list/" target="_blank">榜单</a></td>
	        <td width="59" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/billionaires/" target="_blank">富豪</a></td>
	        <td width="60" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"> <a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/investment/" target="_blank">投资</a></td>
			<td width="60" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/business/" target="_blank">商业</a></td>
	        <td width="60" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/entrepreneur/" target="_blank">创业</a></td>
	        <td width="60" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/tech/" target="_blank">科技</a></td>
	        <td width="60" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/city/" target="_blank">城市</a></td>
	        <td width="61" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px; border-left:1px solid #1664AB; border-right:1px solid #0F4382;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/life/" target="_blank">生活</a></td>
	        <td width="70" align="center" valign="middle" style="font-weight:bold; font-family: Arial; font-size:14px;"><a style="text-decoration: none; color: #fff;" href="http://www.forbeschina.com/column/"  target="_blank">专栏</a></td>
	      </tr>
	    </table>
    </td>
  </tr>
  <tr>
  	<td width="450">
  		<?php if($page_type=='static'){
  		echo '<script language="php"> if ($DBfields["course1"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;富豪本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/billionaires/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_rich";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
  									</tr>
  								</table>
  							</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<?php for($i=0;$i<3;$i++){
				$pos="marrow_rich_".$i;
  			?>
  			<tr><td height=3></td></tr>
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php">} if ($DBfields["course2"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;创业本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/entrepreneur/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_entre";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
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
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php">} if ($DBfields["course3"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;商业本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/business/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_business";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
  									</tr>
  								</table>
  							</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<?php for($i=0;$i<3;$i++){
				$pos="marrow_business_".$i;
  			?>
  			<tr><td height=3></td></tr>
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php">} if ($DBfields["course4"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;科技本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/tech/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_tech";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
  									</tr>
  								</table>
  							</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<?php for($i=0;$i<3;$i++){
				$pos="marrow_tech_".$i;
  			?>
  			<tr><td height=3></td></tr>
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php">} if ($DBfields["course5"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;投资本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/investment/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_invest";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
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
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php"> }if ($DBfields["course6"] == 1) { </script>';
  		}?>
  		<table width=100% style="margin-top:10px;">
  			<tr>
  				<td height=24 style="background-color:#125295; font-weight:bold;">
  					<table width=100%>
  						<tr>
  							<td width="90%" style="font-size:14px; font-family:Arial; color:#ffffff;">&nbsp;生活本周精华文章</td>
  							<td width="10%" align="right" style="font-size:14px; font-family:Arial;"><a style="text-decoration:none; color:#ffffff;" href="http://www.forbeschina.com/life/">更多</a></td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<tr>
  				<td>
  				<?php $pos ="marrow_life";?>
  					<table width=100% <?php show_page_pos($pos,'edm_news');?> style="border:1px dotted #000000; border-top:none; color:#000000;">
  						<tr>
  							<td width=190 valign="top"><img style="margin-top:5px; margin-left:2px;" width=186 height=142 border=0 src="<?php img_src(); ?>" /></td>
  							<td width=260>
  								<table width=100%>
  									<tr>
  										<td width=98% height=17 style="font-size:14px; font-family:Arial;">
  											<?php show_href(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height="15"></td>
  									</tr>
  									<tr>
  										<td width=98% style="font-size:13px; font-family:Arial;">
  												<?php show_desc(); ?>
  										</td>
  									</tr>
  									<tr>
  										<td height=15></td>
  									</tr>
  									<tr>
  										<td width=100% align="right" style="font-size:12px; font-family:Arial;">《福布斯》记者：<?php echo $pos_items->$pos->alias;?><br>发布于：<?php echo $pos_items->$pos->reserve; ?></td>
  									</tr>
  								</table>
  							</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  			<?php for($i=0;$i<3;$i++){
				$pos="marrow_life_".$i;
  			?>
  			<tr><td height=3></td></tr>
  			<tr <?php show_page_pos($pos,'edm_news2'); ?>>
  				<td width=100%  style="font-size:12px; font-family:Arial;">
  						<?php show_href(); ?>《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr>
  				<td width=100% style="background:#F8F8F8; font-size:13px; font-family:Arial;">
  						<?php show_desc(); ?>
  				</td>
  			</tr>
  			<tr><td height=5></td></tr>
  			<tr><td height=1 style="border-top:1px dotted #000000;"></td></tr>
  			<?php }?>
  		</table>
  		<?php if($page_type=='static'){
  		echo '<script language="php"> } </script>';
  		}?>
  	</td>
  <td width=200 valign="top" style="padding-top:10px;">
  		<table width=184>
  			<tr>
  				<td width=184 height=66 ><a href="http://www.forbeschina.com/login/"><img width=184 height=66 border=0 src="http://www.forbeschina.com/images/edm/dingyeu.jpg" /></a></td>
  			</tr>
  			<tr>
  				<td height=15></td>
  			</tr>
  			<tr>
  				<td height=15></td>
  			</tr>
  			<?php $pos="marrow_banner"; ?>
  			<tr >
  				<td width=184 <?php show_page_pos($pos); ?>><a href="<?php echo $doman . "/" .$pos_items->$pos->href;?>"><img border=0 width=184 height=184 src="<?php img_src(); ?>" /></a></td>
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
          <td valign="middle"  style="font-size:12px; font-family:Arial;">您已经订阅了本邮件，如果您想退订，请点击<a href="<?php echo $doman ."/user/"?>"  style="color:blue; font-size:12px; font-family:Arial;">此处</a>，进入“我的设置”进行退订操作。</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" colspan="2"></td>
  </tr>
  <tr>
	    <td height="24" colspan="2" align="center" valign="middle" class="f2" style="background-color:#2775C3;font-size:14px; font-family:Arial;"><a href="http://www.forbeschina.com/" style="text-decoration: none; color: #fff;" target="_blank">福布斯首页</a>　　      <a href="http://www.forbeschina.com/list/" style="text-decoration: none; color: #fff;" target="_blank">榜单</a>　　      <a href="http://www.forbeschina.com/billionaires/" style="text-decoration: none; color: #fff;" target="_blank">富豪</a>　      　<a href="http://www.forbeschina.com/investment/" style="text-decoration: none; color: #fff;" target="_blank">投资</a>　      　<a href="http://www.forbeschina.com/business/" style="text-decoration: none; color: #fff;" target="_blank">商业</a>　　      <a href="http://www.forbeschina.com/entrepreneur/" style="text-decoration: none; color: #fff;" target="_blank">创业</a>　　      <a href="http://www.forbeschina.com/tech/" style="text-decoration: none; color: #fff;" target="_blank">科技</a>　　      <a href="http://www.forbeschina.com/city/" style="text-decoration: none; color: #fff;" target="_blank">城市</a>　     　<a href="http://www.forbeschina.com/life/" style="text-decoration: none; color: #fff;" target="_blank">生活</a>　　      <a href="http://www.forbeschina.com/column/" style="text-decoration: none; color: #fff;" target="_blank">专栏</a></td>
	  </tr>
   <tr>
    <td colspan="2"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10" colspan="2"></td>
        </tr>
      <tr>
        <td><img src="http://www.forbeschina.com/images/edm/logo.jpg" width="138" height="64" /></td>
         <td align="right" valign="top" class="f6" style="font-size: 10px;color:#333;font-family:Arial;">Copyright @ 2010 Forbes.com Inc</td>
      </tr>
    </table></td>
  </tr>
  <tr></tr>
</table>
</body>
</html>