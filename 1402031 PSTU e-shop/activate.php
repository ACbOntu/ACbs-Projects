<?php
include 'header.php';
include 'config.php';

$token = $_GET['token'];
if (!isset($_GET['token'])) {
	header("location: login.php");
}
if ($token == null || $token == "") {
	header("location: login.php");
}

$query = $mysqli->query("SELECT * FROM users WHERE token= '$token' ");

$total = $query->num_rows;

if($total > 0 ) 
{ 
		$mysqli->query("UPDATE users SET vstatus = 1 WHERE token = '$token' ");
		$mysqli->query("UPDATE users SET token = null WHERE token = '$token' ");
		echo "Your email has been verified ,now login to system.";
		require_once 'components/login.php';
}else
{
	echo "You have entered invlid token";

}

	?>