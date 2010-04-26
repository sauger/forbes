<?php 
	include_once( dirname(__FILE__) .'/frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯首页</title>
	<?php
		use_jquery();
		js_include_tag('public','index');
		css_include_tag('public','fortune_list');
	?>
</head>
<body>
	<div id=ibody>
		<div id=forbes_trt>
			<div class="title selected">富豪榜</div>
			<div id=phb>
				<div id="rt_tab1" class="rt_tab" style="display:inline;">
					<div id=ph>
						<span class="span1">排名</span><span  class="span2">姓名</span><span  class="span3">财富（亿）</span><span  class="span4">变动</span>
					</div>
					<div id=phname>
						<?php 
						$db = get_db();
						$items = $db->query("select * from fb_dynamic_fortune_list order by current_index asc limit 100");
						for($i=0;$i<100;$i++) {
							if($items[$i]->current_index < $items[$i]->last_index){
								$word = '↑';
								$class = 'up';
							}else if($items[$i]->current_index > $items[$i]->last_index){
								$word = '↓';
								$class = 'down';
							}else{
								$word = '-';
								$class = '';
							}
						?>
						<div class=content>
							<span class="span1"><?php echo $i+1;?>.</span>
							<span class="span2"><a style="margin-left:0px;" href=""><?php echo $items[$i]->name;?></a></span>
							<span class="span3"><?php echo $items[$i]->fortune;?></span>
							<span class="<?php echo $class;?> span4"><?php echo $word;?></span>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		
	<?php include_once('inc/bottom.inc.php');?>
	</div>
</body>
</html>		