<?php
include_once "../frame.php";
if(!is_ajax())die();
$db=get_db();
$records = $db->query("select * from fb_edm where edm_type='edm' order by created_at desc");
?>
往期福布斯精华查询
<select id="sel_list">
	<option>请选择</option>
<?php if($records) {?>
<?php foreach ($records as $v) { ?>
	<option value="<?php echo $v->file_name?>"><?php echo $v->name;?></option>
<?php }?>

<?php }?>
</select>
<script>
	$('#sel_list').change(function(){
		if($(this).val())
		location.href = "http://www.forbeschina.com/edm/" + $(this).val();
	});
</script>