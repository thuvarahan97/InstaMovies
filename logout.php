<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['username']);
header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
?>