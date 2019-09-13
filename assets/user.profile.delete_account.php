<?php
session_start();
include_once ('../db_config.php');

$sql = "DELETE FROM tbl_users WHERE `user_id`='{$_SESSION['userID']}'";
$db->query($sql);

?>