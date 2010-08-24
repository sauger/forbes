<?php

include_once( dirname(__FILE__) .'/frame.php');
$db = get_db();
$news = $db->query("select t1.title,t2.nick_name,t1.author from fb_news t1 join fb_user t2 on t1.publisher=t2.id where t1.created_at>'2010-8-1 00:00:00' and t1.created_at<'2010-8-23 23:59:59'");
?>
<table style="width:900px; float:left; display:inline">
<tr>
<td width="60%">标题</td><td width="20%">作者</td><td width="20%">上传者</td>
</tr>
<?php foreach($news as $news){?>
<tr>
<td><?php echo $news->title;?></td><td><?php echo $news->author;?></td><td><?php echo $news->nick_name;?></td>
</tr>
<?php }?>
</table>