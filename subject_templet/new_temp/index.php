<?php 
include_once( dirname(__FILE__) .'/../../frame.php');
$dir = explode('/', dirname(__FILE__));
$num = count($dir)-1;
$dir = $dir[$num];
$db = get_db();
$subject = $db->query("select * from fb_subject where identity='$dir'");
$subject = $subject[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $subject->name;?></title>
<meta name="keywords" content="<?php echo $subject->name;?>" />
<meta name="description" content="<?php echo $subject->name;?>" />
<link href="new.css" rel="stylesheet" type="text/css">
<?php
	use_jquery();
	css_include_tag("public");
	js_include_tag("public");
?>
<body>
<div id="ibody">
<?php
	include_top();
?>
<div id="sub_left">
	<div id="sub_title"><?php echo $subject->name;?></div>
	<div id="sub_desc1"><?php echo $subject->description;?></div>
	<div id="sub_pic"><img src="<?php echo $subject->image;?>"></div>
	<div id="sub_desc2"><?php echo $subject->description2;?></div>
	<div id="mod_left">
		<div class="mod_title"><?php echo $subject->title1;?></div>
		<div class="mod_box">
			<?php display_sub_mod('left_top',$subject->id);?>
		</div>
		<div class="mod_title"><?php echo $subject->title3;?></div>
		<div class="mod_box"><?php display_sub_mod('left_bottom',$subject->id);?></div>
	</div>
	<div id="mod_right">
		<div class="mod_title"><?php echo $subject->title2;?></div>
		<div class="mod_box"><?php display_sub_mod('right_top',$subject->id);?></div>
		<div class="mod_title"><?php echo $subject->title4;?></div>
		<div class="mod_box"><?php display_sub_mod('right_bottom',$subject->id);?></div>
	</div>
</div>
<div id="sub_right"></div>
<?php 
	include_bottom();
?>
</div>
</body>
</html>