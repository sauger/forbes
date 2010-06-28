<?php
session_start();
if($_POST['rvcode'] != $_SESSION['register_pic']||empty($_SESSION['register_pic'])){
	echo '0';
}else{
	echo '1';
}
?>