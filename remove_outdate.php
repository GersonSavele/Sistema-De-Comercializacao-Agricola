<?php 
include 'setting/system.php';

if(isset($_POST['remove'])){
	$id=$_POST['selector'];
    $N = count($id);
	for($i=0; $i < $N; $i++)
	{
		 $query = $db->query("DELETE FROM outdate where id ='$id[$i]'");
	}
    header("location: manage-outdate.php");
}
?>
