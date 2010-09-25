<div id=logo></div>
<?php
include_once("../../admin/subject/subject_module_class.php");
$modules = new fb_subject_module_class();
$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos1'",'order' => "priority asc,id desc"));
$deptsort = $db->query('SELECT sum(s.click_count) as djl,d.name FROM fb_subject_items i inner join fb_subject sb on i.subject_id=sb.id and sb.name="学习实践活动专题" inner join fb_news s on i.resource_id=s.id inner join fb_dept d on s.dept_id=d.id  group by s.dept_id order by djl desc limit 10');
$xxjb = $db->query('select n.id,n.short_title,n.news_type,n.target_url,n.file_name,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="信息简报" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 7');
$zxdt = $db->query('select n.id,n.short_title,n.news_type,n.target_url,n.file_name,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="最新动态" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
$ldjh = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="领导讲话" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
$bzap = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="步骤安排" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
$wjzb = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="文件摘编" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
$jyjs = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="经验介绍" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
$xxzl = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="学习资料" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6');
?>

		<div id=title><div class="cl"><a target="_blank" href="djnews.php">首页</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $ldjh[0]->cid; ?>">领导讲话</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $xxzl[0]->cid;?>">学习资料</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php $bzap[0]->cid ?>">步骤安排</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $zxdt[0]->cid;?>">最新动态</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $xxjb[0]->cid;?>">信息简报</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php $wjzb[0]->cid; ?>">文件摘编</a></div><div class="cl"><a target="_blank" href="djlist2.php">我为集团献一计</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $jyjs[0]->cid;?>">经验介绍</a></div><div class="cl"><a target="_blank" href="/sxjy/">三项学习教育</a></div></div>
		<div style="width:1002px; background:#F9B628;">
			<div id=content>
				<div id=context>
					<div id=left>
						<div id=content>
							<?php 
							for($i=0;$i<count($modules);$i++)
							$modules[$i]->display();
							
							?>
						
							<div class=title>专题访问排行榜</div>	
								<? 
								for($i=0;$i<count($deptsort);$i++){?>
								<div style="width:150px; height:15px; line-height:15px; margin-top:10px; margin-left:10px; <? if($i<3){?>color:red; font-weight:bold;<? }?> overflow:hidden; float:left; display:inline"><? echo $deptsort[$i]->name;?></div><div style="width:50px; margin-top:10px; margin-right:10px; text-align:right; <? if($i<3){?>color:red; font-weight:bold;<? }?> float:left; display:inline;"><? echo $deptsort[$i]->djl;?></div>
								<? }?>
							
							<div id=lxfs>
								fb学习实践活动办公室<br>
								地址：威海路298号上视大厦副楼18楼<br>
								传真：<span style="color:#EB6100; font-weight:bold;">62561664</span>　邮编：200041<br>
								电子邮箱：kxfzg@fb.sh.cn
							</div>
						</div>
					</div>