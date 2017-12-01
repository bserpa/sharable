<?php
// Your Name
//
// Suggested decomposition of the problem:
// Complete these two functions and test them, one at a time.
//
// Run these methods that are included into functionsTest.php 
// by running functionsTest as a CLI application
// You should see meaningless code output in the console.
//
// The output can be loaded in an HTML page to its rendering.
//
// Feel free to add more helpr functions to make your 
// server-side processing with PHP simpler and cleaner 
// through the use of well-tested functions.
//
/*function oneReview($folder) {
  // Recommended: Test this function separately
  $result = 'Found folder: ' . getcwd () . '/' . $folder . '/' . PHP_EOL;
  $result .= 'Replace me with HTML that shows one styled review. ';
  return $result;
}

function definitionList($folder) {
  // Recommended: Test this function separately
  $result = 'Found folder: ' . getcwd () . '/' . $folder . '/' . PHP_EOL;
  $result .= "Replace this with output of HTML code to generate the styled definition list";
  return $result;
}

function getAllReviewsInATable($dir) {
	echo $dir;
	$result .= "";
	$array = scandir ( $dir );
	for($i = 0; $i < count ( $array ); $i++) {
		if (substr ( $array [$i], 0, 6 ) === "review") {
			$result .= "<tr><td>" . $array [$i] . "</td></tr>";
		}
	}
	$result .= "</table>";	
	return $result;
}*/
function getTitle(){
	$value=$_GET["movie"];
	//$value="tmnt";
	$arr = file("$value/info.txt");
	echo '<title> '.$arr[0] . ' - Rancid Tomatoes</title>';
}

function getBanner(){
	echo '<div class="pageBanner"> 	<img src="images/rancidbanner.png" alt="Rancid Tomatoes"> </div>'.PHP_EOL;
}

function getHeader($dir){
	$info = file($dir);
	echo '<h1 class="heading">'.$info[0].'('.$info[1].')</h1>'.PHP_EOL;
	return;
}


function createMainBox($dir){
	$info = file("$dir/info.txt");
	echo '<div class= "mainBox">
			<div class="boxBanner">
			<img src="images/rottenlarge.png" alt="Rotten" style="float:left;border-radius:25px 0px 0px 0px;"/>'.$info[2].'%
			</div>'.PHP_EOL.'					
			<div>
			<img src="'.$dir.'/overview.png" alt="general overview" style="float:right;border-radius:0px 25px 0px 0px;" />
			</div>'.PHP_EOL;
	//getting reviews
	echo getReviews($dir).PHP_EOL;
	echo getTable($dir).PHP_EOL;
	echo '</div>'.PHP_EOL;
	
	
}


function getReviews($dir) {
	$files = scandir(getcwd().'//'.$dir);
	$revs = array();
	for($i=5;$i<count($files);$i++) //5th value is always first review
		array_push($revs, $files[$i]);
	//first column
	$result = '<div class="revCol">';
	for($i=0;$i<count($revs)/2;++$i){
		$rev = file("$dir/$revs[$i]");
		$result .= '<p class="quote">
			<img src="images/rotten.gif" alt="'.$rev[1].'" style="float:left;" /> <q>'.$rev[0].'</q>
			</p>
			<p>
			<img src="images/critic.gif" alt="Critic" style="float:left;"/>'.$rev[2].'<br />'.$rev[3].'
			</p>';
	}
	//second column
	$result .= '</div><div class="revCol">';
	for($i=$i;$i<count($revs);++$i){
		$rev = file("$dir/$revs[$i]");
		$result .= '<p class="quote">
			<img src="images/rotten.gif" alt="'.$rev[1].'" style="float:left;" /> <q>'.$rev[0].'</q>
			</p>
			<p>
			<img src="images/critic.gif" alt="Critic" style="float:left;"/>'.$rev[2].'<br />'.$rev[3].'
			</p>';
	}
	$result.= '</div>';
	return $result;
}

function getTable($dir){
	$overview = file("$dir/overview.txt");
	//print_r($overview);
	//initiate table
	$result = '<div class="list"> <dl>';
	for($i=0;$i<count($overview);$i++)
		$result .= getTableText($overview[$i]);
	//end table
	$result .= '</dl> </div>';
	return $result;
}

function getTableText($str){
	$before = strchr($str, ":",TRUE);
	$after = substr(strchr($str, ":"),1);
	//echo "here ".$before.PHP_EOL.$after;
	$result = '<dt>'.$before.'</dt><dd>'.$after.'</dd>';
	return $result;
}



?>