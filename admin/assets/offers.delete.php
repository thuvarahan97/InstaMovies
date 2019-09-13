<?php

	$offer_id = $_GET['offer_id'];

	include_once ('../db_config.php');
     
	$query = "DELETE FROM tbl_offers WHERE offer_id = '$offer_id'";
	$result = mysqli_query($db, $query);
	if(!$result){
		exit;
	}
	header("Location: ../offers.php");

?>