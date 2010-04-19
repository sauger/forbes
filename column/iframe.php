<?php
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<? css_include_tag('column');
		use_jquery();
	?>
</head>
<body>
<?php
$db=get_db();
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
if($type="news"){
	$news=$db->paginate('select * from fb_news where author_id='.$id.' and author_type=1 and is_adopt=1 order by priority asc, created_at desc',4);
	for($i=0;$i<count($news);$i++){ ?>
<div class=r_content>
	<div class=r_title>
		<div class=wz>·<?php echo $news[$i]->title;?>></div>
		<div class=subtime>发表于：<?php echo substr($news[$i]->created_at,0,10); ?></div>	
	</div>
	<?php $comment=$db->query('select count(*) as num from fb_comment where resource_id='.$news[$i]->id);?>
	<div class=r_read>阅读数 （<?php echo $news[$i]->click_count;?>）    评论 （<?php echo $comment[0]->num;?>）</div>
	<div class=r_context>
		<a href="/news/news.php?id=<?php echo $news[$i]->id;?>>"><?php echo $news[$i]->description; ?>></a>	
	</div>
	<div class=r_dash></div>
</div>
<div class=page><?php paginate();?></div>
<?php }}else if($type="pic"){ 
	$images=$db->paginate('select * from fb_images where publisher='.$id.' and is_adopt=1 order by priority asc,created_at desc',3);
?>
<div class=r_content>
	<div class=column_img>
		<a class=color href=""><img border=0 src="<?php echo $imgaes[$i]->src2; ?>"></a>
	</div>
</div>
<div class=page><?php paginate();?></div>
<?php }else{
	$content=$db->query('select description from fb_user where id='.$id);
?>
<div class=r_content>
	<div class=column_content>
		<?php echo get_fck_content($content[0]->description); ?>
	</div>
</div>
<?php } ?>

<script>
 $(".color").colorbox({
	href:'column_img.php?src='.<?php echo $image[$i]->src; ?>
});
</script>