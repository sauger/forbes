<?php 
	if($pos_name=="sub2_tl"){
?>
<?php if($name!=''){?>
<div class=l <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
	<div class=title><?php echo $name;?><span class=more><a href="photo_list.php?id=<?php echo $category_id;?>">更多>></a></span></div>
<?php }else{?>
<div class=l <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
<?php }?>
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
	<div id="focus_02" style="margin-top:10px; margin-left:13px; float:left; display:inline;"></div> 
	<script type="text/javascript"> 
	var pic_width1=290; //图片宽度
	var pic_height1=210; //图片高度
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
<?php }elseif($pos_name=="sub2_tc"){ ?>
<?php if($name!=''){?>
<div class=c <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
	<div class=title><?php echo $name;?><span class=more><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
		<?php
	$db = get_db();
	$sql = "select i.id,i.title,i.src from fb_images i join fb_subject_items s on i.id=s.resource_id where s.category_id=".$category_id;
	$record_ad=$db -> query($sql);
	$count = count($record_ad);
	for($i=0;$i<$count;$i++){
		$picsurl[]=$record_ad[$i]->src;
		$picslink[]='/show/show.php?id='.$record_ad[$i]->id;
		$picstext[]=flash_str_replace($record_ad[$i]->title);
	}
?>

<?php if($count==1){?>
	<a href="/show/show.php?id=<?php echo $record_ad[0]->img_id?>" target=_blank><img src="<?php echo $record_ad[0]->src?>" width=270px; height=180px; border=0></a>
<? }else{?>
	<script src="/flash/sohuflash_1.js" type="text/javascript"></script>
	<div id="focus_02" style="margin-top:10px; margin-left:13px; float:left; display:inline;"></div> 
	<script type="text/javascript"> 
	var pic_width1=330; //图片宽度
	var pic_height1=180; //图片高度
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
<?php }else{
?>
<div class=c style="border:1px solid #ACCEE9; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?>" >
	<?php
	$db = get_db();
	$sql = "select i.id,i.title,i.src from fb_images i join fb_subject_items s on i.id=s.resource_id where s.category_id=".$category_id;
	$record_ad=$db -> query($sql);
	$count = count($record_ad);
	for($i=0;$i<$count;$i++){
		$picsurl[]=$record_ad[$i]->src;
		$picslink[]='/show/show.php?id='.$record_ad[$i]->id;
		$picstext[]=flash_str_replace($record_ad[$i]->title);
	}
?>

<?php if($count==1){?>
	<a href="/show/show.php?id=<?php echo $record_ad[0]->img_id?>" target=_blank><img src="<?php echo $record_ad[0]->src?>" width=270px; height=180px; border=0></a>
<? }else{?>
	<script src="/flash/sohuflash_1.js" type="text/javascript"></script>
	<div id="focus_02" style="margin-top:10px; margin-left:13px; float:left; display:inline;"></div> 
	<script type="text/javascript"> 
	var pic_width1=330; //图片宽度
	var pic_height1=180; //图片高度
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
<?php }}elseif($pos_name=="sub2_tr"){?>
<div class=r <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
	<div class=title><?php echo $name;?><span class=more><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
	<?php
	$db = get_db();
	$sql = "select i.id,i.title,i.src from fb_images i join fb_subject_items s on i.id=s.resource_id where s.category_id=".$category_id;
	$record_ad=$db -> query($sql);
	$count = count($record_ad);
	for($i=0;$i<$count;$i++){
		$picsurl[]=$record_ad[$i]->src;
		$picslink[]='/show/show.php?id='.$record_ad[$i]->id;
		$picstext[]=flash_str_replace($record_ad[$i]->title);
	}
?>

<?php if($count==1){?>
	<a href="/show/show.php?id=<?php echo $record_ad[0]->img_id?>" target=_blank><img src="<?php echo $record_ad[0]->src?>" width=270px; height=180px; border=0></a>
<? }else{?>
	<script src="/flash/sohuflash_1.js" type="text/javascript"></script>
	<div id="focus_02" style="margin-top:10px; margin-left:13px; float:left; display:inline;"></div> 
	<script type="text/javascript"> 
	var pic_width1=220; //图片宽度
	var pic_height1=180; //图片高度
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
<?php
}elseif($pos_name=="sub2_m"){
?>
<div class=mbox>
	<div class=title><?php echo $name;?><span class=more><a href="photo_list.php?id=<?php echo $category_id;?>">更多>></a></span></div>
	<?php 
		if($scroll_type!=0){
		switch($scroll_type){
			case 1:
				$direction="left";
				break;
			case 2:
				$direction="up";
				break;
			case 3:
				$direction="right";
				break;
			case 4:
				$direction="down";
				break;
		}
	?>
	<marquee direction="<?php echo $direction;?>" behavior="scroll">
	<?php }?>
	<?php
		for ($i=0;$i<count($items);$i++){
	?>
	<div class="li_context">
		<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><img width="160" height="110" border=0 src="<?php echo $items[$i]->src?>"></a>
		<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><?php echo $items[$i]->title;?></a>
	</div>
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
}else{
?>
<?php } ?>