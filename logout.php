<<<<<<< HEAD
<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['username']);
header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
=======
<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['username']);
header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
?>