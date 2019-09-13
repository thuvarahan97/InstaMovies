<?php

include_once ('../db_config.php');

$showtimeID_update = json_decode($_POST['showtimeID_update']);
$n = count($_POST['showtime_update']);

for ($t=0; $t<$n; $t++) {
    $starting_time_update = date('H:i:s', strtotime($_POST['showtime_update'][$t]));
    $ID = $showtimeID_update[$t];
    $sql = "UPDATE tbl_showtimes SET starting_time='$starting_time_update' WHERE showtime_id='$ID'";
    $db->query($sql);
}

?>