<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin','jquery_ui');
		$start_time =  date('Y-m-d');
		$end_time = date('Y-m-d');
		use_jquery();
		js_include_tag('jquery-ui-1.7.2.custom.min.js','admin/report/publish_news_report');
	?>
</head>

<body>
<div id=icaption>
   <div id=title>文章发布统计</div>
</div>
<div id=isearch>
		<input type="text" id="start_time" class="date_jquery" value="<?php echo $start_time?>"></input>
		<input type="text" id="end_time" class="date_jquery" value="<?php echo $end_time?>"></input>
		<button id="btn_ok">统计</button>
</div>

<div id=itable>
	<table cellspacing=1 border="0">
		<tr>
			<td id="td_loading" style="display:none;">Loading.....<img src="/images/loading.gif"></img></td>
		</tr>
		</table>	
</div>
<div id="result"></div>
</body>
</html>