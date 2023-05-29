<?php
include '../includes/dbh.inc.php';
$id = $_POST['id'];
$get_id = $_POST['get_id'];
mysqli_query($conn,"DELETE * FROM assignment WHERE assignment_id = '$id' AND class_id = '$get_id' ");
?>
