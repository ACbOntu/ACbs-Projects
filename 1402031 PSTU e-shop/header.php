<?php
ob_start();
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>


<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PSTU eShop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>

<body>
	

<nav class="top-bar" data-topbar role="navigation">
	<ul class="title-area">
        <li class="name">
          <h1><a href="index.php">PSTU eShop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>
 <section class="top-bar-section">
      <ul class="right">
      	  <li><a href="products.php">All Products</a></li>
          <li><a href="categories.php">Categories</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
<?php
           if(isset($_SESSION['email'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
	</ul>
</section>
</nav>



<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
</body>


</html>