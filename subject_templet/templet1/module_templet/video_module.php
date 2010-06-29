<?php 
	if($pos_name=="pos1"){
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:203px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
	<?php
		$video_width = isset($elment_width)?$elment_width:203;
		$video_height = isset($element_height)?$element_height:150;
		show_video_player($video_width,$video_height,$items[0]->photo_url,$items[0]->video_url);
	?>
</div>
<?php
	}elseif($pos_name=="pos2"||$pos_name=="pos5"||$pos_name=="pos8"){
?>
<?php
	}else{
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:350px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> float:left; display:inline;">
	<div style="width:<?php echo isset($elment_width)?$elment_width:325;?>px; height:<?php echo isset($element_height)?$element_height:150;?>px; margin-left:15px; margin-top:5px; overflow:hidden; float:left; display:inline">
		<?php
			$video_width = isset($elment_width)?$elment_width:325;
			$video_height = isset($element_height)?$element_height:150;
			show_video_player($video_width,$video_height,$items[0]->photo_url,$items[0]->video_url);
		?>
	</div>
</div>
<?php
	}
?>