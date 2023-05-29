<?php
include('../includes/dbh.inc.php');
if (isset($_POST['backup_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysqli_query($conn,"DELETE FROM quiz where quiz_id='$id[$i]'");
	mysqli_query($conn,"DELETE FROM class_quiz where quiz_id='$id[$i]'");
	mysqli_query($conn,"DELETE FROM quiz_question where quiz_id='$id[$i]'");
}
header("location: teacher_quiz.php");
}
?>
