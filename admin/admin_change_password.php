<?php include('assets/admin_change_password.inc.php'); ?>



                        <script> 

                            function checkPassword(form) { 
                              password1 = form.new_password1.value; 
                              password2 = form.new_password2.value; 

                                 
                              if (password1 != password2) { 
                                  alert ("\nPassword did not match: Please try again...") 
                                  return false; 
                              } 

                              // If same return True. 
                              else{ 
                                   
                                  return true; 
                              } 
                          }
                      </script>








<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<body>

 <style>
      .signup-page {
        width:450px;
        left: 50%;
        margin:0;
        position:absolute;
        transform: translateX(-50%);
        margin-top:200px;
        padding:0;
      }

      .signup-page .row{
        margin-right: 0px;
      }

      .button{
        margin: 10px 150px;
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









<div>
  <form  class="signup-page" method="POST" onSubmit = "return checkPassword(this)">

    <div class="signup-header">
       <h2>Admin Change Password</h2>
                                   
    </div>
    <br>





    <div class="form-group row">
              <label class="col-sm-5" style="">Current Password <span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="cur_password" id="cur_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Current Password" required>
    </div>

    <div class="form-group row">
              <label class="col-sm-5" style="">New Password<span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="new_password1" id="new_password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" required>
    </div>

    <div class="form-group row">
              <label class="col-sm-5" style="">Confirm New Password<span style="color:red">*</span></label>
              <input class="form-control col-sm-7" type="password" name="new_password2" id="new_password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Retype New Password"required>
    </div>




    <div class=" row">
                                
          <div  class="button" style="text-align:center">
              <button class="btn btn-danger" style="align-self:center"type="submit" name="change_password">Submit</button>
          </div>
    </div>
     </form>

     


</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>