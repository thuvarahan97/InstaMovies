<?php 
include_once ('db_config.php');

session_start();

$username="";
$password="";
$repassword="";
$first_name="";
$last_name="";
$email="";
$mobile="";
$verification_code="";

//registering user
if (isset($_POST['register'])) {
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $repassword = mysqli_real_escape_string($db, $_POST['repassword']);
    $first_name=mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name=mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $verification_code = mysqli_real_escape_string($db, $_POST['verification_code']);
    
    $query1 = "SELECT * FROM tbl_admins WHERE email = '$email'";

    $results = mysqli_query($db,$query1);

    $query2 = "SELECT * FROM tbl_admins WHERE username = '$username'";

    $results1 = mysqli_query($db,$query2);

    $query3 = "SELECT * FROM tbl_admin_verification WHERE verification_code = '$verification_code'";

    $results3 = mysqli_query($db,$query3);

    if ((mysqli_num_rows($results)==0) and (mysqli_num_rows($results1)==0)){
        if (mysqli_num_rows($results3)==1){
        
            $password =md5($password );
            $query = "INSERT INTO tbl_admins (username,password,first_name,last_name,email,mobile,verification_code) VALUES('$username','$password','$first_name','$last_name','$email','$mobile','$verification_code')";
            mysqli_query($db, $query);

            $query = "DELETE FROM tbl_admin_verification WHERE verification_code='$verification_code'"; 
            mysqli_query($db, $query);

            $to = $email;
            $subject = "Admin Registration - InstaMovies";
            $msg = 'Thanks for creating an admin account with InstaMovies!';
            $msg .= 'Visit '.'www.admin.instamovies.cf';
            
            $headers = "From: support@instamovies.cf";
            mail($to, $subject, $msg, $headers);

            header('location: admin.login.php');
        }
        else{
            echo ("Verification code is invalid.");
        }
   
    }
    else {
        echo "<script>alert('The entered email address or username already exists. Try again with another email address or username.');</script>";
    }      
}

?>