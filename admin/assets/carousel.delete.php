<?php
include_once ('../db_config.php');

$sql = "DELETE FROM tbl_carousel WHERE id=".$_POST["id"];
$db->query($sql);

?>