<<<<<<< HEAD
<?php 

session_start();
$errors = [];

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'instamovies');



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
    echo "Enter your registered Email Id";
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    echo "Your Are not registered to InstaMovies";
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100


  $query = "SELECT password FROM tbl_users WHERE email='$email'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_array($results);

  
  $x=$row["password"];
  $x=convert_uudecode($x);

 
 if (count($errors) == 0) {

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = " default password for password recovery to instamovies.com ";
    $msg = $x ;
    
    $headers = "From: info@examplesite.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }

  else{

  }
}






  




=======
<?php 

session_start();
$errors = [];

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'instamovies');



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
    echo "Enter your registered Email Id";
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    echo "Your Are not registered to InstaMovies";
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100


  $query = "SELECT password FROM tbl_users WHERE email='$email'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_array($results);

  
  $x=$row["password"];
  $x=convert_uudecode($x);

 
 if (count($errors) == 0) {

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = " default password for password recovery to instamovies.com ";
    $msg = $x ;
    
    $headers = "From: info@examplesite.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }

  else{

  }
}






  




>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
//?>