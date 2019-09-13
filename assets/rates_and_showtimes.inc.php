<?php 

$db = new mysqli("localhost","root","","instamovies");

$select_movie = "SELECT * FROM tbl_movies WHERE `status` = 1";
$query_movie=mysqli_query($db,$select_movie);
$rowCount_movie = mysqli_num_rows($query_movie);
$options_movie='';
$movie_id='';
if($rowCount_movie > 0){
    while($row = $query_movie->fetch_assoc()){
        $movie_id=$row['movie_id'];
        $options_movie = $options_movie.'<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
    }
}


if(isset($_POST["movie_id_1"]) && !empty($_POST["movie_id_1"])){
    $movieID = mysqli_real_escape_string($db,$_POST["movie_id_1"]);
    $query_date = $db->query("SELECT * FROM tbl_movies WHERE movie_id='$movieID'");
    $rowCount_date = $query_date->num_rows;
    $startDate='';
    if($rowCount_date > 0){
        while($row = $query_date->fetch_assoc()){
            $startDate=$row['starting_date'];
            if($startDate>date('Y-m-d')){
                echo $startDate;
            }else{
                echo date('Y-m-d');
            }
        }
    }
}


if(isset($_POST["sel_date"]) && isset($_POST['movie_id']) && !empty($_POST["sel_date"]) && !empty($_POST['movie_id'])){
    $movieID = mysqli_real_escape_string($db,$_POST['movie_id']);
    $sel_Date = mysqli_real_escape_string($db,date($_POST['sel_date']));
    $query_theatre = $db->query("SELECT A.*, B.theatre_name, B.city FROM tbl_shows A, tbl_theatres B WHERE A.theatre_id = B.theatre_id AND A.movie_id='$movieID' AND A.starting_date<='$sel_Date' AND A.ending_date>='$sel_Date'");
    $rowCount_theatre = $query_theatre->num_rows;
    
    if($rowCount_theatre > 0){
        echo '<option value="">Select Theatre</option>';
        while($row = $query_theatre->fetch_assoc()){ 
            echo '<option value="'.$row['theatre_id'].'">'.$row['theatre_name'].' - '.$row['city'].'</option>';
        }
    }else{
        echo '<option value="">Theatres not available</option>';
    }
}




?>