<?php 
	include_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-问卷调查</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('news','public','right_inc','x_list');
		$news_count = $db->query("SELECT count(id) as num  FROM forbes.fb_vote f");
	?>
</head>
<body>
<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>			
				<span>问卷调查</span>				
		</div>
		<div id="hr_top"></div>
				<?php
					if($news_count>=1)
					{
							$sql="SELECT f.id,f.name,f.description,f.created_at FROM forbes.fb_vote f order by f.description desc ";
				?>
				<div id="left_content">
				<div id="t_left"></div>
					<div id="t_c">
					<div id="title"><div id="title_a"></div><div id="title_b">问卷调查</div> <div id="title_num">共<?php echo $v=$news_count[0]->num;?>篇</div>
					</div>
				</div>
				<div id="t_right"></div>
				<?php
					$value=$db->paginate($sql,13);
					$count=count($value);
				for($i=0;$i<$count;$i++){
				?>
			<div id="content">
					<div id="c_c">
							<div id="c_title"><a href="survey.php?id=<?php echo $value[$i]->id;?>"><?php echo $value[$i]->name;?></a></div><div id="time">发布于：<?php echo $value[$i]->created_at ?></div>
					</div>
					<div id="c_bottom"><?php echo $value[$i]->description?></div>
			</div>
			<div class="hr"></div>
			<?php
				}
			?>
				<div id="page"><?php paginate();?></div>
		</div>
		<?php
	}else
	{
		alert("对不起！调查问卷中暂时无内容！");
	}
	?>
		
		
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