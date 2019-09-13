<?php
include('assets/admin.login.forgot_password.reset_password.inc.php');

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
        .reset_password-page{
          width:550px;
          background-color:rgba(0,0,0,.5);
          border-radius:20px;
          top:50%;
          left:50%;
          position:absolute;
          transform:translate(-50%,-50%);
          padding: 20px 30px;
        }
        @media only screen and (max-width: 600px) {
          .reset_password-page {
            width:450px;
          }
        }
        .terms:hover {
          text-decoration:none;
        }
    </style>

	</head>


  <body>
    <div class="reset_password">
      <form  class="reset_password-page" method="POST" onSubmit = "return checkPassword(this)">

        <div style="text-align:center;">
          <h2 style="font-weight:400; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size:45px; margin-bottom:15px; border-bottom: 1px solid #FFF; text-align:center; padding-bottom:15px;">Reset Password</h2>
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
            <input class="form-control" type="password" name="new_password2" id="new_password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Retype New Password"required>
          </div>
        </div>
        
        <hr style="border-top:1px solid #FFF; margin:25px 0 20px">
        
        <div style="text-align:center">
          <button class="btn btn-danger btn-block" style="align-self:center"type="submit" name="change_password">Reset Password</button>
        </div>
          
      </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    

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
    
  </body>
</html>

<?php
}
else{
  header('location:index.php');
}?>