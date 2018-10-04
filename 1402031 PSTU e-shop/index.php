<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION)){

session_start();

include 'config.php';
if (!isset($_SESSION['email'])) {

}
else{

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM users WHERE email = '$email' ");

if( $result->num_rows > 0){
  $obj = $result->fetch_object();
  $_SESSION['vstatus']= $obj->vstatus;
  if ($_SESSION['vstatus'] == 0) {
  echo "Your account is not verified.Please, Check your email & verify.";
}
else{
  echo "You are a verified user !";
}
}

}

}


?>


<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PSTU eShop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>

<body background="#000000">
<?php include 'header.php';

?>


<img src="images/front.jpg">
<center><button class="btn-success" style="margin-top: 15px"> <a href="products.php">Let's go</a></button> </center>


<footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; PSTU eShop. All Rights Reserved.</p>
        </footer>



	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>

  </html>