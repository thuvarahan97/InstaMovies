<?php include 'assets/register.inc.php';

if(isset($_SESSION['userID'])){
  header('location:index.php');
}else{
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
        .register .banner img {
          width:100%
        }
        .signup-page{
          max-width:500px;
          display:block;
          margin:auto;
        }
    </style>

	</head>


  <body>

    <!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

    <div class="register" style="padding-bottom:40px">
    
      <!--Banner Code - Start-->
      <div class="banner">
        <img src="images/banner.jpg?v=<?php echo time(); ?>">
      </div>
      <!--Banner Code - End-->
      
      <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:10px; padding-top:15px; text-align:center;">Register with InstaMovies</h2>
        <hr/> 
        <p style="margin: 10px 0 25px; padding: 0px 0px 10px 0px !important;"><b>To become a user of the website and to perform online transactions and amendments you have to be a registered user. Please fill out the following form with relevant and valid information.</b></p>
            
          <form class="signup-page" method="POST" onSubmit = "return checkPassword(this)">

            <div class="form-group row">
                <label class="col-sm-4" style="">First Name: <span style="color:red">*</span> </label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Last Name: <span style="color:red">*</span> </label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Mobile:</label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="mobile" id="mobile" pattern="[0-9]{10}" title="Only 10 digit number" placeholder="Mobile">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4" style="">Email Address: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" placeholder="Email Address" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Username: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="text" name="username" id="username" pattern="[A-Za-z0-9]{3,}" title="Three or more letter or number or composite" placeholder="Username" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Password: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-4" style="">Confirm Password: <span style="color:red">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Re-type Password" required>
                </div>
            </div>

            <hr/>

            <div style="margin-bottom:15px; text-align:center">
                <input type="checkbox" style="margin-right:10px" required>I agree to <a class="terms" href="terms_and_conditions.php" style="text-decoration:none;">Terms and Conditions</a>
            </div>

            <div style="text-align:center">
                <button class="btn btn-danger btn-lg" type="submit" name="register" style="padding:7px 20px">Submit</button>
            </div>

            <div style="margin:30px 0 0 0;">
              <a style="text-decoration:none;color:red" href="login.php">Have an account?</a>
            </div>

          </form>
        </div>
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
    // Function to check Whether both passwords 
    // is same or not. 
    function checkPassword(form) { 
        password1 = form.password.value; 
        password2 = form.repassword.value; 

        if (password1 != password2) { 
            alert ("Password didn't match. Please enter correct password!");
            return false; 
        }
        // If same return True. 
        else{
            return true; 
        } 
    }
    </script>

    <script>
			$(".site-footer .bottom-footer .footer-item-7").addClass("active");
    </script>
    
  </body>
</html>

<?php } ?>