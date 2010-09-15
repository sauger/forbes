<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
		
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from zzh_member";
	if($search!=''){
		$sql .= " where name like '%".$search."%'";
	}
	$record = $db->paginate($sql,30);
	$count = count($record);
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
		js_include_tag('admin_pub');
	?>
</head>

<body>
	<div id=icaption>
    <div id=title>增长会会员管理</div>
    <!-- 	  <a href="activity.edit.php" id=btn_add></a> -->
    
	</div>
	<div id=isearch>
		<input class="sau_search" id="search" name="title" type="text" value="<? echo $search;?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		
		<tr class=itable_title>
			<td width="40%">姓名</td><td width="30%">手机</td><td width="30%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->mobile;?></td>
					<td>
						<a href="add_user.php?id=<?php echo $record[$i]->id;?>" style="cursor:pointer"><img src="/images/admin/btn_add.png" border="0"></a>
						<a href="user.edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<input type="hidden" id="db_table" value="zzh_member">
			<tr class=btools>
				<td colspan=10>
					<?php paginate("",null,"page",true);?>
				</td>
			</tr>
		</table>	
	</div>
	</body>
</html>
<script>
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($("#search").attr('value'));
}
</script>