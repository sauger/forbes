<?php
	session_start();
  	include_once('../../frame.php');
	judge_role();	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "SELECT * FROM forbes.fb_investor_sign f where 1=1";
	$sea = $_REQUEST['sea'];
	if($sea!=''){
		if($sea=='风险投资'){
			$sea=1;
			}else if($sea=='出售投资')
			{
				$sea=2;
			}else if($sea=='天使投资')
			{
				$sea=3;
			}
		$sql .= " and name like '%$sea%' or item_type like '%$sea%' or company_name like '%$sea%' or item_name like '%$sea%' or email like '%$sea%'";
	}
	$record = $db->paginate($sql,30);
	$count = count($record);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php
		css_include_tag('admin');
		use_jquery();
	?>
</head>

<body>
<div id=icaption>
    <div id=title>投资人报名信息</div>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['sea']?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="15%">姓名</td><td width="7%">公司名称</td><td width="15%">电话</td><td width="15%">项目名称</td><td width="15%">项目金额</td><td width="8%">项目类型</td><td width="15%">电子邮件</td><td width="10%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->company_name;?></td>	
					<td><?php echo $record[$i]->phone;?></td>
					<td><?php echo $record[$i]->item_name;?></td>
					<td><?php echo $record[$i]->item_money;?></td>
					<td><?php if($record[$i]->item_type==1) echo '风险投资'; else if($record[$i]->item_type==2) echo '出售企业'; else if($record[$i]->item_type) echo '天使投资';?></td>
					<td><?php echo $record[$i]->email;?></td>
					<td>
						<a href="sign_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" title="编辑" style="cursor:pointer"><img src="/images/admin/btn_edit.png" border="0"></a>
						<span style="cursor:pointer;color:#FF0000" class="del" title="删除" name="<?php echo $record[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_subscription">
			</td>
		</tr>
		</table>	
	</div>
	</body>
</html>
<script>
$(function(){
	$(".sau_search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_button').click(function(){
		sea();
	})
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("del_magazine_order.php",{'del_id':$(this).attr('name')},function(data){
			});
			$(this).parent().parent().remove();
		}
	});
})

function sea(){
	window.location.href="?sea="+encodeURI($(".sau_search").attr('value'));
}
</script>