<?php include_once(dirname(__FILE__).'/../frame.php');?>
<div class=right_title>
	<div class=title_con><?php echo $catename[0]->name; ?>榜单</div>
</div>
<div class="right_box">
	<?php
		global $pos_name;
		for($i=0;$i<4;$i++){$pos_name = $pos."list".$i;
	?>
		<div class=content <?php show_page_pos($pos_name,'link')?>><li><?php show_page_href();?></li></div>
	<?php } ?>
</div>
<div class="bottom_line"></div>