<?php
	include_once( dirname(__FILE__) .'/../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
	if(isset($_COOKIE['name'])){
		$uname = $_COOKIE['name'];
	}else{
		$uname = $_COOKIE['login_name'];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min.js','user/user2');
		css_include_tag('complete_info','public','colorbox');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>
	<div id=bread>用户中心 > 订阅信息</div>
	<div id=bread_line></div>
	<div id=register>
		<div id="info">
			<div id="content">
				<div id="content_left">
					<div class="context"><a href="user_favorites.php">我的收藏</a></div>
					<div class="context select"><a href="user_order.php">订阅信息</a></div>
					<div class="context"><a href="user_info.php">个人信息</a></div>
					<div class="context" style="margin-bottom:0px;"><a href="user_password.php">修改密码</a></div>
				</div>
				<div id="content_right">
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
					
					<div class="right_list">
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
				</form>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>