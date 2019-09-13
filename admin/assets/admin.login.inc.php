<?php
include_once ('db_config.php');

session_start();

$email="";
$password="";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password);
        
        $query = "SELECT * FROM tbl_admins WHERE email = '$email' AND password = '$password' ";

        $results = mysqli_query($db,$query);

        if (mysqli_num_rows($results)==1){
            $row = mysqli_fetch_array($results);
            $_SESSION['admin_id']=$row['admin_id'];
            $_SESSION['username']=$row['username'];
            
            header('location: dashboard.php');

        }

    else{
            echo "<script>alert('Incorrect email and password combination try again');</script>";
    }
}

?>