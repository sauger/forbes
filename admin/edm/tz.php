<?php include "../../frame.php";?>
<?php 
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