<?php
include "../../frame.php";
$str = file_get_contents("http://localhost/admin/edm/edm.php?page_type=static");
Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=email.html"); 
echo $str;
