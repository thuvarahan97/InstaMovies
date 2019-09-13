<?php 
session_start();
include_once ('db_config.php');

if(!isset($_SESSION['userID'])){
    $email="";
    $password="";

    if (isset($_POST['login'])) {

        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password);
        
        $query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password' ";

        $results = mysqli_query($db,$query);
        
        if (mysqli_num_rows($results)==1){
            
            $row = mysqli_fetch_array($results);

            if($row['status']=="inactive"){
                header("location:login.verification.php?user_id=".$row['user_id']);
            }else{
                $_SESSION['userID'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
            
                header("location:index.php");
                exit;
            }

        }else{
            echo "<script>alert('The email address or password that you have entered is incorrect. Check and try again.');</script>";
            
        }
    }
}
?>