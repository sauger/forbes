<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	
	$id = $_REQUEST['id'];
	if($id!=''){
		$user = new table_class('fb_yh');
		$user->find($id);
	}
	$db = get_db();
	$order = $db->query('select * from fb_yh_dy where yh_id='.$id);
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
		//validate_form("famous_edit");
	?>
</head>
<body>
	<div id=icaption>
	    <div id=title>查看用户订阅</div>
		 <a href="index.php" id=btn_back></a>
	</div>
	<form id="famous_edit" action="edit_order.post.php" method="post"> 
	<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">用户名</td>
			<td width="85%">
				<?php echo $user->name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>精华推荐</td>
			<td>
			    <input name="jhtj"  style="width:30px;" <?php if($order[0]->jhtj==1)echo 'checked="checked"'?> type="checkbox"><div>订阅</div>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>分类文章</td>
			<td>
			    <input style="width:30px;" name="fh" <?php if($order[0]->fh==1)echo 'checked="checked"'?> type="checkbox"><div>富豪</div>
				<input style="width:30px;" name="cy" <?php if($order[0]->cy==1)echo 'checked="checked"'?> type="checkbox"><div>创业</div>
				<input style="width:30px;" name="sy" <?php if($order[0]->sy==1)echo 'checked="checked"'?> type="checkbox"><div>商业</div>
				<input style="width:30px;" name="kj" <?php if($order[0]->kj==1)echo 'checked="checked"'?> type="checkbox"><div>科技</div>
				<input style="width:30px;" name="tz" <?php if($order[0]->tz==1)echo 'checked="checked"'?> type="checkbox"><div>投资</div>
				<input style="width:30px;" name="sh" <?php if($order[0]->sh==1)echo 'checked="checked"'?> type="checkbox"><div>生活</div>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
	</div>
		<input type="hidden" name="id" value="<?php echo $order[0]->id;?>">
	</form>
</body>
</html>