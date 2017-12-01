<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="movies.css">
<!-- Bryan Serpa -->
<?php 
include 'functions.php';
getTitle();
?>
</head>

<body>
 <?php
 $value=$_GET["movie"];
 	//$value = "tmnt";
 	getBanner();
 	getHeader("$value/info.txt");
 	//main box
 	createMainBox($value);	 	
?>
 
<!--	
Complete this mix of PHP code to make your page <br> 
look like the screenshots on the specifications.<br>
-->

</body>
</html>