<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	$zid = $_GET['id'];
	$zzh = new table_class("zzh_member");
	$zzh->find($zid);
	
	$key = $_GET['key'];
	$db = get_db();
	if($zzh->user_id!=''){
		$sql = "select * from fb_yh where id!={$zzh->user_id}";
		$yh = new table_class("fb_yh");
		$yh->find($zzh->user_id);
	}else{
		$sql = "select * from fb_yh where 1=1";
	}
	if($key!=''){
		$sql .= " and (name like '%{$key}%' or email like '%{$key}%')";
	}
	$sql .= " order by id desc";
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
	?>
</head>

<body>
<div id=icaption>
    <div id=title>增长会用户关联</div>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key;?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="20%">用户名</td><td width="20%">邮箱</td><td width="15%">注册时间</td><td width="10%">IP</td><td width="5%">性别</td><td width="5%">年龄</td><td width="10%">是否验证</td><td width="15%">操作</td>
		</tr>
		<?php 
		if($zzh->user_id!=''){
		?>
		<tr class="tr3" id="<?php echo $yh->id;?>">
			<td><?php echo $yh->name;?></td>
			<td><?php echo $yh->email;?></td>
			<td><?php echo $yh->created_at;?></td>
			<td><?php echo $yh->ip;?></td>
			<td><?php echo $yh->gender;?></td>
			<td><?php echo $yh->year;?></td>
			<td><?php  if($yh->authenticated==1)echo '已验证';else echo '未验证';?></td>
			<td>
				已关联
			</td>
		</tr>
		<?php }?>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->email;?></td>
					<td><?php echo $record[$i]->created_at;?></td>
					<td><?php echo $record[$i]->ip;?></td>
					<td><?php echo $record[$i]->gender;?></td>
					<td><?php echo $record[$i]->year;?></td>
					<td><?php  if($record[$i]->authenticated==1)echo '已验证';else echo '未验证';?></td>
					<td>
						<span style="cursor:pointer;color:#FF0000" class="add" name="<?php echo $record[$i]->id;?>" title="加入"><img src="/images/admin/btn_add.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10><?php paginate();?><input type="hidden" id="db_table" value="fb_yh"></td>
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
		window.location.href = "add_user.php?id=<?php echo $zid;?>&key="+encodeURI($("#key").val());
	}

	$(".add").click(function(){
		if(!confirm('确定要做关联吗？每个增长会帐号只能关联一个用户，当关联改用户时，其他用户的关联将被取消')){
			return;
		}
		$.post("add_user.post.php",{'zid':<?php echo $zid;?>,'uid':$(this).attr('name')},function(){
			alert('关联成功');
			window.location.reload();
		});
	});
	
</script>