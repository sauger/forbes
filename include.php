<div id="content_banner_right">
	<div id="content_qie_left">陆家嘴早餐<img style="display:none;" src="/images/index_two/x.jpg"/></div>
	<div id="content_qie_right">精华导读<img src="/images/index_two/x.jpg"/></div>
	
	<div class="guide" id="ljzzc" style="display:none">
		<?php $pos_name = 'index_jjjl_0';?>
		<div class="guide_title">基金经理看市</div>
		<div class="guide_hr"></div>
		<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"/></a>
		<div class="gg_banner" <?php show_page_pos($pos_name,'base_img')?>>
			<div class="g_pg"><?php show_page_img();?></div>
			<div class="g_pg_title"><?php show_page_href();?></div>
			<div class="g_pg_value"><?php show_page_desc();?></div>
		</div>
		<div class="gg_title">早餐资讯</div>
		<div class="guide_hr" style="width:150px; margin-top:5px;"></div>
		<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:0px;"/></a>
		<?php for($i=1;$i<3;$i++){$pos_name = "index_zczx_".$i;?>
		<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
		<?php }?>
		<div class="gg_title" style="margin-top:10px;">投票之选</div>
		<div class="guide_hr" style="width:150px; margin-top:15px;"></div>
		<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
		<?php for($i=1;$i<3;$i++){$pos_name = "index_tpzx_".$i;?>
		<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
		<?php }?>
		<div class="gg_title" style="margin-top:10px;">环球一周前瞻</div>
		<div class="guide_hr" style="width:120px; margin-top:15px;"></div>
		<a href="#"><img class="guide_more" src="/images/index_two/g4.jpg"  style="margin-top:10px;"/></a>
		<?php for($i=1;$i<3;$i++){$pos_name = "index_hqyz_".$i;?>
		<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
		<?php }?>
	</div>
	<div class="guide" id="jhdd">
		<?php $pos_name = 'index_jhdd_0';?>
		<div class="gg_banner" style="height:90px;" <?php show_page_pos($pos_name,'base_img')?>>
			<div class="g_pg"><?php show_page_img();?></div>
			<div class="g_pg_title"><?php show_page_href();?></div>
			<div class="g_pg_value"><?php show_page_desc();?></div>
		</div>
		<?php for($i=1;$i<4;$i++){$pos_name = "index_jhdd_".$i;?>
		<div class="guide_hr_val" <?php show_page_pos($pos_name,'link_withouttime')?>><?php show_page_href();?></div>
		<?php }?>
		<div class="guide_hr" style="width:240px; margin-top:15px;"></div>
		<?php $pos_name = 'index_jhdd_4';?>
		<div class="gg_banner" style="height:90px;" <?php show_page_pos($pos_name,'base_img')?>>
			<div class="g_pg"><?php show_page_img();?></div>
			<div class="g_pg_title"><?php show_page_href();?></div>
			<div class="g_pg_value"><?php show_page_desc();?></div>
		</div>
		<?php for($i=5;$i<8;$i++){$pos_name = "index_jhdd_".$i;?>
		<div class="guide_hr_val" <?php show_page_pos($pos_name,'link')?>><?php show_page_href();?></div>
		<?php }?>
	</div>
</div>