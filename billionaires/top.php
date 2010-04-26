<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-榜单首页</title>
	<?php
		include_once(dirname(__FILE__).'/../frame.php');
		$db = get_db();
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('list','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="index.php">富豪</a> > <span style="color:#246BB0;">动态排名</span></div>
		<div id=bread_line>
		<div id="list_left">
			<div id="list_title"><?php echo $list->name;?></div>
			<div id="list_left_top">
			</div>
			<div id="list_list_content">
				<table border="0" cellspacing="1" >
					<tr id="list_top_tr">
							<td valign="middle" width="5%"><a href="more.php?id=<?php echo $id;?>&order=overall_order&desc=<?php echo ($order=='overall_order')?!$desc:'0';?>">排名</a></td>
							<td valign="middle" width="25%">姓名</td>
							<td valign="middle" width="10%">年龄</td>
							<td valign="middle" width="15%">财富(亿RMB)</td>
							<td valign="middle" width="10%">性别</td>
							<td valign="middle" width="35%">公司名</td>
					</tr>
					<?php
						if(empty($order)){
							$order = "overall_order";
						}
						if(empty($desc)){
							$desc = "asc";
						}else{
							$desc = "desc";
						}
						$db = get_db();
						$gender = array("女","男","未知");
						$list = $db->query("select a.current_index,a.richer_id,a.fortune,a.name,b.gender,b.birthday,d.company_id,group_concat(c.name SEPARATOR '、') as company from fb_dynamic_fortune_list a left join fb_rich b on a.richer_id = b.id left join fb_rich_company d on a.richer_id=d.rich_id left join fb_company c on d.company_id = c.id group by a.richer_id order by current_index asc limit 200");
						
						$count = count($list); 
						for($i=0;$i<$count;$i++){
							$year = intval(substr($list[$i]->birthday,0,4));
							$age = $year > 0 ? date('Y') - $year ."岁" : '未知';
					?>
					<tr class="list_btr">
						<td valign="middle" width="10%" style="color:#246BB0;"><?php echo $list[$i]->current_index;?></td>
						<td valign="middle" width="15%">
							<?php echo $list[$i]->name;?>
						</td>
						<td valign="middle" width="15%"><?php echo $age;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->fortune;?>亿</td>
						<td valign="middle" width="15%"><?php echo $gender[$list[$i]->gender]?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->company;?></td>
					</tr>
					<?php }?>
				</table>
			</div>
			<div id="list_paginate">
			</div>
		</div>

		<div id="right_inc">
			<?php include_once(dirname(__FILE__).'/../right/ad.php');?>
			<?php include_once(dirname(__FILE__).'/../right/favor.php');?>
			<?php include_once(dirname(__FILE__).'/../right/four.php');?>
			<?php include_once(dirname(__FILE__).'/../right/magazine.php');?>
		</div>





		<?php include_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>