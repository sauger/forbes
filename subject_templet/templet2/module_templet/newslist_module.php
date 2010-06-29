<?php 
	if($pos_name=="sub2_tl"){
?>
<?php if($name!=''){?>
<div class=l <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
	<div class=title><?php echo $name;?><span class=more><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
<?php }else{?>
<div class=l <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
<?php }?>
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
		if($show_pic==1){
	?>
	<div class="pic_box">
		<div class="pic">
			<img src="<?php echo $items[0]->photo_src;?>" width="74" height="74">
		</div>
		<div class="p_title">
			<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[0]->title;?>"<?php }?> href="news.php?id=<? echo $items[0]->id;?>">
				<?php echo $items[0]->short_title;?>
			</a>
		</div>
		<div class="description">
			<?php echo strip_tags($items[0]->description);?>
		</div>
	</div>
	<?php
		for ($i=1;$i<count($items);$i++){
	?>	
		<div class="li_context">
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php } ?>
	<?php		
		}else{
	?>
	<?php
		for ($i=0;$i<count($items);$i++){
	?>	
		<div class="li_context">
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php }}?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
	}elseif($pos_name=="sub2_tc"){
?>
<?php if($name!=''){?>
<div class=c <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?> >
	<div class=title><?php echo $name;?><span class=more><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
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
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php }else{
?>
<div class=c style="border:1px solid #ACCEE9; <?php if($height!=''){?>height:<?php echo $height;?>px;<?php }?>" >
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
	<div class="li_context2">
		<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[0]->title;?>"<?php }?> href="news.php?id=<? echo $items[0]->id;?>">
			<?php echo $items[0]->short_title;?>
		</a>
	</div>
	<?php
		for ($i=1;$i<count($items);$i++){
	?>	
		<div class="li_context">
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
}}elseif($pos_name=="sub2_tr"){
?>
<div class=r <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
	<div class=title><?php echo $name;?><span class=more><a href="newslist.php?id=<?php echo $category_id;?>">更多>></a></span></div>
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
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
</div>
<?php
}elseif($pos_name=="sub2_m"){
?>

<?php
}else{
?>
<div class=box <?php if($height!=''){?>style="height:<?php echo $height;?>px;"<?php }?>>
	<?php
		if($show_pic==1){
	?>
	<div class=picture>
		<img src="<?php echo $items[0]->photo_src;?>" width="137" height="137">
	</div>
	<div class="p_title">
		<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[0]->title;?>"<?php }?> href="news.php?id=<? echo $items[0]->id;?>">
			<?php echo $items[0]->short_title;?>
		</a>
	</div>
	<div class="description">
		<?php echo strip_tags($items[0]->description);?>
	</div>
	<?php
		for ($i=1;$i<4;$i++){
	?>	
		<div class="li_context" style="width:310px;">
			·<a target="_blank" <?php if($show_title==1){?>title="<?php echo  $items[$i]->title;?>"<?php }?> href="news.php?id=<? echo $items[$i]->id;?>">
				<?php echo $items[$i]->short_title;?>
			</a>
		</div>
	<?php } ?>
	<?php 
		}else{
	?>
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
	<?php } ?>
	<?php if($scroll_type!=0){?>
	</marquee>
	<?php }?>
	<?php
		}
	?>
	
</div>
<?php }?>