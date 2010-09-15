<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
		
	$search = $_REQUEST['search'];
	$investor_id = intval($_GET['investor']);
	$db = get_db();
	$sql = "select * from zzh_comment where 1=1";
	if($search!=''){
		$sql .= " and comment like '%".$search."%'";
	}
	if(!empty($investor_id)){
		$sql .= " and investor_id=$investor_id";
	}
	$record = $db->paginate($sql,20);
	$count = count($record);
	$investor = $db->query("select id,name from fb_investor");
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
    <div id=title>增长会合作伙伴管理</div>
	  <a href="partner.edit.php" id=btn_add></a>
	</div>
	<div id=isearch>
		<input class="sau_search" id="search" name="title" type="text" value="<? echo $search;?>">
		<select class="sau_search" id="investor">
			<option value="">投资人</option>
			<?php foreach($investor as $v){?>
			<option <?php if($v->id==$investor_id)echo "selected='selected'";?> value="<?php echo $v->id?>"><?php echo $v->name;?></option>
			<?php }?>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		
		<tr class=itable_title>
			<td width="40%">留言内容</td><td width="10%">留言人</td><td width="40%">回复内容</td><td width="10%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->comment;?></a></td>
					<td><?php echo $record[$i]->nick_name;?></td>
					<td><?php echo $record[$i]->reply;?></td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?>
							<span class="revocation" name="<?php echo $record[$i]->id;?>" title="撤消"><img src="/images/admin/btn_apply.png" border=0></span>
						<?php }?>
						<?php if($record[$i]->is_adopt=="0"){?>
							<span class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border=0></span>
						<?php }?>
						<a href="comment.edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer" title="回复"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<input type="hidden" id="db_table" value="zzh_comment">
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
	window.location.href="?search="+encodeURI($("#search").attr('value'))+"&investor="+$("#investor").val();
}
</script>