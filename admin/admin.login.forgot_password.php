<?php
include('assets/admin.login.forgot_password.logic.php');

if(!isset($_SESSION['admin_id'])){

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<!--Font Awesome CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

    <style>
        body {
          color:white;
          margin: 0;
          padding: 0;
          background: url("images/login_background.jpg");
          background-size: cover;
          font-family: sans-serif;
        }
        .forgot_password-page{
          width:450px;
          background-color:rgba(0,0,0,.5);
          border-radius:20px;
          top:50%;
          left:50%;
          position:absolute;
          transform:translate(-50%,-50%);
          padding: 20px 30px;
        }
    </style>

	</head>


  <body>
    <div class="forgot_password">
      <form class="forgot_password-page" role="form" autocomplete="off" class="form" method="post">
        
        <div style="text-align:center;">
          <h3><i class="fa fa-lock fa-4x"></i></h3>
          <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size:45px; margin-bottom:30px; border-bottom: 1px solid #FFF; text-align:center; padding-bottom:15px;">Forgot Password?</h2>
        </div>
        
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
          </div>
          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
        </div>
        
        <hr style="border-top:1px solid #FFF; margin-top:30px">

        <div style="text-align:center">
          <button name="reset-password" class="btn btn-danger btn-block" value="Reset Password" type="submit">Reset Password</button>
        </div>

      </form>
    </div>
                
                
    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

<?php
}
else{
  header('location:index.php');
}?>