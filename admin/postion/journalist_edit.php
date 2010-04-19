<?php
	$db = get_db();
	$records = $db->query("select * from fb_user where role_name='journalist'");
	$count = count($records);
	
	$column = $db->query("select * from fb_position_relation where type='journalist' and position_id=$id");
	$column_count = count($column);
	$ids = $column[0]->news_id;
	for($i=1;$i<$column_count;$i++){
		$ids.=','.$column[$i]->news_id;
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
		js_include_tag('admin/position/column_list','admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>自定义采编智库</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>	
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">作者名</td><td width="25%">专栏名</td><td width="25%">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->nick_name;?></td>
			<td><?php echo $records[$i]->column_name;?></td>
			<td>
				<?php 
					$rate_flag = false;
					for($j=0;$j<$column_count;$j++){
						if($records[$i]->id==$column[$j]->news_id){ $rate_flag=true;?>
						<span style="cursor:pointer" class="revocation" name="<?php echo $column[$j]->id;?>" title="删除"><img src='/images/btn_delete.png' border='0'></span>
						<input type="text" class="priority"  name="<?php echo $column[$j]->id;?>"  value="<?php echo $column[$j]->priority;?>" style="width:40px;">
						<?php break;}?>
				<?php }
					if(!$rate_flag){
				?>
				<span style="cursor:pointer" class="publish" name="<?php echo $records[$i]->id;?>" title="加入"><img src='/images/btn_add.png' border='0'></span>
				<?php }?>
			</td>
		</tr>
		<? }?>
		<tr class=tr3>
				<td colspan="5" ><button id=edit_priority>编辑优先级</button><input type="hidden" id="list_id" value="<?php echo $id?>"><input type="hidden" id="p_type" value="journalist">	<input type="hidden" id="db_table" value="<?php echo $user_table;?>"></td>
		</tr>
	</table>
</div>	
</body>
</html>

