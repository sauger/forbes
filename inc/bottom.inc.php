<?php
		if(!function_exists("get_config"))
			include_once(dirname(__FILE__).'/../frame.php');
		init_page_items();
		$db=get_db();
?>		
		<div id=ibottom>
			<div id=b_top>
				<div class=b_box>
					<div <?php show_page_pos('lists_td1_0'); $posname='lists_td1_0';?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('lists_td1_'.$i); $posname='lists_td1_'.$i;?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php }?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('billinaires_td1_0'); $posname='billinaires_td1_0'; ?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('billinaires_td1_'.$i); $posname='billinaires_td1_'.$i;?>><a   href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('investment_td1_0'); $posname='investment_td1_0';?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('investment_td1_'.$i); $posname='investment_td1_'.$i;?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('business_td1_0'); $posname='business_td1_0'; ?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('business_td1_'.$i); $posname='business_td1_'.$i;?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('business_td2_0'); $posname='business_td2_0'; ?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('business_td2_'.$i); $posname='business_td2_'.$i;?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('enterpreneur_td1_0'); $posname='enterpreneur_td1_0'; ?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('enterpreneur_td1_'.$i); $posname='enterpreneur_td1_'.$i;?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('tech_td1_0'); $posname='tech_td1_0';?>><a href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('tech_td1_'.$i); $posname='tech_td1_'.$i;?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('life_td1_0'); $posname='life_td1_0';?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('life_td1_'.$i); $posname='life_td1_'.$i;?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('life_td2_0'); $posname='life_td2_0';?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('life_td2_'.$i); $posname='life_td2_'.$i;?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('column_td1_0'); $posname='column_td1_0';?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('column_td1_'.$i); $posname='column_td1_'.$i;?>><a   href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
				<div class=b_v></div>
				<div class=b_box>
					<div <?php show_page_pos('member_td1_0'); $posname='member_td1_0';?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php if($pos_items->$posname->display!=''){echo '['.$pos_items->$posname->display.']';} ?></a></div>
					<?php for($i=1;$i<7;$i++){ ?><div class=lists <?php show_page_pos('member_td1_'.$i); $posname='member_td1_'.$i;?>><a  href="<?php echo $pos_items->$posname->href; ?>"><?php echo $pos_items->$posname->display; ?></a></div><?php } ?>
				</div>
			</div>
			<div id=td5><?php for($i=0;$i<10;$i++){ ?><a <?php show_page_pos('forbes_td5_'.$i); $posname='forbes_td5_'.$i;?> href="<?php echo $pos_items->$posname->href; ?>">　<?php echo $pos_items->$posname->display; ?><?php if($i<9){ ?>　-<?php }} ?></a></div>
		</div>
		<div <?php show_page_pos('forbes_bottom_about'); $posname='forbes_bottom_about';?> class=ibabout><span><?php echo $pos_items->$posname->description; ?></span></div>
	<?php js_include_tag('get_ad')?>
<span style="display:none;">
<script src="http://s9.cnzz.com/stat.php?id=2154547&web_id=2154547" language="JavaScript"></script>
</span>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16303233-1");
pageTracker._trackPageview();
} 
catch(err) {}
</script>