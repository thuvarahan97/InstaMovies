<<<<<<< HEAD
<?php
session_start();
include_once( 'libs/TheatregetItems.php' );
include_once( 'libs/ip.php' );
include_once ('db_config.php');
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

		<!-- Ratings CSS -->
		<link rel="stylesheet" href="css/jRating.jquery.css" />

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

        <style>
            .theatres .banner img {
              width:100%
            }
						.theatre {
							margin-bottom: 25px;
						}
						.theatre_image {
							width:100%;
						}
						@media (max-width: 480px){
							.theatre_image {
									width: 100%;
							}
						}
						@media (max-width: 767px) and (min-width: 481px){
							.theatre_image {
									width: 100%;
							}
						}
						.theatre_bottom_wrap {
							background: #f5f5f5;
							padding: 20px;
							text-align: center;
						}
						.theatre_name {
							font-size: 18px;
							color: #000;
							margin-bottom: 12px;
							text-align: center;
							line-height: 22px;
						}
						.theatre_details {
							text-align:left;
						}
						.theatre_details tr {
							vertical-align: top;
						}
						.theatre_details tr a {
							text-decoration:none;
							color: #606978;
						}
						.theatre_details tr a:hover {
							text-decoration:none;
							color: #bf0000;
						}
						.theatre_bottom_wrap .btn {
							background: #fff4f4;
							border: 1px solid #ad0b0b;
							margin-top: 10px;
							color: #ad0b0b;
							width:100%;
							font-size: 18px;
							margin-top:5px;
						}
						.theatre_bottom_wrap .btn:hover {
							background: #ad0b0b;
    					color: #fff;
							border:1px solid transparent;
						}
						.theatre_bottom_wrap .btn:active {
							box-shadow:none !important;
							background-color:#c60506 !important;
						}
						.theatre_bottom_wrap .btn:focus {
							box-shadow:none !important;
						}
						p.jRatingInfos {
							background:	transparent url('images/rating_icons/bg_jRatingInfos.png') no-repeat;
						}
						.ratings_wrap{
							margin-top:5px;
							margin-bottom:10px;
							padding:7px 0;
							background:white;
							border-radius:5px;
						}
						.rating{
							display: block;
							margin-left: auto;
							margin-right: auto;
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
									<li class="item-4 active"><a class="nav-link" href="theatres.php">THEATRES</a></li>
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

	
    <!--Theatres Body - Start-->
    <div class="theatres">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
						
						<?php
						$sql_theatres = "SELECT * FROM tbl_theatres";
						$result_theatres = mysqli_query($db,$sql_theatres);
						if(mysqli_num_rows($result_theatres) > 0){
						?>
						<div class="theatres">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Theatres</h2>
							<div class="row">
								<?php while($row_theatres = mysqli_fetch_array($result_theatres)){
									$allIpAddress = explode(',',$row_theatres['user_ip_addresses']);
									$current_ipAddress = GetUserIP();
									
									if(in_array($current_ipAddress,$allIpAddress))
									{
										$class = 'jDisabled';
									}
									else
									{
										$class = '';
									}
								?>
									<div class="col-md-4 col-sm-4">
									<div class="theatre">
										<img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatres['image'])?>" class="theatre_image">
										<div class="theatre_bottom_wrap">
											<h6 class="theatre_name"><?php echo $row_theatres['theatre_name'].' - '.$row_theatres['city'] ?></h6>
											<table class="theatre_details">
												<tr>
														<td width="30%">Address : </td>
														<td width="70%"><?php echo $row_theatres['address']?></td>
												</tr>
												<tr height="10"></tr>
												<tr>
														<td>Telephone : </td>
														<td><a href="tel:+94<?php echo $row_theatres['telephone']?>">+94<?php echo $row_theatres['telephone']?></a> </td>
												</tr>
												<tr height="10"></tr>
												<tr>
														<td>Email :</td>
														<td><a href="mailto:<?php echo $row_theatres['email']?>"><?php echo $row_theatres['email']?></a></td>
												</tr>
												<tr height="10"></tr>
											</table>
											
											<div class="ratings_wrap">
												<div class="rating <?php echo $class; ?>" id="<?php echo $row_theatres['avg_ratings']; ?>_<?php echo $row_theatres['theatre_id']; ?>"></div>
											</div>

											<a href="theatre.php?theatre_id=<?php echo $row_theatres['theatre_id'];?>" class="btn">More Info</a>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>

        </div>
    </div>
    <!--Theatres Body - End-->
        
        
        
	
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
						<li class="footer-item-4"><a href="disclaimer.php">Disclaimer</a></li>
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
		<script src="js/jRating.jquery.js"></script>

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

		<script type="text/javascript">
			$(function(){
				$(".rating").jRating({
					bigStarsPath : 'images/rating_icons/stars.png',
					smallStarsPath : 'images/rating_icons/small.png',
					decimalLength : 1,
					rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					phpPath: 'libs/Theatrerating.php',
					onSuccess: function(){
						alert('Your rating has been submitted');
					},
					onError: function(){
						alert('There was a problem submitting your feedback');
					}
				});
			});
		</script>


  </body>
=======
<?php
session_start();
include_once( 'libs/TheatregetItems.php' );
include_once( 'libs/ip.php' );
include_once ('db_config.php');
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

		<!-- Ratings CSS -->
		<link rel="stylesheet" href="css/jRating.jquery.css" />

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

        <style>
            .theatres .banner img {
              width:100%
            }
						.theatre {
							margin-bottom: 25px;
						}
						.theatre_image {
							width:100%;
						}
						@media (max-width: 480px){
							.theatre_image {
									width: 100%;
							}
						}
						@media (max-width: 767px) and (min-width: 481px){
							.theatre_image {
									width: 100%;
							}
						}
						.theatre_bottom_wrap {
							background: #f5f5f5;
							padding: 20px;
							text-align: center;
						}
						.theatre_name {
							font-size: 18px;
							color: #000;
							margin-bottom: 12px;
							text-align: center;
							line-height: 22px;
						}
						.theatre_details {
							text-align:left;
						}
						.theatre_details tr {
							vertical-align: top;
						}
						.theatre_details tr a {
							text-decoration:none;
							color: #606978;
						}
						.theatre_details tr a:hover {
							text-decoration:none;
							color: #bf0000;
						}
						.theatre_bottom_wrap .btn {
							background: #fff4f4;
							border: 1px solid #ad0b0b;
							margin-top: 10px;
							color: #ad0b0b;
							width:100%;
							font-size: 18px;
							margin-top:5px;
						}
						.theatre_bottom_wrap .btn:hover {
							background: #ad0b0b;
    					color: #fff;
							border:1px solid transparent;
						}
						.theatre_bottom_wrap .btn:active {
							box-shadow:none !important;
							background-color:#c60506 !important;
						}
						.theatre_bottom_wrap .btn:focus {
							box-shadow:none !important;
						}
						p.jRatingInfos {
							background:	transparent url('images/rating_icons/bg_jRatingInfos.png') no-repeat;
						}
						.ratings_wrap{
							margin-top:5px;
							margin-bottom:10px;
							padding:7px 0;
							background:white;
							border-radius:5px;
						}
						.rating{
							display: block;
							margin-left: auto;
							margin-right: auto;
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
									<li class="item-4 active"><a class="nav-link" href="theatres.php">THEATRES</a></li>
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

	
    <!--Theatres Body - Start-->
    <div class="theatres">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
						
						<?php
						$sql_theatres = "SELECT * FROM tbl_theatres";
						$result_theatres = mysqli_query($db,$sql_theatres);
						if(mysqli_num_rows($result_theatres) > 0){
						?>
						<div class="theatres">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Theatres</h2>
							<div class="row">
								<?php while($row_theatres = mysqli_fetch_array($result_theatres)){
									$allIpAddress = explode(',',$row_theatres['user_ip_addresses']);
									$current_ipAddress = GetUserIP();
									
									if(in_array($current_ipAddress,$allIpAddress))
									{
										$class = 'jDisabled';
									}
									else
									{
										$class = '';
									}
								?>
									<div class="col-md-4 col-sm-4">
									<div class="theatre">
										<img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatres['image'])?>" class="theatre_image">
										<div class="theatre_bottom_wrap">
											<h6 class="theatre_name"><?php echo $row_theatres['theatre_name'].' - '.$row_theatres['city'] ?></h6>
											<table class="theatre_details">
												<tr>
														<td width="30%">Address : </td>
														<td width="70%"><?php echo $row_theatres['address']?></td>
												</tr>
												<tr height="10"></tr>
												<tr>
														<td>Telephone : </td>
														<td><a href="tel:+94<?php echo $row_theatres['telephone']?>">+94<?php echo $row_theatres['telephone']?></a> </td>
												</tr>
												<tr height="10"></tr>
												<tr>
														<td>Email :</td>
														<td><a href="mailto:<?php echo $row_theatres['email']?>"><?php echo $row_theatres['email']?></a></td>
												</tr>
												<tr height="10"></tr>
											</table>
											
											<div class="ratings_wrap">
												<div class="rating <?php echo $class; ?>" id="<?php echo $row_theatres['avg_ratings']; ?>_<?php echo $row_theatres['theatre_id']; ?>"></div>
											</div>

											<a href="theatre.php?theatre_id=<?php echo $row_theatres['theatre_id'];?>" class="btn">More Info</a>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>

        </div>
    </div>
    <!--Theatres Body - End-->
        
        
        
	
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
						<li class="footer-item-4"><a href="disclaimer.php">Disclaimer</a></li>
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
		<script src="js/jRating.jquery.js"></script>

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

		<script type="text/javascript">
			$(function(){
				$(".rating").jRating({
					bigStarsPath : 'images/rating_icons/stars.png',
					smallStarsPath : 'images/rating_icons/small.png',
					decimalLength : 1,
					rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					phpPath: 'libs/Theatrerating.php',
					onSuccess: function(){
						alert('Your rating has been submitted');
					},
					onError: function(){
						alert('There was a problem submitting your feedback');
					}
				});
			});
		</script>


  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>