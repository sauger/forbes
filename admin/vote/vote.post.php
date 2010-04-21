<?php
	require_once "../../frame.php";
	#var_dump($_POST);
	
	if("del"==$_POST['post_type'])
	{
		$post = new table_class($_POST['db_table']);
		$post -> delete($_POST['del_id']);
		$db = get_db();
		$sql = 'delete from smg_vote_item where vote_id='.$_POST['del_id'];
		$db->execute($sql);
		echo $_POST['del_id'];
	}else{
		$vote = new table_class('smg_vote');
		if($_POST['type']=='edit'){
			$vote->find($_POST['vote_id']);
		}
		if($_FILES['image'][name]!=null){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('image','filter_pic');
			if($img === false){
					alert('上传文件失败 !');				
					redirect('vote_add.php');
			}
			$vote->photo_url = "/upload/images/" .$img;
		}//如果投票上传图片，做处理
		
		$table_change = array('<p>'=>'');
		$table_change += array('</p>'=>'');
		$title = strtr($_POST['title'],$table_change);
		$vote->name = $title;
		$vote->update_attributes($_POST['vote'],false);
		if($_POST['started_at']){
			$vote->started_at = $_POST['started_at'];
		}else{
			$vote->started_at = null;
		}
		if($_POST['ended_at']){
			$vote->ended_at = $_POST['ended_at'];
			
		}else{
			$vote->ended_at = null;
		}
		if($_POST['vote']['max_vote_count']==''){
			$vote->max_vote_count=0;
		}
		if($_POST['vote']['max_item_count']==''){
			$vote->max_item_count=0;
		}
		$vote->save();
		
		for($i=1;$i<=$_POST['vote_item_count'];$i++){
			if($_POST['deleted'.$i]=='false'){
				$vote_item = new table_class('smg_vote_item');
				if(null!==$_POST['vote_item'.$i.'_id']){
					$vote_item->find($_POST['vote_item'.$i.'_id']);
				}
				$vote_item->vote_id = $vote->id;
				if($_POST['vote']['vote_type']!='more_vote'){
					if($_FILES['item_image'.$i]['name']!=null){
						$upload = new upload_file_class();
						$upload->save_dir = '/upload/images/';
						$img = $upload->handle('item_image'.$i,'filter_pic');
						//var_dump($_FILES);
						
						if($img === false){
							alert('上传文件失败 !');				
							redirect('vote_add.php');
						}
						
						$vote_item->photo_url = "/upload/images/" .$img;
					}//投票项目图片处理
					$vote_item->title = $_POST['vote_item'.$i][title];
					$vote_item -> save();
				}else{
					$vote_item->sub_vote_id = $_POST['vote_id'.$i];
					$vote_item->save();
				}
			}else{
				if($_POST['vote']['vote_type']=='more_vote'){
					$vote_item = new table_class('smg_vote');
					$vote_item -> delete($_POST['vote_id'.$i]);
					$db = get_db();
					$sql = 'delete from smg_vote_item where vote_id='.$_POST['vote_id'.$i];
					$sql2 = 'delete from smg_vote_item where sub_vote_id='.$_POST['vote_id'.$i];
					echo $sql2;
					$db->execute($sql);
					$db->execute($sql2);
				}else{
					$vote_item = new table_class('smg_vote_item');
					$vote_item -> delete($_POST['vote_item'.$i.'_id']);
				}
			}
		}
		if($_POST['is_app']==1){
			redirect('approval.php');
		}else if($_POST['is_app'] == 2){
			redirect('dept_vote_list.php');
		}
		else{
			redirect('vote_list.php');
		}
		
	}	
?>