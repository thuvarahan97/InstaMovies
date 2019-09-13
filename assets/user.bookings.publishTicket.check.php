<?php
session_start();
include_once ('../db_config.php');

$ticketID = $_POST['ticketID'];

date_default_timezone_set("Asia/Colombo");

$sql_check = "SELECT * FROM tbl_bookings_publish WHERE ticket_id = '$ticketID'";
$query_check = mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    echo "success";
}

?>