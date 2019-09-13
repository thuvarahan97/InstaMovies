<?php include 'assets/login.inc.php'; ?>


<!DOCTYPE html>

<html lang="en">

    <head>
        <title>Login|InstaMovies</title>
    </head>
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
                                            <i class="fa fa-user"></i>
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
                                            <button class="btn btn-primary pull-right" type="submit" name="login">Login</button>
                                        </div>

                                    </div>
                                    <hr>

                                   

                                    <h4>Are You a new user?</h4>
                                    <p>
                                        <a href="register.php">Click here</a> to Sign up with InstaMovies.</p>

        
                                    <input type="hidden" name="return_url" value="<?php echo $_SERVER['HTTP_REFERER'] ?>">

                                </form>
                            </div>
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            
