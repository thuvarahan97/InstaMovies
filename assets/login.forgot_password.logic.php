<?php 
include_once ('db_config.php');

$n=10; 
function getName($n) { 
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randomString = ''; 

	for ($i = 0; $i < $n; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	} 

	return $randomString; 
}

?> 

<?php 
session_start();
$errors = [];

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM tbl_users WHERE email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    echo "<script>alert('Enter your email address!');</script>";
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    echo "<script>alert('Your are not registered with InstaMovies!');</script>";
    array_push($errors, "Sorry, no user exists in our system with that email");
  }
  // generate a unique random token of length 100


  $x = getName($n);
  $query = "UPDATE tbl_users SET code = '$x' WHERE email='$email'";
  $results = mysqli_query($db, $query);

 
  if (count($errors) == 0) {

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Password Recovery - InstaMovies";
    $msg = "We have just received your request to reset the password for your account. In order to reset password please use the confirmation code below. If you haven't ask for password reset service just ignore this message.";
    $msg .= 'Confirmation Code: '.$x;
    
    $headers = "From: support@instamovies.cf";
    mail($to, $subject, $msg, $headers);

    header('location: login.forgot_password.reset_password.php?email=' . $email);
  }
}

?>