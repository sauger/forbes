<?php 
	include_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		use_jquery_ui();
		js_include_tag('public','picture_list/index','right');
		css_include_tag('list','jquery-ui','public','right_inc');
		$db = get_db();
		$id = intval($_GET['id']);
		if(empty($id)){
			alert('非法操作');
			redirect('/');
		}
		$list = new table_class('fb_custom_list_type');
		$list->find($id);
		if($list->id <= 0 || $list->list_type != 4){
			alert('非法操作');
			redirect('/');
		}
		$items = $db->query("select name,image,comment from fb_picture_list_items where list_id ={$list->id} order by priority asc");
		$len = $db->record_count;
		for($i=0;$i<$len;$i++){
			$tmp['name'] = $items[$i]->name;
			$tmp['image'] = $items[$i]->image;
			$tmp['comment'] = str_replace("\r\n","",$items[$i]->comment);
			$tmp['comment'] = str_replace("\t","",$tmp['comment']);
			$litems[] = $tmp;
		}
	?>
	<title><?php echo $list->name;?>_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $list->name;?> 福布斯中文网" />
	<meta name="description" content="<?php echo $list->name;?> 福布斯中文网" />
</head>
<body>
	<div id=ibody>
	<? include_top();?>
		<div id=bread><a href="/list">榜单</a> > <?php echo $list->name;?></div>
		<div id=bread_line></div>
		<div id="list_name"><?php echo $list->name;?></div>
		<div id=pic_list>
			<div id=p_flash>
				<div id="control_panel">
					<div id="btns">
						<img id="btn_prev" src="/images/list/prev.jpg" title="上一张" />
						<img id="btn_play" src="/images/list/pause.jpg" title="暂停" />
						<img id="btn_next" src="/images/list/next.jpg" title="下一张" />
					</div>
					<div id="slider"></div>
					<span id="speed">播放速度</span>
				</div>
				<div id="picture_content">
					<img id="main_picture" src="<?php echo $items[0]->image;?>" />
				</div>
				<div id="picture_list">
					<img class="selected" src="<?php echo $items[0]->image;?>" />
					<img src="<?php echo $items[1]->image;?>" />
					<img style="margin-right:0px;" src="<?php echo $items[2]->image;?>" />
				</div>
			</div>
			<div id=email>
					<div id=pic><img border=0 src="/images/list/email.jpg"></div>
					<div id=wz><a href="<?php echo $static_site?>/pic_list/<?php echo $id;?>/share">分享给好友</a></div>
			</div>
			<div id=pic_content>
				<div id=title><?php echo $items[0]->name?></div>
				<div id=content><?php echo $items[0]->comment?></div>
			</div>
			<div id=pic_recommend>
				<div id=wz>图片榜单推荐</div>
			</div>
			<?php 
			$db = get_db();
			$lists = $db->query("select a.name,a.id from fb_custom_list_type a left join fb_list_relation b  on a.id = b.rela_id where b.list_id = {$id} order by b.id desc limit 3");
			for($i=0;$i<3;$i++){ ?>
			<div class=cl><a href="<?php echo "$static_site/list/{$lists[$i]->id}"?>">·<?php echo $lists[$i]->name;?></a></div>
			<?php } ?>
		</div>
		<input type="hidden" id="list_id" value="<?php echo $id;?>" />
		<div id="right_inc">
		 	<?php include_right( "ad");?>
	 		<?php include_right( "favor");?>
		</div>
	<? include_bottom();?>
	</div>
</body>
</html>