<?php
	session_start();
  	include_once( dirname(__FILE__) .'/../../frame.php');
	judge_role();
		
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_edm";
	if($search!=''){
		$sql .= " where name like '%".$search."%'";
	}
	$sql .= " order by created_at desc";
	$record = $db->paginate($sql,15);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<style type="text/css">
		#title_link{float:left;line-height:25px;font-size:14px;}
		#title_link a{color:blue;margin-left:10px;}
	</style>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/edm/index');
		$type['marrow'] = '新闻订阅';
		$type['edm'] = '精华导读';
	?>
</head>

<body>
<div id=icaption>
    <div id=title>EDM管理</div>
    <div id="title_link"><a href="/admin/edm/edm.php?page_type=admin">精华导读</a><a href="/admin/edm/marrow.php?page_type=admin">新闻定制</a></div>
	<a href="edit.php" id=btn_add></a>
</div>	

<div id=isearch>
		<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>

<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="30%">EDM名称</td><td width="20%">EDM类型</td><td width="25%">发布时间</td><td width="25%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->name;?></td>
			<td><?php echo $type[$record[$i]->edm_type];?></td>
			<td><?php echo substr($record[$i]->created_at,0,10);?></td>
			<td>
			<a title="静态页面" href="<?php echo $static_site ."/edm/{$record[$i]->file_name}";?>" target="_blank"><img src="/images/admin/btn_static.png" border="0"></a>
			<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $record[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php
			}
		?>
		<tr class="btools">
				<td colspan=10>
					<?php paginate("",null,"page",true);?>
					<input type="hidden" id="db_table" value="fb_edm">
				</td>
		</tr>
	</table>	
</div>		
</body>
</html>