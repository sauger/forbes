<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	
	
	$subject_id = $_REQUEST['subject_id'];
	if(!$subject_id){
		die('非法的专题ID');
	}
	$content_type= $_REQUEST['content_type'] ? $_REQUEST['content_type'] : 'newslist';
	
	$db = get_db();
	$subject = new table_class('fb_subject');
	$subject = $subject->find($subject_id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<?php
	include '_'.$content_type.'.php';
?>

<script>
function change_page(){
	var content_type = $('#content_type').val();
	window.location.href="subject_content.php?subject_id=<?php echo $subject_id;?>&content_type="+content_type;
}

$(function(){
	$('#content_type').change(function(){
		change_page();
	});
});
</script>

