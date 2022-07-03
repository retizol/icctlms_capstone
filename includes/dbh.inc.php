<?php

//Connects to database

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "icctlms";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
