<?php
include('assets/login.forgot_password.reset_password.inc.php');

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
        .reset_password .banner img {
          width:100%
        }
        .reset_password-page{
          max-width:500px;
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


    <div class="reset_password" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="font-size: 14px; color: #606978; font-family:sans-serif">
        
        <form  class="reset_password-page" method="POST" onSubmit = "return checkPassword(this)">
          
          <div style="text-align:center; color:#3f3545;">
            <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #3f3545; font-size:45px; margin-bottom:15px; border-bottom: 1px solid #333333; text-align:center; padding-bottom:15px;">Reset Password</h2>
            <p style="margin:10px 0 20px; padding: 0px 0px 10px 0px !important;"><b>A confirmation code has been sent to your email. Please use that confirmation code to reset your password.</b></p>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" style="">Confirmation Code: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="text" name="code" id="code" pattern="[A-Za-z0-9]{10}" placeholder="Confirmation Code" title=" A-Z, a-z, 0-9 only"maxlength="10" required>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-5 col-form-label" style="">New Password: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="new_password1" id="new_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-5 col-form-label" style="">Confirm New Password: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="new_password2" id="new_password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Re-type New Password"required>
            </div>
          </div>
          
          <hr style="margin:25px 0 20px;">
          
          <div style="text-align:center">
            <button class="btn btn-danger btn-block" style="align-self:center"type="submit" name="change_password">Reset Password</button>
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

    <script>
      function checkPassword(form) { 
        password1 = form.new_password1.value; 
        password2 = form.new_password2.value; 

        if (password1 != password2) { 
          alert ("Password doesn't match. Please check and try again...") 
          return false; 
        } 
        // If same return True. 
        else{
          return true; 
        } 
      }
    </script>

    <script>
    if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
      window.location.href = "login.php";
    }
    </script>

  </body>
</html>

<?php
}else{
  header('location:index.php');
}
?>