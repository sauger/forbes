<?php 
	include "../frame.php";
	if(!is_ajax()) die();
	if(!is_numeric($_POST['comment_id'])) die();
	$db = get_db();
	$id = $_POST['comment_id'];
	$comment = $db->query("select * from fb_comment where is_approve=0 and id={$id}");
	if(!$comment) die();
	$filte_words = $db->query("select text as words from fb_filte_words");
	$f_count = $db->record_count;
	$i =0 ;
	if(strpos($_SERVER['HTTP_REFERER'],'.shtml') > 0 || strpos($_SERVER['HTTP_REFERER'],'/column/') > 0){
		$comments_url = $_SERVER['HTTP_REFERER'] .'/comments';
		$type = 'static';
	}else{
		$comments_url = "/news/comment_list.php?id=$id";
		$type = 'dynamic';
	}
?>
<div class=comment_box>
		<div class=name><?php echo $comment[$i]->nick_name;?></div>
		<div class=time><?php echo $comment[$i]->created_at;?></div>
		<div class=support>
		</div>
		<div class=comment_content>
			<?php
				$content = $comment[$i]->comment;
				for($j=0;$j<$f_count;$j++){
					$content = str_replace($filte_words[$j]->words,'****',$content);
				}
				if($type == 'static'){
					$url = "$comments_url/{$comment[$i]->id}";
				}else{
					$url = "$comments_url&comment_id={$comment[$i]->id}";
				}
				echo "<a href='{$url}' target='_blank'>$content</a>";
			?>
		</div>
	</div>