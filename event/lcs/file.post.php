<?php 
include_once('../../frame.php');

if(!is_post()){
	redirect('/error/'); 
	die();
}


if(empty($_FILES['word']['name'])){
	alert("请上传填好的WORD文档");
	redirect('word.html'); 
	die();
}


$docx = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
$doc = 'application/msword';
echo $_FILES['word']['type'];
if($_FILES['word']['type']!=$docx && $_FILES['word']['name']!=$doc){
	alert("请上传填好的WORD文档");
	redirect('word.html'); 
	die();
}
if($_FILES['word']['size']>200000){
	alert("WORD文档太大，请修改后重新上传");
	redirect('word.html'); 
	die();
}

$ip = $_SERVER["REMOTE_ADDR"];
$db = get_db();
$db->query("select * from lcs_word where ip='$ip'");
if($db->record_count<4){
	$lcs = new table_class('lcs_word');
	$lcs->ip = $ip;
	$lcs->created_at = now();
	
	$upload = new upload_file_class();
	$upload->save_dir = "/upload/lcs/";
	$word = $upload->handle('word');
	
	if($word === false){
		alert('上传文档失败 !');
		redirect($_SERVER['HTTP_REFERER']);
		die();
	}
	$lcs->url = "/upload/lcs/{$word}";
	$lcs->save();
	
	alert('上传成功');
	redirect($_SERVER['HTTP_REFERER']);
}else{
	alert('一个IP只能上传3次，请不要重复上传');
	redirect($_SERVER['HTTP_REFERER']);
}
?>