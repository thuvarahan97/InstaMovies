<?php
include_once ('../db_config.php');

$showID = $_POST['showID'];
$showDate = $_POST['showDate'];
$showtimeID = $_POST['showtimeID'];
$seatsID = explode(',', $_POST['selectedSeatsID']);

for($j=0; $j<sizeOf($seatsID); $j++) {
    $sql_check = "SELECT * FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatsID[$j]'";
    $query_check=mysqli_query($db,$sql_check);
    $row_check = mysqli_fetch_array($query_check);
    $rowCount_check = mysqli_num_rows($query_check);
    if($rowCount_check > 0){
        $sql_delete = "DELETE FROM tbl_bookings_temporary WHERE show_id = '$showID' AND show_date = '$showDate' AND showtime_id = '$showtimeID' AND seat_id = '$seatsID[$j]'";
        $db->query($sql_delete);
    }
}

?>