<?php
include_once ('../db_config.php');

$showID = $_POST['showID'];
$showDate = $_POST['showDate'];
$showtimeID = $_POST['showtimeID'];
$seatID = $_POST['seatID'];

date_default_timezone_set("Asia/Colombo");

$paymentTime = time();
$bookingTime = date('Y-m-d H:i:s', $paymentTime);

$sql_check_first = "SELECT * FROM tbl_bookings WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
$query_check_first=mysqli_query($db,$sql_check_first);
$rowCount_check_first = mysqli_num_rows($query_check_first);
if($rowCount_check_first == 0){
    $sql_check = "SELECT * FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
    $query_check=mysqli_query($db,$sql_check);
    $row_check = mysqli_fetch_array($query_check);
    $rowCount_check = mysqli_num_rows($query_check);
    if($rowCount_check == 0){
        $sql_insert = "INSERT INTO tbl_bookings_temporary (`timestamp`,show_id,show_date,showtime_id,seat_id) VALUES ('$bookingTime','$showID','$showDate','$showtimeID','$seatID')";
        $db->query($sql_insert);
        
        echo ($db->insert_id);
    }
    // else{
    //     date_default_timezone_set("Asia/Colombo");
    //     if((time() - strtotime($row_check['timestamp'])) > 10*60) {
    //         $sql_delete = "DELETE FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
    //         $db->query($sql_delete);

    //         $sql_insert_new = "INSERT INTO tbl_bookings_temporary (show_id,show_date,showtime_id,seat_id) VALUES ('$showID','$showDate','$showtimeID','$seatID')";
    //         $db->query($sql_insert_new);

    //         echo $db->insert_id;
    //     }
            
    // }
}
?>