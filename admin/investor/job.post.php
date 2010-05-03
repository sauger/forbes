<?php
    session_start();
	include_once('../../frame.php');
	judge_role();
	if($_POST['params']!=''){
		$job = new table_class('fb_investor_job_history');
		$ids = array();
		$values = explode(',',$_POST['params']);
		foreach($values as $v){
			$params = explode('|', $v);
			$job->find($params[0]);
			$job->investor_id = $_POST['id'];
			$job->post = $params[1];
			$job->duration = $params[2];
			$job->company_name = $params[3];
			$job->save();
			array_push($ids, $job->id);
		}
		echo implode(',',$ids);
	}
?>