<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];
$email = $_POST["email"];
$interest = $_POST["interest"];
$pwd = $_POST["pwd"];


if($fname!=""){
  $result = $mysqli->query('UPDATE users SET fname ="'. $fname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($lname!=""){
  $result = $mysqli->query('UPDATE users SET lname ="'. $lname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($address!=""){
  $result = $mysqli->query('UPDATE users SET address ="'. $address .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($faculty!=""){
  $result = $mysqli->query('UPDATE users SET faculty ="'. $faculty .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}


if($email!=""){
  $result = $mysqli->query('UPDATE users SET email ="'. $email .'" WHERE id ='.$_SESSION['id']);
  if($result) {
  }
}


if($interest!=""){
  $result = $mysqli->query('UPDATE users SET interest ='. $interest .' WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if( $pwd!=""){
  $query = $mysqli->query('UPDATE users SET password ="'. $pwd .'" WHERE id ='.$_SESSION['id']);
  if($query){
  }
}

header("location:success.php");


?>
