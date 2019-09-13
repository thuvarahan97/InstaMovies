<?php include('assets/login.verification.inc.php'); ?>

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
        .login_verification .banner img {
          width:100%
        }
        .login_verification-page{
          max-width:450px;
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

    <div class="login_verification" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="font-size: 14px; color: #606978; font-family:sans-serif">
        
        <form  class="login_verification-page" method="POST">
          
          <div style="text-align:center; color:#3f3545;">
            <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #3f3545; font-size:45px; margin-bottom:15px; border-bottom: 1px solid #333333; text-align:center; padding-bottom:15px;">Verify Account</h2>
            <p style="margin:10px 0 20px; padding: 0px 0px 10px 0px !important;"><b>Enter the verification code that was sent to your email to verify your account.</b></p>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Verification Code: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="code" id="code" pattern="[A-Za-z0-9]{10}" placeholder="Verification Code" title=" A-Z, a-z, 0-9 only" maxlength="10" required>
            </div>
          </div>
          
          <hr style="margin:25px 0 20px;">
          
          <div style="text-align:center">
            <button class="btn btn-danger btn-block" type="submit" name="confirm">Verify & Login</button>
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