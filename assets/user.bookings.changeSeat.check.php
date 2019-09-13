<?php
session_start();

include_once ('../db_config.php');

$_SESSION['changedSeats'] = $_POST['changedSeats'];
$seats = json_decode($_POST['changedSeats']);

$x=0;
foreach ($seats as $seat){
    if($seat != ""){
        $sql_checkSeats = "SELECT * FROM `tbl_seat_maps` WHERE seat_category_id = '{$_SESSION['categoryID']}' AND seat_number = '{$seat}'";
        $result_checkSeats = mysqli_query($db,$sql_checkSeats);
        if(mysqli_num_rows($result_checkSeats) == 1){
            $sql_booking = "SELECT * FROM `tbl_bookings` WHERE show_id = '{$_SESSION['showID']}' AND showtime_id = '{$_SESSION['showtimeID']}' AND show_date = '{$_SESSION['showDate']}' AND ticket_category = '{$_SESSION['category']}' AND seat_number = '{$seat}'";
            $result_booking = mysqli_query($db,$sql_booking);
            if(mysqli_num_rows($result_booking) == 0){
                $x++;
            }
        }
    }else{
        $x++;
    }
}

echo $x;

?>