<?php


include 'config.php';
include 'header.php';
require_once  'functions/function.php';



$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];
$email = $_POST["email"];
$interest = $_POST["interest"];
$pwd = sha1($_POST["pwd"]);
$token = generateRandomString(50);


$query = $mysqli->query("INSERT INTO users (fname, lname, address, faculty, email,interest, password, token) VALUES('$fname', '$lname', '$address', '$faculty', '$email','$interest', '$pwd', '$token')");

//$_SESSION['pwd'] = $pwd;

//if($query){
	//echo 'Data inserted';
	//echo '<br/>';
//}
//header ("location:gmail.php");

?>
<?php

// Import PHPMailer classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//Load composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);                             // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                // Disable verbose debug output. To enable give 1, 2
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     
    $mail->SMTPAuth = true;                             
    $mail->Username = 'acbontu@gmail.com';            // You enter your gamil us
    $mail->Password = 'acbontu2018';                // Gmail password
    $mail->SMTPSecure = 'tls';                          
    $mail->Port = 587;                                    

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom($mail->Username, 'PSTU eShop');         // Your gmail username and name
    $mail->addAddress($email,$fname);     // Recioient gmail username and name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verify your account';
    $mail->Body    = "Welcome to our <b>eShop.</b>Please,Click on below link to activate your account     http://localhost/PSTU%20e-shop/activate.php?token=$token";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->send()) {

        echo ('
                <div>
                <h2 style="text-align:center; background: slateblue; color: white; margin-top: 5% ">Message has been sent to your Email.Please,check it & verify your account.</h2>
                </div>
            ');
    };
    
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

echo '<center><a href="login.php" class="success button" style="margin-top: 5%"> Login Now </a></center>';

?>



