<?php
		if(!function_exists("get_config"))
			include_once(dirname(__FILE__).'/../frame.php');
		init_page_items();
		$db=get_db();
	$category = new category_class('news');
?>	
<div id="bottom_banner">
	<div id="bottom_top"></div>
	<div id="bottom_center">
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/list/">榜单</a>]</div>
			<div class="sub_cate"><a href="">富豪榜</a></div>
			<div class="sub_cate"><a href="">城市榜</a></div>
			<div class="sub_cate"><a href="">公司榜</a></div>
			<div class="sub_cate"><a href="">体育榜</a></div>
			<div class="sub_cate"><a href="">人物</a></div>
			<div class="sub_cate"><a href="">教育榜</a></div>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/billionaires/">富豪</a>]</div>
			<?php
				$c_ids = $category->children_map(42,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/investment/">投资</a>]</div>
			<?php 
				$c_ids = $category->children_map(5,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/entrepreneur/">创业</a>]</div>
			<?php 
				$c_ids = $category->children_map(2,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/tech/">科技</a>]</div>
			<?php 
				$c_ids = $category->children_map(4,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
			<div style="float:left; display:none">clear_float</div>
			<div class="top_bottom"></div>
			<div class="bottom_bottom"></div>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/city/">城市</a>]</div>
			<?php 
				$c_ids = $category->children_map(16,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
			<div style="float:left; display:none">clear_float</div>
			<div class="top_bottom"></div>
			<div class="bottom_bottom"></div>
	</div>
	<div class="bottom_value">
			<div class="main_cate">[<a target="_blank" href="/life/">生活</a>]</div>
			<?php 
				$c_ids = $category->children_map(81,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
			<div style="float:left; display:none">clear_float</div>
			<div class="top_bottom"></div>
			<div class="bottom_bottom"></div>
	</div>
	<div class="bottom_value" style="border-right:0px;">
			<div class="main_cate">[<a target="_blank" href="/business/">商业</a>]</div>
			<?php 
				$c_ids = $category->children_map(3,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $k => $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
			<div style="float:left; display:none">clear_float</div>
			<div class="top_bottom"></div>
			<div class="bottom_bottom"></div>
	</div>
	</div>
</div>
<div id="bottom">
<?php for($i=0;$i<10;$i++){ ?><a <?php show_page_pos('forbes_td5_'.$i); $posname='forbes_td5_'.$i;?> href="<?php echo $pos_items->$posname->href; ?>">　<?php echo $pos_items->$posname->display; ?><?php if($i<9){ ?>　-<?php }} ?></a>
</div>
<div id="bottom_word">
	<div>本站翻译支持由东西网提供<a href="http://www.dongxi.net">http://www.dongxi.net</a></div>
	Copyright @ 2010 Forbes.com Inc 福布斯公司 版权所有<br>
	沪ICP备09033453号
</div>
<?php js_include_tag('get_ad')?>