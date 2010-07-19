<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$db=get_db();
	$key = $_GET['key'];
	$type = $_GET['type'];
	$role = $_GET['role'];
	$types = array('created_at','click_count','role');
	if(strlen($key)>40){
		$key = '';
	}
	if(!in_array($type,$types)){
		$type = "created_at";
	}
	if($type=='role'){
		if(!in_array($role,array('column_writer','column_editor'))){
			$c = " where (t1.image_src is not null or t1.image_src = '')";
		}else{
			$c =" where (t1.image_src is not null or t1.image_src = '') and role_name = '$role'";
		}
		$sql = "select * from fb_user t1 {$c}";
		$user = $db->paginate($sql,6);
		$count = $db->record_count;
	}else{
		if($key){
			#$sql = "select a.* from fb_user a left join fb_news b on b.publisher=a.id where (a.role_name = 'column_editor' or a.role_name='column_writer') and a.nick_name like '%$key%' order by $type group by a.id ";
			$sql = "select * from (select t1.* from fb_user t1 join fb_news t2 on t1.id=t2.publisher order by $type) as t where nick_name like '%$key%' and (t1.image_src is not null or t1.image_src = '') and (role_name = 'column_editor' or role_name='column_writer') group by id";
			$user=$db->paginate($sql,6);
			$count = $db->record_count;
		}else{
			$count = 0;
			$page_record_count = 0;
		}	
	}
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>作者检索_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right','search/author');
		css_include_tag('search/author','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
	<?php
		include_top();
	?>
		<div id=bread>专栏作者检索	</div>
		<div id=bread_line></div>
		<div id=cy_left>
			<div id=cy_title>
				<div id=title_left></div>
				<div id=title_center>
					<?php if($type == 'role'){?>
						<?php if($role=='column_editor'){?>
							<div id=bt>采编空间共有<?php echo $page_record_count;?>位</div>
						<?php }else{?>
							<div id=bt>专栏作者共有<?php echo $page_record_count;?>位</div>
						<?php }?>
					<?php }else{?>
					<div id=bt>您搜索的关键字"<?php echo $key;?>"的作者共有<?php echo $page_record_count;?>位</div>
					<?php }?>	
				</div>
				<div id=title_right></div>
			</div>
			<?php for($i=0;$i<$count;$i++){ ?>
			<div class=cy_content>
				<div class=pic>
					<img border=0 src="<?php echo $user[$i]->image_src;?>">
				</div>
				<div class=pictitle>
					<a href="<?php echo "{$static_site}/column/{$user[$i]->name}";?>"><?php echo $user[$i]->nick_name;?>专栏</a>
				</div>
				<div class=piccontent>
					<?php echo strip_tags($user[$i]->description);?>
				</div>
			</div>
			<div class=newarticle>
				<div class=wz>最新专栏文章</div>
				<div class=wx>
					<div class="enterzl"></div>	
				</div>
				<?php 
					$news=$db->query('select * from fb_news where publisher='.$user[$i]->id.' order by priority asc, created_at desc limit 2');
					$ncount = $db->record_count;
					for($j=0;$j<$ncount;$j++){
				?>
				<div class=content>
					<div class=context><a href="<?php echo column_article_url($user[$i]->name,$news[$j],'static');?>"><?php echo $news[$j]->title;?></a></div>
				</div>
				<?php if($j==0){?>
				<div class=content_dash></div>
				<?php }}?>
			</div>
			<?php if($i!=$count-1){?>
			<div class=cy_dash></div>
			<?php }?>
			<?php } ?>
			<div id=paginage><?php paginate(); ?></div>
		</div>
		<div id="right_inc">
			<?php include_right("ad");?>
			<?php include_right("favor");?>
			<?php include_right("four");?>
			<?php include_right("forum");?>
			<?php include_right("magazine");?>
		</div>
		<?php include_bottom();?>
	</div>
</body>
</html>