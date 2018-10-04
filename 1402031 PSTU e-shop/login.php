<?php

if(session_id()=='' || !isset($_SESSION)){
	session_start();
}

if(isset($_SESSION["email"]))
{
	header("location:index.php");
}

include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in || PSTU eShop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	
</head>
<body>

 

<form method="POST" action="verify.php" style="margin-top: 50px">
	<div class="row">
		<div class="small-8">
			<div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Email</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="acbontu@gmail.com" name="email">
            </div>
          </div>
	
<div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd">
            </div>
          </div>

           <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; padding: 10px">

              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; padding: 10px">
          </div>
      </div>



</form>




<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
</body>
</html>
