<?php
include_once ('db_config.php');

session_start();

if(!isset($_GET['user_id']) || empty($_GET['user_id'])){
    header('location: login.php');
}

if(isset($_SESSION['userID'])){
    header('location: index.php');
}

$user_id=$_GET['user_id'];
$code="";

if (isset($_POST['confirm'])) {

    $code= mysqli_real_escape_string($db, $_POST['code']);

    $query = "SELECT * FROM tbl_users WHERE `user_id`='$user_id' AND code='$code'";
    $result=mysqli_query($db, $query);
   
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);

        $query="UPDATE tbl_users SET status = 'active' WHERE `user_id`='$user_id'";
        mysqli_query($db, $query);
        
        $_SESSION['userID'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];

        header("location: assets/login.verification.success.php");
    }
    else{
        echo "<script>alert('Verification code is invalid!');</script>";
    }
}
?>