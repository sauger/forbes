<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-杂志</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('magazine/index','public','right_inc');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
	<? include_once( dirname(__FILE__) .'/../inc/top.inc.php');?>
		<div id=bread>
			<span>杂志首页</span>
		</div>
		<div id=bread_line></div>
		<div id=zzleft>
			<div class=l_t_top></div>
			<div id=l_t_content>
				<?php $pos_name = 'magazine_index0';?>
				<div class=l_title>
					<div class=wz>杂志展示</div>
				</div>
				<div class=l_pic>
					<?php show_page_img();?>
				</div>
				<div id=r_t>
					<div id=title <?php show_page_pos($pos_name)?>><?php show_page_href();?></div>
					<div id=content><a href="">出版日期：<?php show_page_desc();?><br>封面专题</a></div>
				</div>
				<?php
					for($i=0;$i<3;$i++){$pos_name = '$magazine_index_news'.$i;
				?>
				<div class=r_b>
					<div class=title>
						<div class=jt></div>
						<div class=wz  <?php show_page_pos($pos_name)?>><?php show_page_href();?></div>
					</div>
					<div class=content>
						<?php show_page_desc();?>
					</div>
					<div class=r_b_dash></div>
				</div>
				<?php }?>
				<div class="l_b">
					<div class="btn_ck" <?php show_page_pos('magazine_index_link1')?>><a href="<?php echo $pos_items->magazine_index_link1->href;?>"><img border="0" src="/images/zz/btn_ck.jpg"></a></div>
					<div class="btn_readonline" <?php show_page_pos('magazine_index_link2')?>><a href="<?php echo $pos_items->magazine_index_link2->href;?>"><img border="0" src="/images/zz/btn_readonline.jpg"></a></div>
				</div>
			</div>
			<div class=l_t_bottom></div>
			<a style="margin-top:10px; float:left; display:inline;" href=""><img border=0 src="/images/zz/one.jpg"></a>
			<div class=l_t_top></div>
			<div id=l_b_content>
				<div class=l_title>
					<div class=wz>杂志列表信息</div>	
				</div>
				<?php 
					for($i=0;$i<8;$i++){ $pos_name = 'magazine_list'.$i;
				?>
				<div class=imgandtitle <?php show_page_pos($pos_name)?>>
					<div class=pic>
						<?php show_page_img();?>
					</div>
					<div class=pictitle><?php show_page_href();?></div>
					<?php
						for($j=0;$j<3;$j++){ $pos_name2 = 'magazine_list'.$i.'_r'.$j;
					?>
					<div class=piccontent <?php show_page_pos($pos_name2)?>>
						<?php show_page_href();?>
					</div>
					<?php
						}
					?>
				</div>
				<?php } ?>
			</div>
			<div class=l_t_bottom></div>
		</div>
		<div id="right_inc">
			<?php include_once( dirname(__FILE__) .'/../right/ad.php');?>
			<?php include_once( dirname(__FILE__) .'/../right/magazine.php');?>
		</div>
	<? include_once( dirname(__FILE__) .'/../inc/bottom.inc.php');?>
	</div>
</body>
</html>