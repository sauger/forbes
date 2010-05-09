<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $seo[0]->title ?></title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $seo[0]->keywords ?>" />
	<meta name="description" content="<?php echo $seo[0]->description ?>" />
	<?php
		use_jquery();
		js_include_tag('right');
		css_include_tag('right_inc');
		init_page_items();
	?>
	<style type="text/css">
		div{float:left; display:inline;}
		#right_inc{float:left;}
	</style>
</head>
<body>
	<div id=right_inc>
		<?php include_right("favor")?>
		<?php include_right("four")?>
		<?php include_right("magazine")?>
	</div>
	<div id=right_inc>
		<?php include_right("activities")?>
		<?php include_right("column")?>
		<?php include_right("investment_list")?>
	</div>
	<div id=right_inc>
		<?php include_right("right_list")?>
		<?php include_right("four")?>
		<?php include_right("magazine")?>
	</div>
</body>