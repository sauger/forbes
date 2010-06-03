<?php
	include_once dirname(__FILE__) ."/../../frame.php"; 
	css_include_tag('index');
	use_jquery();
	js_include_tag('jquery.colorbox-min');
	init_page_items();
	$type = $_GET['type'];
	$num = 5;
?>
<style type="text/css">
div{font-size:15px; text-align:center;}
.top{border-bottom:2px solid #ADD8E6; margin-top:30px;}
.bleft{border-bottom:2px solid #ADD8E6; border-right:2px solid #ADD8E6}
.bright{border-bottom:2px solid #ADD8E6;}
</style>
<?php
	if($type == 'headline'){
?>
<div class="top" style="width:680px;">头条内容</div>
<div class="top" style="width:150px;">优先级（1-5不重复）</div>
<?php for($i=0;$i<5;$i++){?>
<div id=headline class="bleft">
	<?php $pos_name='index_hl_'.$i;?>
	<div class=headline_pic id="headline_pic_<?php echo $i;?>" style="display:none;"><?php show_page_img(300,200,0)?></div>
	<div id=headline_content>
		<div class=headline_title><?php show_page_href();?></div>
		<div class=headline_description><?php echo $pos_items->$pos_name->description;?></div>
		<div class="headline_related">
		<?php				
			for($j=0;$j<2;$j++)
			{$pos_name = "index_hl".$i."_r".$j;
		?>
		<div class=list><?php show_page_href();?></div>
		<?php
			}
		?>				
		</div>
	</div>
</div>
<div class='bright' style="width:150px; height:200px;"><input type="text" name="index_hl_<?php echo $i;?>" style="width:100px;" value="<?php echo $i+1;?>"></div>
<? }?>
<input type="button" id="save" value="保存" style="width:400px; margin-left:265px;">
<?php }elseif($type=='forbes_trt'){$num=4?>
<div class="top" style="width:90px;">标题</div><div class="top" style="width:290px;">内容</div><div class="top" style="width:70px;">优先级</div><div class="top" style="width:90px;">标题</div><div class="top" style="width:300px;">内容</div><div class="top" style="width:70px;">优先级</div>
	<?php for($i=1;$i<5;$i++){
		$pos_name = "index_right_list{$i}";
	?>
	<div>
	<div class="bleft" style="width:90px; height:270px;"><?php echo $pos_items->$pos_name->display;?></div>
	<div class="bleft" style="width:290px; height:270px;">
		<img border="0" width="290" height="270" title="<?php echo $pos_items->$pos_name->title;?>" src="<?php echo $pos_items->$pos_name->image1?>" />
	</div>
	<div class="<?php if($i==1||$i==3)echo 'bleft';else echo 'bright';?>" style="width:70px; height:270px;"><input type="text" name="<?php echo $pos_name?>" style="width:50px;" value="<?php echo $i;?>"></div>
	</div>
	<?php }?>
	<input type="button" id="save" value="保存" style="width:400px; margin-left:265px;">
<?php }?>
<script>
	$(function(){
		$("#save").click(function(){
			$.post('priority.post.php',$(":text").serializeArray(),function(data){
				if(data=='wrong'){
					alert('请输入1-<?php echo $num;?>的不重复的优先级')
				}else{
					parent.$.fn.colorbox.close();
					parent.frames['admin_iframe'].location.reload();
				}
			});
		});
	});
</script>