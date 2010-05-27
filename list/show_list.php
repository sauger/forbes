<?php
		include_once(dirname(__FILE__).'/../frame.php');
		$db = get_db();
		$id = intval($_GET['id']);
		$order = $_GET['order'];
		if(strlen($order)>20||$id==""){
			die();
		}
		$desc = intval($_GET['desc']);
		$list = new table_class('fb_custom_list_type');
		$list->find($id);
		if(!$list->id) die();
		if($list->list_type==4){
			if($page_type=='static'){
				redirect('/pic_list/'.$id,'header');
			}else{
				redirect('pic_list.php?id='.$id,'header');			
			}
			die();
		}
		if($list->list_type==5){
			if($page_type=='static'){
				redirect('/file_list/'.$id,'header');
			}else{
				redirect('file_list.php?id='.$id,'header');			
			}
			die();
		}
		if($list->tablename="")
		{
			die();
		}
		$description = $list->comment;
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
   	<title><?php echo $list->name;?>_福布斯中文网</title>
   	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<meta name="keywords" content="<?php echo $list->name;?> 福布斯中文网" />
	<meta name="description" content="<?php echo $list->name;?> 福布斯中文网" />
	<?php 
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('list','public','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread><a href="/list">榜单</a> > <?php echo $list->name;?></div>
		<div id=bread_line></div>
		<div id="list_left">
			<div id="list_title"><?php echo $list->name;?></div>
			<div id="list_left_top">
				<?php if($page_type=='static'){?>
				<a href="/list/<?php echo $id?>/more">查看详细</a>
				<?php }else{?>
				<a href="more.php?id=<?php echo $id;?>">查看详细</a>
				<?php }?>
			</div>
			<div id="list_list_content">
			<?php
				if($list->table_name=="fb_famous_list_items"){
			?>
				<table cellspacing="1" cellpadding="2" border="0" width="100%">
					<tr id="list_top_tr">
							<td valign="middle" width="10%"><a <?php if($order=='overall_order')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=overall_order&desc=<?php echo ($order=='overall_order')?!$desc:'0';?>">综合<br>排名</a></td>
							<td valign="middle" width="15%">姓名</td>
							<td valign="middle" width="15%">职业</td>
							<td valign="middle" width="15%"><a <?php if($order=='fortune')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=fortune&desc=<?php echo ($order=='fortune')?!$desc:'1';?>">收入<br>（万人民币）</a></td>
							<td valign="middle" width="15%"><a <?php if($order=='fortune_order')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=fortune_order&desc=<?php echo ($order=='fortune_order')?!$desc:'0';?>">收入排名</a></td>
							<td valign="middle" width="15%"><a <?php if($order=='exposure_rate')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=exposure_rate&desc=<?php echo ($order=='exposure_rate')?!$desc:'0';?>">曝光率指数</a></td>
							<td valign="middle" width="15%"><a <?php if($order=='exposure_order')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=exposure_order&desc=<?php echo ($order=='exposure_order')?!$desc:'0';?>">曝光率排名</a></td>
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
						$sql = "select * from fb_famous_list_items where list_id=$id order by $order $desc";
						$list = $db->paginate($sql,20);
						$count = count($list);
						for($i=0;$i<$count;$i++){
					?>
					<tr class="list_btr">
						<td valign="middle" width="10%" style="color:#246BB0;"><?php echo $list[$i]->overall_order;?></td>
						<td valign="middle" width="15%" <?php if($order=='overall_order')echo 'class="selected"';?>>
							<?php if($list[$i]->famous_id!=''){?>
								<a href="/famous/famous.php?id=<?php echo $list[$i]->famous_id;?>">
							<?php }?>
							<?php echo $list[$i]->name;?>
							<?php if($list[$i]->famous_id!=''){?></a><?php }?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->job;?></td>
						<td valign="middle" width="15%" <?php if($order=='fortune')echo 'class="selected"';?>><?php echo $list[$i]->fortune;?></td>
						<td valign="middle" width="15%" <?php if($order=='fortune_order')echo 'class="selected"';?>><?php echo $list[$i]->fortune_order;?></td>
						<td valign="middle" width="15%" <?php if($order=='exposure_rate')echo 'class="selected"';?>><?php echo $list[$i]->exposure_rate;?></td>
						<td valign="middle" width="15%" <?php if($order=='exposure_order')echo 'class="selected"';?>><?php echo $list[$i]->exposure_order;?></td>
					</tr>
					<?php }?>
				</table>
			<?php }else if($list->table_name=="fb_rich_list_items"){?>
				<table cellspacing="1" cellpadding="2" border="0" width="100%">
					<tr id="list_top_tr">
							<td valign="middle" width="10%"><a <?php if($order=='overall_order')echo 'style="color:#fff; font-weight:bold"';?> href=show_list.php?id=<?php echo $id;?>&order=overall_order&desc=<?php echo ($order=='overall_order')?!$desc:'0';?>">综合排名</a></td>
							<td valign="middle" width="15%">姓名</td>
							<td valign="middle" width="15%">年龄</td>
							<td valign="middle" width="15%"><a <?php if($order=='fortune')echo 'style="color:#fff; font-weight:bold"';?> href="show_list.php?id=<?php echo $id;?>&order=fortune&desc=<?php echo ($order=='fortune')?!$desc:'1';?>">年收入<br>（<?php echo $list->unit;?>）</a></td>
							<td valign="middle" width="15%">所属省市</td>
							<td valign="middle" width="15%">公司名</td>
							<td valign="middle" width="15%">主要产业</td>
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
						$sql = "select * from fb_rich_list_items where list_id=$id order by $order $desc";
						$list = $db->paginate($sql,20);
						$count = count($list); 
						for($i=0;$i<$count;$i++){
					?>
					<tr class="list_btr">
						<td valign="middle" width="10%" style="color:#246BB0;" <?php if($order=='overall_order')echo 'class="selected"';?>><?php echo $list[$i]->overall_order;?></td>
						<td valign="middle" width="15%">
							<?php if($list[$i]->rich_id!=''){?>
								<a href="/rich/rich.php?id=<?php echo $list[$i]->rich_id;?>">
							<?php }?>
							<?php echo $list[$i]->name;?>
							<?php if($list[$i]->famous_id!=''){?></a><?php }?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->age;?>岁</td>
						<td valign="middle" width="15%" <?php if($order=='fortune')echo 'class="selected"';?>><?php echo $list[$i]->fortune;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->zone;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->company;?></td>
						<td valign="middle" width="15%"><?php echo $list[$i]->industry;?></td>
					</tr>
					<?php }?>
				</table>
			<?php }else{?>
				<table cellspacing="1" cellpadding="2" border="0" width="100%">
					<?php
						$head = $db->query("select * from fb_list_head where list_id=$id");
						if($db->record_count){
							$count = $db->record_count;
					?>
					<tr id="head_tr">
						<?php if($head[0]->from_field>1){?>
						<td colspan="<?php echo $head[0]->from_field-1;?>"></td>
						<?php }?>
						<?php for($i=0;$i<$count;$i++){?>
						<td class="td2"  colspan="<?php echo $head[$i]->end_field-$head[$i]->from_field+1;?>"><?php echo $head[$i]->name?></td>
						<?php if($i<$count-1&&$head[$i]->end_field!=($head[$i+1]->from_field-1)){?>
						<td colspan="<?php echo $head[$i+1]->from_field-$head[$i]->end_field-1;?>"></td>
						<?php }?>
						<?php }?>
					</tr>
					<?php }?>
					<tr id="list_top_tr">
						<?php 
							$fields = $db->query("show full fields FROM {$list->table_name}");
							$count = $db->record_count;
							if($count>8)$count=8;
							$width = 100/$count;
							for($i=1;$i<$count;$i++){
						?>
						<td width="<?php echo $width;?>%" valign="middle">
							<?php if($fields[$i]->Key=='MUL'){
								$desc1 = ($order==$fields[$i]->Field)?!$desc:'1';
								if($page_type=='static'){
									$url = "/list/{$id}/{$fields[$i]->Field}/{$desc1}";
								}else{
									$url = "show_list.php?id={$id}&order={$fields[$i]->Field}&desc={$desc1}";
								}
								if($order==$fields[$i]->Field||(empty($order)&&$i==1)){
									echo "<a style='color:#000; font-weight:bold;' href='{$url}'>{$fields[$i]->Comment}</a>";
								}else{
									echo "<a href='{$url}'>{$fields[$i]->Comment}</a>";
								}
							}else{
								echo $fields[$i]->Comment;	
							}
							?>
						</td>
						<?php }?>
					</tr>
					<?php
						if(empty($order)){
							$order = "id";
						}
						if(empty($desc)){
							$desc = "asc";
						}else{
							$desc = "desc";
						}
						$sql = "select * from {$list->table_name} order by $order $desc";
						$list = $db->paginate($sql,20);
						$list_count = count($list); 
						for($i=0;$i<$list_count;$i++){
					?>
					<tr class="list_btr">
						<?php for($j=1;$j<$count;$j++){
							$field_name = field_.$j;
						?>
						<td <?php if($order==$fields[$j]->Field||($order=='id'&&$j==1))echo 'class="selected"';?> width="<?php echo $width;?>%" valign="middle" ><?php echo $list[$i]->$field_name;?></td>
						<?php }?>
					</tr>
					<?php }?>
				</table>
			<?php }?>
			</div>
			<div id="list_desc"><?php echo $description;?></div>
			<div id="list_paginate">
				<?php paginate();?>
			</div>
		</div>

		<div id="right_inc">
			<?php include_right( "ad");?>
	 		<?php include_right( "favor");?>
	 		<?php include_right( "four");?>
	 		<?php include_right( "rich");?>
	 		<?php include_right( "magazine");?>
		</div>
		<?php include_bottom();?>
	</div>
</body>