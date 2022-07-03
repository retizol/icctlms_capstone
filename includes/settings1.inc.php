<?php
include_once 'dbh.inc.php';
session_start();
$usrid = $_SESSION["userid"];
$usruid = $_SESSION["useruid"];
$usrcid = $_SESSION["usercid"];
$usrfname = $_SESSION["userfname"];
$usrlname = $_SESSION["userlname"];
$usremail = $_SESSION["useremail"];
