<?php include_once(dirname(__FILE__).'/../frame.php');?>
<div class="left_title">
	<div name="column" class="left_top_title column_list selected">最受欢迎专栏</div>
	<div style="margin-left:1px;" name="journalist" class="left_top_title column_list">最受欢迎采编空间</div>
</div>
<div id="column" class="right_box left_top">
	<?php
	$db = get_db();
	$sql = "SELECT t1.*,sum(t2.click_count) num,t2.* FROM fb_user t1 join (select click_count,publisher,title,created_at,id from fb_news order by created_at desc) t2 on t1.id=t2.publisher  where t1.role_name='column_writer' group by t1.id order by num limit 5";
	$record = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
	?>
	<div class="column_box">
		<div class="col_pic">
			<a href="/column/<?php echo $record[$i]->name;?>"><img border="0" src="<?php echo $record[$i]->image_src;?>"></a>
		</div>
		<div class="clo_name">
			<a href="/column/<?php echo $record[$i]->name;?>"><?php echo $record[$i]->nick_name;?></a>
		</div>
		<div class="clo_des">
			<?php echo strip_tags($record[$i]->description);?>
		</div>
		<div class="clo_news">
			<a href="<?php echo static_news_url($record[$i])?>"><?php echo $record[$i]->title;?></a>
		</div>
	</div>
	<?php }?>
</div>
<div id="journalist" style="display:none;" class="right_box left_top">
	<?php
	$db = get_db();
	$sql = "SELECT t1.*,sum(t2.click_count) num,t2.* FROM fb_user t1 join (select click_count,publisher,title,created_at,id from fb_news order by created_at desc) t2 on t1.id=t2.publisher  where t1.role_name='column_editor' group by t1.id order by num limit 5";
	$record = $db->query($sql);
	$count = $db->record_count;
	for($i=0;$i<$count;$i++){
	?>
	<div class="column_box">
		<div class="col_pic">
			<a href="/column/<?php echo $record[$i]->name;?>"><img border="0" src="<?php echo $record[$i]->image_src;?>"></a>
		</div>
		<div class="clo_name">
			<a href="/column/<?php echo $record[$i]->name;?>"><?php echo $record[$i]->nick_name;?></a>
		</div>
		<div class="clo_des">
			<?php echo strip_tags($record[$i]->description);?>
		</div>
		<div class="clo_news">
			<a href="<?php echo static_news_url($record[$i])?>"><?php echo $record[$i]->title;?></a>
		</div>
	</div>
	<?php }?>
</div>
<div class="bottom_line"></div>