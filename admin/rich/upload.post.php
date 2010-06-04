<?php
    include_once('../../frame.php');
	
    $table_name = 'fb_rich';
	$list = new table_class($table_name);
	$fields = $list->fields;
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	$lines = read_csv($file);
	var_dump($lines);die();
	unlink($file);
	unset($lines[0]);
	
	$success = 0;
	$fail = 0;
	$fail_info = array();
	$sql_array = array();
	$db = get_db();
	
	if($_POST['gender']!=''){
		$gender = $_POST['gender']-1;
	}else{
		$gender = 'no';
	}
	unset($_POST['gender']);
	
	foreach($lines as $line){
		$name = array();
		$value = array();
		$set = array();
		foreach($_POST as $k => $v){
			if($v){
				$val = addslashes($line[$v-1]);
				array_push($value,"'$val'");
				array_push($name,$k);
				if($fields[$k]->Key!='UNI'){
					array_push($set,"{$k}='{$val}'");
				}
			}
		}
		if($gender!='no'){
			array_push($name,'gender');
			if($line[$gender] == '女'){
				array_push($value,"'0'");
			}elseif($line[$gender] == '男'){
				array_push($value,"'1'");
			}else{
				array_push($value,"'2'");
			}
		}
		
		$name = implode(",", $name);
		$value = implode(",", $value);
		$sql = "insert into {$table_name} ({$name}) values ({$value})";
		if(!empty($set)){
			$set = implode(",", $set);
			$sql .= " ON DUPLICATE KEY update {$set}";
		}
		array_push($sql_array,$sql);
	}
	
	foreach($sql_array as $sql){
		echo $sql;
		/*
		if($db->execute($sql)){
			$success++;
		}else{
			$fail++;
			array_push($fail_info,$value);
		}
		*/
	}
	close_db();

	
	$count = count($lines);
	echo "共处理XLS数据{$count}条<br/>";
	echo "成功{$success}条<br/>";
	echo "失败{$fail}条<br/>";
	for($i=0;$i<$fail;$i++){
		echo $fail_info[$i].'<br/>';
	}
?>
<a href="list.php">返回</a>