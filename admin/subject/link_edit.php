<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];	
	$link = new table_class("fb_subject_link");	
	if($id){
		$link = $link->find($id);
	}
	$subject_id = $_GET['subject_id'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form('link_edit');	
	?>
</head>
<body>
<div id=icaption>
    <div id=title>编辑链接</div>
	  <a href="subject_content.php?subject_id=<?php echo $subject_id;?>&content_type=link" id=btn_back></a>
</div>
<div id=itable>
	<form id="link_edit" enctype="multipart/form-data" action="link.post.php" method="post"> 
	<table cellspacing="1" width="1026" align="center">
		
		<tr class=tr4>
			<td class=td1 width="15%" >标　题</td>
			<td width="85%">
				<input type="text" name="link[title]" class="required" value="<?php echo $link->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td><td align="left"><input type="text" class="number" size="10" name="link[priority]" value="<?php if($link->priority!=100){echo $link->priority;}?>">(1-100)</td>
		</tr>
		<tr class=tr4>
			<td class=td1>链接</td><td align="left"><input type="text" class="required" name="link[href]" value="<?php echo $link->href;?>"></td>
		</tr>
		<tr class="btools">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布链接"></td>
		</tr>	
	</table>

	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="item[subject_id]" value="<?php echo $subject_id;?>">
	</form>
</div>
</body>
</html>
