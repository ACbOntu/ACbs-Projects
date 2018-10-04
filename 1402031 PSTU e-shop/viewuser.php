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
  <li><a href="admin.php">update existing product</a></li>
  <li><a href="viewproduct.php">view products</a></li>
  <li><a href="viewuser.php"><b>View Users</b></a></li>
</ul>

<table  style="width:100%">
  
  <tr>
    
    <td> <b>First name</b></td>
    <td> <b>Last name</b></td>
    <td><b> Address</b></td>
    <td><b> Faculty</b></td>
    <td><b> E-mail</b></td>
    <td><b> Interest</b></td>
    
  </tr>


<?php

$user = $mysqli->query("SELECT * from users");
if ($user) {
  $x=0;
while ($obj = $user->fetch_object()) {
  $x++;
  echo '<tr>';
echo '<td>'.$x.'. '.$obj->fname;
echo '</td> ';
echo '<td>'.$obj->lname;
echo '</td> ';
echo '<td>'.$obj->address;
echo '</td> ';
echo '<td>'.$obj->faculty;
echo '</td> ';
echo '<td>'.$obj->email;
echo '</td> ';
echo '<td>'.$obj->interest;
echo '</td> ';

echo '</tr>';

}


}

?>

</table>


<h3>To delete any user,give the user email here.</h3>
<form method="POST" action="viewuser.php">
  <input type="email" name="emailid" placeholder="something@gmail.com">
  <input type="submit" name="submit" class="button" value="Delete">

</form>

<?php
if (isset($_POST['submit'])) {

$emailid = $_POST['emailid'];
$delete = $mysqli->query("DELETE FROM users WHERE email='$emailid'");
if ($delete) {
  echo "Successfully deleted!";
  // header("Location:viewinsert.php");
}

  
}
?>







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