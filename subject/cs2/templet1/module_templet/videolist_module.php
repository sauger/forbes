<?php 
	if($pos_name=="pos1"){
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?></div>
<?php }?>
<div style="<?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> line-height:15px;overflow:hidden; float:left; display:inline">
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
			<a target="_blank" href="/show/video.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->title;?>
			</a>
		</div>
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
<?php if(count($items)>0){?>
<div class=more><a target="_blank" href="video_list.php?id=<?php echo $category_id;?>">更多>></a></div>
<?php }?>
</div>
<?php
	}elseif($pos_name=="pos2"||$pos_name=="pos5"||$pos_name=="pos8"){
?>
<?php
	}else{
?>
<?php if($name!=''){?>
<div class=title><?php echo $name;?><div class=new_more><a target="_blank" href="video_list.php?id=<?php echo $category_id;?>">更多</a></div></div>
<?php }?>
<div style="width:350px; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?> float:left; display:inline;">
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
		<div style="width:305px; height:15px; line-height:15px; margin-top:5px; margin-left:5px; overflow:hidden; float:left; display:inline">
		<img width=5 height=5 src="/images/icon/blacksqu.jpg">　
		<a target="_blank" href="/show/video.php?id=<? echo $items[$i]->id;?>">
			<? echo $items[$i]->title;?>
		</a>
		</div>
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
	}
?>