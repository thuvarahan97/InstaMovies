<<<<<<< HEAD
<?php
session_start();
unset($_SESSION['email']);

session_destroy();
header("location:login_admin.php");

=======
<?php
session_start();
unset($_SESSION['email']);

session_destroy();
header("location:login_admin.php");

>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
?>