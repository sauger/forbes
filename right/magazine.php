<?php include_once(dirname(__FILE__).'/../frame.php');
global $pos_name;?>
<div class=right_title>
	<div class=title_con>福布斯杂志</div>
	<div class=more><a href="/magazine/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div id="mag_content" <?php $pos_name='right_magazine'; show_page_pos($pos_name,'magazine');?>>
		<div class=pic><?php show_page_img()?></div>
		<div class=pictitle><?php show_page_href()?></div>
		<div class=context><?php show_page_desc()?></div>	
		<div id=mag_dash></div>
		<div id=search>往期杂志查阅</div>
		<div id=sel>
			<select id="old_magazine">
				<?php
					$db = get_db();
					$magazine = $db->query("SELECT substring(publish_data,1,4) as year FROM fb_magazine group by substring(publish_data,1,4)");
					$year_count = $db->record_count;
					for($i=0;$i<$year_count;$i++){
				?>
				<option value="<?php echo $magazine[$i]->year;?>"><?php echo $magazine[$i]->year;?>年</option>
				<?php }?>
			</select>
			<select id="show_magazine">
				<option value=""></option>
				<?php 
					$magazine = $db->query("select * from fb_magazine where publish_data like '%{$magazine[0]->year}%' order by publish_data");
					$count = $db->record_count;
					for($i=0;$i<$count;$i++){
				?>
					<option url="<?php echo $magazine[$i]->url;?>" value="<?php echo $magazine[$i]->id;?>"><?php echo $magazine[$i]->name;?></option>
				<?php			
					}
				?>
			</select>
		</div>
		<a id="btnonline"></a>
		<a id="sq"></a>
		<div id=ck><a href="/magazine/list.php">查看杂志列表>></a></div>

</div>
<div class=bottom_line></div>