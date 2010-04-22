<?php
	require_once "../../frame.php";
	use_jquery();
	var_dump($_POST);
	die();
	$vote = new table_class('fb_vote');
	if($_POST['vote_id']!=''){
		$vote->find($_POST['vote_id']);
	}
	if($_FILES['image']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/images/';
		$img = $upload->handle('image','filter_pic');
		if($img === false){
				alert('上传文件失败 !');
		}
		$vote->photo_url = "/upload/images/" .$img;
	}//如果投票上传图片，做处理
	
	$vote->update_attributes($_POST['vote'],false);
	if($img){
	$vote->save();
	
	$count = count($_POST['vote_item']['title']);
	
	$item = new table_class("fb_vote_item");
	if($_POST['vote']['vote_type']!='more_vote'){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/images/';
		$img = $upload->handle('vote_item','filter_pic');
	}
	for($i=0;$i<$count;$i++){
		$item->id=0;
		$item->vote_id = $vote->id;
		if($_POST['vote']['vote_type']!='more_vote'){
			if($img[$i]['result']){
				$item->photo_url = "/upload/images/" .$img[$i]['name'];
			}else{
				$item->photo_url = "";
			}//投票项目图片处理
			if($_POST['vote_item']['title'][$i]!=''){
				$item->title = $_POST['vote_item']['title'][$i];
				$item -> save();
			}
		}else{
			$item->sub_vote_id = $_POST['vote_id'.$i];
			$item->save();
		}
	}
	}
	$type = $_POST['sub_type'];
	//echo $type;
	echo $vote_id;
	
	
?>

<input type="hidden" id="vote_id" value="<?php echo $vote_id;?>">
<input type="hidden" id="type" value="<?php echo $type;?>">

<script>
	
	if($("#type").attr('value')=="edit_sub"){
		parent.remove_tb2();
	}else{
		var vote_id = $("#vote_id").attr('value');
		window.parent.remove_tb(vote_id);
	}
	
</script>