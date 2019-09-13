<?php
include('assets/user.change_password.inc.php');

if(isset($_SESSION['userID'])){

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
        .change_password .banner img {
          width:100%
        }
        .change_password-page{
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


    <div class="change_password" style="padding-bottom:40px;">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="font-size: 14px; color: #606978; font-family:sans-serif">
        
        <form  class="change_password-page" method="POST" onSubmit = "return checkPassword(this)">
          
          <div style="text-align:center; color:#3f3545; padding-bottom:10px">
            <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: #3f3545; font-size:45px; margin-bottom:15px; border-bottom: 1px solid #333333; text-align:center; padding-bottom:15px;">Change Password</h2>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-5">Current Password: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="cur_password" id="cur_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Current Password" required>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-5 col-form-label">New Password: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="new_password1" id="new_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-5 col-form-label">Confirm New Password: <span style="color:red">*</span></label>
            <div class="col-sm-7">
              <input class="form-control" type="password" name="new_password2" id="new_password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Re-type New Password"required>
            </div>
          </div>
          
          <hr style="margin:25px 0 20px;">
          
          <div style="text-align:center">
            <button class="btn btn-danger btn-block" style="align-self:center" type="submit" name="change_password">Change Password</button>
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
      function checkPassword(form) { 
        password1 = form.new_password1.value; 
        password2 = form.new_password2.value; 

        if (password1 != password2) { 
          alert ("Passwords do not match. Please check and try again...");
          return false; 
        }
        else{
          return true;
        } 
      }
    </script>

  </body>
</html>

<?php
}else{
  header('location:index.php');
}
?>