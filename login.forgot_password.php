<?php
include('assets/login.forgot_password.logic.php');

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
		
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<title>InstaMovies</title>

    <style>
        .forgot_password .banner img {
          width:100%
        }
        .forgot_password-page{
          max-width:400px;
          display:block;
          margin:auto;
          margin-top:30px;
        }
    </style>

	</head>


  <body>

    <!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <div class="forgot_password" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        
        <form class="forgot_password-page" role="form" autocomplete="off" class="form" method="post">
          
          <div style="text-align:center; color:#3f3545;">
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #3f3545; font-size:45px; margin-bottom:30px; border-bottom: 1px solid #333333; text-align:center; padding-bottom:15px;">Forgot Password?</h2>
          </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
          </div>

          <hr style="margin:25px 0 20px;">
          
          <div style="text-align:center">
            <button name="reset-password" class="btn btn-danger btn-block" value="Reset Password" type="submit">Reset Password</button>
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