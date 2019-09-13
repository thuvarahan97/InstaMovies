<?php

include_once ('../db_config.php');

$showID_update = $_POST['showID_update'];
$starting_date_update = $_POST['start_date_update'];
$ending_date_update = $_POST['end_date_update'];

$sql = "UPDATE tbl_shows SET starting_date='$starting_date_update', ending_date='$ending_date_update' WHERE show_id='$showID_update'";
$db->query($sql);

?>