<?php
include_once 'dbh.inc.php';
include_once '../session.php';
if (isset($_POST["uidsubmit"])) {
	$suid = $_POST["suid"];
	if (empty($suid)) {
		header("Location: ../settings.php?status=emptyuid");
		die();
	}
	else {
		$sql = "UPDATE users SET usersUid = '$suid' WHERE usersId=$usrid;";
	  mysqli_query($conn, $sql);

	  header("Location: ../settings.php?status=uidchange");
		die();
	}
}
elseif (isset($_POST["namesubmit"])) {
	$slname = $_POST["slname"];
	$sfname = $_POST["sfname"];
	if (!empty($slname) && !empty($sfname)) {
		$sqls = "UPDATE users SET usersLName= '$slname', usersFName= '$sfname' WHERE usersId=$usrid;";
	  mysqli_query($conn, $sqls);
		header("Location: ../settings.php?status=flup");
	} if (!empty($sfname) && empty($slname)) {
		$sqlf = "UPDATE users SET usersFName= '$sfname' WHERE usersId=$usrid;";
	  mysqli_query($conn, $sqlf);
		header("Location: ../settings.php?status=fup");
	} if (!empty($slname) && empty($sfname)) {
		$sqll = "UPDATE users SET usersLName= '$slname' WHERE usersId=$usrid;";
	  mysqli_query($conn, $sqll);
		header("Location: ../settings.php?status=lup");
	}
	if(empty($slname) && empty($sfname)) {
		header("Location: ../settings.php?status=emptyfl");
	}
  //header("Location: ../settings.php");
}


elseif (isset($_POST["pwdsubmit"])) {
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	//$hashed_password = password_hash($old_password, PASSWORD_DEFAULT);

	//var_dump($hashed_password);
	$sqlp = mysqli_query($conn,"SELECT * FROM users WHERE usersId = '$usrid'");
	$rows = mysqli_fetch_array($sqlp);
	$passwords = $rows['usersPwd'];
	if (password_verify($old_password, $passwords)) {
		if ($new_password === $confirm_password) {
			$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
			$sqlph = "UPDATE users SET usersPwd= '$hashed_password' WHERE usersId=$usrid;";
		  mysqli_query($conn, $sqlph);
			header("Location: ../password.php?error=none");
		}else {
			header("Location: ../password.php?error=newpassdontmatch");
		}
	}else {
		header("Location: ../password.php?error=oldpassdontmatch");
	}



	}

elseif (isset($_POST["esubmit"])) {
	$uemail = $_POST["smail"];

	if (!empty($uemail)) {
		$sqla = "UPDATE users SET usersEmail= '$uemail' WHERE usersId=$usrid;";
	  mysqli_query($conn, $sqla);
		header("Location: ../settings.php?status=eup");
	}
	else {
		header("Location: ../settings.php?status=emptyemail");
	}

}
