<?php
include 'header.php';

?>

<!DOCTYPE html>
<html>
<head>

<style>
.button {
  padding: 20px 250px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

	<title>Categories</title>
</head>
<body>


	<form method="GET" action="categories.php">
		<h3> Price Range Category </h3>
		<button class="button" type="submit" name="upto5">100-500</button>

		<button class="button" type="submit" name="upto10">500-1000</button>

	</form>

	<?php
	include 'config.php';
	require_once 'functions/function.php';
	if (isset($_GET["upto5"])) {

		showPriceCategory('500','cse');
		showPriceCategory('500','nfs');
		showPriceCategory('500','bba');
		showPriceCategory('500','probook');

	}


	elseif (isset($_GET["upto10"])) {

		showPriceCategory('1000','cse');
		showPriceCategory('1000','nfs');
		showPriceCategory('1000','bba');
		showPriceCategory('1000','probook');

	}
	
	else{

		showCategory('probook'); 
         showCategory('nfs');
         showCategory('bba');
         showCategory('cse');

	}

	?>

</body>
</html>