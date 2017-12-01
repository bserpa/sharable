<?php

include 'model.php';
$check=$_GET['check'];
$string=$_GET['inp'];

if($check == 1){
		
	$roles = new DatabaseAdaptor();
	$arr=$roles->getAllRoles($string);
	echo json_encode($arr);
}

else{
	$actors = new DatabaseAdaptor();
	$arr =  $actors->getAllActors($string);
	echo json_encode($arr);
}





?>