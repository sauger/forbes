<div id="qie_img">
	<?php for($i=0;$i<5;$i++){
		$pos_name = 'index_hl_'.$i;
	?>
	<div class="top_img" <?if($i!=0){?>style="display:none;"<?php }?>>
		<?php show_page_img();?>
	</div>
	<div class="top_box" <?if($i!=0){?>style="display:none;"<?php }?>>
		<div class="top_title" <?php show_page_pos($pos_name,'base_img_withoutime')?>><?php show_page_href();?></div>
		<div class="top_desc"><?php show_page_desc();?></div>
		<?php for($j=0;$j<2;$j++){$pos_name = "index_hl".$j."_r".$i;?>
		<div class="top_news" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
		<?php }?>
	</div>
	<?php }?>
	<div id="top_num">
		<div class="select_top_num">1</div>
		<div class="normal_top_num">2</div>
		<div class="normal_top_num">3</div>
		<div class="normal_top_num">4</div>
		<div class="normal_top_num">5</div>
	</div>
</div>