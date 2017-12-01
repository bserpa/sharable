
<?php

class DataBaseAdaptor {
	// The instance variable used in every one of the functions in class DatbaseAdaptor
	private $DB;
	// Make a connection to an existing data based named 'imdb_small' that has
	// table . In this assignment you will also need a new table named 'users'
	public function __construct() {
		$db = 'mysql:dbname=imdb_small;host=127.0.0.1; ; charset=utf8';
		$user = 'root';
		$password = '';
		try {
			$this->DB = new PDO ( $db, $user, $password );
			$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo ('Error establishing Connection');
			exit ();
		}
	}
	
	// Return all movie records with release date >= $year
	// as an associative array.
	public function getAllMoviesAfterYear($year) {//used as test
		$stmt = $this->DB->prepare
		( "SELECT * FROM movies WHERE year >= " . $year );
		$stmt->execute ();
		return $stmt->fetchAll ( PDO::FETCH_ASSOC );
	}
	
	
	public function getAllActors($string){ //table actors
		$stmt = $this->DB->prepare("Select * FROM actors WHERE first_name LIKE '%".$string."%' OR last_name LIKE '%".$string."%'");
		$stmt->execute();
		return $stmt->fetchAll( PDO::FETCH_ASSOC );
		
	}
	public function getAllRoles($string){
		$stmt = $this->DB->prepare("Select * FROM roles WHERE role LIKE '%".$string."%'");
		$stmt->execute();
		return $stmt->fetchAll( PDO::FETCH_ASSOC );
	}
	
	public function getAllMoviesAsArray() {//used as test
		$stmt = $this->DB->prepare( "SELECT * FROM movies" );
		$stmt->execute ();
		return $stmt->fetchAll( PDO::FETCH_ASSOC );
	}

	
	
	
	public function getAllMoviesAndRoles(){
		// TODO 1: Return an array containing all actors names, roles and movie title.
		$stmt = $this->DB->prepare("SELECT movies.name, actors.first_name, actors.last_name, roles.role FROM movies JOIN roles JOIN actors ON movies.id=roles.movie_id AND roles.actor_id=actors.id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

$theDBA = new DatabaseAdaptor ();
$arr = $theDBA->getAllMoviesAndRoles();
//print_r($arr);
// TODO 2: Write the code to print all movies immediately followed by all actors and their roles in
// that movie. This is where you need to handle "breaks" that occur when the next array element
// has a movie that is different, // echo the movie name followed by all actors in that movie.

//name
//first_name
//last_name
//role
$count = 1;//used to check # of movies!
for($i=0;$i<count($arr);$i++){
	if($i == 0){
		$current = $arr[0]['name'];
		echo $current.PHP_EOL;
	}
	else if($current != $arr[$i]['name']){
		$current = $arr[$i]['name'];
		$count++;
		echo PHP_EOL.PHP_EOL.$current.PHP_EOL;
	}
	echo "  ".$arr[$i]['first_name']." ".$arr[$i]['last_name']."----".$arr[$i]['role'].PHP_EOL;
}
//echo $count;//check!!!
?>