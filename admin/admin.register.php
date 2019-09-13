<?php
include 'assets/admin.register.inc.php';

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
        .signup-page {
          width:600px;
          background-color:rgba(0,0,0,.5);
          border-radius:20px;
          left:50%;
          position:absolute;
          transform:translateX(-50%);
          padding: 20px 30px;
          margin:30px 0;
        }
        @media only screen and (max-width: 600px) {
          .signup-page {
            width:450px;
          }
        }
    </style>

	</head>


  <body>
    <div class="register">

      <form class="signup-page" method="POST">
        <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white; font-size:48px; margin-bottom:30px; padding-top:15px; border-bottom: 1px solid #FFF; text-align:center; padding-bottom: 15px;">Register</h2>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">First Name: <span style="color:red">*</span> </label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" required>
            </div>
          </div>                    
          
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" style="">Last Name: <span style="color:red">*</span> </label>
              <div class="col-sm-8">
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" required>
              </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Mobile:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="mobile" id="mobile" maxlength="10" pattern="[0-9]{10}" title="Only 10 digit number" placeholder="Mobile">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Email Address: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" placeholder="Email Address" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Username: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="username" id="username" pattern="[A-Za-z0-9]{3,}" title="Three or more letter or number or composite" placeholder="Username" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Password: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Confirm Password: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Re-type Password" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-4 col-form-label" style="">Verification Code: <span style="color:red">*</span></label>
            <div class="col-sm-8">
              <input class="form-control" type="password" name="verification_code"  maxlength="7" pattern="[A-Z0-9]{7}" title="Only 7 characters" placeholder="Verification Code" required>
            </div>
          </div>

          <hr style="border-top:1px solid #FFF; margin-top:30px">
          
          <div style="margin-bottom:15px; text-align:center">
              <input type="checkbox" style="margin-right:10px" required>I agree to <a class="terms" href="terms_and_conditions.php" style="text-decoration:none;">Terms and Conditions</a>
          </div>

          <div style="text-align:center">
            <button class="btn btn-danger btn-lg" type="submit" name="register" style="padding:7px 20px">Submit</button>
          </div>

          <div style="margin:30px 0;">
            <a style="text-decoration:none;color:red" href="admin.login.php">Have an account?</a>
          </div>

        </form>
    </div>

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
              alert ("Password didn't match. Please enter correct password!") 
              return false; 
          } 

          // If same return True. 
          else{ 
              alert("Password is valid!") 
              return true; 
          } 
      }
    </script>

</body>
</html>

<?php
}
else{
  header('location:index.php');
}?>