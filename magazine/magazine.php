<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	
	$id = $_GET['id'];
	if(!intval($id)) die();
	
	$magazine_now = new table_class("fb_magazine");
	$magazine_now->find($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo $magazine_now->name;?>_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right','magazine');
		css_include_tag('magazine/magazine','public','right_inc');
	?>
</head>
<body>
	<div id="ibody">
	<?php include_top();?>
		<div id=bread>
			<a href="/magazine/">杂志</a> > 	<?php echo $magazine_now->name;?>
		</div>
		<div id=bread_line></div>
		<div id=t>
			<div id=t_l>
				<div id=t_l_t>
					<?php
						$db = get_db();
						$sql = "select * from fb_magazine_image where magazine_id=$id order by priority limit 4";
						$image = $db->query($sql);
						for($i=0;$i<count($image);$i++){
					?>
					<div <?php if($i==0){?>style="display:inline;"<?php }?> class="top_picture">
						<img width="417" height="540" src="<?php echo $image[$i]->src;?>">
					</div>
					<?php }?>
					<div id=t_l_t_b>
						<input type="button" id="prev">
						<input type="button" id="next">
						<div id=text>
							<a href="">翻页查看该期目录</a>
						</div>
					</div>
				</div>
				<div id=t_l_b>
					阅读电子版《福布斯》<?php echo $magazine_now->name;?>杂志
				</div>
			</div>
			<div id=t_r>
				<div id=t_r_t>
					编者的话
				</div>
				<div id=t_r_b>
					<div id="t_r_pg">
					<div id="zhuanlan_top"><?php echo $magazine_now->name;?></div>
					<?php echo $magazine_now->description;?>
					</div>
				</div>
			</div>
		</div>
		<div id="m_title2">
					<div id="title_f">
					《福布斯》中文杂志 <?php echo $magazine_now->name;?>精华导读
					</div>
			</div>
		<div id=m>
			
			<?php
				$sql = "select t1.title,t1.short_title,t1.id,t1.created_at,t1.description,t1.video_photo_src from fb_news t1 join fb_magazine_relation t2 on t1.id=t2.resource_id where t2.magazine_id={$id} order by t2.priority limit 4";
				$magazine_news = $db->query($sql);
				for($i=0;$i<count($magazine_news);$i++){
			?>
			<div class=m_l>
					<div class=picture>
					<img src="<?php if($magazine_news[$i]->video_photo_src!='')echo $magazine_news[$i]->video_photo_src;else echo $magazine_now->img_src;?>" width="150" height="190">
				</div>
				<div class=m_l_r>
					<div class=title3>
						<a href="<?php echo get_news_url($magazine_news[$i]);?>"><?php echo $magazine_news[$i]->short_title;?></a>
					</div>
					<div class="text">
						<?php echo $magazine_news[$i]->description;?>
					</div>
				</div>	
			</div>
			<?php }?>
		</div>
		<div id="magazine_banner2" class="ad_banner">
		</div>
		<div id=b>
			<div id=b_l>
				<div id=title4>
					往期杂志
				</div>
				<div id=b_l_b>
					<div id="picture_box">
						<?php
							$sql = "select * from fb_magazine where publish_data<'{$magazine_now->publish_data}' limit 4";
							$magazines = $db->query($sql);
							for($i=0;$i<count($magazines);$i++){
						?>
						<div class="picture">
							<div class="picture1">
								<a title="<?php echo $magazines[$i]->name;?>" href="<?php echo "{$static_site}/magazine/{$magazines[$i]->id}";?>"><img border="0" width="93px" height="123px;" src="<?php echo $magazines[$i]->img_src;?>"></a>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div id=b_r>
				<div id=text>
					<a href="/register">申请成为《福布斯》</a>
				</div>
				<div id=text style="font-size:16px; font-family:微软简标宋;">
					<a href='/register'>会员俱乐部</a>
				</div>
				<div id=text style="font-size:16px;">
					<a href="/register" style="color:#FFCC00;">免费阅读全年</a>
				</div>
				<div id=text>
					<a href="/register">《福布斯》中文杂志</a>
				</div>
				<input type=button id=button>
			</div>
		</div>
	<?php include_bottom();?>
	</div>
</body>
</html>