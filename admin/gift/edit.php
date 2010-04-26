<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	if($id!='')	{
		$gift = new table_class('fb_gift');
		$gift->find($id);
	}
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
    <div id=title><?php if($id){echo "修改礼品";}else{echo "添加礼品";}?></div>
	  <a href="index.php" id=btn_back></a>
</div>
	<form id="seo_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
		<div id=itable>
			<table cellspacing="1" align="center">
				<tr class=tr4 align="center">
					<td class=td1 width=15%>礼品名称</td><td align="left"><input id="title" type="text" name="gift[name]" value="<?php echo $gift->name;?>"></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>礼品数量</td><td align="left"><input id="title" type="text" name="total_count" value="<?php echo $gift->total_count;?>" /></td>
				</tr>
				<?php if($id){?>
				<tr align="center" class=tr4>
					<td class=td1>剩余数量</td><td align="left"><?php echo $gift->remain_count?></td>
				</tr>
				<?php }?>
				<tr class=tr4 align="center">
					<td class=td1>开始时间</td><td align="left"><input class="datepicker" type="text" size="50" name="gift[start_time]" value="<?php echo $gift->start_time;?>"></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>结束时间</td><td align="left"><input class="datepicker" type="text" size="50" name="gift[end_time]" value="<?php echo $gift->end_time;?>"></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>礼品图片</td><td align="left"><input type="file" name="gift[image]" /><?php if($gift->image){?> <a href="<?php echo $gift->image;?>" target="_blank">查看</a> <?php }?></td>
				</tr>
				<tr align="center" class=tr4>
					<td class=td1>礼品说明</td><td align="left"><textarea name="gift[description]"><?php echo $gift->description;?></textarea></td>
				</tr>
				<tr class=btools>
					<td colspan="10" align="center"><input id="submit" type="submit" value="发布"></td>
				</tr>	
			</table>
			<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
		</div>
	</form>
</body>
<script>
	$(function(){
		$('.datepicker').datepicker({
			changeMonth: true,
			changeYear: true,
			monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		});

	});
</script>
</html>
