<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$page_type= 'admin';
	include "../../" .$_GET['page'] .".php";
?>
<script>
parent.$("#admin_iframe").attr("height","2500px");
</script>