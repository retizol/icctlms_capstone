<?php

if (isset($_POST["submit"])) {
	$CID = $_POST["CID"];
	$first = $_POST["first"];
	$last = $_POST["last"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	//Error condition statement for signup
	if (emptyInputSignup($CID, $first, $last, $email, $username, $pwd, $pwdRepeat) !== false) {
		header("Location: ../signupstudent.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false ) {
		header("Location: ../signupstudent.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !== false ) {
		header("Location: ../signupstudent.php?error=invalidEmail");
		exit();
	}
	if (pwdMatch($pwd, $pwdRepeat) !== false ) {
		header("Location: ../signupstudent.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn, $username, $email) !== false ) {
		header("Location: ../signupstudent.php?error=usernametaken");
		exit();
	}

	createUser($conn, $CID, $first, $last, $email, $username, $pwd);

}
else {
	header("Location: ../signupstudent.php");
	exit();
}
