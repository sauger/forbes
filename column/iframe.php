<?php
	include_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php css_include_tag('column');
		use_jquery();
	?>
</head>
<body>
<?php
$db=get_db();
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$date=$_REQUEST['date'];
if($date!="")
{
	$sql=' and concat(left(created_at,7))="'.$date.'"';
}
else
{
	$sql='';
}
if($type=="news"){
	$news=$db->paginate('select a.*,b.name from fb_news a left join fb_user b on a.publisher = b.id where publisher='.$id.$sql.' order by priority asc, created_at desc',4);
	echo count($news);
	for($i=0;$i<count($news);$i++){ ?>
<div class=r_content>
	<div class=r_title>
		<div class=wz>·<a target="_blank" href="<?php echo column_article_url($news[$i]->name,$news[$i])?>"><?php echo get_fck_content($news[$i]->title);?></a></div>
		<div class=subtime>发表于：<?php echo substr($news[$i]->created_at,0,10); ?></div>	
	</div>
	<?php $comment=$db->query('select count(*) as num from fb_comment where resource_id='.$news[$i]->id);?>
	<div class=r_read>阅读数 （<?php echo $news[$i]->click_count;?>）    评论 （<?php echo $comment[0]->num;?>）</div>
	<div class=r_context>
		<a target="_blank" target="_top" href="<?php echo column_article_url($news[$i]->name,$news[$i])?>"><?php echo mb_substr(get_fck_content($news[$i]->content),0,300,'utf8'); ?></a>	
	</div>
	<div class=r_dash></div>
</div>
<?php } ?>
<div class=page><?php paginate();?></div>
<?php }else if($type=="pic"){ ?>
<div class=r_content>
<?php $images=$db->paginate('select * from fb_images where publisher='.$id.$sql.' order by priority asc,created_at desc',18);
	for($i=0;$i<count($images);$i++){
		if($i % 4 ==0) echo "<div class=r_dash></div>";
		$img_src = $images[$i]->src2 ? $images[$i]->src2 : $images[$i]->src;
?>
	<div class=column_image >
		<a target="_top" class=color param="<?php echo $images[$i]->id; ?>" href="#"><img border=0 src="<?php echo $img_src; ?>" /></a>
	</div>
<?php } ?>
<script>
	$('.color').click(function(e){
		e.preventDefault();
		$this = $(this);
		parent.$.fn.colorbox({
			href:function(){
				return 'column_img.php?id='+$this.attr('param');
			}
		});
	});
</script>
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

