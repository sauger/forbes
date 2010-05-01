<?php
session_start();
if($_POST['rvcode'] != $_SESSION['sub_pic']){
	echo '0';
}else{
	echo '1';
}
?>