<?php 
include_once "../frame.php";
$id = $_GET['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php 
		css_include_tag('ad');
	?>
</head>
<body>
<?php 
$ad = new table_class('forbes_ad.fb_ad');
$ad->find($id);
echo $ad->word;
?>
</body>
</html>