<?php

include_once ('../db_config.php');
$sql_1 = "DELETE FROM tbl_theater_seat_categories WHERE seat_category_id=".$_POST["id"];
$db->query($sql_1);

$sql_2 = "DELETE FROM tbl_seat_maps WHERE seat_category_id=".$_POST["id"];
$db->query($sql_2);

?>