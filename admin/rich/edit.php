<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		css_include_tag('admin','autocomplete','jquery_ui');
		use_jquery();
		js_include_tag('autocomplete.jquery','admin/rich/main_edit','../ckeditor/ckeditor.js','jquery-ui-1.7.2.custom.min.js');
		validate_form("fhgl_edit");
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_rich');
	if($id!=''){
		$record->find($id);
	}
?>
<body>
		<div id=icaption>
		    <div id=title><span style="cursor:pointer" class=rich_btn id=-1>基本信息管理</span> <span style="cursor:pointer; color:#cccccc" class=rich_btn id=-2>富豪公司管理</span> <span style="cursor:pointer; color:#cccccc" class=rich_btn id=-3>富豪财富管理</span></div>
			  <a href="list.php" id=btn_back></a>
		</div>

		<div id="tabs-1" class=tabs>
		<div id="itable">
			<form id="fhgl_edit" enctype="multipart/form-data" action="post.php" method="post"> 
			<table cellspacing="1"  align="center">
				<tr class=tr4>
					<td class=td1 width=15%>姓名</td>
					<td width=85%><input type="text" name="fh[name]" value="<?php echo $record->name;?>" class="required">
				</tr>
				<tr class=tr4>
					<td class=td1>拼音</td><td width=665><input type="text" name="fh[chinese_name]" value="<?php echo $record->chinese_name;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>性别</td>
					<td id="fh_xb">
						<input style="width:20px;" type="radio" name="fh[gender]" value="1" <?php if($record->gender==1){ ?>checked="checked"<?php } ?>><span style="float:left">男</span>
						<input style="width:20px;" type="radio" name="fh[gender]" value="0" <?php if($record->gender=='0'){ ?>checked="checked"<?php } ?>><span style="float:left">女</span>
					</td>
				</tr>
				<tr class=tr4>
					<td class=td1>国籍</td>
					<td>
						<input type="text" size="20" name="fh[country]" value="<?php echo $record->country;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>出生年份</td>
					<td>
						<input type="text" size="20" name="fh[birthday]"  id="fh_birthday"  value="<?php echo $record->birthday;?>">
				</tr>
				<tr class=tr4>
					<td class=td1>今日排名</td>
					<td>
						<?php echo $record->jrpm;?>
				</tr>
				<tr class=tr4>
					<td class=td1>上传照片</td>
					<td>
						<input type="hidden" name="MAX_FILE_SIZE1" value="2097152">
						<input type="file" name="fh[image]" id="photo" >（请上传小于2M的照片）<?php if($id!=''){?><a target="_blank" href="<?php echo $record->fh_zp?>">点击查看照片</a><?php }?>
					</td>
				</tr>
				<tr id=newsshow1 class="tr4">
					<td  class=td1 height=265>个人经历</td><td><?php show_fckeditor('fh[comment]','Admin',false,"200",$record->comment);?></td>
				</tr>
				<tr id=newsshow1 class="tr4">
					<td class=td1 height=265>慈善事业</td><td><?php show_fckeditor('fh[philanth]','Admin',false,"200",$record->philanth);?></td>
				</tr>
				<tr class="btools">
					<td colspan="10" align="center"><input id="submit" type="submit" value="完成">				<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>"></td>
				</tr>	
				</table>
			</form>
		</div>
		</div>
		<div id="tabs-2" style="display:none"  class=tabs>
		<div id="itable">
		<?php 
		  if(!$id){
		?>
		<span style="font-size:15px; color:#ff0000">请先保存富豪基本信息</span>
		<?php }else{
			$sql = "select a.id,a.company_id,b.name,b.stock_code,a.stock_count from fb_rich_company a left join fb_company b on a.company_id = b.id where a.rich_id = {$id}";
			$company = $db->query($sql);
			if(empty($company)) $company = array();?>
		<table cellspacing="1"  align="center" id="table_rich">
			<tr class="itable_title">
				<td width=40%>公司名称</td><td width=20%>上市代码</td><td width=20%>持股数</td><td width=20%>操作</td>
			</tr>
			<?php foreach ($company as $v) {?>
			<tr class="tr3">
				<td><?php echo $v->name;?></td>
				<td><?php echo $v->stock_code?></td>
				<td><input type="text"  value="<?php echo $v->stock_count;?>"></input></td>
				<td>
					<a style="cursor:pointer;" class="a_delete"><img src="/images/admin/btn_delete.png" border="0"></a>
					<input type="hidden" class="c_hidden" value="<?php echo $v->id;?>"></input>
					<input type="hidden" value="<?php echo $v->company_id;?>"></input>
				</td>
			</tr>	
			<?php }?>
			<tr class="btools">
				<td colspan="10" align="center">
				<button id="btn_add">添　　加</button>
				<button id="btn_save">保　　存</button>
				</td>
			</tr>
		</table> 

		<?php }?>


		</div>
		
		<div id="company_filter" style="margin-top:10px; display:none;">
			<?php include 'filter_company.php';?>
		</div>
		</div>
		<div id="tabs-3" style="display:none" class=tabs>
		<div id="itable">
			<?php 
			  if(!$id){
			?>
			<span style="font-size:15px; color:#ff0000">请先保存富豪基本信息</span>
			<?php }else{
				$sql = "select * from fb_rich_fortune where rich_id={$id}";
				$fortune = $db->query($sql);
				if(empty($fortune)) $fortune = array();
			?>
			<table cellspacing="1"  align="center" id="table_fortune">
				<tr class="itable_title" id="fortune_box">
					<td width=40%>个人财富</td><td width=35%>所属年份</td><td width=15%>财富排名</td><td width=10%>操作</td>
				</tr>
				<?php foreach ($fortune as $v) {?>
				<tr class="tr3">
					<td><input type="text" class="fortune" value="<?php echo $v->fortune;?>"></input>(请输入单位为亿人民币的数字)</td>
					<td><input type="text" class="fortune_class" value="<?php echo $v->fortune_year;?>"></input>(输入4位年份)</td>
					<td><input type="text" class="fortune_order" value="<?php echo $v->fortune_order;?>"></input></td>
					<td>
						<a style="cursor:pointer;" class="f_delete"><img src="/images/admin/btn_delete.png" border="0"></a>
						<input type="hidden" value="<?php echo $v->id;?>"></input>
					</td>
				</tr>	
				<?php }?>
				<tr class="btools">
					<td colspan="10" align="center">
					<button id="fortune_add">添　　加</button>
					<button id="fortune_save">保　　存</button>
					</td>
				</tr>
			</table> 
			<?php
			}
			?>
		</div>
	</div>
	
</body>
</html>