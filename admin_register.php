<<<<<<< HEAD
<?php include 'assets/admin_register.inc.php'; ?>


<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .signup-page {
        width:450px;
        left: 50%;
        margin:280px;
        position:absolute;
        transform: translateX(-50%);
        margin-top:30px;
        padding:0;
      }

      .signup-page .row{
        margin-right: 0px;
      }

      hr {
        border-top: 2px solid #f1f1f1;
        width:100%;
        margin-right:
        text-align:center;
        margin: 15px 0;
      }

      .terms:hover {
        text-decoration:none;
      }
    </style>
    
  </head>
  <body>

            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">


                            <script> 
          
                                // Function to check Whether both passwords 
                                // is same or not. 
                                function checkPassword(form) { 
                                    password1 = form.password.value; 
                                    password2 = form.repassword.value; 
                      
                                       
                                    if (password1 != password2) { 
                                        alert ("\nPassword did not match: Please try again...") 
                                        return false; 
                                    } 
                      
                                    // If same return True. 
                                    else{ 
                                        alert("Password Match: Welcome to InstaMovies!") 
                                        return true; 
                                    } 
                                }
                            </script>




                            <form class="signup-page" method="POST" onSubmit = "return checkPassword(this)">
                                             
                              

                              <div class="form-group row">
              <label class="col-sm-5" style="">First Name: <span style="color:red">*</span> </label>
              <input class="form-control col-sm-7" type="text" name="first_name" id="first_name" required>
          </div>
                              
                              
                            
          <div class="form-group row">
              <label class="col-sm-5" style="">Last Name <span style="color:red">*</span> </label>
              <input class="form-control col-sm-7" type="text" name="last_name" id="last_name" required>
          </div>

 

          <div class="form-group row">
              <label class="col-sm-5" style="">Mobile</label>
              <input class="form-control col-sm-7" type="text" name="mobile" id="mobile" pattern="[0-9]{10}" title="Only 10 digit number">
          </div>

          <div class="form-group row">
              <label class="col-sm-5" style="">Email Address <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
          </div>

              <div class="form-group row">
              <label class="col-sm-5" style="">Username <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="text" name="username" id="username" pattern="[A-Za-z0-9]{3,}" title="Three or more letter or number or composite" required>
          </div>


            <div class="form-group row">
              <label class="col-sm-5" style="">Password <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>

          <div class="form-group row">
              <label class="col-sm-5" style="">Confirm Password <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="repassword" id="repassword" required>
          </div>



            <div class="form-group row">
              <label class="col-sm-5" style="">Verification code for Theatre <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="verification_code"    pattern="[A-Za-z0-9]{7}" title="Only 7 characters" required>
          </div>


            <hr>
          
          <div style="margin-bottom:15px; text-align:center">
              <input type="checkbox" style="margin-right:10px" required>I agree to <a class="terms" href="terms.php">Terms and Conditions</a>
          </div>


        <div style="text-align:center">
              <button class="btn btn-danger" type="submit" name="register">Submit</button>
          </div>

          <br>
          <div style="text-align:left">
          <h4>Are You a registerd admin?</h4>
            <p> <a href="admin_login.php">Click here</a> to Sign in with InstaMovies.</p>
          </div>

      </form>













        </div>











                  

                                
                               
                                




            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
           

       

         
=======
<?php include 'assets/admin_register.inc.php'; ?>


<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .signup-page {
        width:450px;
        left: 50%;
        margin:280px;
        position:absolute;
        transform: translateX(-50%);
        margin-top:30px;
        padding:0;
      }

      .signup-page .row{
        margin-right: 0px;
      }

      hr {
        border-top: 2px solid #f1f1f1;
        width:100%;
        margin-right:
        text-align:center;
        margin: 15px 0;
      }

      .terms:hover {
        text-decoration:none;
      }
    </style>
    
  </head>
  <body>

            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">


                            <script> 
          
                                // Function to check Whether both passwords 
                                // is same or not. 
                                function checkPassword(form) { 
                                    password1 = form.password.value; 
                                    password2 = form.repassword.value; 
                      
                                       
                                    if (password1 != password2) { 
                                        alert ("\nPassword did not match: Please try again...") 
                                        return false; 
                                    } 
                      
                                    // If same return True. 
                                    else{ 
                                        alert("Password Match: Welcome to InstaMovies!") 
                                        return true; 
                                    } 
                                }
                            </script>




                            <form class="signup-page" method="POST" onSubmit = "return checkPassword(this)">
                                             
                              

                              <div class="form-group row">
              <label class="col-sm-5" style="">First Name: <span style="color:red">*</span> </label>
              <input class="form-control col-sm-7" type="text" name="first_name" id="first_name" required>
          </div>
                              
                              
                            
          <div class="form-group row">
              <label class="col-sm-5" style="">Last Name <span style="color:red">*</span> </label>
              <input class="form-control col-sm-7" type="text" name="last_name" id="last_name" required>
          </div>

 

          <div class="form-group row">
              <label class="col-sm-5" style="">Mobile</label>
              <input class="form-control col-sm-7" type="text" name="mobile" id="mobile" pattern="[0-9]{10}" title="Only 10 digit number">
          </div>

          <div class="form-group row">
              <label class="col-sm-5" style="">Email Address <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
          </div>

              <div class="form-group row">
              <label class="col-sm-5" style="">Username <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="text" name="username" id="username" pattern="[A-Za-z0-9]{3,}" title="Three or more letter or number or composite" required>
          </div>


            <div class="form-group row">
              <label class="col-sm-5" style="">Password <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          </div>

          <div class="form-group row">
              <label class="col-sm-5" style="">Confirm Password <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="repassword" id="repassword" required>
          </div>



            <div class="form-group row">
              <label class="col-sm-5" style="">Verification code for Theatre <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="verification_code"    pattern="[A-Za-z0-9]{7}" title="Only 7 characters" required>
          </div>


            <hr>
          
          <div style="margin-bottom:15px; text-align:center">
              <input type="checkbox" style="margin-right:10px" required>I agree to <a class="terms" href="terms.php">Terms and Conditions</a>
          </div>


        <div style="text-align:center">
              <button class="btn btn-danger" type="submit" name="register">Submit</button>
          </div>

          <br>
          <div style="text-align:left">
          <h4>Are You a registerd admin?</h4>
            <p> <a href="admin_login.php">Click here</a> to Sign in with InstaMovies.</p>
          </div>

      </form>













        </div>











                  

                                
                               
                                




            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
           

       

         
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
