<div id=logo></div>
		<div id=title><div class="cl"><a target="_blank" href="djnews.php">首页</a></div><div class="cl"><a target="_blank" href="djlist.php?id=63">领导讲话</a></div><div class="cl"><a target="_blank" href="djlist.php?id=70">学习资料</a></div><div class="cl"><a target="_blank" href="djlist.php?id=67">步骤安排</a></div><div class="cl"><a target="_blank" href="djlist.php?id=64">最新动态</a></div><div class="cl"><a target="_blank" href="djlist.php?id=66">信息简报</a></div><div class="cl"><a target="_blank" href="djlist.php?id=68">文件摘编</a></div><div class="cl"><a target="_blank" href="djlist2.php">我为集团献一计</a></div><div class="cl"><a target="_blank" href="djlist.php?id=69">经验介绍</a></div><div class="cl"><a target="_blank" href="/sxjy/">三项学习教育</a></div></div>
		<div style="width:1002px; background:#F9B628;">
			<div id=content>
				<div id=context>
					<div id=left>
						<div id=content>
							<div class=title>最新动态</div>	
								<? 
								$news = $sqlmanager->GetRecords('select * from smg_news where main_cate_id=64 and isadopt=1 order by priority asc, pubdate desc',1,7);
								
								for($i=0;$i<count($news);$i++){
									if($news[$i]->newstype==3)//url链接类新闻
								  {
								  	redirecturl($news[$i]->linkurl);
								  	CloseDB();
								  	exit;
								  }
								  //文件新闻
								  if($news[$i]->newstype==2)
								  {
								  	//echo $news->newstpe;
								   	redirecturl($news[$i]->filepath ."/" .$news[$i]->filename);
								  	CloseDB();
								  	exit; 	
								  }
								?>
									
								<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="djcontent.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->shorttitle;?></a></div>
								<? if($i<2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }?>
							
							<div class=tp>
								<div class=pic>
									<a target="_blank" target="_blank" href="djcontent.php?id=<? echo $news[0]->id;?>">
										<img border=0 width=90 height=70 src="<? if($news[0]->photourl!=""){echo $news[0]->photourl;}else {echo '/images/logo.jpg';}?>">
									</a>
								</div>
								<div class=pic>
									<a target="_blank" target="_blank" href="djcontent.php?id=<? echo $news[1]->id;?>">
										<img border=0 width=90 height=70 src="<? if($news[1]->photourl!=""){echo $news[1]->photourl;}else {echo '/images/logo.jpg';}?>">
									</a>
								</div>
							</div>
							<div class=more><a target="_blank" href="djlist.php?id=64">更多>></a></div>
							<div class=title>活动视频</div>
							
								<? 
								$video = $sqlmanager->GetRecords('select * from smg_video where main_cate_id=14 and isadopt=1 order by priority asc, createtime desc',1,3);?>
								<div style="width:200px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><? ShowMediaPlay(200,230,$video[0]->photourl,$video[0]->videourl);?></div>
									<? 	
								for($i=1;$i<count($video);$i++){?>
								<div style="width:200px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><img width=5 height=5 src="/images/icon/blacksqu.jpg">　<a target="_blank" href="/video/video.php?id=<? echo $video[$i]->id;?>"><? echo $video[$i]->title;?></a></div>
								<? }?>			
							<div class=more><a target="_blank" href="/video/videolist2.php?id=14">更多>></a></div>
							<div class=title>三项学习教育</div>
							<a href="/sxjy/"><img border=0 style="margin-left:10px; margin-top:5px;" width="205" height="58" src="images/sxxx.jpg"></a>
							<div class=title>信息简报</div>						
								<? 
								$news = $sqlmanager->GetRecords('select * from smg_news where main_cate_id=66 and isadopt=1 order by priority asc, pubdate desc',1,7);
								for($i=0;$i<count($news);$i++){
									if($news[$i]->newstype==3)//url链接类新闻
								  {
								  	redirecturl($news[$i]->linkurl);
								  	CloseDB();
								  	exit;
								  }
								  //文件新闻
								  if($news[$i]->newstype==2)
								  {
								  	//echo $news->newstpe;
								   	redirecturl($news[$i]->filepath ."/" .$news[$i]->filename);
								  	CloseDB();
								  	exit; 	
								  }			
								?>
								<div style="width:170px; height:15px; line-height:15px; margin-top:5px; margin-left:10px; overflow:hidden; float:left; display:inline"><a target="_blank" href="djcontent.php?id=<? echo $news[$i]->id;?>"><? echo $news[$i]->shorttitle;?></a></div>
								<? if($i<2){?><div style="width:29px; height:15px; float:left; display:inline;"><img border=0 src="/images/pic/new.gif"></div><? }?>
								<? }?>
								<div class=more><a target="_blank" href="djlist.php?id=66">更多>></a></div>
							<div class=title>专题访问排行榜</div>	
								<? 
								for($i=0;$i<count($deptsort);$i++){?>
								<div style="width:150px; height:15px; line-height:15px; margin-top:10px; margin-left:10px; <? if($i<3){?>color:red; font-weight:bold;<? }?> overflow:hidden; float:left; display:inline"><? echo $deptsort[$i]->name;?></div><div style="width:50px; margin-top:10px; margin-right:10px; text-align:right; <? if($i<3){?>color:red; font-weight:bold;<? }?> float:left; display:inline;"><? echo $deptsort[$i]->djl;?></div>
								<? }?>
							
							<div id=lxfs>
								SMG学习实践活动办公室<br>
								地址：威海路298号上视大厦副楼18楼<br>
								传真：<span style="color:#EB6100; font-weight:bold;">62561664</span>　邮编：200041<br>
								电子邮箱：kxfzg@smg.sh.cn
							</div>
						</div>
					</div>