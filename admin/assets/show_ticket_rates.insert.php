<?php

$showID = $_POST['show'];
$seat_category = $_POST['seat_category'];
$full_rate_array = $_POST['full_rate'];
$kids_rate_array = $_POST['kids_rate'];

include_once ('../db_config.php');

$sql_check = "SELECT * FROM tbl_show_ticket_rates WHERE show_id = '$showID'";
$query_check=mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    for ($i=0; $i<sizeof($seat_category); $i++) {
        $full_price = floatval(preg_replace('/[^\d.]/', '', $full_rate_array[$i]));
        $sql_full = "INSERT INTO tbl_show_ticket_rates (show_id,ticket_category_id,ticket_type,ticket_price) VALUES ('$showID','$seat_category[$i]','Full','$full_price')";
        $db->query($sql_full);
        if ($kids_rate_array[$i]!="") {
            $kids_price = floatval(preg_replace('/[^\d.]/', '', $kids_rate_array[$i]));
            $sql_kids = "INSERT INTO tbl_show_ticket_rates (show_id,ticket_category_id,ticket_type,ticket_price) VALUES ('$showID','$seat_category[$i]','Kids','$kids_price')";
            $db->query($sql_kids);
        }
    }
    echo "success";
}

?>