<?php
include_once 'dbh.inc.php';
include_once 'session.php';
if (isset($_POST["uidsubmit"])) {
	$suid = $_POST["suid"];

  $sql = "UPDATE users SET usersUid=$suid WHERE users . usersId=$usrid;";
  mysqli_query($conn, $sql);

  header("Location: ../settings.php?update=success");
}
elseif (isset($_POST["esubmit"])) {
	$uemail = $_POST["smail"];

  $sqla = "UPDATE users SET usersEmail=$uemail WHERE usersId=$usrid;";
  mysqli_query($conn, $sqla);

  header("Location: ../settings.php?update=esuccess");
}
