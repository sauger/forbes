<?php
	include_once('../../frame.php');
	$search = $_GET['search'];
	
	$db = get_db();
	$sql = "select * from fb_gift";
	if($search!=''){
		$c[]=" name like '%{$search}%'";
	}
	$sql = empty($c) ? $sql : $sql . " where " .implode(' and ', $c);
	$record = $db->paginate($sql,30);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>

<body>
	<div id=icaption>
    <div id=title>礼品管理</div>
	  <a href="edit.php" id=btn_add></a>
	</div>
	<div id=isearch>
			<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
			<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
	</div>
	<div id=itable>
	<table width="795" border="0" id="list">
		<tr class="tr2">
			<td width="20%">礼品名称</td><td width="10%">礼品数量</td><td width="20%">开始日期</td><td width="20%">结束日期</td><td width="30%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->remain_count;?>/<?php echo $record[$i]->total_count;?></td>
					<td><?php echo $record[$i]->start_time?></td>
					<td><?php echo $record[$i]->end_time?></td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>　
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_gift">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate();?></td>
		</tr>
	</table>
	</div>	
	<script>
		function send_search(){
			location.href="index.php?search=" + encodeURI($('#search').val());
		}
		$(function(){
			$('#search_b').click(function(){
				send_search();
			});
			$('#search').keypress(function(e){
				if(e.keyCode == 13){
					send_search();
				}
			});
		});
	</script>
</body>
</html>