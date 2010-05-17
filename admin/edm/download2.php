<?php
include "../../frame.php";
$str .= file_get_contents("http://localhost:8081/admin/edm/marrow.php?type=111111");


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=email.html"); 
echo $str;
