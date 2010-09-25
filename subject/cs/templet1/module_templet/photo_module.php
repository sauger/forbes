<?php 
	if($pos_name=="pos1"){
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:203px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
	<?php
		$photo_width = isset($elment_width)?$elment_width:203;
		$photo_height = isset($element_height)?$element_height:150;
	?>
	<?php if($items[0]->url!=''){?>
	<a href="<?php echo $items[0]->url;?>" target="_blank"><img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>"></a>
	<?php }else{
	?>
	<img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>">
	<?php
	}?>
</div>
<?php
	}elseif($pos_name=="pos2"||$pos_name=="pos5"||$pos_name=="pos8"){
?>
<div class=gd <?php if($name!=''){?>style="background:url(/images/bg/djgd_bg.jpg) no-repeat;"<?php }?>>
	<?php if($name!=''){?>
	<div style="float:left;display:inline;">
	<table height=109 width=21>
		<tr valign="middle">
			<td>
				<div class=right_title><?php echo $name;?></div>
			</td>
		</tr>
	</table>
	</div>
	<div style="width:650px; float:left; display:inline">
		<?php
		$photo_width = isset($elment_width)?$elment_width:660;
		$photo_height = isset($element_height)?$element_height:106;
		?>
		<?php if($items[0]->url!=''){?>
		<a href="<?php echo $items[0]->url;?>" target="_blank"><img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>"></a>
		<?php }else{
		?>
		<img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>">
		<?php
		}?>
	</div>
	<?php }else{
	?>
	<div style="width:690px; float:left; display:inline">
		<?php
		$photo_width = isset($elment_width)?$elment_width:690;
		$photo_height = isset($element_height)?$element_height:106;
		?>
		<?php if($items[0]->url!=''){?>
		<a href="<?php echo $items[0]->url;?>" target="_blank"><img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>"></a>
		<?php }else{
		?>
		<img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>">
		<?php
		}?>
	</div>
	<?php }?>
</div>
<?php		
	}else{
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:350px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> float:left; display:inline;">
	<?php
		$photo_width = isset($elment_width)?$elment_width:325;
		$photo_height = isset($element_height)?$element_height:100;
	?>
	<div style="width:<?php echo isset($elment_width)?$elment_width:325;?>px; height:<?php echo isset($element_height)?$element_height:100;?>px; margin-left:15px; margin-top:5px; overflow:hidden; float:left; display:inline">
		<?php if($items[0]->url!=''){?>
		<a href="<?php echo $items[0]->url;?>" target="_blank"><img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>"></a>
		<?php }else{
		?>
		<img src="<?php echo $items[0]->src;?>" width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>">
		<?php
		}?>
	</div>
</div>
<?php
	}
?>