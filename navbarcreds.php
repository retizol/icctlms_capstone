<?php
$navget= mysqli_query($conn, "SELECT * FROM users WHERE usersId = '$usrid'");
$rows = mysqli_fetch_array($navget);
$lastn = $rows['usersLName'];
$firstn = $rows['usersFName'];
$uuid = $rows['usersUid'];
$emails = $rows['usersEmail'];
 ?>
