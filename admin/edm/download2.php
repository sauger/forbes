<?php
include "../../frame.php";
$str .= file_get_contents("http://localhost/admin/edm/marrow.php?page_type=static");


Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=marrow_".date('Ymd').".html"); 
echo $str;
