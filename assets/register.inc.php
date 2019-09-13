<?php 
include_once ('db_config.php');
session_start();

function getName($n) { 
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
  $randomString = ''; 

  for ($i = 0; $i < $n; $i++) { 
    $index = rand(0, strlen($characters) - 1); 
    $randomString .= $characters[$index]; 
  } 

  return $randomString; 
}



$username="";
$password="";
$repassword="";
$first_name="";
$last_name="";
$email="";
$mobile="";
$x="";

//registering user
if (isset($_POST['register'])) {
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $repassword = mysqli_real_escape_string($db, $_POST['repassword']);
    $first_name=mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name=mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    


    $query1 = "SELECT * FROM tbl_users WHERE email = '$email'";

    $results = mysqli_query($db,$query1);

    $query2 = "SELECT * FROM tbl_users WHERE username = '$username'";

    $results1 = mysqli_query($db,$query2);

    if ((mysqli_num_rows($results)==0) and (mysqli_num_rows($results1)==0)){
        $x=getName(10);

        $password =md5($password );
        $query = "INSERT INTO tbl_users (username,password,first_name,last_name,email,mobile,status,code)
                VALUES('$username','$password','$first_name','$last_name','$email','$mobile','inactive','$x')";
        
        mysqli_query($db, $query);
        
        $_SESSION['email'] = $email;

        $to = $email;
        $subject = "User Registration - Verification";
        $msg = 'Thanks for creating an account with InstaMovies! Please verify your account by using the verification code below.';
        $msg .= 'Verification Code: '.$x;
        
        $headers = "From: support@instamovies.cf";
        mail($to, $subject, $msg, $headers);

        header('location: register.verification.php?email=' . $email);
    }
    else {
      echo "<script>alert('The entered email address or username already exists. Try again with another email address or username.');</script>";
    }       
}

?>