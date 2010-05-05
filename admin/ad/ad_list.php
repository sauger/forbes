<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$cid = intval($_GET['cid']);
	$bid = intval($_GET['bid']);
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
		js_include_tag('admin/menu_list');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>广告管理</div>
	<a href="channel.php" id=btn_back></a>
	<a href="ad_edit.php?cid=<?php echo $cid;?>&bid=<?php echo $bid;?>&url=list" id=btn_add></a>
</div>
<div id=isearch>
		<input id="key" type="text" value="<? echo $_REQUEST['title']?>"><span id="span_category"></span>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="30%">名称</td><td width="25%">广告类型</td><td width="25%">广告代码</td><td width="20%">操作</td>
		</tr>
		<?php
			$db = get_db();
			$ad = $db->query("select * from forbes_ad.fb_ad where banner_id=$bid and channel_id=$cid");
			$count = $db->record_count;
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr3 id="<?php echo $ad[$i]->id;?>">
			<td><?php echo $ad[$i]->name;?></td>
			<td><?php echo $ad[$i]->type?></td>
			<td><?php echo $ad[$i]->code?></td>
			<td>
				<a href="ad_edit.php?id=<?php echo $ad[$i]->id;?>&url=list" class="edit" title="编辑" style="cursor:pointer"><img src="/images/admin/btn_edit.png" border="0"></a>
				<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $ad[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?></td>
			<input type="hidden" id="db_table" value="forbes_ad.fb_ad">
		</tr>
	</table>
</body>
</html>
