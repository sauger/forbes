<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	$id = intval($_GET['id']);
	if(empty($id)){
		$name = $_GET['name'];
		if(empty($name) or strlen($name) > 20){
			die();
		}
		$db = get_db();
		$db->query("select id from fb_user where name='{$name}'");
		if($db->record_count <= 0) die();
		$id = $db->field_by_name('id');
	}
	$column = new table_class('fb_user');
	$column->find($id);
	if(!$column->id){
		redirect('error.html');
		die();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $column->nick_name;?>的专栏_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $column->nick_name;?> 福布斯专栏 专栏" />
	<meta name="description" content="<?php echo strip_tags($column->description);?>" />
	<?php
		use_jquery();
		js_include_tag('public','column_person','jquery.colorbox-min.js');
		css_include_tag('column','public','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<? include_top();?>
		<div id=bread><a href='/column'>专栏</a> > <?php echo $column->nick_name;?></div>
		<div id=bread_line></div>
		<div id=column_person_left>
			<div id=column_person_left_t></div>
			<div id=column_person_left_content>
					<div id=top>
						<div id=pic><a href="#" id="a_image"><img border=0 src="<?php echo $column->image_src2;?>"></a></div>
						<div id=pictitle_left><a><?php echo $column->nick_name;?></a></div>
						<div id=pictitle_right><button id="btn_collect"></button></div>
					</div>
					<div class=c_title>
						<div class=wz>专栏作者介绍</div>
					</div>
					<div id=c_content>
						<?php 
							$description = mb_strlen($column->description,'utf-8') > 90 ? mb_substr($column->description,0,90,'utf-8'). '...' : $column->description;
						?>
						<?php echo strip_tags($description);?>	
					</div>
					<div id=c_b_title>
						<div id=wz>按日期存档</div>
					</div>
					<div id=datetime>
						<?php
						$db=get_db();
						$datetime=$db->query('select distinct(left(created_at,7)) as date from fb_news where publisher='.$id.' order by created_at desc');
						 for($i=0;$i<count($datetime);$i++){ ?>
							<div class=c_b_content><a href="/column/<?php echo $name;?>/date/<?php echo $datetime[$i]->date;?>"><?php echo $datetime[$i]->date; ?></a></div>
						<?php } ?>
					</div>
					<div class=c_title>
						<div class=wz>其他特约专栏作家</div>
					</div>
					<?php
					
					$othercolumn=$db->query("select image_src3,nick_name,id,name from fb_user where id != $id and (image_src3 is not null and image_src3 != '') and role_name='{$column->role_name}'  order by rand() limit 6");
					for($i=0;$i<count($othercolumn);$i++){ ?>
						<div class=b_b_left>
							<div class=b_pic><a href="/column/<?php echo $othercolumn[$i]->name;?>"><img border=0 src="<?php echo $othercolumn[$i]->image_src3; ?>"></a></div>
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
				<div id="news" class="other_title selected">专栏文章</div>
				<div id="pic" class=other_title>专栏照片</div>
				<div id="other" class=other_title>专栏作者介绍</div>	
			</div>
			<iframe scrolling="no" id="iframesrc"  frameborder="no" width=100% height=956 src="iframe.php?type=news&id=<?php echo $id;?>&date=<?php echo $date; ?>"></iframe>
		</div>
		<? include_bottom();?>
	</div>
</body>
</html>