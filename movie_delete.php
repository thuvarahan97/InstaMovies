<<<<<<< HEAD
<?php
    
    
	$movie_id = $_GET['movie_id'];

	function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "instamovies");
    if(!$conn){
      echo "Can't connect database " . mysqli_connect_error($conn);
      exit;
    }
    return $conn;
  }
	$conn = db_connect();
     
	$query = "DELETE FROM tbl_movies WHERE movie_id = '$movie_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: movie_admin.php");
?>
=======
<?php
    
    
	$movie_id = $_GET['movie_id'];

	function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "instamovies");
    if(!$conn){
      echo "Can't connect database " . mysqli_connect_error($conn);
      exit;
    }
    return $conn;
  }
	$conn = db_connect();
     
	$query = "DELETE FROM tbl_movies WHERE movie_id = '$movie_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: movie_admin.php");
?>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
 