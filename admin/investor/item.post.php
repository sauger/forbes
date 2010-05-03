<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
	if($_POST['params']!=''){
		$item = new table_class('fb_invest_items');
		$ids = array();
		$values = explode(',',$_POST['params']);
		foreach($values as $v){
			$params = explode('|', $v);
			$item->find($params[0]);
			$item->investor_id = $_POST['id'];
			$item->invest_company = $params[1];
			$item->invest_type = $params[2];
			$item->invest_industry_id = $params[3];
			$item->invest_money = $params[4];
			$item->save();
			array_push($ids, $item->id);
		}
		echo implode(',',$ids);
	}
?>