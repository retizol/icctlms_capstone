<?php 

$conn= new mysqli('localhost', 'root', '', 'class_3rdsem2022');

if(!$conn){
    die(mysql_error($con));
}

if(isset($_GET['deleteclass_name'])){
	$class_name=$_GET['deleteclass_name'];

	$sql="delete from `teacher_class_student` where class_name=$class_name";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "Deleted successfull";
		header('location:student_classes.php');
	}else{
		die(mysql_error($con));
	}
}

?>