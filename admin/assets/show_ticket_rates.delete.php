<?php

include_once ('../db_config.php');
$sql = "DELETE FROM tbl_show_ticket_rates WHERE show_id=".$_POST["id"];
$db->query($sql);

?>