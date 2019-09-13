<?php
include_once ('../db_config.php');

$showID = $_POST['showID'];
$showDate = $_POST['showDate'];
$showtimeID = $_POST['showtimeID'];
$seatsID = explode(',', $_POST['selectedSeatsID']);

date_default_timezone_set("Asia/Colombo");

$paymentTime = time();
$bookingTime = date('Y-m-d H:i:s', $paymentTime);

for($i=0; $i<sizeOf($seatsID); $i++) {
    $sql_check = "SELECT * FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatsID[$i]'";
    $query_check=mysqli_query($db,$sql_check);
    $row_check = mysqli_fetch_array($query_check);
    $rowCount_check = mysqli_num_rows($query_check);
    if($rowCount_check == 0){
        $sql_insert = "INSERT INTO tbl_bookings_temporary (`timestamp`,show_id,show_date,showtime_id,seat_id) VALUES ('$bookingTime','$showID','$showDate','$showtimeID','$seatsID[$i]')";
        $db->query($sql_insert);
    }
}

?>