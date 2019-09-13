<<<<<<< HEAD
<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	 
	//$Image= trim($_POST['Image']);
	$theatre_name = trim($_POST['theatre_name']);
    $city = trim($_POST['city']);
    $address = trim($_POST['address']);
    $telephone = trim($_POST['telephone']);
    $email = trim($_POST['email']);
    $description = trim($_POST['description']);
    $image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $Facilities = trim($_POST['Facilities']);
    $status = trim($_POST['status']);
    

	 


	$query = "UPDATE tbl_theatres SET  
	 
	theatre_name =  '$theatre_name',
	city= '$city',
	address =  '$address',
	telephone =  '$telephone',
	email=  '$email',
	description = '$description',
    address =  '$address',
	Facilities=  '$Facilities',
	status=  '$status',
	 
 
	 
	if(isset($image)){
		$query .= ", image='$image' WHERE theatre_id = '$theatre_id'";
	} else {
		$query .= " WHERE theatre_id = '$theatre_id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?Movie_id=$Movie_id");
	}
=======
<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	 
	//$Image= trim($_POST['Image']);
	$theatre_name = trim($_POST['theatre_name']);
    $city = trim($_POST['city']);
    $address = trim($_POST['address']);
    $telephone = trim($_POST['telephone']);
    $email = trim($_POST['email']);
    $description = trim($_POST['description']);
    $image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $Facilities = trim($_POST['Facilities']);
    $status = trim($_POST['status']);
    

	 


	$query = "UPDATE tbl_theatres SET  
	 
	theatre_name =  '$theatre_name',
	city= '$city',
	address =  '$address',
	telephone =  '$telephone',
	email=  '$email',
	description = '$description',
    address =  '$address',
	Facilities=  '$Facilities',
	status=  '$status',
	 
 
	 
	if(isset($image)){
		$query .= ", image='$image' WHERE theatre_id = '$theatre_id'";
	} else {
		$query .= " WHERE theatre_id = '$theatre_id'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?Movie_id=$Movie_id");
	}
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
?>