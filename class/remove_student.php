<?php
include '../includes/dbh.inc.php';
$ids = $_POST['id'];
mysqli_query($conn,"DELETE FROM teacher_class_student WHERE teacher_class_student_id = '$ids'")or die(mysqli_error());
?>
