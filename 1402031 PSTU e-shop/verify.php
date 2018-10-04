<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$email = $_POST["email"];
$password = sha1($_POST["pwd"]);
$flag = 'true';
$result = $mysqli->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

if( $result->num_rows > 0){
  $obj = $result->fetch_object();
  if ($obj->type== 'admin') {
    echo "Logged in as Admin";
    $_SESSION['email'] = $obj->email;
    $_SESSION['type'] = $obj->type;
    header("location:newproduct.php");
  }
  else{
  echo 'login successfull';
  $_SESSION['email'] = $obj->email;
  $_SESSION['type'] = $obj->type;
  $_SESSION['id'] = $obj->id;
  $_SESSION['fname'] = $obj->fname;
  $_SESSION['faculty'] = $obj->faculty;
  $_SESSION['interest'] = $obj->interest;
  $_SESSION['vstatus'] = $obj->vstatus;
  header("location:index.php");}
}else{
  echo 'email and password combination is not correct';
}
?>
