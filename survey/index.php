<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$db = get_db();
	$sql="SELECT id,name,description,created_at FROM forbes.fb_vote where is_sub_vote=0 and is_adopt=1 order by priority asc,created_at desc ";
	$value=$db->paginate($sql,13);
	$count=$db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>问卷调查_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('public','right_inc','survey');
	?>
</head>
<body>
<div id=ibody>
		<?php include_top();?>
		<div id=bread>问卷调查</div>
		<div id="bread_line"></div>
		<div id="left_content">
			<div id="t_left"></div>
				<div id="t_c">
				<div id="title">
					<div id="title_a"></div>
					<div id="title_b">问卷调查</div>
					<div id="title_num">共<?php echo $page_record_count;?>篇</div>
				</div>
			</div>
			<div id="t_right"></div>
			<?php
				for($i=0;$i<$count;$i++){
			?>
				<div class="content">
					<div class="c_c">
						<div class="c_title"><a href="survey.php?id=<?php echo $value[$i]->id;?>"><?php echo $value[$i]->name;?></a></div><div class="time">发布于：<?php echo $value[$i]->created_at ?></div>
					</div>
					<div class="c_bottom"><?php echo $value[$i]->description?></div>
				</div>
				<div class="hr"></div>
			<?php
				}
			?>
			<div id="page"><?php paginate();?></div>
		</div>
		<div id="right_inc">
			<?php include_right("ad")?>
			<?php include_right("favor")?>
			<?php include_right("four")?>
			<?php include_right("forum")?>
			<?php include_right("magazine")?>
		</div>
		<?php include_bottom();?>
</div>
</body>
<html>