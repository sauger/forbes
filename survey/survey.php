<?php 
	session_start();
	require_once('../frame.php');
	$_SESSION['survey'] = rand_str(20);
	$db = get_db();
	$id = intval($_GET['id']);
	if(empty($id)){
		redirect('/error.html');
		die();
	}
	$vote = new table_class("fb_vote");
	$vote->find($id);
	if($vote->max_item_count==1)$in_type="radio";else$in_type="checkbox";
	$item = $db->query("select * from fb_vote_item where vote_id=$id");
	$item_count = $db->record_count;
	if($vote->vote_type!='more_vote'){
		$record = $db->query("select * from fb_vote where id=$id");
		$count = 1;
	}else{
		$record = $db->query("SELECT t1.id,t2.title,t1.max_item_count FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id where t2.vote_id=$id");
		$count = $item_count;
		$item = $db->query("SELECT t1.id as vid,t3.title,t3.id FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id join fb_vote_item t3 on t1.id=t3.vote_id where t2.vote_id=$id");
		$item_count = $db->record_count;
	}
	#$in_type = "radio";
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
					<div id="question_menu">在线问卷<?php if(now()>$vote->ended_at&&$vote->ended_at!='')echo '(已经结束)';elseif(now()<$vote->started_at&&$vote->started_at!='')echo "(还未开始)";else $flag=1;?></div>
					<?php if($flag==1){?>
					<div id="questions__top">
						<form action="survey.post.php" method="post">
						<?php for($i=0;$i<$count;$i++){?>
						<div class="answer_title<?php if($record[$i]->max_item_count>1)echo ' limit_item'?>" <?php if($record[$i]->max_item_count>1)echo "limit=".$record[$i]->max_item_count;?>>问题<?php echo $i+1?>：<?php echo $record[$i]->title;?></div>
						<div class="answer_dd">
							<input type="hidden" name="record_id[]" value="<?php echo $record[$i]->id;?>">
							<?php for($j=0;$j<$item_count;$j++){
								if($item[$j]->vid==$record[$i]->id){
							?>
							<div class="answer_z">
								<div class="answer_select"><input type="<?php echo $in_type;?>" id="checkbox<?php echo $item[$j]->id;?>" name="<?php echo $record[$i]->id;?>[]" value="<?php echo $item[$j]->id;?>" /></DIV>
								<div class="answer"><label for="checkbox<?php echo $item[$j]->id;?>"><?php echo $item[$j]->title;?></label></div>
							</div>
							<?php }}?>
						</div>
						<?php }?>
						<div id="answer_hr"></div>
						<div id="submit_div"><input type="submit" value="提&nbsp;交" id="submit"></div>
						<input type="hidden" name="verify" value="<?php echo $_SESSION['survey'];?>">
						<input type="hidden" name="vote_id" value="<?php echo $id;?>">
						</form>
					</div>
					<?php }?>
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