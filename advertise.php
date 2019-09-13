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
            .advertise p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .advertise .banner img {
              width:100%
            }
						blockquote {
								padding: 10px 20px;
								font-size: 17.5px;
								border-left: 5px solid #eee;
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

	
    <!--Advertise Body - Start-->
    <div class="advertise">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Advertise</h2>
            
            <div>
							<p>InstaMovies offers commercial advertising at all its cinemas and as well as on its corproate web portal that is online ticket booking enabled.</p>
							<div class="cinema_advertising">
								<h3 style="font-size: 35px; padding-top:15px">Cinema Advertising</h3>
								<div class="details_wrapper" style="padding-top:15px">
									<p>Unlimited indoor advertising as well as limited outdoor advertising opportunities exist at all Theaters that are managed and operated by InstaMovies.</p>
									<p>The following benefits are being offered for its valuable customers for carrying out promotional campaigns by InstaMovies.</p>
									<p>Screening of Commercials / Slide at Movie</p>
									<p>E.g. for an investment of Rs.75,000/- + NBT + VAT you can enjoy 1 x 30 sec Commercial per Movie for a period of one month. (4 Shows x 30 days per month) = 120 spots per month</p>
									<ul style="padding:4px 15px;">
									<li>Branding inside the theatre (Display Pennants at the entrance &amp; other areas in the theatre).</li>
									<li>Branding outside the entrance, facing main road. (Display Flags outside the entrance)</li>
									<li>Logo on main cutouts / Light Board (Sponsor Logo main cutouts &amp; Light Board facing main road).</li>
									</ul>
									<blockquote>
									<blockquote>- Logo displayed below the Main Screen<br />- Sampling<br />- Advertising on the Web<br />- Unlimited number of spots on the LCD’s located at selected theatres.</blockquote>
									</blockquote>
									<br/>
									<p><strong>Why advertise with InstaMovies?</strong></p>
									<p>InstaMovies is the market leader and has more than 5.5 Mn customer base</p>
									<p>Cinema advertising is the most cost effective method of advertising compared to other media</p>
									<p>Unlike TV or Radio advertisements, all our Cinema patrons would see all commercials running on the screen, since they do not have the option of changing channels. Further, human nature is as such people will always</p>
									<p>look at the brighter side when they are in a dark environment.</p>
									<p>We have a fantastic movie lineup, and as a result we have been ranked as the number one circuit in the country</p>
									<p>For more information on available space and for advertising rates please contact our Marketing &amp; Advertising Division on the contact details listed below.<br /><br /></p>
								</div>
							</div>
							<div class="web_portal_advertising">
								<h3 style="font-size: 35px; padding-top:15px">Web Portal Advertising</h3>
								<div class="details_wrapper" style="padding-top:15px">
									<p>Commercial advertising is available on the InstaMovies' online web portal (This website) - www.instamovies.ga. At present the following banner positions are available:</p>
									<p>Rotating Banners - Position: Right bottom corner - visible on all pages of the site - Size: 355px X 207px</p>
									<p>For advertising rates please contact our Maketing &amp; Advertising Division on the below listed contact details:</p>
									<p>&nbsp;</p>
									<p><strong>Marketing and Advertising</strong></p>
									<p>Telephone : +94 763 966 034</p>
									<!-- <p>Fax : +94 117 444 407</p> -->
									<p>E-mail : <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">marketing@instamovies.com</a><br/><br/><br/></p>
								</div>
							</div>

            </div>
        </div>
    </div>
    <!--Advertise Body - End-->
        
        
        
	
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
						<li class="footer-item-4"><a href="discalimer.php">Disclaimer</a></li>
						<li class="footer-item-5"><a href="about_us.php">About Us</a></li>
					</ul>
				
					<ul class="footer-nav">
						<li class="footer-item-6"><a href="login.php">Login</a></li>
						<li class="footer-item-7"><a href="register.php">Register</a></li>
						<li class="footer-item-8 active"><a href="advertise.php">Advertise</a></li>
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
            .advertise p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .advertise .banner img {
              width:100%
            }
						blockquote {
								padding: 10px 20px;
								font-size: 17.5px;
								border-left: 5px solid #eee;
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

	
    <!--Advertise Body - Start-->
    <div class="advertise">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Advertise</h2>
            
            <div>
							<p>InstaMovies offers commercial advertising at all its cinemas and as well as on its corproate web portal that is online ticket booking enabled.</p>
							<div class="cinema_advertising">
								<h3 style="font-size: 35px; padding-top:15px">Cinema Advertising</h3>
								<div class="details_wrapper" style="padding-top:15px">
									<p>Unlimited indoor advertising as well as limited outdoor advertising opportunities exist at all Theaters that are managed and operated by InstaMovies.</p>
									<p>The following benefits are being offered for its valuable customers for carrying out promotional campaigns by InstaMovies.</p>
									<p>Screening of Commercials / Slide at Movie</p>
									<p>E.g. for an investment of Rs.75,000/- + NBT + VAT you can enjoy 1 x 30 sec Commercial per Movie for a period of one month. (4 Shows x 30 days per month) = 120 spots per month</p>
									<ul style="padding:4px 15px;">
									<li>Branding inside the theatre (Display Pennants at the entrance &amp; other areas in the theatre).</li>
									<li>Branding outside the entrance, facing main road. (Display Flags outside the entrance)</li>
									<li>Logo on main cutouts / Light Board (Sponsor Logo main cutouts &amp; Light Board facing main road).</li>
									</ul>
									<blockquote>
									<blockquote>- Logo displayed below the Main Screen<br />- Sampling<br />- Advertising on the Web<br />- Unlimited number of spots on the LCD’s located at selected theatres.</blockquote>
									</blockquote>
									<br/>
									<p><strong>Why advertise with InstaMovies?</strong></p>
									<p>InstaMovies is the market leader and has more than 5.5 Mn customer base</p>
									<p>Cinema advertising is the most cost effective method of advertising compared to other media</p>
									<p>Unlike TV or Radio advertisements, all our Cinema patrons would see all commercials running on the screen, since they do not have the option of changing channels. Further, human nature is as such people will always</p>
									<p>look at the brighter side when they are in a dark environment.</p>
									<p>We have a fantastic movie lineup, and as a result we have been ranked as the number one circuit in the country</p>
									<p>For more information on available space and for advertising rates please contact our Marketing &amp; Advertising Division on the contact details listed below.<br /><br /></p>
								</div>
							</div>
							<div class="web_portal_advertising">
								<h3 style="font-size: 35px; padding-top:15px">Web Portal Advertising</h3>
								<div class="details_wrapper" style="padding-top:15px">
									<p>Commercial advertising is available on the InstaMovies' online web portal (This website) - www.instamovies.ga. At present the following banner positions are available:</p>
									<p>Rotating Banners - Position: Right bottom corner - visible on all pages of the site - Size: 355px X 207px</p>
									<p>For advertising rates please contact our Maketing &amp; Advertising Division on the below listed contact details:</p>
									<p>&nbsp;</p>
									<p><strong>Marketing and Advertising</strong></p>
									<p>Telephone : +94 763 966 034</p>
									<!-- <p>Fax : +94 117 444 407</p> -->
									<p>E-mail : <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">marketing@instamovies.com</a><br/><br/><br/></p>
								</div>
							</div>

            </div>
        </div>
    </div>
    <!--Advertise Body - End-->
        
        
        
	
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
						<li class="footer-item-4"><a href="discalimer.php">Disclaimer</a></li>
						<li class="footer-item-5"><a href="about_us.php">About Us</a></li>
					</ul>
				
					<ul class="footer-nav">
						<li class="footer-item-6"><a href="login.php">Login</a></li>
						<li class="footer-item-7"><a href="register.php">Register</a></li>
						<li class="footer-item-8 active"><a href="advertise.php">Advertise</a></li>
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