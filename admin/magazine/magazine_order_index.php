<?php
	session_start();
  	include_once('../../frame.php');
	judge_role();	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "SELECT * from fb_subscription where 1=1";
	if($search!=''){
		$sql .= " and RealName like '%$search%' or BirthPlace like '%$search%' or Sex like '%$search%' or Company like '%$search%' or Department like '%$search%' or Position like '%$search%' or Province like '%$search%' or zipcode like '%$search%' or Email like '%$search%'";
	}
	$sql .= " order by t1.stime desc";
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
    <div id=title>杂志订阅查看</div>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="15%">订阅时间</td><td width="7%">姓名</td><td width="15%">工作单位</td><td width="15%">部门</td><td width="15%">职位</td><td width="8%">省/直辖市</td><td width="15%">电子邮件</td><td width="10%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->stime;?></td>
					<td><?php echo $record[$i]->RealName;?></td>
					<td><?php echo $record[$i]->Company;?></td>
					<td><?php echo $record[$i]->Department;?></td>
					<td><?php echo $record[$i]->Position;?></td>
					<td><?php echo $record[$i]->Province;?></td>
					<td><?php echo $record[$i]->Email;?></td>
					<td>
						<a href="order_info.php?id=<?php echo $record[$i]->sid;?>" class="edit" title="编辑" style="cursor:pointer"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $record[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_subscription">
			</td>
		</tr>
		</table>	
	</div>
	</body>
</html>
<script>
$(function(){
	$(".sau_search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		search();
	})
})

function search(){
	window.location.href="?search="+encodeURI($(".sau_search").attr('value'));
}
</script>