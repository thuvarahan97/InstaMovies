<?php
session_start();
include_once ('../db_config.php');

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$mobile = $_POST['mobile'];

$sql = "UPDATE tbl_users SET first_name='$firstname', last_name='$lastname', mobile='$mobile' WHERE `user_id`='{$_SESSION['userID']}'";
$db->query($sql);

?>