<?php 
	require "../../frame.php";
	$id = $_POST['id'];
	$f_bd = new table_class('fb_mrbd');
	if($id!=''){
		$f_bd->find($id);
		if($f_bd->sr!=$_POST['bd']['sr'])$flag1=1;
		if($f_bd->bgl!=$_POST['bd']['bgl'])$flag2=1;
	}else{
		$flag1=1;$flag2=1;
	}
	$flag1=1;$flag2=1;
	$f_bd->update_attributes($_POST['bd'],false);
	
	if($_FILES['photo']['name']!=null){
		$upload = new upload_file_class();
		$upload->save_dir = "/upload/famous_images/";
		$img = $upload->handle('photo','filter_pic');
		
		if($img === false){
			alert('上传文件失败 !');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$f_bd->zp = "/upload/famous_images/{$img}";
	}
	$f_bd->save();
	
	$db = get_db();
	if($flag1==1){
		$sql = "select id from fb_mrbd where bd_id={$_POST['bd']['bd_id']} order by sr desc";
		$record = $db->query($sql);
		for($i=0;$i<count($record);$i++){
			$db->execute("update fb_mrbd set sr_pm=".($i+1)." where id=".$record[$i]->id);
		}
	}
	if($flag2==1){
		$sql = "select id from fb_mrbd where bd_id={$_POST['bd']['bd_id']} order by bgl";
		$record = $db->query($sql);
		for($i=0;$i<count($record);$i++){
			$db->execute("update fb_mrbd set bgl_pm=".($i+1)." where id=".$record[$i]->id);
		}
	}
	close_db();
	redirect("detail.php?year=".$f_bd->bd_id);
?>