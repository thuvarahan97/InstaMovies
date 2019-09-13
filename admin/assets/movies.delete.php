<?php
include_once ('../db_config.php');

$movie_id = $_GET['movie_id'];     
	$query = "DELETE FROM tbl_movies WHERE movie_id = '$movie_id'";
	$result = mysqli_query($db, $query);
	if(!$result){
		exit;
	}
	header("Location: ../movies.php");
?>
 