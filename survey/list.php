<?php 
	include_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-新闻列表</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('news','public','right_inc','x_list');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>			
				<span>问卷调查</span>				
		</div>
		<div id="hr_top"></div>
		
		<div id="left_content">
			<div id="title"><div id="title_a"></div><div id="title_b">问卷调查</div> <div id="title_num">共18篇</div></div>
			<div id="content">
					<div id="c_c"><div class="c_left_t">标题：</div>
							<div id="c_title">“重启”瘫痪肢体</div><div id="author">《福布斯》　记者：Jonathan Fahey</div><div id="time">回复于：2010-04-16</div>
					</div>
					<div id="c_bottom">医疗专家们正在研究如何重建神经系统，以便使何重建神经系统，以便使何重建神经系统，以便使何重建神经系统，以便使瘫痪的肢体重现活力。</div>
			</div>
			<div class="hr"></div>
			
		</div>
		
		
		<div id="right_inc">
			<?php include "../right/ad.php";?>
			<?php include "../right/favor.php";?>
			<?php include "../right/four.php";?>
			<?php include "../right/forum.php";?>
			<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
</div>
</body>
<html>