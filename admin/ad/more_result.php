<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id = intval($_GET['id']);
	$sql = "SELECT t1.date_time,t1.source_id,t1.ad_name,t1.count,t2.count as click_count FROM forbes_ad.fb_ad_result t1 left join forbes_ad.fb_ad_result t2 on t1.source_id=t2.source_id and t2.type='ad_click' and t1.date_time=t2.date_time where t1.type='ad' and t1.source_id=$id";
	$db = get_db();
	$record = $db->paginate($sql,20);
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
		use_jquery();
	?>
</head>
<body>
<div id=icaption>
    <div id=title><?php echo $record[0]->ad_name;?>--详细统计</div>
	 <a href="result.php" id=btn_back></a>
</div>
<!--
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<input type="button" value="搜索" id="search_button">
</div>
-->
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="25%">日期</td><td width="25%">展示次数</td><td width="25%">有效次数</td><td width="25%">有效率</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
				$click_count = ($record[$i]->click_count=='')?0:$record[$i]->click_count;
		?>
		<tr class=tr3 id="<?php echo $ad[$i]->id;?>">
			<td><?php echo $record[$i]->date_time;?></td>
			<td><?php echo $record[$i]->count?></td>
			<td><?php echo ($record[$i]->click_count=='')?0:$record[$i]->click_count;?></td>
			<td><?php echo round($click_count/$record[$i]->count,3)*100;?>%</td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?></td>
		</tr>
	</table>
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
		window.location.href = "ad_list.php?key="+encodeURI($("#key").val());
	}
</script>
