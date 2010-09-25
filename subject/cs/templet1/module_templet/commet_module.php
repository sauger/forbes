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
		<div class="comment">
				<li style="color:#0033FF"><?php echo $items[$i]->nick_name;?>&nbsp;&nbsp;<?php echo $items[$i]->created_at;?></li>
				<li><?php echo $items[$i]->comment;?></li>
		</div>
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
	}elseif($pos_name=="pos2"||$pos_name=="pos5"||$pos_name=="pos8"){
?>
	<?php if($name!=''){?>
	<div id=contenttitle style="margin-left:8px;"><?php echo $name;?></div>
	<?php }?>
	<?php
		for ($i=0;$i<count($items);$i++){
	?>
		<div class=content7>
			<div class=name><a href="#"><?php echo $items[$i]->nick_name; ?></a></div>	
			<div class=time><?php echo $items[$i]->created_at; ?></div>	
			<div class=context><?php echo $items[$i]->comment; ?></div>	
		</div>
		<? }?>						
<?php
	}else{
?>
<?php
	}
?>