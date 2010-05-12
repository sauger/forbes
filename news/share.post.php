<?php
	session_start();
    include_once('../frame.php');
	if(!is_ajax()){
		die();
	}
	if($_SESSION['news_share']!=$_GET['session']){
		die();
	}
	$news_id = $_GET['news_id'];
	if(empty($news_id)){
		die();
	}
	$type = $_GET['type'];
	if(empty($type)){
		$type = 'news';
	}else if($type!='pic_list'){
		$type = 'news';
	}
	$count = count($_GET['mail']);
	if($type == 'news'){
		$news = new table_class('fb_news');
		$news->find($news_id);
		if(!$news->id){
			die_error();
		}
	}else if($type == 'pic_list'){
		$list = new table_class('fb_custom_list_type');
		$list->find($news_id);
		if(!$list->id){
			die_error();
		}
	}
	
	
	$sharenames = array();
	$share = new table_class('fb_news_share');
	for($i=0;$i<$count;$i++){
		if(!in_array($_GET['mail'][$i],$sharenames)){
			array_push($sharenames,$_GET['mail'][$i]);
			if($_GET['mail'][$i]!=''&&$_GET['name'][$i]!=''){
				$share->id=0;
				$share->nick_name = htmlspecialchars($_GET['name'][$i]);
				if(strlen($_GET['name'][$i])>30){
					die();
				}
				$share->email = htmlspecialchars($_GET['mail'][$i]);
				if(strlen($_GET['email'][$i])>40){
					die();
				}
				if(isset($_COOKIE['name'])){
					$share->user = $_COOKIE['name'];
					$sname = " {$_COOKIE['name']} ";
				}else{
					$share->user = $_SERVER['REMOTE_ADDR'];
					$sname = "";
				}
				$share->created_at = now();
				$share->news_id = $news_id;
				$share->save();
				if($type == 'news'){
					$content = $_GET['name'][$i]."，你好：<br/><br/>　　您的好友".$sname."想与您分享福布斯中文网的文章《".$news->title."》，您可以点击以下连接阅读<br/><br/>　　<a href='http://www.forbeschina.com".static_news_url($news)."'>http://www.forbeschina.com".static_news_url($news)."</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。";
				}else if($type == 'pic_list'){
					$content = $_GET['name'][$i]."，你好：<br/><br/>　　您的好友".$sname."想与您分享福布斯中文网的榜单《".$news->title."》，您可以点击以下连接查看<br/><br/>　　<a href='http://www.forbeschina.com/list/".$news_id."'>http://www.forbeschina.com/list".$news_id."</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。";
				}
				
				send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$_GET['mail'][$i],$news->title,$content);
			}
		}
	}
	$user_id = front_user_id();
	if($user_id)
	adjust_user_score($user_id,30,'推荐文章给好友');
	
	#redirect('share.php?news_id='.$news_id);
?>
alert("已成功分享！");
<?php 
if($type == 'news'){
?>
window.location.href = "<?php echo static_news_url($news);?>";
<?php
}else if($type == 'pic_list'){
?>
window.location.href = "/list/<?php echo $news_id;?>";
<?php
}
?>
