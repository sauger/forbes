<?php 
	include_once('../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>用户中心_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('user/user','public','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=top>
			<div id=bread><a>用户中心</a> > <a>订阅信息</a></div>
	 	 <div id=bread_line></div>
		</div>
		<div id=left>
			<div id=left_top>
				用户中心
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c3a.gif">
					<img style="display:none" src="/images/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/user/c2a.gif">
					<img style="display:inline" src="/images/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2" style="display:inline"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c1a.gif">
					<img style="display:none" src="/images/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人信息</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c4a.gif">
					<img style="display:none" src="/images/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改密码</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<span style="float:left;display:inline">订阅信息</span>
				<?php $log = $db->query("select * from fb_yh_log where yh_id=$uid order by id desc limit 2");?>
				<span class="r_t_right">亲爱的<?php echo $_SESSION['name'];?>：您上次登录的时间是 <?php if($db->record_count==2) echo $log[1]->time;else echo $log[0]->time;?></span>
			</div>
			<div class="right_text2">
				<?php
					$order = $db->query("select * from fb_yh_dy where yh_id=$uid");
				?>
				<div class="right_list">
					您已订阅福布斯精华推荐（一周发送一次）　<span class="right_list2">如果您要取消订阅请选择"我要取消订阅"选项</span>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="jhtj" <?php if($order[0]->jhtj==1)echo 'checked="checked"';?> id="checkbox1"><label for="checkbox1">我愿意订阅</label>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="jhtj2" <?php if($order[0]->jhtj==0)echo 'checked="checked"';?> id="checkbox2"><label for="checkbox2">我要取消订阅</label>
				</div>
				
				<div class="right_list" style="margin-top:40px;">
					是否愿意订阅福布斯分类文章（一周发送一次）　<span class="right_list2">如果您要取消订阅请选择去掉勾选的选项</span>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="fh" <?php if($order[0]->fh==1)echo 'checked="checked"';?> id="checkbox3"><label for="checkbox3">富豪</label>
					<input type="checkbox" name="cy" <?php if($order[0]->cy==1)echo 'checked="checked"';?> id="checkbox4"><label for="checkbox4">创业</label>
					<input type="checkbox" name="sy" <?php if($order[0]->sy==1)echo 'checked="checked"';?> id="checkbox5"><label for="checkbox5">商业</label>
					<input type="checkbox" name="kj" <?php if($order[0]->kj==1)echo 'checked="checked"';?> id="checkbox6"><label for="checkbox6">科技</label>
				</div>
				<div class="right_check_list">
					<input type="checkbox" name="tz" <?php if($order[0]->tz==1)echo 'checked="checked"';?> id="checkbox7"><label for="checkbox7">投资</label>
					<input type="checkbox" name="sh" <?php if($order[0]->sh==1)echo 'checked="checked"';?> id="checkbox8"><label for="checkbox8">生活</label>
				</div>
				<button id="order_b" class="user_b" type="button">确定</button>
			</div>
		</div>
		<?php include_bottom();?>
	</div>
</body>