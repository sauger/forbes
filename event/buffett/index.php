<?php 
	include_once( dirname(__FILE__) .'/../../frame.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>与沃伦巴菲特面对面</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<?php use_jquery();?>
</head>
<body>
	<div id="container"><!-- container begin -->
		<div id="container-inner"><!-- container-inner begin -->
			<div id="body"><!-- body begin -->					
				<div id="body-inner"><!-- body-inner begin -->
					<div id="content"><!-- content begin -->
						<div id="content-inner" class="clear"><!-- content-inner begin -->
							<div class="c-main">
								<div class="flash-box">
									<div id="big_img">
									<?php 
										$db = get_db();
										$images = $db->query("select title,src,src2 from fb_images where category_id=155 and is_adopt=1 order by created_at desc");
										!$images&&$images=array();
										foreach($images as $k => $img){
									?>
									<div class="big_img_box">
									<img src="<?php echo $img->src;?>" />
									<div <?php if($k!=0)echo "style='display:none';"?> class="img_title"><?php echo $img->title;?></div>
									</div>
									<?php }?>
									</div>
									<img id="prev" src="image/f_1.gif" />
									<div id="small_img">
									<?php 
									foreach($images as $img){
									?>
									<img src="<?php echo $img->src2;?>" />
									<?php }?>
									</div>
									<img id="next" src="image/f_3.gif" />
								</div>
								<div class="text-box">
									<?php 
										$news = $db->query("select title,id,created_at,description from fb_news where category_id=153 and is_adopt=0 order by created_at desc");
										!$news && $news = array();
										foreach($news as $k => $news){
											if($k==0){
									?>
									<h5 class="headline">
										<p><a href="<?php echo static_news_url($news);?>"><span>[<?php echo substr($news->created_at,0,10);?>]</span><?php echo $news->title;?><br><?php mb_string($news->description,40);?></a></p>
									</h5>
									<?php }else{?>
									<p><a href="<?php echo static_news_url($news);?>"><span>[<?php echo substr($news->created_at,0,10);?>]</span><?php echo $news->title;?></a></p>
									<?php }}?>
								</div>
								<div class="picture-main">
									<p style="margin:25px 0 10px 0"><img src="image/picture.gif" /></p>
									<div class="picture-c">
										<a class="left" id="prev2" style="margin:65px 0 0 5px;"><img src="image/picture-left.gif" /></a>
										<ul>
											<?php 
												$images = $db->query("select title,src from fb_images where category_id=156 and is_adopt=1 order by created_at desc");
												!$images && $images = array();
												foreach($images as $img){
											?>										
											<li><img src="<?php echo $img->src;?>" /><?php echo $img->title;?></li>
											<?php }?>
										</ul>
										<a a class="left" id="next2" style="margin:65px 0 0 0;"><img src="image/picture-right.gif" /></a>
									</div>
								</div>
							</div>
						</div><!-- content-inner end -->
					</div><!-- content end -->		
				</div><!-- body-inner end -->		
			</div><!-- body end -->		
		</div>					
	</div>
</body>
</html>
<script>
$(function(){
	$("#next").click(function(){
		next(1);
	});
	$("#prev").click(function(){
		prev(1);
	});
	$("#small_img img").click(function(){
		next($("#small_img img").index($(this)));
	});
	$("#prev2").click(function(){
		$("ul li").last().prependTo("ul");
	});
	$("#next2").click(function(){
		$("ul li").first().appendTo("ul");
	});
});

function next(num){
	for(var i=0;i<num;i++){
	$("#small_img img").first().appendTo("#small_img");
	$("#big_img").find(".big_img_box").first().appendTo("#big_img");
	$(".img_title").hide();
	$(".big_img_box").first().find(".img_title").show();
	}
}
function prev(num){
	for(var i=0;i<num;i++){
	$("#small_img img").last().prependTo("#small_img");
	$("#big_img").find(".big_img_box").last().prependTo("#big_img");
	$(".img_title").hide();
	$(".big_img_box").first().find(".img_title").show();
	}
}
</script>

