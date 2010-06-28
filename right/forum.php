<?php include_once(dirname(__FILE__).'/../frame.php');?>
<?php init_page_items();
global $pos_name;
?>
<div class=right_title>
	<div class=title_con>福布斯论坛</div>
	<div class=more><a href="/event/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div id="forum_box">
	<div class=pic><?php show_page_img(null,null,0,"image1","right_forum_news0")?></div>
	<div <?php show_page_pos("right_forum_news0")?> class=pictitle><?php show_page_href("right_forum_news0")?></div>
 	<div id=forum_dash></div>
	<?php
		for($i=1;$i<3;$i++){$pos_name = "right_forum_news".$i;
	?>
		<div class=content <?php show_page_pos($pos_name)?>><li><?php show_page_href();?></li></div>
	<?php } ?>
</div>
<div class=bottom_line></div>