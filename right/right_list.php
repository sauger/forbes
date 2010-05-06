<style type="text/css">
	.inc_right_list_main{
		float:left;
		width:320px;
		margin-top:10px;
		font-size:14px; 
		line-height:14px;
	}
	.inc_list_top_border{
		width:317px;
		height:4px;
		font-size: 0px;
		background: url('/images/right/list_top.jpg');
	}
	.inc_list_bottom_border{
		width:317px;
		height:4px;
		font-size: 4px;
		background: url('/images/right/list_bottom.jpg');
	}
	.inc_list_title{
		width:300px;
		font-weight:bold; 
		line-height:18px;
		padding:3px 0px 5px 15px;
		border-left:1px solid #dfdfdf;	
		border-right:1px solid #dfdfdf;
		color:#003A7B;
	}
	.inc_list_item_title{
		width:300px;
		border-left:1px solid #dfdfdf;
		border-right:1px solid #dfdfdf;
		border-top: 1px solid #dfdfdf;
		padding:7px 0px 7px 15px;
		font-weight:bold; 
		color:#999999;
	}
	.inc_list_item_title_selected{
		color:#000000;
		border:1px solid #999999;
		background-color: #F4F4F4;
	}
	.inc_list_item_content{
		width:300px;
		height:110px;
		border-left:1px solid #dfdfdf;
		border-right:1px solid #dfdfdf;
		padding:7px 0px 7px 15px;
		display:none;
	}	
	.inc_list_item_content ul li{
		padding-left:10px;
	}
	.inc_list_item_content ul li{font-size:12px; line-height:24px; list-style-position:outside; background:url(/images/right/tar5.gif) no-repeat 1% 50%;  list-style-type:none;}

	.inc_list_item_content ul li a:link{color:#003A7B; text-decoration:none;}
	.inc_list_item_content ul li a:visited{color:#003A7B; text-decoration:none;}
	.inc_list_news_title{width:240px; height:18px; line-height:18px; overflow:hidden; margin-left:10px;}
	.inc_list_news_title a{color:#999999; text-decoration:none;}
</style>
<?php include_once dirname(__FILE__) .'/../frame.php'?>
<?php use_jquery();init_page_items();
global $pos_name;?>
<div class="inc_right_list_main">
	<!--  title -->
	<div class="inc_list_top_border"></div>
	<div class="inc_list_title">文章榜</div>
	<div class="inc_list_item_title"><div>餐饮</div><div class="inc_list_news_title" <?php $pos_name='right_list1'; show_page_pos($pos_name,'link')?>><?php show_page_href()?>1</div></div>
	<div class="inc_list_item_title"><div>游艇</div><div class="inc_list_news_title" <?php $pos_name='right_list2'; show_page_pos($pos_name,'link')?>><?php show_page_href()?></div></div>
	<div class="inc_list_item_title"><div>艺术品</div><div class="inc_list_news_title" <?php $pos_name='right_list3'; show_page_pos($pos_name,'link')?>><?php show_page_href()?></div></div>
	<div class="inc_list_item_title"><div>时尚</div><div class="inc_list_news_title" <?php $pos_name='right_list4'; show_page_pos($pos_name,'link')?>><?php show_page_href()?></div></div>
	<div class="inc_list_item_title"><div>职业</div><div class="inc_list_news_title" <?php $pos_name='right_list5'; show_page_pos($pos_name,'link')?>><?php show_page_href()?></div></div>
	<div class="inc_list_item_title"><div>投资</div><div class="inc_list_news_title" <?php $pos_name='right_list6'; show_page_pos($pos_name,'link')?>><?php show_page_href()?></div></div>
	<div class="inc_list_bottom_border"></div>
</div>
