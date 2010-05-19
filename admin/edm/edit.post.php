<?php
include_once '../../frame.php';
$table = new table_class('fb_edm');
$id = intval($_POST['id']);
if($id){
	$table->find($id);
}
$table->update_attributes($_POST['post'],false);
if(!$table->id){
	$table->created_at = now();
	$new = true;
}
$table->save();
if($new){
	$table->file_name = $table->edm_type ."_" .$table->id .".html";
	$table->save();
	static_edm($table->edm_type,$table->file_name);
}
