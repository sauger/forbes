<?php 
	include_once('../frame.php');
	$id = intval($_REQUEST['id']);
	$comment_id = intval($_GET['comment_id']);
	if(!empty($id)){
		$news = new table_class('fb_news');
		if(!$news->find($id)){
			redirect('error.html');
			die();
		}else{
			$db = get_db();
			$db->query("select group_concat(industry_id separator ',') as ids from fb_news_industry where news_id=$id");
			if($db->move_first()){
				$industry_id = $db->field_by_name('ids');
			}
		}
	}else{
		redirect('error.html');
		die();
	}
	$title = $news->title;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo strip_tags($news->keywords);?>"/>
	<meta name="Description" content="<?php echo strip_tags($news->description);?>"/>
	<?php
		use_jquery();
		js_include_tag('news/news','public','right');
		css_include_tag('public','news','paginate','right_inc');
	?>
</head>
<body>
<div id=ibody>
		<?php include_top();?>
		<div id=bread> 评论 > 
			<span style="color:#246BB0;"><?php echo strip_tags($news->title);?></span>
		</div>
		<div id=bread_line></div>
		<div id=l>
				<div id=news_title><?php echo $title;?></div>
				<input type="hidden" id=is_comment value='1'></input>
				<input type="hidden" value="<?php echo $id;?>" id=newsid></input>
				<div id=news_comment1>
					<?php 
						$db = get_db();
						$count = $db->query("select count(id) as num from fb_comment where is_approve=1 and resource_id=$id");
						$count = $count[0]->num;
						$news = new table_class('fb_news');
						$news->find($id);
					?>
					<div id=comment_caption>
					<div id=comment_title>读者评论</div>
					<div id=comment_count>(共<?php echo $count;?>条)</div>
					<button id=comment_btn></button>
					<div id="comment_more">
					<?php 
						if($news->is_adopt == 0){
							$db->query("select name from fb_user where id={$news->publisher}");
							$name = $db->field_by_name('name');
							$url = column_article_url($name,$news,'static');
						}else{
							$url = static_news_url($news);
						}
					?>
					<a href="<?php echo $url;?>">返回<?php echo $news->title;?></a>
					</div>
				</div>
				
				<div class=publish_comment id='show_comment'>
					<textarea id=comment_text></textarea>
					<input type="radio" name="nick_name" id=hid_name value="hidden" /><span>匿名</span>
					<input type="radio" name="nick_name" id=has_name value="name" checked="checked" /><span id="span_nickname">昵称</span>
					<input type="text" value="<?php echo $_COOKIE['name']?>" id=nick_name />
					<button id=commit_submit>提交</button>	
					<div id="login_info" style="margin-top:10px;">
						<span>用户名：</span><input type="text"  value="<?php echo $_COOKIE['name']?>" id=user_name />
						<span>密码：</span><input type="password" value="<?php echo $_COOKIE['password']?>" id=password />
						<button id=comment_login>登录</button>
					</div>
				</div>
				<script>
				refresh_login_box();
				</script>
				<?php 
						if($comment_id){
							$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.id=$comment_id and t1.is_approve=1 order by t1.created_at desc";
						}else{
							$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.resource_id=$id and t1.is_approve=1 order by t1.created_at desc";	
						}
						
						$comment = $db->paginate($sql,10);
						$count = $db->record_count;
						for($i=0;$i<$count;$i++){
				?>
				<div class=comment_box>
						<div class=name><?php echo $comment[$i]->nick_name;?></div>
						<div class=time><?php echo $comment[$i]->created_at;?></div>
						<div class=support>
							<div name='<?php echo $comment[$i]->id;?>' class="up pointor">支持(</div><div class="up_count"><?php if(!$comment[$i]->up){echo '0';}else{echo $comment[$i]->up;};?></div><div>)</div>
							<div name='<?php echo $comment[$i]->id;?>' class="down pointor">反对(</div><div class="down_count"><?php if(!$comment[$i]->down){echo '0';}else{echo $comment[$i]->down;};?></div><div>)</div>
						</div>
						<div class=comment_content>
							<?php echo $comment[$i]->comment;?>
						</div>
				</div>
					<?php }?>
				</div>
				<div id=comment_paginate><?php paginate()?></div>
		</div>
	 	<div id=right_inc>
	 		<?php include_right( "ad");?>
	 		<?php include_right( "favor");?>
	 		<?php include_right( "four");?>
	 		<?php include_right( "rich");?>
	 		<?php include_right( "magazine");?>
	 	</div>

		<?php include_bottom();?>

</div>
</body>
<html>