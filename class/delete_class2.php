<?php

include '../includes/dbh.inc.php';

if(isset($_GET['deleteclass_id'])){
	$class_id=$_GET['deleteclass_id'];

	$sql="DELETE from create_class where class_id=$class_id";
	$result=mysqli_query($conn,$sql);
	if($result){
		//echo "Deleted successfull";
		header('location:teacher_classes.php');
	}else{
		die(mysql_error($conn));
	}
}

?>
