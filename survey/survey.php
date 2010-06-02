<?php
	session_start();
	include_once( dirname(__FILE__) .'/../frame.php');
	$db = get_db();
	$id = intval($_GET['id']);
	$_SESSION['survey'.$id] = rand_str(20);
	if(empty($id)){
		redirect('/error/');
		die();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo $vote->name;?>_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','right','survey');
		css_include_tag('public','survey','right_inc');
	?>
</head>
<body>
<?php 
	$vote = new table_class("fb_vote");
	$vote->find($id);
	if($vote->limit_type=='user_id'){
		require_login();
	}
	if($vote->max_item_count==1)$in_type="radio";else $in_type="checkbox";
	$item = $db->query("select * from fb_vote_item where vote_id=$id");
	$item_count = $db->record_count;
	if($vote->vote_type!='more_vote'){
		$record = $db->query("select * from fb_vote where id=$id");
		$count = 1;
	}else{
		$record = $db->query("SELECT t1.id,t1.name,t1.max_item_count FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id where t2.vote_id=$id");
		$count = $item_count;
		$item = $db->query("SELECT t1.id as vote_id,t3.title,t3.id FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id join fb_vote_item t3 on t1.id=t3.vote_id where t2.vote_id=$id");
		$item_count = $db->record_count;
	}
	#$in_type = "radio";
?>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread><a href="/survey/">问卷调查</a> > <?php echo $vote->name;?>
		</div>
		<div id=bread_line></div>
		<div id="question_div">
			<div id="desc">
				<?php 
					if(now()>$vote->ended_at&&$vote->ended_at!='')echo '(已经结束)';
					elseif(now()<$vote->started_at&&$vote->started_at!='')echo "(还未开始)";
					else {
						$flag=1;
						echo $vote->description;
				?>
				
				<?php }?>
			</div>
			<?php if($flag==1){?>
			<form action="survey.post.php" method="post">
			<?php 
				for($i=0;$i<$count;$i++){
					if($record[$i]->max_item_count=='0'){
						$limit = $vote->max_item_count;
					}else{
						$limit = $record[$i]->max_item_count;
					}
			?>
				<div class="survey2_z <?php if($limit)echo ' limit_item'?>" <?php if($limit)echo "limit=".$limit;?>>
					<div class="s2_top">
						<div class="top_pg">
							<div class="title_pic"><img src="../images/survey/top2_redio.jpg"></div>
							<div class="s2_title">
								<?php echo $record[$i]->name;?>
							</div>
						</div>
					</div>
					<div class="s2_content">
						<input type="hidden" name="record_id[]" value="<?php echo $record[$i]->id;?>">
						<?php for($j=0;$j<$item_count;$j++){
							if($item[$j]->vote_id==$record[$i]->id){
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
			</form>
			<?php
				if($vote->file_url){
					$file = explode(',',$vote->file_url);
			?>
				<div id="files">
					资料下载：<?php foreach($file as $k => $v){?>
					资料<?php echo $k+1?>:<a href="<?php echo $v;?>" target="_blank">点击下载</a>　
					<?php }?>
				</div>
			<?php
				}
			?>
			<?php }?>
		</div>
		<div id="right_inc">
		 	<?php include_right("ad")?>
			<?php include_right("favor")?>
			<?php include_right("four")?>
			<?php include_right("magazine")?>
		</div>
		<?php include_bottom();?>
	</div>
</body>
</html>
