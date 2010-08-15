<div id="bottom_banner">
	<div class="bottom_value">
			<div>[榜单]</div>
			<div class="sub_cate"><a href="">富豪榜</a></div>
			<div class="sub_cate"><a href="">城市榜</a></div>
			<div class="sub_cate"><a href="">公司榜</a></div>
			<div class="sub_cate"><a href="">体育榜</a></div>
			<div class="sub_cate"><a href="">人物</a></div>
			<div class="sub_cate"><a href="">教育榜</a></div>
	</div>
	<div class="bottom_value">
			<div>[富豪]</div>
			<?php 
				$c_ids = $category->children_map(42,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div>[投资]</div>
			<?php 
				$c_ids = $category->children_map(5,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div>[创业]</div>
			<?php 
				$c_ids = $category->children_map(2,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div>[科技]</div>
			<?php 
				$c_ids = $category->children_map(4,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
	</div>
	<div class="bottom_value">
			<div>[城市]</div>
			<?php 
				$c_ids = $category->children_map(16,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>			
	</div>
	<div class="bottom_value">
			<div>[生活]</div>
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
			<div>[商业]</div>
			<?php 
				$c_ids = $category->children_map(3,false);
				$c_id = implode(',',$c_ids);
				foreach($c_ids as $cid){
			?>
			<div class="sub_cate"><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></div>
			<?php }?>
			<div style="float:left; display:none">clear_float</div>
			<div class="top_bottom"></div>
			<div class="bottom_bottom"></div>
	</div>
</div>
<div id="bottom">
	<a href="">关于福布斯</a> - 
	<a href="">动态新闻</a> - 
	<a href="">广告服务</a> - 
	<a href="">诚聘英才</a> - 
	<a href="">友情链接</a> - 
	<a href="">会员活动</a> - 
	<a href="">隐私声明</a> - 
	<a href="">网站声明</a>
</div>
<?php js_include_tag('get_ad')?>