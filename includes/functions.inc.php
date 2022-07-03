<?php

/*
For detailed information, visit w3schools.com/php
stmt = statement
init = initialize
conn = connect
*/

//Empty form
function emptyInputSignup($CID, $first, $last, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($first) || empty($last) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

//Invalid username
//preg_match() function returns whether a match was found in a string
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

//Invalid email
//filter_var() function filters a variable with the specified filter
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

//Password match
function pwdMatch($pwd, $pwdRepeat) {
	$result;
	if ($pwd !== $pwdRepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

//Signup and login form
//mysqli_stmt_init() function initializes a statement and returns an object suitable for mysqli_stmt_prepare()
//fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.
//for mysqli_stmt_bind_param visit https://www.w3schools.com/php/php_mysql_prepared_statements.asp
$host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		if($host == '../signupteacher.php') {
    	header("Location: ../signupteacher.php?error=usernametaken");
		}
		else {
    	header("Location: ../signupstudent.php?error=usernametaken");
		}
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

//Insert user info
function createUser($conn, $CID, $first, $last, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersCID, usersFName, usersLName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql) ) {
		if($host == '../signupteacher.php') {
    	header("Location: ../signupteacher.php?error=stmtfailed");
		}
		else {
    	header("Location: ../signupstudent.php?error=stmtfailed");
		}
		exit();
	}

	//Hashes the password to be more secure
	$hashedPwd = password_hash("$pwd", PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssssss", $CID, $first, $last, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	if($host == '../signupteacher.php') {
		header("Location: ../signupteacher.php?error=none");
	}
	else {
		header("Location: ../signupstudent.php?error=none");
	}
	exit();
}
//Empty form
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


//Login function
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username);

	if ($uidExists === false) {
		header("Location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	//Checks if the password are the same
	if ($checkPwd === false) {
		header("Location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		//Starts a new session
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["usercid"] = $uidExists["usersCID"];
		$_SESSION["userfname"] = $uidExists["usersFName"];
		$_SESSION["userlname"] = $uidExists["usersLName"];
		$_SESSION["useremail"] = $uidExists["usersEmail"];

		header("Location: ../dashboard.php");
		exit();
	}
}
