<?php

// if ($_SESSION['type']!= 'admin') {
//   header("Location:login.php");
// }
include 'config.php';
$faculty = $_POST['faculty'];
$code = $_POST['product_code'];
$name = $_POST['product_name'];
$desc = $_POST['product_desc'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];


try {
		
		$uploaded_file = $_FILES['image']['name'];
		
		
		$file_basename = substr($uploaded_file, 0, strripos($uploaded_file, '.')); // strip extention
		$file_ext = substr($uploaded_file, strripos($uploaded_file, '.')); // strip name
		$f1 = '1'. $file_ext;
				

if(($file_ext!='.png')&&($file_ext!='.jpg')) {
			throw new Exception('Image must be png or jpg');
		}
		$f1 = $uploaded_file;
			
		move_uploaded_file($_FILES['image']['tmp_name'], 'images/products/'.$f1);
		}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}


 $insert = $mysqli->query("INSERT INTO $faculty (product_code,product_name,product_desc,product_img_name,qty,price) VALUES ('$code','$name','$desc','$f1','$quantity','$price')");
 if ($insert) {
 	echo "<h2> A product has been added successfully ! Redirecting...</h2>";
  header("Refresh: 4; url=admin.php");
 }
?>