<?php 
	require_once('../frame.php');
	$db = get_db();
	$id = intval($_GET['id']);
	if(empty($id)){
		redirect('/error.html');
		die();
	}
	$question = $db->query("select * from fb_survey_question where survey_id=$id order by priority");
	$count = $db->record_count;
	$item = $db->query("select * from fb_survey_item where survey_id = $id");
	$item_count = $db->record_count;
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
							<?php for($i=0;$i<$count;$i++){?>
							<div class="answer_title">问题<?php echo $i+1?>：<?php echo $question[$i]->name;?></div>
							<div class="answer_dd">
								<?php for($j=0;$j<$item_count;$j++){
									if($item[$j]->question_id==$question[$i]->id){
								?>
								<div class="answer_z">
									<div class="answer_select"><input type="radio" id="checkbox<?php echo $item[$j]->id;?>" name="<?php echo $question[$i]->id;?>" value="<?php echo $item[$j]->id;?>" /></DIV>
									<div class="answer"><label for="checkbox<?php echo $item[$j]->id;?>"><?php echo $item[$j]->name;?></label></div>
								</div>
								<?php }}?>
							</div>
							<?php }?>
							<div id="answer_hr"></div>
							<div id="submit_div"><input type="button" value="提&nbsp;交" id="submit"></div>
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