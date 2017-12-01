<!DOCTYPE html>
<html>
<head>
<!-- Your Name -->
<title>Movie Reviews</title>
<meta charset="utf-8" />
<link href="movies.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php
include 'functions.php';
$folder = $_GET['movie'];
echo 'info.text, overview.png, and reviews are in ' . oneReview($folder);
?>

<h4>Please use this file name so we can load this page with</h4>

<p>http://localhost/movies/review.php?movie=<?=$folder?></p>


</body>
</html>