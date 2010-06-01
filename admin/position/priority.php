<?php
	include_once dirname(__FILE__) ."/../../frame.php"; 
	css_include_tag('index');
	init_page_items();
?>
<div style="width:680px; font-size:15px; text-align:center; border-bottom:1px solid #ADD8E6">头条内容</div><div style="width:100px;font-size:15px; text-align:center; border-bottom:1px solid #ADD8E6">优先级</div>
<?php for($i=0;$i<5;$i++){?>
<div id=headline style="border-bottom:1px solid #ADD8E6; border-right:1px solid #ADD8E6">
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
<div style="width:100px; height:200px; border-bottom:1px solid #ADD8E6;"><input type="text" name="priority[]" style="width:100px;" value="<?php echo $i+1;?>"></div>
<? }?>
<input type="button" id="save" value="保存" style="width:200px;">