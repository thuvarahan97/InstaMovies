<<<<<<< HEAD
<?php
session_start();
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
            .disclaimer p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .disclaimer .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

	<!--Navbar Code - Start-->
	<div class="header_wrapper">    
		<div class="main_menu_wrapper">
			<div class="navbar-box fixed-top" id='nav'></div>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-transparent fixed-top" role="navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-1">
							<div class="navbar-brand">
								<a href="index.php"> <img src="images/eaplogo.png"></a>
							</div>
						</div>
					
						<div class="col-md-11">
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav ml-auto">
                  <li class="item-1"><a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
									<li class="item-2"><a class="nav-link" href="movies.php">MOVIES</a></li>
									<li class="item-3"><a class="nav-link" href="rates_and_showtimes.php">RATES & SHOW TIMES</a></li>
									<li class="item-4"><a class="nav-link" href="theatres.php">THEATRES</a></li>
									<li class="item-5"><a class="nav-link" href="news.php">NEWS</a></li>
									<li class="item-6"><a class="nav-link" href="offers.php">OFFERS</a></li>
									<li class="item-7"><a class="nav-link" href="buy_tickets.php">BUY TICKETS</a></li>
									<li class="item-8"><a class="nav-link" href="contact_us.php">CONTACT US</a></li>
								</ul>
                <ul class="navbar-nav navbar-right">
									<?php if(isset($_SESSION['userID'])){ ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<?php echo strtoupper($_SESSION['username']) ?>
										</a>
										<ul class="dropdown-menu">
										<li><a href="user.dashboard.php">Dashboard</a></li>
											<li class="active"><a href="user.bookings.php">Bookings</a></li>
											<li><a href="user.payments.php">Payments</a></li>
											<li><a href="user.refunds.php">Refunds</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
									<?php } else { ?>
									<li class="item-8"><a class="nav-link" href="login.php">LOGIN</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
        </div>
    </div>
    <!--Navbar Code - End-->

	
    <!--Disclaimer Body - Start-->
    <div class="disclaimer">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">DISCLAIMER, LIMITATION OF LIABILITY &amp; INDEMNITY</h2>
            
            <div>
							<p style="text-align: justify;">This Website has been compiled in good faith by InstaMovies and all information and data provided on this site is for informational purposes only.</p>
							<p style="text-align: justify;"><br />InstaMovies do not guarantee the accuracy, validity, completeness or the suitability of any information or data on this site (www.instamovies.ga). No representation is made or warranty given, either express or implied as to the completeness or accuracy of the information that it contains, that it will be uninterrupted or error free or that any information is free of bugs, viruses, worms, trojan horses or other harmful components.</p>
							<p style="text-align: justify;"><br />Although we believe that all information which currently appears on the www.instamovies.ga web site is to the best of our knowledge valid and accurate and has been obtained from reliable sources, it is however the sole responsibility of the user to ascertain the validity and accuracy of the information provided on the www.instamovies.ga site prior to making decisions.</p>
							<p style="text-align: justify;"><br />To the maximum extent permitted by law, InstaMovies disclaims all implied warranties with regard to information, products, services and material provided through this Website. All such information, products, services and materials are provided “as is” and “as available” without warranty of any kind.</p>
							<p style="text-align: justify;"><br />This Website may contain links to Web Sites operated by third parties. Such links are provided for your reference only and your use of these sites may be subject to terms and conditions posted on them. InstaMovies inclusion of links to other Websites does not imply any endorsement of the material on such Websites and InstaMovies accepts no liability for their contents. Further, the user agrees that InstaMovies cannot be held responsible for any damage, claims or any mishaps that may happen to occur from any link leading outside this site.</p>
							<p style="text-align: justify;"><br />By accessing this Website (www.instamovies.ga) you agree that InstaMovies will not be liable for any direct, indirect or consequential loss or damages of any nature arising from the use of this Website, including information and material contained in it, from your access of other material on the internet via web links from this Website, delay or inability to use this Website or the availability and utility of the products and services.</p>
							<p style="text-align: justify;"><br />You further agree to indemnify, hold InstaMovies harmless from and covenant not to sue InstaMovies for any claims based on using this Website (www.instamovies.ga). <br /><br /><br /></p>
            </div>
        </div>
    </div>
    <!--Disclaimer Body - End-->
        
        
        
	
	<!--Footer-->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
			  <div class="col-md-5 col-sm-12">
			    <div class="footer_left">
				  <img src="images/footer_logo.png" class="img-responsive" alt="InstaMovies Logo">
				  <p> © 2019 InstaMovies. All Rights Reserved. Site by <span class="company_name">GenetriX</span></p>
				</div>
			  </div>
			</div>
			<div class="bottom-footer">
					<ul class="footer-nav">
						<li class="footer-item-1"><a href="index.php">Home</a></li>
						<li class="footer-item-2"><a href="privacy_policy.php">Privacy Policy</a></li>
						<li class="footer-item-3"><a href="terms_and_conditions.php">Terms of Use</a></li>
						<li class="footer-item-4 active"><a href="disclaimer.php">Disclaimer</a></li>
						<li class="footer-item-5"><a href="about_us.php">About Us</a></li>
					</ul>
				
					<ul class="footer-nav">
						<li class="footer-item-6"><a href="login.php">Login</a></li>
						<li class="footer-item-7"><a href="register.php">Register</a></li>
						<li class="footer-item-8"><a href="advertise.php">Advertise</a></li>
						<li class="footer-item-9"><a href="careers.php">Careers</a></li>
						<li class="footer-item-10"><a href="contact_us.php">Contact Us</a></li>
					</ul>
			</div>
		</div>
	</footer>
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	<!--Navbar Script-->
		<script>
			var nav = document.getElementById('nav');
			window.onscroll = function(){
				if (window.pageYOffset > 50){
					nav.style.background = "#000";
				}
				else{
					nav.style.background = "transparent";
				}
			}
		</script>
   
  </body>
=======
<?php
session_start();
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
            .disclaimer p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .disclaimer .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

	<!--Navbar Code - Start-->
	<div class="header_wrapper">    
		<div class="main_menu_wrapper">
			<div class="navbar-box fixed-top" id='nav'></div>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-transparent fixed-top" role="navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-1">
							<div class="navbar-brand">
								<a href="index.php"> <img src="images/eaplogo.png"></a>
							</div>
						</div>
					
						<div class="col-md-11">
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav ml-auto">
                  <li class="item-1"><a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
									<li class="item-2"><a class="nav-link" href="movies.php">MOVIES</a></li>
									<li class="item-3"><a class="nav-link" href="rates_and_showtimes.php">RATES & SHOW TIMES</a></li>
									<li class="item-4"><a class="nav-link" href="theatres.php">THEATRES</a></li>
									<li class="item-5"><a class="nav-link" href="news.php">NEWS</a></li>
									<li class="item-6"><a class="nav-link" href="offers.php">OFFERS</a></li>
									<li class="item-7"><a class="nav-link" href="buy_tickets.php">BUY TICKETS</a></li>
									<li class="item-8"><a class="nav-link" href="contact_us.php">CONTACT US</a></li>
								</ul>
                <ul class="navbar-nav navbar-right">
									<?php if(isset($_SESSION['userID'])){ ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<?php echo strtoupper($_SESSION['username']) ?>
										</a>
										<ul class="dropdown-menu">
										<li><a href="user.dashboard.php">Dashboard</a></li>
											<li class="active"><a href="user.bookings.php">Bookings</a></li>
											<li><a href="user.payments.php">Payments</a></li>
											<li><a href="user.refunds.php">Refunds</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li>
									<?php } else { ?>
									<li class="item-8"><a class="nav-link" href="login.php">LOGIN</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
        </div>
    </div>
    <!--Navbar Code - End-->

	
    <!--Disclaimer Body - Start-->
    <div class="disclaimer">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">DISCLAIMER, LIMITATION OF LIABILITY &amp; INDEMNITY</h2>
            
            <div>
							<p style="text-align: justify;">This Website has been compiled in good faith by InstaMovies and all information and data provided on this site is for informational purposes only.</p>
							<p style="text-align: justify;"><br />InstaMovies do not guarantee the accuracy, validity, completeness or the suitability of any information or data on this site (www.instamovies.ga). No representation is made or warranty given, either express or implied as to the completeness or accuracy of the information that it contains, that it will be uninterrupted or error free or that any information is free of bugs, viruses, worms, trojan horses or other harmful components.</p>
							<p style="text-align: justify;"><br />Although we believe that all information which currently appears on the www.instamovies.ga web site is to the best of our knowledge valid and accurate and has been obtained from reliable sources, it is however the sole responsibility of the user to ascertain the validity and accuracy of the information provided on the www.instamovies.ga site prior to making decisions.</p>
							<p style="text-align: justify;"><br />To the maximum extent permitted by law, InstaMovies disclaims all implied warranties with regard to information, products, services and material provided through this Website. All such information, products, services and materials are provided “as is” and “as available” without warranty of any kind.</p>
							<p style="text-align: justify;"><br />This Website may contain links to Web Sites operated by third parties. Such links are provided for your reference only and your use of these sites may be subject to terms and conditions posted on them. InstaMovies inclusion of links to other Websites does not imply any endorsement of the material on such Websites and InstaMovies accepts no liability for their contents. Further, the user agrees that InstaMovies cannot be held responsible for any damage, claims or any mishaps that may happen to occur from any link leading outside this site.</p>
							<p style="text-align: justify;"><br />By accessing this Website (www.instamovies.ga) you agree that InstaMovies will not be liable for any direct, indirect or consequential loss or damages of any nature arising from the use of this Website, including information and material contained in it, from your access of other material on the internet via web links from this Website, delay or inability to use this Website or the availability and utility of the products and services.</p>
							<p style="text-align: justify;"><br />You further agree to indemnify, hold InstaMovies harmless from and covenant not to sue InstaMovies for any claims based on using this Website (www.instamovies.ga). <br /><br /><br /></p>
            </div>
        </div>
    </div>
    <!--Disclaimer Body - End-->
        
        
        
	
	<!--Footer-->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
			  <div class="col-md-5 col-sm-12">
			    <div class="footer_left">
				  <img src="images/footer_logo.png" class="img-responsive" alt="InstaMovies Logo">
				  <p> © 2019 InstaMovies. All Rights Reserved. Site by <span class="company_name">GenetriX</span></p>
				</div>
			  </div>
			</div>
			<div class="bottom-footer">
					<ul class="footer-nav">
						<li class="footer-item-1"><a href="index.php">Home</a></li>
						<li class="footer-item-2"><a href="privacy_policy.php">Privacy Policy</a></li>
						<li class="footer-item-3"><a href="terms_and_conditions.php">Terms of Use</a></li>
						<li class="footer-item-4 active"><a href="disclaimer.php">Disclaimer</a></li>
						<li class="footer-item-5"><a href="about_us.php">About Us</a></li>
					</ul>
				
					<ul class="footer-nav">
						<li class="footer-item-6"><a href="login.php">Login</a></li>
						<li class="footer-item-7"><a href="register.php">Register</a></li>
						<li class="footer-item-8"><a href="advertise.php">Advertise</a></li>
						<li class="footer-item-9"><a href="careers.php">Careers</a></li>
						<li class="footer-item-10"><a href="contact_us.php">Contact Us</a></li>
					</ul>
			</div>
		</div>
	</footer>
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	<!--Navbar Script-->
		<script>
			var nav = document.getElementById('nav');
			window.onscroll = function(){
				if (window.pageYOffset > 50){
					nav.style.background = "#000";
				}
				else{
					nav.style.background = "transparent";
				}
			}
		</script>
   
  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>