<?php include "../../frame.php";?>
<?php 
	init_page_items();
	$doman = "http://www.forbeschina.com";
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
  	<td height=24 style="background:#C0C0C0; font-size:14px; font-weight:bold;">
  		<table width=100%>
  			<tr>
  				<td width="90%">&nbsp;富豪本周精华文章</td>
  				<td width="10%" align="right"><a style="text-decoration: underline;" href="http://www.forbeschina.com/entrepreneur/">更多</a></td>
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
  							<td width=100% height=12 align="right"><div style="width:100%; height:12px; line-height:12px; overflow:hidden; float:left; display:inline;">《福布斯》记者：<?php echo $pos_items->$pos->alias; ?>&nbsp;发布于：<?php echo $pos_items->$pos->reserve; ?></div></td>
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
  	<td width=100% height=13>
  		<div style="width:40%; height:13px; line-height:13px; font-size:13px; overflow:hidden; float:left; display:inline;">
  			· <?php show_href(); ?>
  		</div>
  		<div style="width:60%; height:13px; line-height:13px; font-size:12px; overflow:hidden; float:left; display:inline;">《福布斯》记者：<?php echo $pos_items->$pos->alias; ?> 发布于：<?php echo $pos_items->$pos->reserve; ?></div>
  	</td>
  </tr>
  <tr><td height=10></td></tr>
  <tr>
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
