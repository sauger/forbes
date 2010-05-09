<?php include_once(dirname(__FILE__).'/../frame.php');?>
<div class=right_title>
	<div class=title_con>专栏文章分类</div>
</div>
<?php 
	$category = $db->query("select  group_concat(category_id separator ',') as ids from fb_news where author_type=2");
	$cid = explode(',',$category[0]->ids);
	$cid = array_unique($cid);
	$cid = implode(',',$cid);
	if($cid){
		$category = $db->query("select id,name from fb_category where id in($cid)");
		$count = count($category);
	}
?>
<div class="right_box">
	<?php 
		global $static_site;
		for($i=0;$i<$count;$i++){
	?>
	<div class="right_span"><a href="<?php echo "{$static_site}/column/category/".$category[$i]->id;?>"><?php echo $category[$i]->name;?></a></div>
	<?php }?>
</div>
<div class=bottom_line></div>