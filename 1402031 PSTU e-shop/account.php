<?php 

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["email"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';
include 'header.php';
?>

<html class="no-js" lang="en">
  
  <body>



<div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p><?php echo '<h3>Hi ' .$_SESSION['fname'] .' !!</h3>'; ?></p>

        <p><h4>Account Details</h4></p>

        <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
      </div>
    </div>


<?php
 $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }

 if($result) {
                  $obj = $result->fetch_object();
                  echo '<br><h3 style= "margin-left:150px"> Your name: '.$obj->fname.' '.$obj->lname. '<br>Address: '. $obj->address.'<br>Faculty: '.$obj->faculty.'<br>E-mail: '.$obj->email.'<br>Interest: '.$obj->interest.'<br>Password: '.$obj->password.  ' .</h3>';
}
?>


    <form method="POST" action="update.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-12">

          <div class="row">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns end">
              <?php
              $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }


                if($result) {
                  $obj = $result->fetch_object();
                echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Last Name</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Address</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->address. '" name="address">';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Faculty</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->faculty. '" name="faculty">';
                  echo '</div>';
                  echo '</div>';

                  

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Email</label>';
                  echo '</div>';

                  echo '<div class="small-8 columns end">';


                  echo '<input type="email" id="right-label" placeholder="'. $obj->email. '" name="email">';

                  echo '</div>';
                  echo '</div>';


                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Interest</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->interest. '" name="interest">';

                  echo '</div>';
                  echo '</div>';



              }



              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Password</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="password" id="right-label" name="pwd">';

              echo '</div>';
              echo '</div>';
          ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>



    <div class="row" style="margin-top:30px;">
      <div class="small-12">

      <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
