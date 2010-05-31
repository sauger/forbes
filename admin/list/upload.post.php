<?php
    include_once('../../frame.php');
	$db = get_db();
	
	//选择插入数据的表
	$id = intval($_POST['list_id']);
	unset($_POST['list_id']);
	$table = $db->query("select * from fb_custom_list_type where id=$id");
	if($db->record_count==1){
		$table_name = $table[0]->table_name;
	}else{
		alert("error id");
		die();
	}
	$list = new table_class($table_name);
	$fields = $list->fields;
	
	//处理上传CSV文件
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/xls/";
	$xls = $upload->handle('xls');
	$file = ROOT_DIR.'upload/xls/'.$xls;
	$lines = read_csv($file);
	unlink($file);
	unset($lines[0]);
	
	//初始化信息
	$success = 0;
	$fail = 0;
	$fail_info = array();
	$fail_id = 0;
	$fail_id_info = array();
	$sql_array = array();
	$db = get_db();
	
	//富豪名人榜处理
	if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
		if($table_name=='fb_rich_list_items'){//富豪
			$list_name = "fb_rich";
			$id_name = "rich_id";
		}else{//名人
			$list_name = "fb_mr";
			$id_name = "famous_id";
		}
		foreach($lines as $line){
			var_dump($line);
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
			//加入榜单ID
			array_push($value,$id);
			array_push($name,'list_id');
			//加入人物关联
			$pos_name = $line[$_POST['name']-1];
			$pos_id = $db->query("select id from $list_name where name='$pos_name'");
			if($db->record_count==1){
				array_push($value,$pos_id[0]->id);
				array_push($name,$id_name);
				$value = implode(",",$value);
			}else{
				$value = implode(",",$value);
				array_push($fail_id_info,$value);
				$fail_id++;
			}
			$name = implode(",",$name);
			$sql = "insert into {$table_name} ({$name}) values ({$value})";
			if(!empty($set)){
				$set = implode(",", $set);
				$sql .= " ON DUPLICATE KEY update {$set}";
			}
			array_push($sql_array,$sql);
		}
	}else{//常规榜单处理
		foreach($lines as $line){
			$name = array();
			$value = array();
			$set = array();
			foreach($_POST as $k => $v){
				if($v){
					$val = trim(addslashes($line[$v-1]));
					array_push($value,"'$val'");
					array_push($name,$k);
					if($fields[$k]->Key!='UNI'){
						array_push($set,"{$k}='{$val}'");
					}
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
	}

	
	//执行SQL语句
	foreach($sql_array as $sql){
		if($db->execute($sql)){
			$success++;
		}else{
			$fail++;
			array_push($fail_info,$value);
		}
	}
	close_db();
	
	//错误提示
	$count = count($lines);
	echo "共处理XLS数据{$count}条<br/>";
	echo "成功{$success}条<br/>";
	echo "失败{$fail}条<br/>";
	for($i=0;$i<$fail;$i++){
		echo $fail_info[$i].'<br/>';
	}
	if($table_name=='fb_rich_list_items'||$table_name=='fb_famous_list_items'){
		if($fail_id>0){
			echo "有{$fail_id}条数据未找到姓名对应ID<br/>";
			for($i=0;$i<$fail_id;$i++){
				echo $fail_id_info[$i].'<br/>';
			}
		}
	}
?>
<a href="index.php">返回</a>