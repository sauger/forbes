<div class="keysword_banner">
	<div id="topkeyword">
		<?php for($i=1;$i<3;$i++){ $pos_name = 'index_ad_'.$i;?>
		<div class="top_kdiv" <?php show_page_pos($pos_name,'link');?>>
		<?php show_page_href();?>
		</div>
		<?php }?>
	</div>
	<div id="bottomkeyword">
		<?php for($i=3;$i<19;$i++){$pos_name = 'index_ad_'.$i;?>
		<div  class="bottom_kdiv" <?php show_page_pos($pos_name,'link')?>>
		<?php show_page_href();?>
		</div>
		<?php }?>
	</div>
</div>