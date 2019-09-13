<?php 
include_once ('db_config.php');

session_start();

if(!isset($_GET['email'])){
    header('location:index.php');
}

$email=$_GET['email'];
$code="";
$new_password1="";
$new_password2="";

if (isset($_POST['change_password'])) {
    $code = mysqli_real_escape_string($db, $_POST['code']);
    $new_password1 = mysqli_real_escape_string($db, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($db, $_POST['new_password2']);

    $cur_password=md5($cur_password);
    
    $query = "SELECT * FROM tbl_admins WHERE email='$email' AND code='$code'";
    $result=mysqli_query($db, $query);
   
    if(mysqli_num_rows($result)==1){
        if($new_password1==$new_password2){
            $new_password1=md5($new_password1);
            $query="UPDATE tbl_admins SET password = '$new_password1' WHERE email='$email' AND code='$code'";
            mysqli_query($db, $query);
            echo
            "<script>
                alert('Successfully reset password!');          
            </script>";
            header("location:admin.login.php?successfully_reset_password");
        }else{
            echo "<script>alert('Password does not match. Check and try again!');</script>";
        }
    }else{
        echo "<script>alert('Confirmation code is invalid!');</script>";
    }
}
