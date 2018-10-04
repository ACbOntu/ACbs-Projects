<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
if ($_SESSION['type']!= 'admin') {
  header("Location:login.php");
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
         
<?php
           if(isset($_SESSION['email'])){
            echo '<li><a href="account.php">Admin</a></li>';
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


<ul class="menu align-lift">
  <li><a href="newproduct.php"><b>Add a new product</b></a></li>
  <li><a href="admin.php">update existing product</a></li>
  <li><a href="viewproduct.php">View Products</a></li>
  <li><a href="viewuser.php">View Users</a></li>
</ul>


<form method="POST" action="newinsert.php" enctype="multipart/form-data">

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Hey Admin!</h3>
<br> <h4>You can add a product...</h4>

        <select name="faculty">
  <option value="cse" >CSE</option>
  <option value="bba" >BBA</option>
  <option value="nfs" >NFS</option>
  <option value="robotics" >Robotics</option>
  <option value="probook">Programming Books</option>
</select>

<input type="text" name="product_name" placeholder="Product name" />;

<input type="text" name="product_code" placeholder="Product Code" />;
  <h5>Image for the product</h5>
<input type="file" name="image" />;


<input type="text" name="product_desc" placeholder="Product description" />;

<input type="number" name="quantity" placeholder="Product quantity" />;

<input type="number" name="price" placeholder="Product price" />;

<input  type="submit" class="button" value="Add" name="submit">
</form>






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
