<?php
	include_once( dirname(__FILE__) .'/../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
	$order = $db->query("select * from fb_yh_dy where yh_id=$uid");
	init_page_items();
	global $pos_name;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>注册_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','jquery.colorbox-min.js','right');
		css_include_tag('public','colorbox','reg_success');
	?>
</head>
<body>
 <div id="ibody">		
	<?php include_top();?>

	<div id=register>
		<div class="title">
			<div class="title_left">新用户注册</div>
			<div class="title_right">
				<div class="content">注册流程</div>
				<div class="content">Step1: 填写个人基本信息</div>
				<div class="arrow"></div>
				<div class="content">Step2: 接收验证mail</div>
				<div class="arrow"></div>
				<div class="content">Step3: 完善个人资料</div>
				<div class="arrow"></div>
				<div class="content1">注册成功</div>
			</div>
		</div>
		<div id="success">
			<div id="content_left">
				<div id=context>
					<p>
					<?php 
						$text = $db->query("select description from fb_page_pos where name='register'");
						echo $text[0]->description;
					?>
					</p>
					<div id="suc_dh">
						<div class="cl"><a href="/">福布斯中文网首页</a></div>
						<div class="cl"><a href="/list/">榜单</a></div>
						<div class="cl"><a href="/billionaires/">富豪</a></div>
						<div class="cl"><a href="/entrepreneur/">创业</a></div>
						<div class="cl"><a href="/tech/">科技</a></div>
						<div class="cl"><a href="/investment/">投资</a></div>
						<div class="cl"><a href="/city/">城市</a></div>
						<div class="cl"><a href="/life/">生活</a></div>
						<div class="cl"><a href="/column/">专栏</a></div>
					</div>
					<div id="subscribe">
						<span>您已订阅福布斯的：</span><br><br>
						<?php 
							if($order[0]->jhtj==1){
						?>
						　　精华文章（每周发送一次） <a style="font-weight:bold;" href="/images/register/email.jpg" class="colorbox">查看精华文章版式</a><br>
						<?php }?>
						<?php 
							if($order[0]->fh==1||$order[0]->cy==1||$order[0]->sh==1||$order[0]->kj==1||$order[0]->tz==1||$order[0]->sy==1){
						?>
    　　分类文章精华的： <?php if($order[0]->fh==1){?>富豪　<?php }if($order[0]->cy==1){?>创业　<?php }if($order[0]->sy==1){?>商业　<?php }if($order[0]->kj==1){?>科技　<?php }if($order[0]->tz==1){?>投资　<?php }if($order[0]->sh==1){?>生活　<?php }?>分类（每周发一次）  <a style="font-weight:bold;" href="/images/register/news.jpg" class="colorbox">查看精华文章版式</a><br>
    					<?php }?>
    　　如果您要取消订阅，请 <a href="/user/user_order.php">点击这里</a> ，并进行相关取消设置<br>
					</div>
				</div>
			</div>
			<div id="content_right">
				<div id="context">
					<div id="title">
						福布斯杂志<img src="/images/register/right_icon.jpg">
					</div>
					<div id="rmagazine"><?php $pos_name='right_magazine';?>
						<div id="pic"><?php show_page_img()?></div>
						<div id="piccontent">
							<span><?php show_page_href()?></span><br>
							　<?php show_page_desc()?>
						</div>
					</div>
					<select id="old_magazine" class="sel1">
						<?php
							$db = get_db();
							$magazine = $db->query("SELECT substring(publish_data,1,4) as year FROM fb_magazine group by substring(publish_data,1,4)");
							$year_count = $db->record_count;
							for($i=0;$i<$year_count;$i++){
						?>
						<option value="<?php echo $magazine[$i]->year;?>"><?php echo $magazine[$i]->year;?>年</option>
						<?php }?>
					</select>
					<select id="show_magazine" class="sel2">
						<option value=""></option>
						<?php 
							$magazine = $db->query("select * from fb_magazine where publish_data like '%{$magazine[0]->year}%' order by publish_data");
							$count = $db->record_count;
							for($i=0;$i<$count;$i++){
						?>
							<option url="<?php echo $magazine[$i]->url;?>" value="<?php echo $magazine[$i]->id;?>"><?php echo $magazine[$i]->name;?></option>
						<?php			
							}
						?>
					</select>
					<a id="btnonline"></a>
					<a id="sq" href="http://www.forbeschina.com/magazine/subscription"></a>
					<a id="jr"></a>
					<?php
					$magazine = $db->query("select id from fb_magazine order by publish_data desc limit 1");
					$sql = "select t1.title,t1.short_title,t1.id,t1.created_at,t1.description,t1.video_photo_src from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where t2.magazine_id={$magazine[0]->id} order by t2.priority limit 2";
					$magazine_news = $db->query($sql);
					!$magazine_news && $magazine_news = array();
					foreach($magazine_news as $news){
					?>
					<div class="content">
						<span>·<a href="<?php echo get_news_url($news);?>"><?php echo strip_tags($news->title);?></a></span><br>
						<?php echo strip_tags($news->description);?>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include_bottom();
	?>
	 </div>
</body>
</html>
<script>
$(function(){
	$(".colorbox").colorbox();
});
</script>