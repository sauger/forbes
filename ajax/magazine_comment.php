<?php
include "../frame.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		use_jquery();
		js_include_tag('jquery.cookie','pubfun', 'magazine_comment');	
		css_include_tag("magazine_comment");
	?>
	<title>福布斯中文网</title>
</head>
	<body>
		<div id="comment_container">
			<form id="comment_form">
				<div id="comment_title">请填写您的“读者来函“，参与的用户将有机会获得福布斯每期发出的大奖！</div>
				<div id="comment_left_box">
					<textarea rows="6" cols="35" id="co" name="co"></textarea>
					<div><span>如果您能提供文章标题，请输入</span><input type="text" maxlength="200" name="t"/></div>
					<div><span>如果您能提供期刊号，请输入</span><input type="text" maxlength="200" name="o" /></div>
				</div>

				<div id="comment_bottom_box">
					<div>
						<span><label>您的email</label></span><input type="text" id="em" maxlength="50" name="em"/> 
						<span><label>您的手机</label></span><input type="text" maxlength="15" name="mo" style="margin-right:0px"/>
					</div>
					<div id="submit_div">
						<span><label>用户名</label></span><input type="text" maxlength="50" id="n" name="n"/> 
						<span><label>密　码</label></span><input type="password" maxlength="50" id="p" name="p" />
						<button id="submit">提交</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>