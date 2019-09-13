<?php include 'assets/login.inc.php';

if(!isset($_SESSION['userID'])){

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
        .login .banner img {
          width:100%
        }
        .login-page{
          max-width:450px;
          display:block;
          margin:auto;
        }
    </style>

	</head>


  <body>

    <!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <div class="login" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        
        <form class="login-page" method="POST">
          <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #3f3545; font-size:48px; margin-bottom:30px; padding-top:15px; border-bottom: 1px solid #333333; text-align:center; padding-bottom: 15px;">Login</h2>
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
          <hr style="margin-top:30px">
          <div style="text-align:center;">
            <button class="btn btn-danger btn-lg" type="submit" name="login" style="padding:7px 20px">Login</button>
          </div>
          
          <input type="hidden" name="return_url" value="<?php echo $_SERVER['HTTP_REFERER'] ?>">

          <div style="margin:30px 0 0 0;">
            <a style="text-decoration:none;color:red" href="login.forgot_password.php">Forgot your password?</a>
            <br/>
            <a style="text-decoration:none;color:red" href="register.php">Don't have an account?</a>
          </div>
        
        </form>
      </div>
    </div>


    <!--Footer Code - Start-->
    <?php include('footer.php') ?>
    <!--Footer Code - End-->


    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


    <script>
      $(".header_wrapper .main_menu_wrapper .item-9").addClass("active");
			$(".site-footer .bottom-footer .footer-item-6").addClass("active");
		</script>

  </body>
</html>

<?php
}else{
  header('location:index.php');
}
?>