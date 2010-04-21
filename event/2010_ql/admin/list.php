<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯列表</title>
	<?php
		require_once('../frame.php');
		$db = get_db();
		$record=$db->paginate('select id,company_name,created_at from subject_application2 order by created_at desc',25);
	?>
	<link href="../css/admin.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div style="width:100%; float:left; display:inline;">
		<div class="tr2" style="width:49.8%; border-right:1px solid #C8E4F0; float:left; display:inline;">报名单位</div><div class="tr2" style="width:50%; float:right; display:inline;">报名时间</div>
		<?php
			for($i=0;$i<count($record);$i++){
		?>
				<div class=tr3 style="width:49.8%; border-right:1px solid #C8E4F0; float:left; display:inline;">
					<a target="_blank" href="../app.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->company_name;?></a>
				</div>
				<div class=tr3 style="width:50%; float:right; display:inline;">
					<?php echo $record[$i]->created_at;?>
				</div>
		<?php
			}
		?>
		
	</div>
	<div class=pages><?php paginate('');?></div>
</body>
</html>