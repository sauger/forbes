<?php 
	if($pos_name=="pos1"){
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:203px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline">
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
	<marquee direction="<?php echo $direction;?>" behavior="scroll" onmousemove=this.stop() onmouseout=this.start()>
	<?php }?>
	<?php
		$photo_width = isset($elment_width)?$elment_width:203;
		$photo_height = isset($element_height)?$element_height:120;
		for($i=0;$i<count($items);$i++){
	?>
	<div style="width:<?php echo $photo_width;?>px; text-align:center; float:left; display:inline;">
			<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><img width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>" src="<?php echo $items[$i]->src?>"></a>
			<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><?php echo $items[$i]->title;?></a>
	</div>
	<?php
		}
	?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
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
	<?php }?>
	<div style="width:650px; margin-left:5px; float:left; display:inline">
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
	<marquee direction="<?php echo $direction;?>" behavior="scroll" onmousemove=this.stop() onmouseout=this.start()>
	<?php }?>
	<?php
		$photo_width = isset($elment_width)?$elment_width:150;
		$photo_height = isset($element_height)?$element_height:85;
		for($i=0;$i<count($items);$i++){
	?>
	<div style="width:<?php echo $photo_width;?>px; margin-left:5px; margin-top:4px; text-align:center; float:left; display:inline;">
			<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><img width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>" src="<?php echo $items[$i]->src?>"></a>
			<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><?php echo $items[$i]->title;?></a>
	</div>
	<?php
		}
	?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
	</div>
</div>
<?php		
	}else{
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="width:350px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> float:left; display:inline;">
	<?php
		$photo_width = isset($elment_width)?$elment_width:100;
		$photo_height = isset($element_height)?$element_height:80;
	?>
	<div style="width:<?php echo isset($elment_width)?$elment_width:325;?>px; height:<?php echo isset($element_height)?$element_height:100;?>px; margin-left:15px; margin-top:5px; overflow:hidden; float:left; display:inline">
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
	<marquee direction="<?php echo $direction;?>" behavior="scroll" onmousemove=this.stop() onmouseout=this.start()>
	<?php }?>
		<?php
			for($i=0;$i<count($items);$i++){
		?>
		<div style="width:<?php echo $photo_width;?>px; margin-left:5px; margin-top:4px; text-align:center; float:left; display:inline;">
				<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><img width="<?php echo $photo_width;?>" height="<?php echo $photo_height;?>" src="<?php echo $items[$i]->src?>"></a>
				<a href="/show/show.php?id=<?php echo $items[$i]->id;?>"><?php echo $items[$i]->title;?></a>
		</div>
		<?php
			}
		?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
	</div>
</div>
<?php
	}
?>