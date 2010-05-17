<?php
include "../../frame.php";
$str .= file_get_contents("http://localhost:8081/admin/edm/edm.php?page_type=static");


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=edm_".date('Ymd').".html"); 
echo $str;
