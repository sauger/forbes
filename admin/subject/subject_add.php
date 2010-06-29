<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>福布斯中文网</title>
		<?php
			require_once('../../frame.php');
			judge_role();
			css_include_tag('admin');
			use_jquery();
			validate_form('form_add_subject');
		?>
	</head>
	<body>
		<div id=icaption>
		    <div id=title>发布专题</div>
			  <a href="index.php" id=btn_back></a>
		</div>
		<div id=itable>
			<form method="post" name="add_subject" id="form_add_subject" action="subject.post.php">
			<table cellspacing="1"  align="center">
			<tr class=tr4>
				<td class=td1 width=15%>专题名称</td>
				<td width=85%>
					<input type="text" name="subject[name]" id="subject_name" class="required">
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>专题标识</td>
				<td>
					<input type="text" name="subject[identity]" id="subject_identity" class="required">
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>专题模板</td>
				<td>
					<select name="subject[templet_name]" id="templet_type"  class="required">
						<option value="templet1" selected="selected">专题模板1</option>
						<option value="templet2" >专题模板2</option>
						<option value="templet3" >专题模板3</option>	
					</select>
				</td>
			</tr>
			<tr class=tr4>
				<td class=td1>描述</td>
				<td>
					<textarea name="subject[description]"></textarea>
				</td>
			</tr>
			<tr class="btools">
				<td colspan="10">
					<input id="submit" type="submit" value="完成">	
				</td>
			</tr>	
			</table>
			</form>
		</div>
	</body>
</html>