<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	
	
	$id = $_REQUEST['id'];
	if($id!=''){
		$user = new table_class('fb_yh');
		$user->find($id);
	}
	$db = get_db();
	$info = $db->query('select * from fb_yh_xx where yh_id='.$id);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		//validate_form("famous_edit");
	?>
</head>
<body>
	<div id=icaption>
	    <div id=title>查看用户个人信息</div>
		 <a href="index.php" id=btn_back></a>
	</div>
	<form id="famous_edit" enctype="multipart/form-data" action="edit_info.post.php" method="post"> 
	<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">用户名</td>
			<td width="85%">
				<?php echo $user->name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>姓名</td>
			<td>
				<?php echo $info[0]->xm;?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>性别</td>
			<td>
				<?php echo $info[0]->xb;?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>学历</td>
			<td>
			    <input type="text" name="info[xl]" value="<?php echo $info[0]->xl;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>行业</td>
			<td>
				<input type="text" name="info[hy]" value="<?php echo $info[0]->hy;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>职位</td>
			<td>
				<input type="text" name="info[zw]" value="<?php echo $info[0]->zw;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>工作单位</td>
			<td>
				<input type="text" name="info[gzdw]" value="<?php echo $info[0]->gzdw;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>所在部门</td>
			<td>
				<input type="text" name="info[szbm]" value="<?php echo $info[0]->szbm;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司性质</td>
			<td>
				<input type="text" name="info[gsxz]" value="<?php echo $info[0]->gsxz;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司员工规模</td>
			<td>
				<input type="text" name="info[gsgm]" value="<?php echo $info[0]->gsgm;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司是否为上市公司</td>
			<td>
				<input type="text" name="info[sfss]" value="<?php echo $info[0]->sfss;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司制造的产品</td>
			<td>
				<input type="text" name="info[gscp]" value="<?php echo $info[0]->gscp;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>公司年营业额</td>
			<td>
				<input type="text" name="info[gsyye]" value="<?php echo $info[0]->gsyye;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>您的个人年收入</td>
			<td>
				<input type="text" name="info[grsr]" value="<?php echo $info[0]->grsr;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>所在区域</td>
			<td>
				<input type="text" name="info[sf]" value="<?php echo $info[0]->sf;?>">
				<input type="text" name="info[cs]" style="margin-left:10px;" value="<?php echo $info[0]->cs;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>您的通信地址</td>
			<td>
				<input type="text" name="info[txdz]" value="<?php echo $info[0]->txdz;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>邮编</td>
			<td>
				<input type="text" name="info[yb]" value="<?php echo $info[0]->yb;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>您的固定电话</td>
			<td>
				<input type="text" name="info[gddh1]" style="width:150px;" value="<?php echo $info[0]->gddh1;?>">
				<input type="text" name="info[gddh2]" style="width:150px;margin-left:10px;" value="<?php echo $info[0]->gddh2;?>">
				<input type="text" name="info[gddh3]" style="width:150px;margin-left:10px;" value="<?php echo $info[0]->gddh3;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>手机</td>
			<td>
				<input type="text" name="info[sj]" value="<?php echo $info[0]->sj;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>MSN</td>
			<td>
				<input type="text" name="info[msn]" value="<?php echo $info[0]->msn;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>QQ</td>
			<td>
				<input type="text" name="info[qq]" value="<?php echo $info[0]->qq;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>头像</td>
			<td>
				<input type="file" name="tx" id="tx"><?php if($info[0]->tx!=''){?><a target="_blank" href="<?php echo $info[0]->tx;?>">点击预览</a><?php }?>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
	</div>
		<input type="hidden" name="id" value="<?php echo $info[0]->id;?>">
	</form>
</body>
</html>