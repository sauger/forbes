<?php
include "../../frame.php";
$str = file_get_contents("http://localhost/admin/edm/edm.php?page_type=static");
send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com','411192132@163.com','福布斯中文网(Forbeschina.com)注册确认邮件',$str);
die();
Header("Content-type: application/octet-stream"); 

Header("Accept-Ranges: bytes"); 

Header("Accept-Length: ".strlen($str)); 

Header("Content-Disposition: attachment; filename=email.html"); 
echo $str;
