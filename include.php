<div class="right_box">
	<div class="normal_title"><div>城市</div><a target="_blank" href="/city/">[...更多]</a></div>
	<?php $pos_name = "index_city0"; ?>
	<div class="city" <?php show_page_pos($pos_name,'base');?>>
		<?php show_page_href();?>
	</div>
	<div class="city_desc">
		<?php show_page_desc();?>
	</div>
	<div class="h_h"></div>
	<?php for($i=1;$i<3;$i++){$pos_name = "index_city{$i}";?>
	<div class="guide_hr_val2 " <?php show_page_pos($pos_name,'link');?>><?php show_page_href();?></div>
	<?php }?>
	
	<?php for($i = 3 ; $i < 5 ; $i++){$pos_name = "index_city{$i}";?>
	<div class="pp_4_banner" <?php if($i == 4)echo 'style="margin-left:30px;"'; show_page_pos($pos_name,'link_img');?>>
		<div class="pp_4_pg">
			<?php show_page_img();?>
		</div>
		<div class="pp_4_value">
			<?php show_page_href();?>
		</div>
	</div>
	<?php }?>
</div>
<div class="right_box">
	<div class="normal_title"><div>在线调查</div><a target="_blank" href="/survey/">[...更多]</a></div>
	<?php $pos_name = "index_survey_0"?>
	<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
	<?php $pos_name = "index_survey_1"?>
	<div class="survey" <?php show_page_pos($pos_name,'survey_title')?>><?php show_page_href();?></div>
</div>