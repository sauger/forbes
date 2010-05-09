<?php
    include_once('frame.php');
	
	$content = "1,你好：<br/><br/>　　欢迎进行福布斯中文网密码重置过程，请在2小时内点击下面的链接：<br/>　　<a href='http://www.forbeschina.com/getpwd/get_pwd.php?verify=123'>http://www.forbeschina.com/getpwd/get_pwd.php?verify=123</a><br><br>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。如果您意外地收到此邮件，很可能是其他用户在尝试重设密码时，误输入了您的电子邮件地址。如果您没有提出此请求，则无需做进一步的操作，可以放心地忽略此电子邮件。";
	#$content = "SDFS";
	send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com','411192132@163.com','福布斯中文网(Forbeschina.com)密码找回',$content);
?>