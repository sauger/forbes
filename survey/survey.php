<?php 
	require_once('../frame.php');

		$db = get_db();
		$id = intval($_GET['id']);
		if($id==0)
		{
				$id=1;	
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('public');
		css_include_tag('public','survey','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		
		<?php include "../inc/top.inc.php";?>
		
		<div id=bread>
			
				<span>在线问卷</span>
				
		</div>

		<div id="hr_top"></div>
		
		<div id="questions_div">
			<div id="questions_top"></div>
			
				<div id="questions_n">
				
						<div id="question_menu">在线问卷</div>	
						<div id="questions__top">
							
							<div class="answer_title">问题1：</div>
							<div class="answer_dd">
							<DIV CLASS="answer_z">
												<DIV CLASS="answer_select"><input type="checkbox" id="checkboxA" name="checkbox" value="A" /></DIV>
												<div class="answer"><label for="checkboxA">你选sdfsadfsa择的是A</label></div>
							</DIV>
							<DIV CLASS="answer_z">
												<DIV CLASS="answer_select"><input type="checkbox"id="checkboxB" name="checkbox" value="B" /></DIV>
												<div class="answer"><label for="checkboxB">你选择dfasfas的是</label></div>
							</DIV>
							<DIV CLASS="answer_z">
												<DIV CLASS="answer_select"><input type="checkbox" ID="checkboxC" name="checkbox" value="C" /></DIV>
												<div class="answer"><label for="checkboxC">你选择fasdfsad的是C</label></div>
							</DIV>
							<DIV CLASS="answer_z">
												<DIV CLASS="answer_select"><input type="checkbox" id="checkboxD" name="checkbox" value="D" /></DIV>
												<div class="answer"><LABEL for="checkboxD">你选择sdfsafassafdasfsa的是D</label></div>
							</DIV>
						</div>
						<div id="answer_hr"></div>
							<div id="submit_div"><input type="buttom" value="提&nbsp;交" id="submit"></div>
							
						</div>
						
				
				
				</div>
				
			<div id="questions_bottom"></div>
			
			

			
		
		</div>
		
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<?php include "../right/favor.php";?>
		 		<?php include "../right/four.php";?>
		 		<?php include "../right/rich.php";?>
		 		<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
		
	</div>
</body>
<html>