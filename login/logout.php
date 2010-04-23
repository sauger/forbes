<?php
	unset($_SESSION['user_id']);
	unset($_SESSION['name']);
	setcookie("login_name",'',0,'/');
?>