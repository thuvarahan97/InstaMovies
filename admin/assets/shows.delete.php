<?php

include_once ('../db_config.php');
$sql = "DELETE FROM tbl_shows WHERE show_id=".$_POST["id"];
$db->query($sql);

?>