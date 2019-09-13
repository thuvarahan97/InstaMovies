<?php
session_start();
include_once ('../db_config.php');

$ticketID = $_POST['ticketID'];

date_default_timezone_set("Asia/Colombo");

$sql_check = "SELECT * FROM tbl_bookings_publish WHERE ticket_id = '$ticketID'";
$query_check = mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    $sql_insert = "INSERT INTO tbl_bookings_publish (ticket_id, `user_id`) VALUES ('$ticketID', '{$_SESSION['userID']}')";
    $db->query($sql_insert);

    $sql_update = "UPDATE tbl_bookings SET `status` = '1' WHERE ticket_id = '$ticketID'";
    $db->query($sql_update);

    echo "success";
}

?>