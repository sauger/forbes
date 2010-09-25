<?php 
	if($pos_name=="sub3_tl"){
?>
<?php if($name!=''){?>
<div class="title"><?php echo $name;?></div>
<?php }?>
<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
<div class="v_name"><?php echo $items[0]->title;?></div>
<div class="v_box">
	<?php
		$video_width = isset($elment_width)?$elment_width:265;
		$video_height = isset($element_height)?$element_height:190;
		show_video_player($video_width,$video_height,$items[0]->photo_url,$items[0]->video_url);
	?>
</div>
</div>
<?php } ?>