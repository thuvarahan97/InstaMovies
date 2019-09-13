<?php
include_once ('db_config.php');

session_start();

$email=$_SESSION['email'];
$code="";

if (isset($_POST['confirm'])) {

    $code= mysqli_real_escape_string($db, $_POST['code']);

    $query = "SELECT * FROM tbl_users WHERE email='$email' AND code='$code'";
    $result=mysqli_query($db, $query);
   
    if(mysqli_num_rows($result)==1){
        $query="UPDATE tbl_users SET status = 'active' WHERE email='$email'";
        mysqli_query($db, $query);
        
        header("location: assets/register.success.php");
    }
    else{
        echo "<script>alert('Verification code is invalid!');</script>";
    }
}
?>