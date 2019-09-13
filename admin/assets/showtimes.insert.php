<?php

include_once ('../db_config.php');

$show_id = $_POST['show'];
$n = count($_POST['showtime']);

$sql_check = "SELECT * FROM tbl_showtimes WHERE show_id = '$show_id'";
$query_check=mysqli_query($db,$sql_check);
$rowCount_check = mysqli_num_rows($query_check);
if($rowCount_check == 0){
    for ($t=0; $t<$n; $t++) {
        $time = date('H:i:s', strtotime($_POST['showtime'][$t]));
        $sql = "INSERT INTO tbl_showtimes (show_id,starting_time) VALUES ('$show_id','$time')";
        $db->query($sql);   
    }
    echo "success";
}

?>