<?php
require_once 'header.php';
require_once 'config.php';

require_once 'functions/function.php';


?>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || PSTU eShop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>


 <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          if (!isset($_SESSION['faculty'])) {
          showCategory('probook'); 
         showCategory('nfs');
         showCategory('bba');
         showCategory('cse');
          }

          else{


            if(strtolower($_SESSION['faculty']) == 'cse')
        {
          echo '<h2> According to your faculty,we are suggesting... </h2>';
          showCategory('cse');
          echo "<br>";
          showCategory('bba');
          showCategory('nfs');
        }
       elseif (strtolower($_SESSION['faculty']) == 'bba') {
        echo '<h2> According to your faculty,we are suggesting... </h2>';
         showCategory('bba');
         echo "<br>";
         showCategory('nfs');
         showCategory('cse');
       }

        elseif (strtolower($_SESSION['faculty']) == 'nfs') {
          echo '<h2> According to your faculty,we are suggesting... </h2>';
         showCategory('nfs');
         echo "<br>";
         showCategory('bba');
         showCategory('cse');
       }

       
       
       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
       if (strtolower($_SESSION['interest']) == 'programming') {
        
        echo '<h2> According to your interest,we are suggesting... </h2>';
         showCategory('probook');

       }

       elseif (strtolower($_SESSION['interest']) == 'robotics') {
        
        echo '<h2> According to your interest,we are suggesting... </h2>';
         showCategory('robotics');

       }



          }
        
       
         
      
          
          ?>











    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
