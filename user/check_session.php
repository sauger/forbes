<?php
	session_start();
    if($_SESSION['user_info']==$_POST['verify']){
    	echo 'success';
    }else{
    	echo 'fail';
    }
?>