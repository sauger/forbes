<div id="bottom_banner">
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[榜单]</li>
					<li><img src="/images/index_two/dian.gif"/><a href="">富豪榜</a></li>
					<li><img src="/images/index_two/dian.gif"/><a href="">城市榜</a></li>
					<li><img src="/images/index_two/dian.gif"/><a href="">公司榜</a></li>
					<li><img src="/images/index_two/dian.gif"/><a href="">体育榜</a></li>
					<li><img src="/images/index_two/dian.gif"/><a href="">人物</a></li>
					<li><img src="/images/index_two/dian.gif"/><a href="">教育榜</a></li>
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[富豪]</li>
					<?php 
						$c_ids = $category->children_map(42,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[投资]</li>
					<?php 
						$c_ids = $category->children_map(5,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[创业]</li>
					<?php 
						$c_ids = $category->children_map(2,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[科技]</li>
					<?php 
						$c_ids = $category->children_map(4,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[城市]</li>
					<?php 
						$c_ids = $category->children_map(16,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>			
				</ul>
			</div>
			<div class="bottom_value">
				<ul>
					<li style="list-style-type: none;">[生活]</li>
					<?php 
						$c_ids = $category->children_map(81,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="bottom_value" id="bottom_value">
				<ul>
					<li style="list-style-type: none;">[商业]</li>
					<?php 
						$c_ids = $category->children_map(3,false);
						$c_id = implode(',',$c_ids);
						foreach($c_ids as $cid){
					?>
					<li><img src="/images/index_two/dian.gif"/><a href="/review/list/<?php echo $cid;?>"><?php echo $category->find_name_by_id($cid);?></a></li>
					<?php }?>
				</ul>
			</div>
		</div>