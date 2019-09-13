<?php
	include_once ('../db_config.php');

    if(isset($_POST['add'])){
		$movie_name = trim($_POST['movie_name']);
		$movie_name = mysqli_real_escape_string($db, $movie_name);

		$year = trim($_POST['year']);
		$year = mysqli_real_escape_string($db, $year);
		
		$category = trim($_POST['category']);
		$category = mysqli_real_escape_string($db, $category);

		$language = trim($_POST['language']);
		$language = mysqli_real_escape_string($db, $language);
		
		$casts = trim($_POST['casts']);
		$casts = mysqli_real_escape_string($db, $casts);
		
		$director = trim($_POST['director']);
	    $director = mysqli_real_escape_string($db, $director);
		
		$release_date = trim($_POST['release_date']);
		$release_date = mysqli_real_escape_string($db, $release_date);

		$running_time_hours = trim($_POST['running_time_hours']);
		$running_time_minutes = trim($_POST['running_time_minutes']);
		$running_time_seconds = trim($_POST['running_time_seconds']);
		$running_time = date('H:i:s', strtotime($running_time_hours.":".$running_time_minutes.":".$running_time_seconds));
		$running_time = mysqli_real_escape_string($db, $running_time);

        $synopsis = trim($_POST['synopsis']);
	    $synopsis = mysqli_real_escape_string($db, $synopsis);
        
        $trailer_url = trim($_POST['trailer_url']);
		$trailer_url = mysqli_real_escape_string($db, $trailer_url);

        $poster=addslashes(file_get_contents($_FILES["poster"]["tmp_name"]));
        
		$banner=addslashes(file_get_contents($_FILES["banner"]["tmp_name"]));

		//$wallpaper=addslashes(file_get_contents($_FILES["wallpaper"]["tmp_name"]));

		$status = trim($_POST['status']);
		$status = mysqli_real_escape_string($db, $status);
     
		$starting_date = trim($_POST['starting_date']);
		$starting_date= mysqli_real_escape_string($db, $starting_date);

		$ending_date = trim($_POST['ending_date']);
		$ending_date= mysqli_real_escape_string($db, $ending_date);
		 
        $query="INSERT INTO tbl_movies (movie_name,`year`,category,`language`,casts,director,release_date,running_time,synopsis,trailer_url,poster,banner,`status`,starting_date,ending_date) VALUES('$movie_name','$year','$category', '$language','$casts','$director','$release_date','$running_time','$synopsis','$trailer_url','$poster','$banner','$status','$starting_date','$ending_date')";
		mysqli_query($db,$query);
		
        header('Location: ../movies.php');
	}
?>