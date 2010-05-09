<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	if($id!='')	{
		$seo = new table_class('fb_seo');
		$seo->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
	?>
</head>
<body>
<div id=icaption>
    <div id=title><?php if($id){echo "修改SEO";}else{echo "添加SEO";}?></div>
	  <a href="index.php" id=btn_back></a>
</div>
	<form id="seo_edit" enctype="multipart/form-data" action="seo.post.php" method="post"> 
		<div id=itable>
			<table cellspacing="1" align="center">
				<tr class=tr4 align="center">
					<td class=td1 width=15%>名　称</td><td align="left"><input id="title" type="text" name="seo[name]" value="<?php echo $seo->name;?>"></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>标　题</td><td align="left"><input id="title" type="text" name="seo[title]" value="<?php echo $seo->title;?>" /></td>
				</tr>
				<tr class=tr4 align="center">
					<td class=td1>关键词</td><td align="left"><textarea name="seo[keywords]" style="height:100px;"><?php echo $seo->keywords;?></textarea> 请用半角逗号：" "分隔开关键词,比如:高考 升学</span></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>说　明</td><td align="left"><textarea name="seo[description]" style="height:100px;"><?php echo $seo->description;?></textarea></td>
				</tr>
				<tr class=btools>
					<td colspan="10" align="center"><input id="submit" type="submit" value="发布"></td>
				</tr>	
			</table>
			<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
		</div>
	</form>
</body>
</html>
