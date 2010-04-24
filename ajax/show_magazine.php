<option url="" value=""></option>
<?php 
	include_once('../frame.php');
	$db = get_db();
	
	$year = intval($_POST['year']);
	if(!empty($year)){
		$magazine = $db->query("select * from fb_magazine where publish_data like '%$year%' order by publish_data");
		$count = $db->record_count;
		for($i=0;$i<$count;$i++){
	?>
	<option url="<?php echo $magazine[$i]->url;?>" value="<?php echo $magazine[$i]->id;?>"><?php echo $magazine[$i]->name;?></option>
	<?php			
		}
	}
?>