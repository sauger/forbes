<?php
	include_once('../../frame.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
<?php 
	css_include_tag('admin','thickbox','jquery_ui');
	use_jquery_ui();
	js_include_tag('admin/vote/vote','thickbox');
	validate_form("vote_form");
?>
</head>

<body>
<div id=icaption>
	<div id=title>添加投票</div>
	  <a href="index.php" id=btn_back></a>
</div>
<form id="vote_form" method="post" enctype="multipart/form-data" action="vote.post.php">
	<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td align="center" width="15%">标题：</td>
			<td width="85%" align="left"><input type="text" class="required" name="vote[name]"></td>
		</tr>
		<tr class=tr4>
			<td align="center">描述：</td>
			<td align="left"><textarea cols=70 name="vote[description]"></textarea></td>
		</tr>
		<tr class=tr4>
			<td align="center">添加图片：</td>
			<td align="left"><input name="image" type="file"></td>
		</tr>
		<!--
		<tr class=tr4>
			<td>所属类别：</td>
			<td align="left">
				<select  name="vote[category_id]">
					<?php for($i=0;$i<$count;$i++){?>
					<option value="<?php echo $category_menu[$i]->id;?>"><?php echo $category_menu[$i]->name;?></option>
					<?php }?>
				</select>
			</td>
		</tr>-->
		<tr class=tr4>
			<td align="center">投票类型：</td>
			<td align="left">
				<select id=select_vote_type name="vote[vote_type]">
					<option value="word_vote">文字投票</option>
					<option value="image_vote">图片投票</option>
					<option value="more_vote">复合投票</option>
				</select>切换投票类型会使已添加的选项或者投票消失
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">控制方式：</td>
			<td align="left">
				<select id=select_limit_type name="vote[limit_type]">
					<option value="no_limit">不设限制</option>
					<option value="user_id">会员登录</option>
					<option value="ip">IP控制</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">投票次数限制：</td>
			<td align="left"><input type="text" name="vote[max_vote_count]" class="number" id="max_vote_count">如果不填则无限制</td>
		</tr>
		<tr class=tr4>
			<td align="center">投票选项限制：</td>
			<td align="left"><input type="text" name="vote[max_item_count]" class="number" id="max_item_count">如果不填则无限制,如果前台页面想采用单选框请在此处填1</td>
		</tr>
		<tr class=tr4>
			<td align="center">开始日期：</td>
			<td align="left"><input type="text" class="date_jquery" name="started_at" id="start"></td>
		</tr>
		<tr class=tr4>
			<td align="center">截止日期：</td>
			<td align="left"><input type="text"  class="date_jquery" name="ended_at" id="end"></td>
		</tr>
		<tr class=tr4 id="item">
			<td align="center">投票项目：</td>
			<td align="left" id="single">
				<input type="text" name="vote_item[title][]" style="width:300px" class="required" id="first_item">
				<input type="file" name="vote_item[]" class="item_image" style="display:none;">
				<a id="add_item" value="1" style="cursor:pointer;" title="继续添加"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>	
			<td align="left" style="display:none;" id="many">
					<a  href="vote_add.ajax.php?KeepThis=true&TB_iframe=true&height=600&width=560" class="thickbox" id="add_sub_vote" title="添加子投票"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center"><input id="submit" type="submit" value="发布投票"></td>
			<input type="hidden" name="vote[is_sub_vote]" value="0">
		</tr>
 	</table>
	</div>
 </form>
</body>
</html>