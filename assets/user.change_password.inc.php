<?php 
include_once ('db_config.php');
session_start();

$userID=$_SESSION['userID'];
$cur_password="";
$new_password1="";
$new_password2="";

if (isset($_POST['change_password'])) {
    $cur_password = mysqli_real_escape_string($db, $_POST['cur_password']);
    $new_password1 = mysqli_real_escape_string($db, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($db, $_POST['new_password2']);

    $cur_password=md5($cur_password);
    $query = "SELECT * FROM tbl_users WHERE `user_id`='$userID' AND `password`='$cur_password'";
    $result=mysqli_query($db, $query);

    if(mysqli_num_rows($result)==1){
        if($new_password1==$new_password2){
            $new_password1=md5($new_password1);
            $query="UPDATE tbl_users SET password = '$new_password1' WHERE email='$email'";
            mysqli_query($db, $query);

            header("location: assets/user.change_password.success.php");

        }else{
            echo "<script>alert('Passwords do not match. Please check and try again...');</script>";
        }  
    }else{
        echo "<script>alert('Incorrect password! Check and try again.');</script>";        
    } 
}
?>