<?php
    
	$theatre_id = $_GET['theatre_id'];
	include_once ('../db_config.php');

	$query = "DELETE FROM tbl_theatres WHERE theatre_id = '$theatre_id'";
	$result = mysqli_query($db, $query);
	if(!$result){
		exit;
	}
	header("Location: ../theaters.php");

?>