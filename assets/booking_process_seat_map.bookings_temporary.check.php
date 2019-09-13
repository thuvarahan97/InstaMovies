<?php
include_once ('../db_config.php');

$bookingTemporaryID = $_POST['booking_temporary_id'];

$sql_check_first = "SELECT * FROM tbl_bookings WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
$query_check_first=mysqli_query($db,$sql_check_first);
$rowCount_check_first = mysqli_num_rows($query_check_first);
if($rowCount_check_first == 0){
    $sql_check = "SELECT * FROM tbl_bookings_temporary WHERE id = '$bookingTemporaryID'";
    $query_check=mysqli_query($db,$sql_check);
    $rowCount_check = mysqli_num_rows($query_check);
    if($rowCount_check == 1){
        echo "success";
    }
}
?>