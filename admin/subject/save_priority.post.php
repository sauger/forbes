<?php
    include_once("../../frame.php");
	$ids = $_POST['ids'];
	if($ids == "") exit;
	var_dump($_POST);
	$ids = explode(',', $ids);
	$icount = count($ids);
	if($icount <= 0) exit;
	$db = get_db();
	for($i=0;$i<$icount;$i++){
		$db->execute("update smg_subject_modules set priority = $i, pos_name='{$_POST['pos']}' where id={$ids[$i]}");
	}
	
?>