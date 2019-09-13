<?php
include_once ('../db_config.php');

$showID = $_POST['showID'];
$showDate = $_POST['showDate'];
$showtimeID = $_POST['showtimeID'];
$seatID = $_POST['seatID'];

$sql_check = "SELECT * FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
$query_check=mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check > 0){
    $sql = "DELETE FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatID'";
    $db->query($sql);
}
?>