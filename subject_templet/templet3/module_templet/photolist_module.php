<?php 
	if($pos_name=="sub3_tl"){
?>
<?php if($name!=''){?>
<div class="title"><?php echo $name;?></div>
<?php }?>
<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
	<?php
	$db = get_db();
	$sql = "select i.id,i.title,i.src from fb_images i join fb_subject_items s on i.id=s.resource_id where s.category_id=".$category_id;
	$record_ad=$db -> query($sql);
	$count = count($record_ad);
	for($i=0;$i<$count;$i++){
		$picsurl[]=$record_ad[$i]->src;
		$picslink[]='/show/show.php?id='.$record_ad[$i]->img_id;
		$picstext[]=flash_str_replace($record_ad[$i]->title);
	}
?>

<?php if($count==1){?>
	<a href="/show/show.php?id=<?php echo $record_ad[0]->img_id?>" target=_blank><img src="<?php echo $record_ad[0]->src?>" width=270px; height=180px; border=0></a>
<? }else{?>
	<script src="/flash/sohuflash_1.js" type="text/javascript"></script>
	<div id="focus_02" style="margin-top:10px; margin-left:12px; float:left; display:inline;"></div> 
	<script type="text/javascript"> 
	var pic_width1=290; //图片宽度
	var pic_height1=240; //图片高度
	var pics="<?php echo implode(',',$picsurl);?>";
	var mylinks="<?php echo implode(',',$picslink);?>";
	var texts="<?php echo implode(',',$picstext);?>";
	
	var picflash = new sohuFlash("/flash/focus.swf", "focus_02", pic_width1, pic_height1, "4","#FFFFFF");
	picflash.addParam('wmode','opaque');
	picflash.addVariable("picurl",pics);
	picflash.addVariable("piclink",mylinks);
	picflash.addVariable("pictext",texts);
	picflash.addVariable("pictime","5");
	picflash.addVariable("borderwidth",pic_width1);
	picflash.addVariable("borderheight",pic_height1);
	picflash.addVariable("borderw","false");
	picflash.addVariable("buttondisplay","true");
	picflash.addVariable("textheight","15");
	picflash.addVariable("pic_width",pic_width1);
	picflash.addVariable("pic_height",pic_height1);
	picflash.write("focus_02");
	</script>
<? }?>
</div>
<?php }?>