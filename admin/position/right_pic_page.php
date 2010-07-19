<?php 
	include_once(dirname(__FILE__).'/../../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		use_jquery();
		css_include_tag('list');
		init_page_items();
	?>
	<title><?php echo $list->name;?>_福布斯中文网</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $list->name;?> 福布斯中文网" />
	<meta name="description" content="<?php echo $list->name;?> 福布斯中文网" />
</head>
<body>
	<div id=pic_recommend>
		<div id=wz>图片榜单推荐</div>
		<?php 
		for($i=0;$i<8;$i++){$pos_name='pic_list'.$i;?>
		<div class=cl <?php show_page_pos($pos_name,'link_img');?>>
			<div class="cl_img"><?php show_page_img();?></div>
			<div class="cl_title"><?php show_page_href();?></div>
		</div>
		<?php } ?>
	</div>
</body>
</html>