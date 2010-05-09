<?php 
	session_start();
	include_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<head>
	<title>榜单列表_福布斯中文网</title>
  	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
		use_jquery();
		js_include_tag('public','list_list');
		css_include_tag('list','public');
	?>
</head>
<body>
	<div id=ibody>
	<?php include_top();?>
		<div id=bread>榜单</div>
		<div id=bread_line></div>
		<div id=sort_l>
			<div class=sort_l_t1>
				常规榜
			</div>
			<div class=sort_l_l1 style="margin-top:10px;">
				<a href="<?php echo "{$static_site}/list/more/"; ?>1">富豪</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>2">投资</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>3">公司</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>4">城市</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>5">人物</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>6">体育</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>7">科技</a>
			</div>
			<div class=sort_l_l1>
				<a href="<?php echo "{$static_site}/list/more/"; ?>8">教育</a>
			</div>
			<div class=sort_l_t1 style="margin-top:20px;">
				<a class="sort_link2" href="<?php echo "{$static_site}/list/more/"; ?>9">图片榜</a>
			</div>
			<div class=sort_l_t1>
				<a class="sort_link2" href="<?php echo "{$static_site}/list/more/"; ?>10">专题榜</a>
			</div>
			
			<input type="text" id=sort_text ><input type="button" id=sort_button>
		</div>
		<div id=sort_r>
			<?php 
				$bdid=intval($_GET['id']);
				$year = intval($_GET['year']);
				$key = $_GET['key'];
				if(strlen($key)>20)$key='';
				switch($bdid){
					case "1":
						$bdname="富豪榜";
						break;
					case "2":
						$bdname="投资榜";
						break;
					case "3":
						$bdname="公司榜";
						break;
					case "4":
						$bdname="城市榜";
						break;
					case "5":
						$bdname="名人榜";
						break;
					case "6":
						$bdname="体育榜";
						break;
					case "7":
						$bdname="科技榜";
						break;
					case "8":
						$bdname="教育榜";
						break;
					case "9":
						$bdname="图片榜";
						break;
					case "10":
						$bdname="专题榜";
						break;
					default: 
			    	$bdname="常规榜"; 
			    	break; 
				}
				if($bdid=="")
				{
					$sql = 'select * from fb_custom_list_type order by priority asc,created_at desc';
				}
				else if($bdid<9)
				{
					$sql = 'select * from fb_custom_list_type where position="'.$bdid.'" order by priority asc,created_at desc';
					
				}
				else if($bdid==9)
				{
					$sql = 'select * from fb_custom_list_type where list_type=4 order by priority asc,created_at desc';
					
				}
				else if($bdid==10)
				{
					$sql = 'select * from fb_custom_list_type where list_type=5 order by priority asc,created_at desc';
					
				}
				if($year){
					$bdname = $year."年榜单";
					$sql = "select * from fb_custom_list_type where created_at>'{$year}-01-01 00:00:00' and created_at<'{$year}-12-31 23:59:59' order by priority asc,created_at desc";
				}
				if($key){
					$bdname = '您搜索的关键字"'.$key.'"榜单';
					$sql = "select * from fb_custom_list_type where name like '%$key%'";
				}
				$bd=$db->paginate($sql,10);
			?>
			<div id=sort_r_t>
				<?php echo $bdname; ?>共有<?php echo $page_record_count; ?>条榜单
			</div>
			<div id="list_banner" class="ad_banner"></div>
			<div id=sort_r_b_l>
				<?php for($i=0;$i<count($bd);$i++){ ?>
					<div class=sort_r_b_l_t><a href="<?php echo $static_site ."/list/" . $bd[$i]->id;?>"><?php echo $bd[$i]->name; ?></a></div>
				<?php } ?>
			</div>	
			<div id=sort_page><?php paginate();?></div>
		</div>
		<?php include_bottom();?>
	</div>
</body>