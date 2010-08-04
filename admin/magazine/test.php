<?php
	include "../../frame.php";
	$db = get_db();
	$items = $db->query("select sid,Earning from `forbes`.`fb_subscription` where stime > '2010-05-10' and Earning is not null");
	foreach($items as $item)
	{
		$selected = $item->Earning;
		$selected = $selected{0};
		$sql = "";
		switch ($selected)
		{
			case "1":
			
				$sql = "update fb_subscription set turnover='1.500万以下' where sid={$item->sid}";
			break;
			case "2":
				$sql = "update fb_subscription set turnover='2.501万--1000万' where sid={$item->sid}";
			break;
			case "3":
				$sql = "update fb_subscription set turnover='3.1001万--5000万' where sid={$item->sid}";
			break;
			case "4":
				$sql = "update fb_subscription set turnover='4.5001万--1亿' where sid={$item->sid}";
			break;
			case "5":
				$sql = "update fb_subscription set turnover='5.1亿零1万--50亿' where sid={$item->sid}";
			break;
		}
		if($sql){
			$db->execute($sql);
		}
	}
	
?>