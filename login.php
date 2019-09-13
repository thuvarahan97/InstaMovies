<!doctype html>
<?php include 'assets/login.inc.php'; ?>
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
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f;}

 {box-sizing: border-box}

/* Full-width input fields */


input[type=text]:focus, input[type=password],input[type=email] :focus {
  
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 5px 20px;
  margin: 2px -70px;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.login-page {
        width:450px;
        left: 50%;
        margin:0;
        position:absolute;
        transform: translateX(-50%);
        margin-top:30px;
        padding:0;
        border: 1px;
      }

.login-page .row{
        margin-right: 0px;
      }



/* Add padding to container elements */
.container {
  padding: 90px;
  margin: 0px 150px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}



.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;

}






/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
    
  </head>
  <body>

     <head>
        <title>Login-InstaMovies</title>

            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                                
                                <form class="login-page" method="POST">

                                    <div class="login-header margin-bottom-30">
                                        <h2>Login to InstaMovies</h2>
                                    </div>

                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            
                                        </span>
                                        
                                        <input placeholder="email" class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
                                    </div>

                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input placeholder="Password" name="password" class="form-control" type="password" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <button class="btn btn-primary pull-right" type="submit"  name="login">Login</button>
                                            
                                        </div>

                                    </div>
                                    <hr>

                                   

                                    <h4>Are You a new user?</h4>
                                    <p> <a href="register.php">Click here</a> to Sign up with InstaMovies.</p>

                                    <h4>Forget Your Password?</h4>
                                    <p> <a href="forgotpassword.php">Click here</a> reset your password to InstaMovies.</p>
                                    
                                    
                                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['HTTP_REFERER'] ?>">

                                </form>
                            </div>
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>
            












   

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>