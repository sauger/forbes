<?php
    include_once('../../frame.php');
    
	$table_name = 'fb_company';
	$list = new table_class(fb_company);
	$fields = $list->fields;
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	$lines = read_csv($file);
	unlink($file);
	unset($lines[0]);
	
	$success = 0;
	$fail = 0;
	$fail_info = array();
	$sql_array = array();
	$db = get_db();
	
	if($_POST['stock_code']!=''){
		$code = $_POST['stock_code']-1;
	}else{
		$code = 'no';
	}
	unset($_POST['stock_code']);
	
	function conver_place($code){
		switch ($code){
			case '上海':
				return 'SS'; 
				break;
			case '深圳':
				return 'SZ'; 
				break;
			case '香港':
				return 'HK'; 
				break;
			case '新加坡':
				return 'SI'; 
				break;
			case '韩国':
				return 'KS'; 
				break;
			case '法国':
				return 'PA'; 
				break;
			case '英国':
				return 'L'; 
				break;
			case '德国':
				return 'DE'; 
				break;
			case '日本':
				return 'JP'; 
				break;
			default :
				return '';
		}
	}
	
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
		if($code!='no'){
			array_push($name,'stock_code');
			$stock_code = conver_place($line[$code]);
			array_push($value,"'$stock_code'");
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
		if($db->execute($sql)){
			$success++;
		}else{
			$fail++;
			array_push($fail_info,$value);
		}
	}
	close_db();
	
	$count = $success + $fail;
	echo "共处理XLS数据{$count}条<br/>";
	echo "成功{$success}条<br/>";
	echo "失败{$fail}条<br/>";
	for($i=0;$i<$fail;$i++){
		echo $fail_info[$i].'<br/>';
	}
?>
<a href="list.php">返回</a>
