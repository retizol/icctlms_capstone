<?php
include '../includes/dbh.inc.php';
$get_id = $_POST['id'];
mysqli_query($conn,"DELETE from class_quiz  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
mysqli_query($conn,"DELETE from create_class  where  class_id = '$get_id' ")or die(mysqli_error());
mysqli_query($conn,"DELETE from teacher_class_student  where  class_id = '$get_id' ")or die(mysqli_error());
//mysqli_query($conn,"DELETE from teacher_class_announcements  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
//mysqli_query($conn,"DELETE from teacher_notification  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
//mysqli_query($conn,"DELETE from class_subject_overview where  teacher_class_id = '$get_id' ")or die(mysqli_error());
header('location: teacher_classes.php');
?>
