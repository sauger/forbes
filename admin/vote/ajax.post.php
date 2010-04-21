<?php
	require_once "../../frame.php";
	use_jquery();
	//var_dump($_POST);
	$vote = new table_class('smg_vote');
	if(null!==$_POST['vote_id']){
		$vote->find($_POST['vote_id']);
	}
	
	if($_FILES['image'][name]!=null){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/images/';
		$img = $upload->handle('image','filter_pic');
		if($img === false){
				alert('上传文件失败 !');				
				//redirect('vote_add.php');
		}
		$vote->photo_url = "/upload/images/" .$img;
	}//如果投票上传图片，做处理
	
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
	$title = strtr($_POST['title'],$table_change);
	$vote->name = $title;
	$vote->update_attributes($_POST['vote']);
	
	$vote_id = $vote->id;
	for($i=1;$i<=$_POST['sub_item_num'];$i++){
		$vote_item = new table_class('smg_vote_item');
		if($_POST['deleted'.$i]=='false'){
			if(null!==$_POST['vote_item'.$i.'_id']){
				$vote_item->find($_POST['vote_item'.$i.'_id']);
			}
			$vote_item->vote_id = $vote_id;
			if($_POST['vote']['vote_type']=='image_vote'){
				if($_FILES['item_image'.$i][name]!=null){
					$upload = new upload_file_class();
					$upload->save_dir = '/upload/images/';
					$img = $upload->handle('item_image'.$i,'filter_pic');
					//var_dump($_FILES);
					
					if($img === false){
						alert('上传文件失败 !');				
						//redirect('vote_add.php');
					}
					
					$vote_item->photo_url = "/upload/images/" .$img;
				}
				
			}else{
				$vote_item->photo_url = "";
			}//投票项目图片处理
			
			$vote_item->update_attributes($_POST['vote_item'.$i]);
		}else{
			if($_POST['sub_type']=="edit_sub"){
				$vote_item->delete($_POST['vote_item'.$i.'_id']);
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