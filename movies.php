<<<<<<< HEAD
<?php
session_start();
include_once( 'libs/MoviegetItems.php' );
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
		
		<!--Rating CSS-->
		<link rel="stylesheet" href="css/jRating.jquery.css" />
		
		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

        <style>
            .movies .banner img {
              width:100%
            }
						.movie {
							margin-bottom: 25px;
						}
						.movie_image {
							width:100%;
						}
						@media (max-width: 480px){
							.movie_image {
									width: 100%;
							}
						}
						@media (max-width: 767px) and (min-width: 481px){
							.movie_image {
									width: 100%;
							}
						}
						.movie_image:hover {
							opacity: 0.9;
						}
						.movie_bottom_wrap {
							background: #f5f5f5;
							padding: 20px;
							text-align: center;
						}
						.movie_name {
							text-decoration:none;
						}
						.movie_name:hover {
							text-decoration:none;
						}
						.movie_name h6 {
							font-size: 18px;
							color: #000;
							margin-bottom: 10px;
							text-align: center;
							line-height: 22px;
						}
						.movie_name h6:hover {
							color:#bf0000;
						}
						.upcoming_movies {
							margin-top:20px;
						}
						.btn-danger {
							background-color:#c60506;
						}
						.btn-danger:hover {
							background-color:#ec0405;
							border:1px solid transparent;
						}
						.btn-danger:active {
							box-shadow:none !important;
							background-color:#c60506 !important;
						}
						.btn-danger:focus {
							box-shadow:none !important;
						}
						p.jRatingInfos {
							background:	transparent url('images/rating_icons/bg_jRatingInfos.png') no-repeat;
						}
						.ratings_wrap{
							margin-bottom:12px;
							padding:5px 0;
							background:white;
							border-radius:5px;
						}
						.rating {
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
									<li class="item-2 active"><a class="nav-link" href="movies.php">MOVIES</a></li>
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

	
    <!--Movies Body - Start-->
    <div class="movies">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
						
						<?php
						$sql_nowshowing =  "SELECT * FROM tbl_movies WHERE starting_date<CURDATE() AND ending_date>CURDATE()";
						$result_nowshowing = mysqli_query($db,$sql_nowshowing);
						if(mysqli_num_rows($result_nowshowing) > 0){
						?>
						<div class="nowshowing_movies">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Now Showing</h2>
							<div class="row">
								<?php while($row_nowshowing = mysqli_fetch_array($result_nowshowing)){
									
									$allIpAddress = explode(',',$row_nowshowing['user_ip_addresses']);
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
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_nowshowing['poster'])?>" class="movie_image"></a>
										
										<div class="movie_bottom_wrap">
											<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>" class="movie_name"><h6><?php echo $row_nowshowing['movie_name']?></h6></a>
											
											<div class="ratings_wrap">
												<div class="rating <?php echo $class; ?>" id="<?php echo $row_nowshowing['avg_ratings']; ?>_<?php echo $row_nowshowing['movie_id']; ?>"></div>
											</div>
											
											<a href="buy_tickets.php?movieID=<?php echo $row_nowshowing['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
										</div>

									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>



						<?php
						$sql_upcoming = "SELECT * FROM tbl_movies WHERE starting_date>CURDATE()";
						$result_upcoming = mysqli_query($db,$sql_upcoming);
						if(mysqli_num_rows($result_upcoming) > 0){
						?>
						<div class="upcoming_movies">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Upcoming Movies</h2>
							<div class="row">
								<?php while($row_upcoming = mysqli_fetch_array($result_upcoming)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_upcoming['poster'])?>" class="movie_image"></a>
										<div class="movie_bottom_wrap">
											<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>" class="movie_name"><h6><?php echo $row_upcoming['movie_name']?></h6></a>
											<?php
											if($row_upcoming['status']=='1'){
											?>
											<a href="buy_tickets.php?movieID=<?php echo $row_upcoming['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
											<?php
											}else if($row_upcoming['status']=='0'){
											?>
												<button class="btn btn-danger" style="width:100%; font-size: 18px;" disabled>Tickets not available!</button>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						
        </div>
    </div>
    <!--Movies Body - End-->
        
        
        
	
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
		<script type="text/javascript" src="js/jRating.jquery.js"></script>

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
					phpPath: 'libs/Movierating.php',
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
include_once( 'libs/MoviegetItems.php' );
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
		
		<!--Rating CSS-->
		<link rel="stylesheet" href="css/jRating.jquery.css" />
		
		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

        <style>
            .movies .banner img {
              width:100%
            }
						.movie {
							margin-bottom: 25px;
						}
						.movie_image {
							width:100%;
						}
						@media (max-width: 480px){
							.movie_image {
									width: 100%;
							}
						}
						@media (max-width: 767px) and (min-width: 481px){
							.movie_image {
									width: 100%;
							}
						}
						.movie_image:hover {
							opacity: 0.9;
						}
						.movie_bottom_wrap {
							background: #f5f5f5;
							padding: 20px;
							text-align: center;
						}
						.movie_name {
							text-decoration:none;
						}
						.movie_name:hover {
							text-decoration:none;
						}
						.movie_name h6 {
							font-size: 18px;
							color: #000;
							margin-bottom: 10px;
							text-align: center;
							line-height: 22px;
						}
						.movie_name h6:hover {
							color:#bf0000;
						}
						.upcoming_movies {
							margin-top:20px;
						}
						.btn-danger {
							background-color:#c60506;
						}
						.btn-danger:hover {
							background-color:#ec0405;
							border:1px solid transparent;
						}
						.btn-danger:active {
							box-shadow:none !important;
							background-color:#c60506 !important;
						}
						.btn-danger:focus {
							box-shadow:none !important;
						}
						p.jRatingInfos {
							background:	transparent url('images/rating_icons/bg_jRatingInfos.png') no-repeat;
						}
						.ratings_wrap{
							margin-bottom:12px;
							padding:5px 0;
							background:white;
							border-radius:5px;
						}
						.rating {
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
									<li class="item-2 active"><a class="nav-link" href="movies.php">MOVIES</a></li>
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

	
    <!--Movies Body - Start-->
    <div class="movies">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
						
						<?php
						$sql_nowshowing =  "SELECT * FROM tbl_movies WHERE starting_date<CURDATE() AND ending_date>CURDATE()";
						$result_nowshowing = mysqli_query($db,$sql_nowshowing);
						if(mysqli_num_rows($result_nowshowing) > 0){
						?>
						<div class="nowshowing_movies">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Now Showing</h2>
							<div class="row">
								<?php while($row_nowshowing = mysqli_fetch_array($result_nowshowing)){
									
									$allIpAddress = explode(',',$row_nowshowing['user_ip_addresses']);
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
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_nowshowing['poster'])?>" class="movie_image"></a>
										
										<div class="movie_bottom_wrap">
											<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>" class="movie_name"><h6><?php echo $row_nowshowing['movie_name']?></h6></a>
											
											<div class="ratings_wrap">
												<div class="rating <?php echo $class; ?>" id="<?php echo $row_nowshowing['avg_ratings']; ?>_<?php echo $row_nowshowing['movie_id']; ?>"></div>
											</div>
											
											<a href="buy_tickets.php?movieID=<?php echo $row_nowshowing['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
										</div>

									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>



						<?php
						$sql_upcoming = "SELECT * FROM tbl_movies WHERE starting_date>CURDATE()";
						$result_upcoming = mysqli_query($db,$sql_upcoming);
						if(mysqli_num_rows($result_upcoming) > 0){
						?>
						<div class="upcoming_movies">
							<h2 style="font-weight:normal; color:#23241d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:45px; margin-bottom:30px; padding-top:15px">Upcoming Movies</h2>
							<div class="row">
								<?php while($row_upcoming = mysqli_fetch_array($result_upcoming)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_upcoming['poster'])?>" class="movie_image"></a>
										<div class="movie_bottom_wrap">
											<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>" class="movie_name"><h6><?php echo $row_upcoming['movie_name']?></h6></a>
											<?php
											if($row_upcoming['status']=='1'){
											?>
											<a href="buy_tickets.php?movieID=<?php echo $row_upcoming['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
											<?php
											}else if($row_upcoming['status']=='0'){
											?>
												<button class="btn btn-danger" style="width:100%; font-size: 18px;" disabled>Tickets not available!</button>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						
        </div>
    </div>
    <!--Movies Body - End-->
        
        
        
	
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
		<script type="text/javascript" src="js/jRating.jquery.js"></script>

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
					phpPath: 'libs/Movierating.php',
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