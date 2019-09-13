<<<<<<< HEAD
<?php 
    
session_start();

$email=$_SESSION['email'];
$cur_password="";
$new_password1="";
$new_password2="";

$db = mysqli_connect('localhost', 'root', '', 'instamovies');
if (isset($_POST['change_password'])) {
    $cur_password = mysqli_real_escape_string($db, $_POST['cur_password']);
    $new_password1 = mysqli_real_escape_string($db, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($db, $_POST['new_password2']);

    $cur_password=md5($cur_password);
    $query = "SELECT * FROM tbl_users WHERE email='$email' AND password='$cur_password';";
    $result=mysqli_query($db, $query);
   

    if(mysqli_num_rows($result)==1){
        if($new_password1==$new_password2){
            $new_password1=md5($new_password1);
            $query="UPDATE tbl_users SET password = '$new_password1' WHERE email='$email'";
            mysqli_query($db, $query);
            header("location: account.php?successfully_changed");  
        }else{
            header("location: change_password.php?password_does not match");
        }
        
        
    }else{

        header("location: change_password.php?Incorrect_password");

        
    }
    
}
?>


=======
<?php 
    
session_start();

$email=$_SESSION['email'];
$cur_password="";
$new_password1="";
$new_password2="";

$db = mysqli_connect('localhost', 'root', '', 'instamovies');
if (isset($_POST['change_password'])) {
    $cur_password = mysqli_real_escape_string($db, $_POST['cur_password']);
    $new_password1 = mysqli_real_escape_string($db, $_POST['new_password1']);
    $new_password2 = mysqli_real_escape_string($db, $_POST['new_password2']);

    $cur_password=md5($cur_password);
    $query = "SELECT * FROM tbl_users WHERE email='$email' AND password='$cur_password';";
    $result=mysqli_query($db, $query);
   

    if(mysqli_num_rows($result)==1){
        if($new_password1==$new_password2){
            $new_password1=md5($new_password1);
            $query="UPDATE tbl_users SET password = '$new_password1' WHERE email='$email'";
            mysqli_query($db, $query);
            header("location: account.php?successfully_changed");  
        }else{
            header("location: change_password.php?password_does not match");
        }
        
        
    }else{

        header("location: change_password.php?Incorrect_password");

        
    }
    
}
?>


>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
