<?php
	include_once('../../frame.php');
	$key = $_REQUEST['key'];
	$id_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$sql = "select * from fb_links where 1=1";
	if($key!=''){
		$sql .= " and title='$key'";
	}
	if($id_adopt!=''){
		$sql .= " and is_adopt=$id_adopt";
	}
	$sql .= " order by priority asc";
	$record = $db->query($sql);
	$count_record = $db->record_count;
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
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>友情链接管理</div>
	<a href="link_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<!-- 
		<select id=adopt style="width:100px">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select> -->
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">链接名称</td><td width="40%">链接网址</td><td width="20%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<$count_record;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->title;?></td>
					<td><a href="<?php echo $record[$i]->link;?>" target="_blank"><?php echo $record[$i]->link;?></a></td>
					<td>
					<!-- 
						<?php if($record[$i]->is_adopt=="1"){?><span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span><? }?>
						<?php if($record[$i]->is_adopt=="0"){?><span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span><? }?>
					-->
						
						<a href="link_edit.php?id=<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
						<a class="del" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer;" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
						 <input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:20px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_links">
			</td>
		</tr>
	</table>
</div>
</body>
</html>
<script>
	$("#search_button").click(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "index.php?key="+encodeURI($("#key").val());
		//window.location.href = "index.php?key="+encodeURI($("#key").val())+"&adopt="+$("#adopt").val();
	}
</script>