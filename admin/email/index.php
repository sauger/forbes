<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$start = $_GET['start'];
	$end = $_GET['end'];
	$key = $_GET['key'];
	$type = $_GET['type'];
	$db = get_db();
	$sql = "select email_to,email_status,created_at,email_subject from forbes_email.fb_email_history where 1=1";
	$sql2 = "select count(id) as num from forbes_email.fb_email_history where email_status='success'";
	if($start!=''&&$start!='开始时间'){
		$sql .= " and created_at>'{$start} 00:00:00'";
		$sql2 .= " and created_at>'{$start} 00:00:00'";
	}
	if($end!=''&&$end!='结束时间'){
		$sql .= " and created_at<'{$end} 23:59:59'";
		$sql2 .= " and created_at<'{$end} 23:59:59'";
	}
	if($key!=''){
		$sql .= " and (email_to like '%$key%')";
		$sql2 .= " and (email_to like '%$key%')";
	}
	if($type!=''){
		$sql .= " and email_status!='success'";
	}
	$sql .= " order by created_at desc";
	$success = $db->query($sql2);
	$success = $success[0]->num;
	$record = $db->paginate($sql,30);
	$count = $db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery_ui();
	?>
</head>
<body>
<div id=icaption>
    <div id=title>邮件发送查看<?php if($type==''){?>(成功<?php echo $success;?>条，失败<?php echo $wrong = $page_record_count-$success;?>条)<?php if($wrong){?><a href="show_wrong" id="show_wrong">点击查看失败记录</a><?php }}else{?><a href='show_all' id="show_all">查看全部</a><?php }?></div>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<input type="text" id="start" class="date_jquery" value="<?php if($start)echo $start;else echo '开始时间';?>">
		<input type="text" id="end" class="date_jquery" value="<?php if($end)echo $end;else echo '结束时间';?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="30%">收件人地址</td><td width="25%">发送时间</td><td width="25%">发送状态</td><td width="20%">标题</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr3>
			<td><?php echo $record[$i]->email_to;?></td>
			<td><?php echo $record[$i]->created_at?></td>
			<td><?php echo $record[$i]->email_status?></td>
			<td><?php echo base64_decode(substr($record[$i]->email_subject,10,-2));?></td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?></td>
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

	$("#show_wrong").click(function(e){
		e.preventDefault();
		window.location.href = "?key="+encodeURI($("#key").val())+"&start="+$("#start").val()+"&end="+$("#end").val()+"&type=wrong";
	});

	$("#show_all").click(function(e){
		e.preventDefault();
		search();
	});	
	function search(){
		window.location.href = "?key="+encodeURI($("#key").val())+"&start="+$("#start").val()+"&end="+$("#end").val();
	}
	
	$(".date_jquery").datepicker(
	{
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
</script>
