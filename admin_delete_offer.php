<<<<<<< HEAD
<?php
    
    
	$offer_id = $_GET['offer_id'];

	function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "instamovies");
    if(!$conn){
      echo "Can't connect database " . mysqli_connect_error($conn);
      exit;
    }
    return $conn;
  }
	$conn = db_connect();
     
	$query = "DELETE FROM tbl_offers WHERE offer_id = '$offer_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_book_offer.php");
?>
=======
<?php
    
    
	$offer_id = $_GET['offer_id'];

	function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "instamovies");
    if(!$conn){
      echo "Can't connect database " . mysqli_connect_error($conn);
      exit;
    }
    return $conn;
  }
	$conn = db_connect();
     
	$query = "DELETE FROM tbl_offers WHERE offer_id = '$offer_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_book_offer.php");
?>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
