<?php
	// session_start();
	include_once ('db_config.php');

    if(isset($_POST['add'])){

		$name = trim($_POST['name']);
		$name = mysqli_real_escape_string($db, $name);
				
		$start_date = trim($_POST['start_date']);
		$start_date = mysqli_real_escape_string($db, $start_date);

		$end_date = trim($_POST['end_date']);
		$end_date = mysqli_real_escape_string($db, $end_date);

		$description = trim($_POST['description']);
	    $description = mysqli_real_escape_string($db, $description); 

		$image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

		$banner = addslashes(file_get_contents($_FILES["banner"]["tmp_name"]));
		 
        $query="INSERT INTO tbl_offers (name,start_date ,end_date,description,image,banner) VALUES('$name','$start_date', '$end_date','$description','$image','$banner')";
    
        if(mysqli_query($db,$query)){
        	header("location: offers.php");
        
        } 

	}
?>
 