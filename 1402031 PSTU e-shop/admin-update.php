<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
if ($_SESSION['type']!= 'admin') {
  header("Location:login.php");
}

include 'config.php';
$table =  $_SESSION['ctg'];
$id = $_REQUEST['id'];
$name = $_POST['prdname'];
 $desc = $_POST['prddesc'];
 $quantity = $_POST['quantity'];
 $price = $_POST['price'];


 

      $update = $mysqli->query("UPDATE $table SET product_name = '$name' ,product_desc = '$desc',qty = '$quantity',price = '$price' WHERE id ='$id'");
             if($update){
              echo '<center><h1>Data Updated Successfully</h1></center>';
              header("Refresh:3; url=admin.php") ;   
   }


?>
