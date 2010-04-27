<?php 
	include_once('../frame.php');
	$db=get_db();
	$key = $_GET['key'];
	$type = $_GET['type'];
	if(empty($type)){
		$type = "created_at";
	}
	if(strlen($key)>20){
		$key = '';
	}
	if(strlen($type)>20){
		$type = "created_at";
	}
	if($key){
		$sql = "select * from (select t1.* from fb_user t1 join fb_news t2 on t1.id=t2.author_id order by $type) as t where nick_name like '%$key%' group by id";
		$user=$db->paginate($sql,5);
		$count = $db->record_count;
	}else{
		$count = 0;
		$page_record_count = 0;
	}
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-城市首页</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('tyzl','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
	<?php
		include_once('../inc/top.inc.php');
	?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a href="">城市首页</a></div>
		<div id=cyline></div>
		<div id=cy_left>
			<div id=search>专栏搜索：<select></select><input type="text"><button>搜索</button></div>
			<div id=cy_title>
				<div id=title_left></div>
				<div id=title_center>
					<div id=bt>您搜索的关键字"<?php echo $key;?>"的作者共有<?php echo $page_record_count;?>位</div>	
				</div>
				<div id=title_right></div>
			</div>
			<?php for($i=0;$i<$count;$i++){ ?>
			<div class=cy_content>
				<div class=pic>
					<img border=0 src="<?php echo $user[$i]->image_src;?>">
				</div>
				<div class=pictitle>
					<?php echo $user[$i]->nick_name;?>专栏
				</div>
				<div class=piccontent>
					<?php echo $user[$i]->description;?>
				</div>
			</div>
			<div class=newarticle>
				<div class=wz>最新专栏文章</div>
				<div class=wx>
					<div class="enterzl"><a href="/column/column.php?id=<?php echo $user[$i]->id;?>">进入专栏>></a></div>	
				</div>
				<?php 
					$news=$db->query('select * from fb_news where author_id='.$user[$i]->id.' and is_adopt=1 order by priority asc, created_at desc limit 2');
					$ncount = $db->record_count;
					for($j=0;$j<$ncount;$j++){
				?>
				<div class=content>
					<div class="images"><img border=0 src="/images/tyzl/sjt.jpg"></div>
					<div class=context><a href="<?php echo static_news_url($news[$j]);?>"><?php echo $news[$j]->title;?></a></div>
				</div>
				<?php if($j==0){?>
				<div class=content_dash></div>
				<?php }}?>
			</div>
			<?php if($i!=$count-1){?>
			<div class=cy_dash></div>
			<?php }?>
			<?php } ?>
			<div id=paginage><?php paginate(''); ?></div>
		</div>
		<div id="right_inc">
			<?php include_once('../right/ad.php');?>
			<?php include_once('../right/favor.php');?>
			<?php include_once('../right/four.php');?>
			<?php include_once('../right/forum.php');?>
			<?php include_once('../right/magazine.php');?>
		</div>
		<?php include_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>