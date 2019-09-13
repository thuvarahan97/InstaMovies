<?php
include_once ('../db_config.php');

$movie_id = $_POST['movie'];
$theatre_id = $_POST['theater'];
$starting_date = $_POST['start_date'];
$ending_date = $_POST['end_date'];

$sql_check = "SELECT * FROM tbl_shows WHERE theatre_id = '$theatre_id' AND movie_id = '$movie_id'";
$query_check=mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    $sql = "INSERT INTO tbl_shows (theatre_id,movie_id,starting_date,ending_date) VALUES ('$theatre_id','$movie_id','$starting_date','$ending_date')";
    $db->query($sql);
    echo "success";
}

// $show_id = $db->insert_id;

// $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id = '$movie_id'";
// $result_movie = $db->query($sql_movie);
// $row_movie = $result_movie->fetch_assoc();

// $sql_theatre = "SELECT * FROM tbl_theatres WHERE theatre_id = '$theatre_id'";
// $result_theatre = $db->query($sql_theatre);
// $row_theatre = $result_theatre->fetch_assoc();

// echo "<td id='row_num_column'></td>";
// echo "<td id='show_id_column'>{$show_id}</td>";
// echo "<td>{$row_movie['movie_name']}</td>";
// echo "<td>{$row_theatre['theatre_name']} - {$row_theatre['city']}</td>";
// echo "<td>{$starting_date}</td>";
// echo "<td>{$ending_date}</td>";
// echo "<td id='action_column'><button type='button' align='center' class='edit_button'><i class='fa fa-edit'></i></button><button type='button' class='delete_button'><i class='fa fa-trash'></i></button></td>";

?>