<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
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
<?php
if ($_SESSION['type']!= 'admin') {
  header("Location:login.php");
}
?>

<ul class="menu align-lift">
  <li><a href="newproduct.php">Add a new product</a></li>
  <li><a href="admin.php"><b>update existing product</b></a></li>
  <li><a href="viewproduct.php">view products</a></li>
  <li><a href="viewuser.php">View Users</a></li>
</ul>


<form method="POST" action="admin.php">

    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Hey Admin!</h3>
<br> <h4>Select category whose product you want to update</h4>

        <select name="faculty">
  <option value="cse" >CSE</option>
  <option value="bba" >BBA</option>
  <option value="nfs" >NFS</option>
  <option value="robotics" >Robotics</option>
  <option value="probook">Programming Books</option>
</select>
<input  type="submit" class="button" value="Go">
</form>
        <?php

        if (isset($_POST['faculty'])) {
         $ctg = $_POST['faculty'];
         $_SESSION['ctg'] = $ctg;
        
          $result = $mysqli->query("SELECT * from $ctg order by id asc");
          echo "<h2>Products showing from $ctg category...</h2>";
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<form method="POST" action="admin-update.php?id=';
              echo $obj->id;
              echo '">';
                
              echo '<div class="large-4 columns">';
              echo '<p><h3>current product name : '.$obj->product_name.'</h3></p>';
              echo '<input type="text" name="prdname" placeholder="new product name"/>';

              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              $_SESSION['product_code'] = $obj->product_code;
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<input type="text" name="prddesc" placeholder="new product description"/>';

              echo '<div class="large-6 columns" style="padding-left:0;">';
              
              echo '<p><strong>Product Quantity</strong>:</p>';
              echo '</div>';
              echo '<div class="large-6 columns">';
              echo '<input type="number" name="quantity"/>';
              echo '</div>';
              echo '<div class="large-12 columns" style="padding-left:0;">';
               echo '<p><strong>Price per unit</strong>:   '.$obj->price.'</p>';
               echo '<input type="number" name="price" placeholder="New price for this product"/>';

             
       
        echo '<p><input  type="submit" class="button"  name="submit" value="Update"></p>';

             echo '</form></div></div>';
            }
          }
        }
        ?>



        

      </div>
    </div>

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
