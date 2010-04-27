<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_investor');
	if($id!=''){
		$record->find($id);
		$sel_industry = explode(',',$record->invest_zone);
		$industry = $db->query("select * from fb_invest_industry");
		$count = $db->record_count;
		$item = $db->query("select * from fb_invest_items where investor_id=$id");
		$item_count = $db->record_count;
		$job = $db->query("select * from fb_investor_job_history where investor_id=$id");
		$job_count = $db->record_count;
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>投资人编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('../ckeditor/ckeditor.js','admin/investor');
		validate_form("fhgl_edit");
	?>
</head>
<body>
<div id=icaption>
     <div id=title><span style="cursor:pointer" class=rich_btn id=-1>投资人基本信息管理</span> <span style="cursor:pointer; color:#cccccc" class=rich_btn id=-2>投资项目管理</span> <span style="cursor:pointer; color:#cccccc" class=rich_btn id=-3>职业生涯管理</span></div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id="tabs-1" class=tabs>
	<div id=itable>
	<form id="fhgl_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%" >姓名</td>
			<td width="85%"><input type="text" name="post[name]" class="required" value="<?php echo $record->name;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司</td>
			<td><input type="text" name="post[company]" value="<?php echo $record->company;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>身份</td>
			<td><input type="text" name="post[post]" value="<?php echo $record->post;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>投资方向</td>
			<td>
				<select multiple="multiple" id="sel_industry">
					<?php foreach($sel_industry as $v){
					?>
					<option value="<?php echo $v;?>"><?php echo $v;?></option>
					<?php
					}?>
				</select>
				<img src="/images/admin/btn_delete.png" style="cursor:pointer; float:left;" id="delete_industry" />
				<select id="industry">
					<option value=""></option>
					<?php for($i=0;$i<$count;$i++){?>
						<option value="<?php echo $industry[$i]->id;?>"><?php echo $industry[$i]->name;?></option>
					<?php }?>
				</select>
				<img id="add_industry" style="cursor:pointer; float:left;" src="/images/admin/btn_add.png" />
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>照片</td>
			<td><input type="file" name="post[image]"><?php if($record->image!=''){?><a href="<?php echo $record->image;?>" target="_blank">点击查看<?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>拼音首字母</td>
			<td><input type="text" name="post[chinese_name]" class="required" value="<?php echo $record->chinese_name;?>"></td>
		</tr>
		<tr class="tr4">
			<td  class=td1>投资人简介</td><td><?php show_fckeditor('post[description]','Admin',false,"100",$record->description);?></td>
		</tr>
		<tr class="btools">
			<td colspan="2">
				<input id="submit" type="submit" value="提交">
				<input type="hidden" name="id" id="investor_id" value="<?php echo $id;?>">
				<input type="hidden" id="industry_name" name="post[invest_zone]">
			</td>
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
	<span style="font-size:15px; color:#ff0000">请先保存投资人基本信息</span>
	<?php }else{?>
	<table cellspacing="1"  align="center" id="table_item">
		<tr class="itable_title" id="item_box">
			<td width=25%>公司名称</td><td width=25%>投资类别</td><td width=20%>行业</td><td width=20%>投资金额</td><td width=10%>操作</td>
		</tr>
		<?php for($j=0;$j<$item_count;$j++){?>
		<tr class="tr3">
			<td><input value="<?php echo $item[$j]->invest_company;?>" type="text"></td>
			<td><input value="<?php echo $item[$j]->invest_type;?>" type="text"></td>
			<td><select>
					<option value=""></option>
					<?php for($i=0;$i<$count;$i++){?>
						<option <?php if($item[$j]->invest_industry_id==$industry[$i]->id){echo 'selected="selected"';}?> value="<?php echo $industry[$i]->id;?>"><?php echo $industry[$i]->name;?></option>
					<?php }?>
				</select></td>
			<td><input value="<?php echo $item[$j]->invest_money;?>" type="text"></td>
			<td><a class="item_del"><img src="/images/admin/btn_delete.png" border="0"></a>
			<input type="hidden" class="item_id" value="<?php echo $item[$j]->id;?>"></td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan="10" align="center">
			<button id="item_add">添　　加</button>
			<button id="item_save">保　　存</button>
			</td>
		</tr>
	</table> 
	<?php }?>
	</div>
</div>
<div id="tabs-3" style="display:none"  class=tabs>
	<div id="itable">
	<?php 
	  if(!$id){
	?>
	<span style="font-size:15px; color:#ff0000">请先保存投资人基本信息</span>
	<?php }else{?>
	<table cellspacing="1"  align="center" id="table_job">
		<tr class="itable_title" id="job_box">
			<td width=30%>所在企业</td><td width=30%>担任职务</td><td width=30%>起止时间</td><td width=10%>操作</td>
		</tr>
		<?php for($j=0;$j<$job_count;$j++){?>
		<tr class="tr3">
			<td><input value="<?php echo $job[$j]->company_name;?>" type="text"></td>
			<td><input value="<?php echo $job[$j]->post;?>" type="text"></td>
			<td><input value="<?php echo $job[$j]->duration;?>" type="text"></td>
			<td><a class="job_del"><img src="/images/admin/btn_delete.png" border="0"></a>
			<input type="hidden" class="job_id" value="<?php echo $job[$j]->id;?>"></td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan="10" align="center">
			<button id="job_add">添　　加</button>
			<button id="job_save">保　　存</button>
			</td>
		</tr>
	</table> 
	<?php }?>
	</div>
</div>
</body>
</html>