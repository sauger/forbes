<?
	require_once('../../frame.php');
  	$db = get_db();
	$identity = strtolower(basename(dirname(__FILE__)));
	$subject = $db->query("select * from fb_subject where identity='$identity'");
	if($subject === false || count($subject) <=0){
		alert('找不到专题!请联系管理员!');
		exit;
	}
	$subject = $subject[0];
	#$moduels = 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG -党建新闻列表</title>
	<?php css_include_tag('subject_templete/templet1');
		use_jquery();
		js_include_once_tag('dj');
	?>
</head>
<body>
	<div id=bodys>	
		<div id=logo></div>	
		<div id=title><div class="cl"><a target="_blank" href="djnews.php">首页</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $ldjh[0]->cid; ?>">领导讲话</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $xxzl[0]->cid;?>">学习资料</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php $bzap[0]->cid ?>">步骤安排</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $zxdt[0]->cid;?>">最新动态</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $xxjb[0]->cid;?>">信息简报</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php $wjzb[0]->cid; ?>">文件摘编</a></div><div class="cl"><a target="_blank" href="djlist2.php">我为集团献一计</a></div><div class="cl"><a target="_blank" href="djlist.php?id=<?php echo $jyjs[0]->cid;?>">经验介绍</a></div><div class="cl"><a target="_blank" href="/sxjy/">三项学习教育</a></div></div>
		<div style="width:1002px; background:#F9B628;">
			<div id=content>
				<div id=context>
					<div id=left>
						<div id=content>	
						
						</div>
					</div>		
				</div>
			</div>
		</div>

					<div id=right>
						<div class=gd style="background:url(/images/bg/hdjy.jpg) no-repeat;border:1px solid">
							<? $news = $db->query('select n.photo_src,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="活动剪影" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc,n.last_edited_at desc limit 6');?>
					<DIV id=Layer5>
				      <DIV id=demo style="OVERFLOW: hidden; WIDTH: 100%; COLOR: #ffffff">
				      <TABLE cellSpacing=0 cellPadding=0 border=0>
				        <TBODY>
				        <TR>
				          <TD id=demo1 vAlign=top align=middle>
				            <TABLE cellSpacing=0 cellPadding=2 border=0>
				              <TBODY>
				              <TR align=middle>
				              	<? for($i=0;$i<count($news);$i++){?>
				                <TD><a target="_blank" href="djlist.php?id=<?php echo $news[0]->cid; ?>"><img border=0 width=130 height=90 src="<? echo $news[$i]->photo_src; ?>"></a></TD>
				                <? }?>
				              </TR></TBODY></TABLE></TD>
				          			<TD id=demo2 vAlign=top></TD></TR></TBODY></TABLE></DIV>
								      <SCRIPT>
										var speed=30//速度数值越大速度越慢
										demo2.innerHTML=demo1.innerHTML
										function Marquee(){
										if(demo2.offsetWidth-demo.scrollLeft<=0)
										demo.scrollLeft-=demo1.offsetWidth
										else{
										demo.scrollLeft++
										}
										}
										var MyMar=setInterval(Marquee,speed)
										demo.onmouseover=function() {clearInterval(MyMar)}
										demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
									 </SCRIPT>
								</DIV>
						</div>
						<div class=title>领导讲话<div class=more><a target="_blank" href="djlist.php?id=<?php echo $ldjh[0]->cid;?>">更多</a></div></div>
						<div class=title>步骤安排<div class=more><a target="_blank" href="djlist.php?id=<?php echo $bzap[0]->cid;?>">更多</a></div></div>
						<div style="width:350px; float:left; display:inline;">
							<? 		$photourl="";
									for($i=0;$i<count($ldjh);$i++){
									 if($photourl=="")
									 {
									 	$photourl=$ldjh[$i]->photo_src;	
									 }
									}
							?>
							<div class=pic><img border=0 width=98 height=90 src="<? if($photourl!=""){echo $photourl;}else {echo '/images/logo.jpg';}?>"></div>
							
								<? 	
								for($i=0;$i<count($ldjh);$i++){?>
								<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $ldjh[$i]->id;?>"><? echo $ldjh[$i]->short_title;?></a></div>
								<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }?>
							
						</div>
							<?
								$photourl="";
									for($i=0;$i<count($bzap);$i++){
									 if($photourl=="")
									 {
									 	$photourl=$bzap[$i]->photo_src;	
									 }
									}
							?>
							<div class=pic><img border=0 width=98 height=90 src="<? if($photourl!=""){echo $photourl;}else {echo '/images/logo.jpg';}?>"></div>
							
								<?
								for($i=0;$i<count($news1);$i++){?>
									<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $bzap[$i]->id;?>"><? echo $bzap[$i]->short_title;?></a></div>
									<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }?>
							
						<div class=bg>
							<div class=title style="margin-left:10px;">文件摘编<div class=more><a target="_blank" href="djlist.php?id=<?php echo $wjzb[0]->cid;?>">更多</a></div></div>
							<div class=title style="margin-left:10px;">经验介绍<div class=more><a target="_blank" href="djlist.php?id=<?php echo $jyjs[0]->cid;?>">更多</a></div></div>
							<div style="width:350px; float:left; display:inline;">
								<?	$photourl="";
									for($i=0;$i<count($wjzb);$i++){
									 if($photourl=="")
									 {
									 	$photourl=$wjzb[$i]->photo_src;	
									 }
									}
								?>
								<div class=pic><img border=0 width=98 height=90 src="<? if($photourl!=""){echo $photourl;}else {echo '/images/logo.jpg';}?>"></div>
									
										<? 	
										for($i=0;$i<count($wjzb);$i++){?>
										<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $wjzb[$i]->id;?>"><? echo $wjzb[$i]->short_title;?></a></div>
										<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
										<? }?>
									
							</div>
						<? 	$photourl="";
									for($i=0;$i<count($jyjs);$i++){
									 if($photourl=="")
									 {
									 	$photourl=$jyjs[$i]->photo_src;	
									 }
									}
						?>
						<div class=pic><img border=0 width=98 height=90 src="<? if($photourl!=""){echo $photourl;}else {echo '/images/logo.jpg';}?>"></div>
						
							<?
							for($i=0;$i<count($jyjs);$i++){?>
								<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $jyjs[$i]->id;?>"><? echo $jyjs[$i]->short_title;?></a></div>
								<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
							<? }?>
						
						</div>
						<div class=gd style="background:url(/images/bg/wwjt.jpg) no-repeat;">
							<? $news1 = $db->query('select n.photo_src from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="我为集团献一计" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc');?>
							<DIV id=Layer6>
				      <DIV id=demo3 style="OVERFLOW: hidden; WIDTH: 100%; COLOR: #ffffff">
				      <TABLE cellSpacing=0 cellPadding=0 border=0>
				        <TBODY>
				        <TR>
				          <TD id=demo4 vAlign=top align=middle>
				            <TABLE cellSpacing=0 cellPadding=2 border=0>
				              <TBODY>
				              <TR align=middle>
				              	<? for($i=0;$i<count($news1);$i++){?>
				                <TD><a target="_blank" href="djlist2.php"><?php if($news1[$i]->photo_src!=""){?><img border=0 width=130 height=90 src="<? echo $news1[$i]->photo_src;?>"><? }?></a></TD>
				                <? }?>
				              </TR></TBODY></TABLE></TD>
				          			<TD id=demo5 vAlign=top></TD></TR></TBODY></TABLE></DIV>
								      <SCRIPT>
												var speed1=30//速度数值越大速度越慢
												demo5.innerHTML=demo4.innerHTML
												function Marquee1(){
												if(demo5.offsetWidth-demo3.scrollLeft<=0)
													demo3.scrollLeft-=demo4.offsetWidth
												else{
													demo3.scrollLeft++
													}
												}
												var MyMar1=setInterval(Marquee1,speed1)
												demo3.onmouseover=function() {clearInterval(MyMar1)}
												demo3.onmouseout=function() {MyMar1=setInterval(Marquee1,speed1)}
												</SCRIPT>
								</DIV>
						</div>
						<div class=bg>
							<div class=title style="margin-left:10px;">学习资料<div class=more><a target="_blank" href="djlist.php?id=<?php echo $xxzl[0]->cid;?>">更多</a></div></div>
							<div class=title style="margin-left:10px;">三分钟论坛<div class=more><a target="_blank" href="djlist2.php">更多</a></div></div>
							
							<div style="width:350px; float:left; display:inline;">							
									<? for($i=0;$i<count($xxzl);$i++){?>
									<div style="width:290px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $xxzl[$i]->id;?>"><? echo $xxzl[$i]->short_title;?></a></div>
									<? if($i<2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
									<? }?>
								
							</div>
							<? $news = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="三分钟论坛" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6'); ?>
							
								<? for($i=0;$i<count($news);$i++){?>
								<div style="width:290px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->short_title;?></a></div>
								<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }
								$news = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="即知即改" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6')
								?>	
							<div class=title style="margin-left:10px;">即知即改<div class=more><a target="_blank" href="djlist.php?id=<?php echo $news[0]->cid;?>">更多</a></div></div>
							<div class=title style="margin-left:10px;">三分钟答题</div>
							<div style="width:350px; height:90px; float:left; display:inline;">
									<? for($i=0;$i<count($news);$i++){?>
									<div style="width:290px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->shorttitle;?></a></div>
									<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
									<? }?>
							</div>
							<? $news = $db->query('select n.photo_src,n.id,n.short_title,c.id as cid from fb_news n inner join fb_subject_items i on i.resource_id=n.id and i.category_type="news" and n.is_adopt=1 inner join fb_subject_category c on c.id=i.category_id and c.name="三分钟答题" inner join fb_subject s on c.subject_id=s.id and s.name="学习实践活动专题" order by n.priority asc, n.last_edited_at desc limit 6'); ?>
								<? for($i=0;$i<count($news);$i++){?>
								<div style="width:290px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a <? if($i<1){?>style="color:red; font-weight:bold;"<? }?> target="_blank" href="djcontent.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->shorttitle;?></a></div>
								<? if($i< 2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }?>
						</div>
						<div class=bg>
						<div id=contenttitle style="margin-left:8px;">征求意见</div>
							<? 
							$comments = $db->paginate('select * from fb_comment where resource_type="djnews" order by created_at desc');
							for($i=0;$i<count($comments);$i++){?>
								<div class=content7>
									<div class=name><a href="#"><?php echo $comments[$i]->nick_name; ?></a></div>	
									<div class=time><?php echo $comments[$i]->created_at; ?></div>	
									<div class=context><?php echo strfck($comments[$i]->comment); ?></div>	
								</div>
								<? }?>						
							  <div class="pageurl">
							     <? paginate('');?>
							  </div>
							<form name="commentform" id="commentform" method="post" action="/pub/pub.post.php">
							   <div id=content9>
								   用户：<input type="text" value="" id="commenter" name="post[nick_name]">   	
							   </div>
							   <div id=content10>
								  <div id=plleft>意见：</div><textarea id="commentcontent" name="post[comment]"></textarea>
							   </div>   
							   <div id=content11></div>
							   	<input type="hidden" id="resource_type" name="post[resource_type]" value="djnews">
								<input type="hidden" id="target_url" name="post[target_url]" value="<?php  $string = 'http://' .$_SERVER[HTTP_HOST] .$_SERVER[REQUEST_URI]; echo $string;?>">
								<input type="hidden" name="type" value="comment">
							   <input type="hidden" value="<? echo count($data,COUNT_RECURSIVE);?>">
								<input type="hidden" value="<? echo count($deptname);?>">
							</form>
						</div>
					</div>
					<? include('inc/djbottom.inc.php');?>
				</div>

</body>
</html>

