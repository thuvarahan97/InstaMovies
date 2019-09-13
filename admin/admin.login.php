<?php include 'assets/admin.login.inc.php'; 

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
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		
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
        .login-page{
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
    <div class="login">
    
      <form class="login-page" method="POST">
        <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white; font-size:48px; margin-bottom:30px; padding-top:15px; border-bottom: 1px solid #FFF; text-align:center; padding-bottom: 15px;">Login</h2>
        
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email:</label>
          <div class="col-sm-9">
            <input placeholder="Email" class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Password:</label>
          <div class="col-sm-9">
            <input placeholder="Password" name="password" class="form-control" type="password" required>
          </div>
        </div>

        <hr style="border-top:1px solid #FFF; margin-top:30px">

        <div style="text-align:center;">
          <button class="btn btn-danger btn-lg" type="submit" name="login" style="padding:7px 20px">Login</button>
        </div>
        

        <div style="margin:30px 0;">
          <a style="text-decoration:none;color:red" href="admin.login.forgot_password.php">Forgot your password?</a>
          <br/>
          <a style="text-decoration:none;color:red" href="admin.register.php">Don't have an account?</a>
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
  header('location:dashboard.php');
}?>