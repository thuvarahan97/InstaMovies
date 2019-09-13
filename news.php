<?php header('location:index.php')?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!--Owl Carousel CSS-->
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="css/movies_slider.css">

		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

	</head>

	
  <body id="itemid-3">

	<!--Navbar Code - Start-->
	<div class="header_wrapper">    
		<div class="main_menu_wrapper">
			<div class="navbar-box fixed-top" id='nav'></div>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-transparent fixed-top" role="navigation">
				<div class="container">
					<div class="row">
						<div class="col-md-1">
							<div class="navbar-brand">
								<a href=""> <img src="images/eaplogo.png"></a>
							</div>
						</div>
					
						<div class="col-md-11">
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav ml-auto">
									<li class="item-1"><a class="nav-link" href="index.html">HOME</a></li>
									<li class="item-2"><a class="nav-link" href="movies.html">MOVIES</a></li>
									<li class="item-3"><a class="nav-link" href="rates_and_showtimes.html">RATES & SHOW TIMES<span class="sr-only">(current)</span></a></li>
									<li class="item-4"><a class="nav-link" href="theatres.html">THEATRES</a></li>
									<li class="item-5 active"><a class="nav-link" href="news.html">NEWS</a></li>
									<li class="item-6"><a class="nav-link" href="offers.html">OFFERS</a></li>
									<li class="item-7"><a class="nav-link" href="buytickets.html">BUY TICKETS</a></li>
									<li class="item-8"><a class="nav-link" href="contact_us.html">CONTACT US</a></li>
								</ul>
								<form class="form-inline">
									<button class="btn btn-primary" type="button">LOGIN</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</nav>
        </div>
    </div>
    <!--Navbar Code - End-->


    <!--Banner Code - Start-->
    <div class="banner">
        <img src="images/banner.jpg">
    </div>
    <!--Banner Code - End-->

	
    <!--Rates and ShowTime Body - Start-->
    <div class="rates_showtime">
        <div class="container mt-3">
            <h1>Rates and Showtime</h1>
        </div>
    </div>
    <!--Rates and ShowTime Body - End-->
        
        
        
	
	<!--Footer-->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
			  <div class="col-md-5 col-sm-12">
			    <div class="footer_left">
				  <img src="images/footer_logo.png" class="img-responsive" alt="InstaMovies Logo">
				  <p> © 2018 InstaMovies. All Rights Reserved. Site by <span class="company_name">GenetriX</span></p>
				</div>
			  </div>
			</div>
			<div class="bottom-footer">
					<ul class="footer-nav">
						<li class="footer-item-1"><a href="index.html">Home</a></li>
						<li class="footer-item-2"><a href="privacy_policy.html">Privacy Policy</a></li>
						<li class="footer-item-3"><a href="terms_of_use.html">Terms of Use</a></li>
						<li class="footer-item-4"><a href="disclaimer.html">Disclaimer</a></li>
						<li class="footer-item-5"><a href="about_us.html">About Us</a></li>
					</ul>
				
					<ul class="footer-nav">
						<li class="footer-item-6"><a href="login.html">Login</a></li>
						<li class="footer-item-7"><a href="register.html">Register</a></li>
						<li class="footer-item-8"><a href="advertise.html">Advertice</a></li>
						<li class="footer-item-9"><a href="career.html">Career</a></li>
						<li class="footer-item-10"><a href="contact_us.html">Contact Us</a></li>
					</ul>
			</div>
		</div>
	</footer>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="js/owl.carousel.js"></script>
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
</html>