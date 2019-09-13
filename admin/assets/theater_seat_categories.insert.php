<?php

include_once ('../db_config.php');

$theatre_id = $_POST['theater'];
$category_id = $_POST['seat_category'];
$num_of_rows = $_POST['num_of_rows'];
$num_of_cols = $_POST['num_of_cols'];
$category_name = $_POST['category_name'];
$seatsArray = json_decode($_POST['seatsArray']);
$num_of_seats = $_POST['num_of_seats'];

$sql_check = "SELECT * FROM tbl_theater_seat_categories WHERE theatre_id = '$theatre_id' AND category_id = '$category_id'";
$query_check=mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    $sql_seat_category = "INSERT INTO tbl_theater_seat_categories (theatre_id,category_id,category_name,num_of_rows,num_of_columns,num_of_seats) VALUES ('$theatre_id','$category_id','$category_name','$num_of_rows','$num_of_cols','$num_of_seats')";
    $db->query($sql_seat_category);
    $seat_category_id = $db->insert_id;

    for ($x=0; $x<sizeof($seatsArray); $x++) {
        $seatRowNumbers = explode(',', $seatsArray[$x]);
        for ($y=0; $y<sizeof($seatRowNumbers); $y++) {
            $seatNumber = $seatRowNumbers[$y];
            $sql_seat_map = "INSERT INTO tbl_seat_maps (seat_category_id,seat_number) VALUES ('$seat_category_id','$seatNumber')";
            $db->query($sql_seat_map);
            echo "success";
        }
    }
}

?>