<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	$id = intval($_GET['id']);
	$date=$_GET['date'];
	if(empty($id)){
		$name = $_GET['name'];
		if(empty($name)){
			die();
		}
		$db = get_db();
		$db->query("select id from fb_user where name='{$name}'");
		if($db->record_count <= 0) die();
		$id = $db->field_by_name('id');
	}
	$column = new table_class('fb_user');
	$column->find($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-特约作者</title>
	<?php
		use_jquery();
		js_include_tag('public','column_person','jquery.colorbox-min.js');
		css_include_tag('column','public','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<? include_top();?>
		<div id=bread><a href="#">专栏</a></div>
		<div id=bread_line></div>
		<div id=column_person_left>
			<div id=column_person_left_t></div>
			<div id=column_person_left_content>
					<div id=top>
						<div id=pic><a href=""><img border=0 src="<?php echo $column->image_src;?>"></a></div>
						<div id=pictitle_left><a><?php echo $column->nick_name;?></a></div>
						<div id=pictitle_right><button></button></div>
					</div>
					<div class=c_title>
						<div class=wz>专栏作者介绍</div>
					</div>
					<div id=c_content>
						<?php echo $column->description;?>	
					</div>
					<div id=c_b_title>
						<div id=wz>按日期存档</div>
					</div>
					<?php
					$db=get_db();
					$datetime=$db->query('select distinct(concat(left(created_at,7))) as date from fb_news where publisher='.$id.' order by created_at desc limit 5');
					 for($i=0;$i<count($datetime);$i++){ ?>
						<div class=c_b_content><a href="/column/<?php echo $name;?>/date/<?php echo $datetime[$i]->date;?>"><?php echo $datetime[$i]->date; ?></a></div>
					<?php } ?>
					<div class=c_title>
						<div class=wz>其他特约专栏作家</div>
					</div>
					<?php
					
					$othercolumn=$db->query('select image_src,nick_name,id,name from fb_user where id<>'.$id.' order by id desc limit 6');
					for($i=0;$i<count($othercolumn);$i++){ ?>
						<div class=b_b_left>
							<div class=b_pic><a href="/column/<?php echo $othercolumn[$i]->name;?>"><img border=0 src="<?php echo $othercolumn[$i]->image_src; ?>"></a></div>
							<div class=b_pictitle><a href="/column/<?php echo $othercolumn[$i]->name;?>"><?php echo $othercolumn[$i]->nick_name; ?></a></div>
						</div>
					<?php } ?>
			</div>
			<div id=column_person_left_b></div>
		</div>
		<div id=column_person_right>
			<div id=title>
				<input type="hidden" id="columnid" value="<?php echo $id; ?>">
				<input type="hidden" id="columndate" value="<?php echo $date; ?>">
				<div param=1 id="othertitle1" param1="news" class=other_title>专栏文章</div>
				<div param=2 id="othertitle2" param1="pic" class=other_title>专栏照片</div>
				<div param=3 id="othertitle3" param1="other" class=other_title>专栏作者详细介绍</div>	
			</div>
			<iframe scrolling="no" id="iframesrc"  frameborder="no" width=100% height=1000px; src="iframe.php?type=news&id=<?php echo $id;?>&date=<?php echo $date; ?>"></iframe>
		</div>
		<? include_bottom();?>
	</div>
</body>
</html>
<script>
	$(function(){
		$("#othertitle1").attr('class','dq_title');
	});
</script>