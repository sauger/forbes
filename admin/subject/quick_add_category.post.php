<?php
	require '../../frame.php';
	$category_type= str_replace('list', '', $_POST['category']['category_type']);
	$c =  "name='" .$_POST['category']['name'] ."' and category_type='" .$category_type ."' and subject_id=" .$_POST['category']['subject_id'];
	$category = new table_class('smg_subject_category');
	if($category->find('all',array('conditions' => $c))){
		echo "<script>alert('分类已经存在');</script>";
		exit;
	}
	$category->update_attributes($_POST['category'],false);
	$category->category_type = $category_type;
	$category->save();
?>
<script>
	$('#category_id').append('<option selected="selected" value=<?php echo $category->id;?>><?php echo $category->name;?></option>');
</script>