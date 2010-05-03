<?php
   include '../../frame.php';
   $params = explode(',',$_POST['params']);
   $ids = array();
   $table = new table_class('fb_rich_fortune');
	foreach ($params as $param) {
		$value = explode('|',$param);
		$table->id = $value[0];
		$table->rich_id = $_POST['rich_id'];
		$flag = true;
		if($value[1]!=''){
			$table->fortune = $value[1];
		}else{
			$flag = false;
		}
		if($value[2]!=''){
			$table->fortune_year = $value[2];
		}else{
			$flag = false;
		}
		if($value[3]!=''){
			$table->fortune_order = $value[3];
		}else{
			$flag = false;
		}
		if($flag){
			$table->save();
		}
		array_push($ids, $table->id);
	}
	$ids = implode(',', $ids);
	echo $ids;
?>