<?php
	require_once('../../frame.php');
	$key = $_REQUEST['key'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>投票管理</div>
	<a href="vote_add.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id=title type="text" value="<? echo $_REQUEST['title']?>"><span id="span_category"></span>
		<select id=adopt style="width:100px" class="select_new">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="20%">投票名称</td><td width="80">登录限制</td><td width="80">票数限制</td><td width="80">投票类型</td><td width="80">发布时间</td><td width="80">到期时间</td><td width="80">所属类别</td><td width="120">操作</td>
		</tr>
	<table width="795" border="0" id="list">
		<?php
			$vote = new table_class("fb_vote");
			if($key!=''){
				$record = $vote->paginate("all",array('conditions' => 'is_sub_vote=0 name  like "%'.trim($key).'%"','order' => 'priority,created_at desc'),15);
			}else{
				$record = $vote->paginate("all",array('conditions' => 'is_sub_vote=0 ','order' => 'priority,created_at desc'),15);
			}
			$count_record = count($record);
			//--------------------
			for($i=0;$i<$count_record;$i++){
				switch($record[$i]->vote_type) {
						case "word_vote":
							$vote_name = "文字投票";
							break;
						case "image_vote":
							$vote_name = "图片投票";
							break;
						case "more_vote":
							$vote_name = "复合投票";
							break;
						default:
							$vote_name = "未知类型";
				}
				
				switch($record[$i]->limit_type) {
					case "user_id":
						$limit_name = "工号登录";
						break;
					case "ip":
						$limit_name = "IP控制";
						break;
					case "no_limit":
						$limit_name = "不设限制";
						break;
					default:
						$limit_name = "未知类型";
				}
				
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $limit_name;?></td>
					<td><?php echo $vote_name;?></td>
					<td><?php echo substr($record[$i]->created_at, 0, 10);?></td>
					<td><?php echo substr($record[$i]->ended_at, 0, 10);?></td>
					<td>
						<?php if($record[$i]->is_adopt=="1"){?><span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>">撤消</span><? }?>
						<?php if($record[$i]->is_adopt=="0"){?><span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>">发布</span><? }?>
						<a href="vote_edit.php?id=<?php echo $record[$i]->id;?>">编辑</a>
						<a class="del_vote" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer;">删除</a>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:20px;">
					</td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority style="display:none">清空优先级</button>
				<button id=edit_priority  style="display:none">编辑优先级</button>
				<input type="hidden" id="db_table" value="fb_vote">
				<input type="hidden" id="relation" value="image">
			</td>
		</tr>
	</table>
</body>
</html>
