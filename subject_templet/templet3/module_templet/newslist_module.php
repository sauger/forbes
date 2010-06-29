<?php 
	if($pos_name=="sub3_tl"){
?>
<?php if($name!=''){?>
<div class="title"><?php echo $name;?></div>
<?php }?>
<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
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
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php }?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php }elseif($pos_name=="sub3_tc"){
?>
<?php if($name!=''){?>
<div class="title"><span class="name"><?php echo $name;?></span><span class="more"><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
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
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php }?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php }else{
?>
<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
	<div class="n_title">
		<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[0]->title;?>"<?php }?> href="news.php?id=<? echo $items[0]->id;?>">
			<?php echo $items[0]->short_title;?>
		</a>
	</div>
	<div class="description">
		<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[0]->title;?>"<?php }?> href="news.php?id=<? echo $items[0]->id;?>">
			<?php echo strip_tags($items[0]->description);?>
		</a>
	</div>
</div>
<?php } ?>
<?php
}elseif($pos_name=="sub3_tr"){ ?>
	<?php if($name!=''){?>
	<div class="title"><div class="title_box"><?php echo $name;?></div></div>
	<?php }?>
	<div class="box" <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
		<div class="box_box" <?php if($height!=''){?>style="height:<?php echo ($height-2);?>px;"<?php }?>>
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
					·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
						<?php echo $items[$i]->short_title;?>
					</a>
				</div>
			<?php }?>
			<?php if($scroll_type!=0){?>
			</marquee>
			<?php }?>
		</div>
	</div>
<?php }elseif($pos_name=="sub3_mt"){
?>

<?php
} ?>