<?php
include "../../frame.php";
$db = get_db();
$db->query("select id from fb_mr where name = '{$_POST['name']}'");
if ($db->move_first()){
	$id = $db->field_by_index(0);
	$db->query("select count(id) as num from fb_mrbd where bd_id={$_POST['list_id']} and mr_id={$id}");
	if($db->field_by_index(0)>0){
		echo 'has';
	}else{
		echo $id;
	}
}else{
	echo 'no';
}
$db->close();
?>