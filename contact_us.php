<?php
session_start();
include 'assets/contact_us.inc.php';
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
            .contact_us .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
    <!--Navbar Code - End-->
	
    <!--Contact Us Body - Start-->
    <div class="contact_us" style="padding-bottom:35px">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px; text-align:center">Contact InstaMovies</h2>
            
            <div>
							<p style="border-bottom: 1px solid #e9e8e8; margin: 10px 0px; padding: 0px 0px 10px 0px !important; text-align:center"><b>If you wish to contact us via email please fill in the following form and we will get in touch with you at the earliest.</b></p>
							
							<div align="center">
								<div class="contact_form_area" style="max-width:445px;text-align:left">
									<form id="contactForm" method="post">
											<div class="alert contact-alert"></div>
											<div class="form-group">
												<span>Name</span>        
													<input type="text" class="form-control required" name="name" id="name" style="max-width:445px;" value="" required/>        
											</div> 
											<div class="form-group">
												<span>Phone Number</span>        
													<input type="text" class="form-control required" name="phone" id="phone" pattern="07[0-9]{8}" maxlength="10" style="max-width:445px;" value="" required/>        
											</div> 
											<div class="form-group">
												<span>Email Address</span>        
													<input type="email" class="form-control required" name="email" id="email" style="max-width:445px;" value="" required/>        
											</div> 
											<div class="form-group">
												<span>Message</span>        
													<textarea class="form-control required" name="message" id="message" rows="5" cols="50" style="max-width: 445px;" required></textarea>        
											</div> 
											<!-- <div class="form-group">
													<div class="g-recaptcha" data-sitekey="6LcxulkUAAAAAAZhA7TzO1rVrLH6lXRBuoFcNh9f"></div>
											</div>  -->
											<div class="form-group" style="margin-top:30px;text-align:center">  
												<button type="reset" class="btn btn-secondary btn-lg cancel-btn">Reset</button>
												<button type="submit" name="submit" class="btn btn-danger btn-lg btn-submit">Send</button>
											</div>
									</form>
								</div>
							</div>

            </div>
        </div>
    </div>
    <!--Contact Us Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

   
	 	<script>
		 	$(".header_wrapper .main_menu_wrapper .item-8").addClass("active");
			$(".site-footer .bottom-footer .footer-item-10").addClass("active");
		</script>

  </body>
</html>