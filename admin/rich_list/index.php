<?php
	include_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$year = $_REQUEST['year'];
	$db = get_db();
	$sql = "select * from fb_fhb";
	if($search!=''){
		$sql .= " where year like '%".$search."%'";
	}
	$sql .= " order by year asc";
	$record = $db->paginate($sql,15);
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
		js_include_tag('admin_pub','admin/famous/famous_list');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="3">
				　富豪榜管理 <a href="bdedit.php">添加榜单</a>   搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">榜单名称</td><td width="115">项目总数</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="detail.php?year=<?php echo $record[$i]->year;?>"> <?php echo $record[$i]->year;?></a></td>
					<td>
						<?php 
							$sql1 = "select a.id,name,year,pm,sr,bgl from fb_fhbd a,fb_fh b,fb_fhb c where b.id=a.fh_id and a.bd_id=c.id and year ='".$record[$i]->year."'";
							$record1 = $db->query($sql1);
							$count1 = count($record1);
							echo $count1;
						?>
					</td>
					<td>
						<a href="bdedit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<a href="detail.php?year=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->year;?>" style="cursor:pointer">榜单管理</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_fhb">
		<?php
			}
		?>
			<tr class="tr3">
				<td colspan=6><?php paginate();?></td>
			</tr>
		</table>	

	</body>
</html>