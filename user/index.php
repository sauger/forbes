<?php 
	include_once('../frame.php');
	require_login();
	$db = get_db();
	$uid = front_user_id();
	$type = $_REQUEST['type'];
	if(empty($type))$type='news';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>用户中心_福布斯中文网</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('user/user','public','user/favorites','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include_top();?>
		<div id=bread><a>用户中心</a> > <a>我的收藏</a></div>
	 	 <div id=bread_line></div>
		<div id=left>
			<div id=left_top>
				用户中心导航
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/user/c3a.gif">
					<img style="display:inline" src="/images/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"  style="display:inline"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c2a.gif">
					<img style="display:none" src="/images/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c1a.gif">
					<img style="display:none" src="/images/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人信息</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/user/c4a.gif">
					<img style="display:none" src="/images/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改密码</a></div>
				<div class="icon2"><img src="/images/user/coin.gif"></div>
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<span style="float:left;display:inline">我的收藏</span>
				<?php $log = $db->query("select * from fb_yh_log where yh_id=$uid order by id desc limit 2");?>
				<span class="r_t_right">亲爱的<?php echo $_SESSION['name'];?>：您上次登录的时间是 <?php if($db->record_count==2) echo $log[1]->time;else echo $log[0]->time;?></span>
			</div>
			<div class="right_text2">
				<div class=right_title2>
					<div name="news" <?php  if($type=="news"){?>style="background:url(/images/user/right_title.jpg); color:#055C99;"<?php }?> class=right_title4>
						专栏文章
					</div>
					<div name="rich" <?php if($type=="rich"){?>style="background:url(/images/user/right_title.jpg); color:#055C99;"<?php }?> class=right_title4>
						收藏的富豪
					</div>
					<div name="famous" <?php if($type=="famous"){?>style="background:url(/images/user/right_title.jpg); color:#055C99;"<?php }?> class=right_title4>
						收藏的名人
					</div>
					<div name="column" <?php if($type=="column"){?>style="background:url(/images/user/right_title.jpg); color:#055C99;"<?php }?> class=right_title4>
						收藏的专栏
					</div>
				</div>
				<div class=right_text id="news" <?php if($type=="news")echo 'style="display:inline;"';?>>
					<div class="right_box">
					<?php
						$sql = "select t1.title,t1.id,t1.created_at from fb_news t1 join fb_collection t2 on t1.id=t2.resource_id where t2.resource_type='fb_news' and t2.user_id=$uid order by t2.created_at";
						$news = $db->paginate($sql,7,'news_page');
						$news_count = count($news);
						for($i=0;$i<$news_count;$i++){
					?>
					<div class=li1><a target="_blank" title="<?php echo strip_tags($news[$i]->title);?>" href="<?php echo static_news_url($news[$i]);?>"><?php echo $news[$i]->title;?></a></div><div class=li2> 收藏于：<?php echo substr($news[$i]->created_at, 0, 10);?></div>
					<?php
						}
					?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=news",null,'news_page');?></div>
				</div>
				<div class=right_text id="rich" <?php if($type=="rich")echo 'style="display:inline;"';?>>
					<div class="right_box">
					<?php
						$rich_ids = $db->query("select group_concat(resource_id) as ids from fb_collection where user_id=$uid and resource_type='rich' group by user_id");
						$ids = $rich_ids[0]->ids;
						if($ids!=''){
							$sql = "SELECT r1.id,i2.name as iname,c2.name as cname,i2.id as iid,c2.id as cid FROM fb_rich r1  left join fb_rich_company c1 on r1.id=c1.rich_id left join fb_company c2 on c1.company_id=c2.id left join fb_company_industry i1 on c2.id=i1.company_id left join fb_industry i2 on i1.industry_id=i2.id  where r1.id in({$ids})";
							$rich_info = $db->query($sql);
							$info_count = $db->record_count;
							$sql = "select id,name,gender,birthday,image,current_fortune_order from fb_rich where id in ($ids)";
							$rich = $db->paginate($sql,4,'rich_page');
							$rich_count = count($rich);
							$rich_list = $db->query("select t3.name,t1.rich_id,t3.id from fb_rich_list_items t1 join fb_custom_list_type t3 on t1.list_id=t3.id where t1.rich_id in ($ids)");
							$list_count = $db->record_count;
						}else{
							$rich_count = 0;
						}
					
						for($i=0;$i<$rich_count;$i++){
							$fortune = $db->query("select fortune,fortune_order,fortune_year from fb_rich_fortune where rich_id={$rich[$i]->id} order by fortune_year desc");
							if($db->record_count>0){
								$fortune = $fortune[0]->fortune.'亿人民币';
								$order = $fortune[0]->fortune_order;
								$year = $fortune[0]->fortune_year.'年';
							}else{
								$fortune = '未知';
								$order = '未知';
								$year = '未知';
							}
							$company = array();
							$industry = array();
							for($j=0;$j<$info_count;$j++){
								if($rich_info[$j]->id==$rich[$i]->id){
									$company[$rich_info[$j]->cid] = $rich_info[$j]->cname;
									$industry[$rich_info[$j]->iid] = $rich_info[$j]->iname;
								}
							}
							$company = array_unique($company);
							$industry = array_unique($industry);
					?>
					<div class="rich_box">
						<div class="rich_pic"><img src="<?php echo $rich[$i]->image;?>" width="70" height="70"></div>
						<div class="rich_info">
							<div class="rich_name"><a href="/rich/rich.php?id=<?php echo $rich[$i]->id;?>"><?php echo $rich[$i]->name;?></a> <?php if($rich[$i]->gender==1)echo '男';elseif($rich[$i]->gender==0)echo '女';else echo "未知";?> <?php if($rich[$i]->birthday!=''&&strlen($rich[$i]->birthday)==4)echo (date('Y')-$rich[$i]->birthday).'岁';else echo '未知';?></div>
							<div class="rich_com"><?php $j=0;foreach($company as $key => $val){if($j!=0)echo ',';?><a class="style1"><?php echo $val;?></a><?php $j++;}?></div>
							<div class="rich_ind">（<?php $j=0;foreach($industry as $key => $val){if($j!=0)echo ',';?><a class="style2"><?php echo $val;?></a><?php $j++;}?>）</div>
							<div class="rich_rank">
								年度排名：<span class="red"><?php echo $order;?></span>　今日排名：<span class="red"><?php echo $rich[$i]->current_fortune_order;?></span><br/>
								个人财富：<?php echo $fortune;?><br/>
								（截止日期：<?php echo $year;?>）
							</div>
						</div>
						<div class="rich_bd">
							<div class="bd_left">入选榜单：</div>
							<div class="bd_list">
								<?php for($n=0;$n<$list_count;$n++){
									if($rich_list[$n]->rich_id==$rich[$i]->id){
								?>
								<a href="/list/show_list.php?id=<?php echo $rich_list[$n]->id;?>"><?php echo $rich_list[$n]->name;?></a>
								<?php }}?>
							</div>
						</div>
					</div>
					<?php
						}
					?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=rich",null,'rich_page');?></div>
				</div>
				<div class=right_text id="famous" <?php if($type=="famous")echo 'style="display:inline;"';?>>
					<div class="right_box">
						<?php
							$list = $db->query("select id from fb_custom_list_type where table_name='fb_famous_list_items' and year=".(date('Y')-1));
							if($db->record_count==1){
								$sql = "select t1.id,t1.name,t1.xb,t1.mr_zp,t1.zy,t3.fortune,t3.exposure_rate,t3.fortune_order,t3.exposure_order from fb_mr t1 join fb_collection t2 on t1.id=t2.resource_id join fb_famous_list_items t3 on t1.id=t3.famous_id where t2.resource_type='famous' and t2.user_id=$uid and t3.list_id={$list[0]->id} order by t2.created_at";
								$famous = $db->paginate($sql,4,'famous_page');
								$famous_count = count($famous);
							}else{
								$famous_count = 0;
							}
							$famous_list = $db->query("select t1.list_id,t3.name,t1.famous_id from fb_famous_list_items t1 join fb_collection t2 on t1.famous_id=t2.resource_id join fb_custom_list_type t3 on t1.list_id=t3.id where t2.resource_type='famous' and t2.user_id=$uid  order by t2.created_at");
							$list_count = count($famous_list);
							for($i=0;$i<$famous_count;$i++){
						?>
						<div class="famous_box">
							<div class="famous_pic">
								<img src="<?php echo $famous[$i]->mr_zp?>" width="90" height="90">
							</div>
							<div class="famous_info">
								<div class="famous_name">
									<a href="famous.php?id=<?php echo $famous[$i]->id?>"><?php echo $famous[$i]->name?></a>　<?php echo $famous[$i]->xb?>
								</div>
								<div class="famous_rank">
									<span class="blue"><?php echo $famous[$i]->zy?></span><br/>
									年度收入排名：<?php echo $famous[$i]->fortune_order;?>　收入：<?php echo $famous[$i]->fortune;?>万<br/>
									曝光率排名：<?php echo $famous[$i]->exposure_order;?>　曝光指数：<?php echo $famous[$i]->exposure_rate;?><br/>
								</div>
							</div>
							<div class="famous_bd">
								<div class="bd_left">入选榜单：</div>
								<div class="bd_list">
									<?php for($n=0;$n<$list_count;$n++){
										if($famous_list[$n]->famous_id==$famous[$i]->id){
									?>
									<a class="famous_a" href="/show/show_list.php?id=<?php echo $famous_list[$n]->list_id;?>"><?php echo $famous_list[$n]->name;?></a>
									<?php }}?>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=famous",null,'famous_page');?></div>
				</div>
				<div class=right_text id="column" <?php if($type=="column")echo 'style="display:inline;"';?>>
					<div class="right_box">
						<?php
							$sql = "select t1.* from fb_collection t2 join fb_user t1 on t1.id=t2.resource_id where t2.user_id=$uid and t2.resource_type='column'";
							$author = $db->paginate($sql,2,'column_page');
							$sql = "select t1.title,t1.id,t1.short_title,t1.author_id from fb_collection t2 join fb_news t1 on t1.author_id=t2.resource_id where t2.user_id=$uid and t2.resource_type='column'";
							$news = $db->query($sql);
							for($i=0;$i<count($author);$i++){
								$k=0;
						?>
						<div <?php if($i==1){?>style="border:0"<?php }?> class="column_box">
							<div class="column_photo"><img width="90" height="90" src="<?php if(!$author[$i]->image_src)echo '/images/html/column/picture.jpg';else echo $author[$i]->image_src;?>"></div>
							<div class="column_info">
								<div class="column_title"><a href=""><?php echo $author[$i]->nick_name;?></a></div>
								<div class="column_description"><?php echo $author[$i]->description;?></div>
							</div>
							<div class="column_news">
								<div class="news_new">最新专栏文章：</div>
								<?php 
									for($j=0;$j<count($news);$j++){
										if($news[$j]->author_id==$author[$i]->id){
											$k++;
											if($k>2) break;
								?>
								<div class="news_title"><a title="<?php echo strip_tags($news[$j]->title);?>" href="/news/news.php?id=<?php echo $news[$j]->id?>"><?php echo $news[$j]->short_title;?></a></div>
								<?php
									}}
								?>
								<div class="go_to"><a href="/column/column.php?id=<?php echo $author[$i]->id;?>">进入专栏>></a></div>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="paginate"><?php paginate("user_favorites.php?type=column",null,'column_page');?></div>
				</div>
			</div>
		</div>
		<?php include_bottom();?>
	</div>
</body>