<?php 
	if($pos_name=="pos1"){
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:200px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
	<div style="width:<?php echo isset($elment_width)?$elment_width:200;?>px; height:<?php echo isset($element_height)?$element_height:100;?>px; text-indent: 2em; line-height:15px; overflow:hidden; float:left; display:inline">
		<a title="<?php echo strip_tags($items[0]->description);?>" href="news.php?id=<? echo $items[0]->id;?>" target="_blank">
			<?php
				echo strip_tags($items[0]->description);
			?>
		</a>
	</div>
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
	<div style="width:650px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
		<div style="width:<?php echo isset($elment_width)?$elment_width:650;?>px; height:<?php echo isset($element_height)?$element_height:90;?>px; text-indent: 2em; line-height:15px; overflow:hidden; float:left; display:inline">
			<a title="<?php echo strip_tags($items[0]->description);?>" href="news.php?id=<? echo $items[0]->id;?>" target="_blank">
				<?php
					echo strip_tags($items[0]->description);
				?>
			</a>
		</div>
	</div>
	<?php }else{
	?>
	<div style="width:670px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
		<div style="width:<?php echo isset($elment_width)?$elment_width:670;?>px; height:<?php echo isset($element_height)?$element_height:90;?>px; text-indent: 2em; line-height:15px; overflow:hidden; float:left; display:inline">
			<a title="<?php echo strip_tags($items[0]->description);?>" href="news.php?id=<? echo $items[0]->id;?>" target="_blank">
				<?php
					echo strip_tags($items[0]->description);
				?>
			</a>
		</div>
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
	<div style="width:<?php echo isset($elment_width)?$elment_width:320;?>px; height:<?php echo isset($element_height)?$element_height:90;?>px; margin-left:20px; margin-top:5px; text-indent: 2em; line-height:15px; overflow:hidden; float:left; display:inline">
		<a title="<?php echo strip_tags($items[0]->description);?>" href="news.php?id=<? echo $items[0]->id;?>" target="_blank">
			<?php
				echo strip_tags($items[0]->description);
			?>
		</a>
	</div>
</div>
<?php
	}
?>
