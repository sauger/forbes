<?php 
	session_start();
	require_once('../frame.php');
	$db = get_db();
	$id = intval($_GET['id']);
	$_SESSION['survey'.$id] = rand_str(20);
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
	<title>福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right','survey');
		css_include_tag('public','survey','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
			<span>在线问卷</span>
		</div>
		<div id=bread_line></div>
		<?php if(now()>$vote->ended_at&&$vote->ended_at!='')echo '(已经结束)';elseif(now()<$vote->started_at&&$vote->started_at!='')echo "(还未开始)";else $flag=1;?>
		<?php if($flag==1){?>
		<div id="question_div">
			<form action="survey.post.php" method="post">
			<?php for($i=0;$i<$count;$i++){?>
				<div class="survey2_z <?php if($record[$i]->max_item_count>1)echo ' limit_item'?>" <?php if($record[$i]->max_item_count>1)echo "limit=".$record[$i]->max_item_count;?>>
					<div class="s2_top">
						<div class="top_lpg"></div>
							<div class="top_pg">
								<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
								<div class="s2_title">
									<?php echo $record[$i]->title;?>
								</div>
							</div>
						<div class="top_rpg"></div>
					</div>
					<div class="s2_content">
						<input type="hidden" name="record_id[]" value="<?php echo $record[$i]->id;?>">
						<?php for($j=0;$j<$item_count;$j++){
							if($item[$j]->vid==$record[$i]->id){
						?>
							<div class="s2_c">
								<div class="s2_c_radio"><input type="<?php echo $in_type;?>" id="checkbox<?php echo $item[$j]->id;?>" name="<?php echo $record[$i]->id;?>[]" value="<?php echo $item[$j]->id;?>" /></div>
								<div class="s2_c_content"><label for="checkbox<?php echo $item[$j]->id;?>"><?php echo $item[$j]->title;?></label></div>
							</div>
						<?php }}?>
					</div>
				</div>
			<?php }?>
			<div id="s2_submit"><input type="submit" value="提交"></div>
			<input type="hidden" name="verify" value="<?php echo$_SESSION['survey'.$id];?>">
			<input type="hidden" name="vote_id" value="<?php echo $id;?>">
			</from>
		</div>
		<?php }?>
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