<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		include_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/gl/search');
	?>
</head>

<?php
	$content = $_REQUEST['content'];
	$type = $_REQUEST['type'];
	$db = get_db();
	if($content!= '')
	{
		$sql = "select * from fb_company where ".$type." like '%".trim($content)."%'";
	}
	else
	{
		$sql = "select * from fb_company";
	}
	$record = $db->paginate($sql,30);
?>
<body>
<div id=icaption>
    <div id=title>公司管理</div>
        <a href="#" id="btn_delete3" title="删除所有记录"></a>
		<a href="#" id="btn_delete2" title="删除选中记录"></a>
		<a href="edit.php" id=btn_add></a>
		<a href="data_upload.php" id=btn_import></a>
</div>
<div id=isearch>
		<input id="content" type="text" value="<? echo $_REQUEST['content']?>" >
		<select id="type">
				<option value="name" <? if($_REQUEST['type']=="name"){?>selected="selected"<? }?> >名称</option>
				<option value="province" <? if($_REQUEST['type']=="province"){?>selected="selected"<? }?> >省份</option>
				<option value="city" <? if($_REQUEST['type']=="city"){?>selected="selected"<? }?> >城市</option>
				<option value="address" <? if($_REQUEST['type']=="address"){?>selected="selected"<? }?> >地址</option>
				<option value="website" <? if($_REQUEST['type']=="website"){?>selected="selected"<? }?> >网址</option>
				<option value="stock_code" <? if($_REQUEST['type']=="stock_code"){?>selected="selected"<? }?> >上市公司代码</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1">	
		<tr class="itable_title">
			<td width="5%"><a href="#" id="a_select_all" style="color:blue;">选择</a></td><td width="20%">名称</td><td width="7%">国家</td><td width="8%">股票代码</td><td width="8%">交易所</td><td width="7%">股价</td><td width="20%">更新时间</td><td width="10%">货币种类</td><td width="15%">操作</td>
		</tr>
		<?php
			$len = count($record);
			for($i=0;$i< $len;$i++){
		?>
		<tr class="tr3" id=<?php echo $record[$i]->id;?> >
				<td><input type="checkbox" value="<?php echo $record[$i]->id;?>" class="checkbox_select_all" /></td>
				<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->name);?></a></td>
				<td><?php echo strip_tags($record[$i]->country);?></td>
				<td><?php echo strip_tags($record[$i]->stock_code);?></td>
				<td>
						<?php
								switch ($record[$i]->stock_place_code)
									{
										case SS:
  										echo "上海";
  										break;  
										case SZ:
  										echo "深圳";
  										break;  
										case HK:
  										echo "香港";
  										break;  
										case SI:
  										echo "新加坡";
  										break;
  									case KS:
  										echo "韩国";
  										break;  
  									case PA:
  										echo "法国";
  										break;
  									case L:
  										echo "英国";
  										break;   
  									case DE:
  										echo "德国";
  										break;   
  									case JP:
  										echo "日本";
  										break;
  									case "":
  										echo "美国";
  										break;
  									default:
											echo "";
									}
						?>
					</td>
					<td>
						<?php echo $record[$i]->stock_value;?>
					</td>
					<td>
						<?php echo $record[$i]->stock_update_time;?>
					</td>
					<td>
						<?php
							$hbzl = new table_class('fb_currency');
							if ($record[$i]->hbid != '')
							{
								$hbzl->find($record[$i]->hbid);
								echo $hbzl->name;
							}	
						?>
					</td>
					<td>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>"  title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan="10">
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_company">
			</td>
		</tr>
	</table>
</body>
</html>