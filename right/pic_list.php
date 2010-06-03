<?php include_once(dirname(__FILE__).'/../frame.php');
init_page_items();
global $pos_name;?>
<div class=right_title>
	<div class=title_con>福布斯图片榜</div>
	<div class=more><a href="http://www.forbeschina.com/list/more/9"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div class="right_box">
	<?php for($i=0;$i<6;$i++){$pos_name = 'right_pic_list'.$i;?>
	<div class="plist_box" <?php show_page_pos($pos_name,'link_img');?>>
		<div class="plist_pic"><?php show_page_img();?></div>
		<div class="piist_title"><?php show_page_href();?></div>
	</div>
	<?php }?>
	<?php
		$db = get_db();
		$lists = $db->query("select * from fb_custom_list_type where list_type=4 order by priority asc,created_at desc limit 4");
		foreach($lists as $list){ 
	?>
	<div class="plist_line"><a href="/list/<?php echo $list->id;?>"><?php echo $list->name;?></a></div>
	<?php }?>
</div>
<div class=bottom_line></div>