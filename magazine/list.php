<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>杂志列表_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('magazine/list','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
	<?php include_top();?>
		<div id=bread>
			<a href="/magazine/">杂志</a> > 杂志列表
		</div>
		<div id=bread_line></div>
		<div id=zzleft>
			<div id=l_t_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>
				</div>
				<?php
					$db = get_db();
					$magazine = $db->query("select * from fb_magazine where 1=1 order by publish_data desc");
				?>
				<div class=l_pic>
					<a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>"><img border=0 src="<?php echo $magazine[0]->img_src;?>"></a>	
				</div>
				<div id=r_t>
					<div id=title><a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>"><?php echo $magazine[0]->name;?></a></div>
				</div>
				<div class=r_b>
					<div class=title>
						<div class=wz><a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>"><?php echo $magazine[0]->title;?></a></div>
					</div>
					<div class=content>
						<a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>"><?php echo $magazine[0]->description;?></a>	
					</div>
					<div class=moreinfo><a href="<?php echo "{$static_site}/magazine/{$magazine[0]->id}";?>">杂志详细介绍>></a></div>
				</div>
			</div>
			<div class=l_dash></div>
			<?php
				$sql = "select * from fb_magazine where publish_data<'{$magazine[0]->publish_data}'";
				$magazines = $db->paginate($sql,4);
				$count = count($magazines);
				for($i=0;$i<$count;$i++){
			?>
			<div class=l_b_content>
				<div class=pic>
					<a href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>"><img border=0 src="<?php echo $magazines[$i]->img_src;?>"></a>	
				</div>
				<div class=pictitle><a href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>"><?php echo $magazines[$i]->name;?></a></div>
				<div class=piccontent>
					<div class=pic_c_t><a href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>"><?php echo $magazines[$i]->title;?></a></div>
					<div class=pic_c_m><a href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>"><?php echo $magazines[$i]->description;?></a></div>
				</div>
				<div class=picinfo><a href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>">杂志详细介绍</a></div>
			</div>
			<div class=l_dash></div>
			<?php }?>
			<div class="paginate"><?php paginate();?></div>
		</div>
		<div id=right_inc>
			<?php include_right("ad")?>
			<?php include_right("favor")?>
			<?php include_right("four")?>
			<?php include_right("magazine")?>
		</div>
	<?php include_bottom();?>
	</div>
</body>
</html>