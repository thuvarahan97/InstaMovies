<<<<<<< HEAD
<?php
session_start();
include_once ('db_config.php');
date_default_timezone_set("Asia/Colombo");
?>

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
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

		<style>
			.btn-booking {
				width:90%;
			}
			.movie_name {
				text-decoration:none;
			}
			.movie_name:hover {
				text-decoration:none;
			}
			.movie_name h5 {
				font-size: 18px;
				color: #000;
			}
			.movie_name h5:hover {
				color:#bf0000;
			}
		</style>
	</head>

	
  <body id="itemid-1">

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
									<li class="item-1 active"><a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
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


<!-- Carousel - Main Slider -->
<?php

    function make_query($db)
    {
        $query = "SELECT A.movie_id, A.carousel_image, B.movie_name, B.trailer_url FROM tbl_carousel A, tbl_movies B WHERE A.movie_id = B.movie_id ORDER BY A.id DESC";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function make_slide_indicators($db)
    {
        $output = ''; 
        $count = 0;
				$result = make_query($db);
				if(mysqli_num_rows($result)>0) {
        	while($row = mysqli_fetch_array($result))
					{
							if($count == 0)
							{
									$output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>';
							}
							else
							{
									$output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>';
							}
							$count = $count + 1;
					}
				}
        return $output;
    }


    function make_slides($db)
    {
        $output = '';
        $count = 0;
				$result = make_query($db);
				if(mysqli_num_rows($result)>0) {
					while($row = mysqli_fetch_array($result))
					{
							if($count == 0)
							{
									$output .= '<div class="carousel-item active">';
							}
							else
							{
									$output .= '<div class="carousel-item">';
							}
							$output .= '
							<img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row['carousel_image']).'" alt="'.$row["movie_name"].'" />
							<div class="carousel-caption d-none d-md-block">
											<p><button class="btn-0 btn-danger btn-lg" style="min-width:323px" disabled>'.$row['movie_name'].'</button></p>
											<p>
													<a class="btn-1 btn-warning btn-lg" style="text-decoration: none;" href="'.$row['trailer_url'].'" role="button">WATCH TRAILER</a>
													<a class="btn-2 btn-danger btn-lg" style="text-decoration: none;" href="buy_tickets.php?movieID='.$row['movie_id'].'" role="button">BUY TICKETS</a>
											</p>
									</div>
							</div>
							';
							$count = $count + 1;
					}
				}
        return $output;
    }
?>

<!--Carousel Code - Start-->
<!--Indicators-->
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
	  <ol class="carousel-indicators">
        <?php echo make_slide_indicators($db); ?>
	  </ol>
	  
	  <div class="carousel-inner">
        <?php echo make_slides($db); ?>
      </div>
      
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<img src="images/buttons/prev_button_1.png">
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<img src="images/buttons/next_button_1.png">
	  </a>
</div>
<!--Carousel Code - End-->





<!--NowShowing Movies - Start-->

<?php
$sql_nowshowing = "SELECT * FROM tbl_movies WHERE `status` = 1 AND DATEDIFF(starting_date, NOW())<0";
$result_nowshowing = mysqli_query($db,$sql_nowshowing);
$rowCount_nowshowing = mysqli_num_rows($result_nowshowing);
if($rowCount_nowshowing>0) {
?>

<div class="now_showing">
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h1>Now Showing</h1>
			</div>
		</div>
	

	<div class="container">
			<div class="row">
			<div class="owl-carousel owl-theme" style="padding: 0 70px;">
			
				<?php while($row_nowshowing = $result_nowshowing->fetch_assoc()){	
				?>
				
				<div class="item">
					<div class="card">
						<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row_nowshowing['poster']);?>" alt="img" class="card-img-top"></a>
						<div class="card-body">
							<a class="movie_name" href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><h5><?php echo $row_nowshowing['movie_name'] ?></h5></a>
							<a class="btn btn-booking btn-danger" href="buy_tickets.php?movieID=<?php echo $row_nowshowing['movie_id'] ?>">Buy Tickets</a>
						</div>
					</div>
				</div>

				<?php } ?>
				
			</div>
		</div>
	</div>

</div>
</div>

<?php } ?>

<!--NowShowing Movies - End-->

	

	

<!--Upcoming Movies - Start-->

<?php
$sql_upcoming = "SELECT * FROM tbl_movies WHERE DATEDIFF(starting_date, NOW())>0";
$result_upcoming = mysqli_query($db,$sql_upcoming);
$rowCount_upcoming = mysqli_num_rows($result_upcoming);
if($rowCount_upcoming>0) {
?>

<div class="upcoming_movies">
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h1>Upcoming Movies</h1>
			</div>
		</div>
	

	<div class="container">
			<div class="row">
			<div class="owl-carousel owl-theme" style="padding: 0 70px;">
			
				<?php while($row_upcoming = $result_upcoming->fetch_assoc()){	
				?>

				<div class="item">
					<div class="card">
						<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>"><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row_upcoming['poster']) ?>" alt="img" class="card-img-top"></a>
						<div class="card-body">
							<a class="movie_name" href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>"><h5><?php echo $row_upcoming['movie_name'] ?></h5></a>
							<a class="btn btn-booking btn-danger <?php if($row_upcoming['status']==0){echo 'disabled';} ?>" <?php if($row_upcoming['status']=='1'){echo 'href="buy_tickets.php?movieID='.$row_upcoming['movie_id'].'"';}?>><?php if($row_upcoming['status']==0){echo 'Tickets not available!';}else{echo 'Buy Tickets';} ?></a>
						</div>
					</div>
				</div>

				<?php } ?>

			</div>
		</div>
	</div>

</div>
</div>

<?php } ?>

<!--Upcoming Movies - End-->





	

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
						<li class="footer-item-1 active"><a href="index.php">Home</a></li>
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

	
	<!--Owl-Carousel Script-->	
		<script>
			$('.owl-carousel').owlCarousel({
					loop:false,
					margin:10,
					nav:true,
					navText: ["<img src='images/buttons/prev_button.png'>","<img src='images/buttons/next_button.png'>"],
					dots:false,
					mouseDrag:false,
					responsive:{
							0:{
									items:1
							},
							600:{
									items:3
							},
							1000:{
									items:4
							}
					}
			})
		</script>
		
		
		<!-- <script>
			var owl = $('.owl-carousel');
			owl.owlCarousel();
			$('.nextButton').click(function(){
				owl.trigger('next.owl.carousel');
			})

			$('.prevButton').click(function(){
				owl.trigger('prev.owl.carousel', [300])
			})
		</script> -->


  </body>
=======
<?php
session_start();
include_once ('db_config.php');
date_default_timezone_set("Asia/Colombo");
?>

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
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

		<style>
			.btn-booking {
				width:90%;
			}
			.movie_name {
				text-decoration:none;
			}
			.movie_name:hover {
				text-decoration:none;
			}
			.movie_name h5 {
				font-size: 18px;
				color: #000;
			}
			.movie_name h5:hover {
				color:#bf0000;
			}
		</style>
	</head>

	
  <body id="itemid-1">

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
									<li class="item-1 active"><a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a></li>
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


<!-- Carousel - Main Slider -->
<?php

    function make_query($db)
    {
        $query = "SELECT A.movie_id, A.carousel_image, B.movie_name, B.trailer_url FROM tbl_carousel A, tbl_movies B WHERE A.movie_id = B.movie_id ORDER BY A.id DESC";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function make_slide_indicators($db)
    {
        $output = ''; 
        $count = 0;
				$result = make_query($db);
				if(mysqli_num_rows($result)>0) {
        	while($row = mysqli_fetch_array($result))
					{
							if($count == 0)
							{
									$output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>';
							}
							else
							{
									$output .= '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>';
							}
							$count = $count + 1;
					}
				}
        return $output;
    }


    function make_slides($db)
    {
        $output = '';
        $count = 0;
				$result = make_query($db);
				if(mysqli_num_rows($result)>0) {
					while($row = mysqli_fetch_array($result))
					{
							if($count == 0)
							{
									$output .= '<div class="carousel-item active">';
							}
							else
							{
									$output .= '<div class="carousel-item">';
							}
							$output .= '
							<img class="d-block w-100" src="data:image/jpeg;base64,'.base64_encode($row['carousel_image']).'" alt="'.$row["movie_name"].'" />
							<div class="carousel-caption d-none d-md-block">
											<p><button class="btn-0 btn-danger btn-lg" style="min-width:323px" disabled>'.$row['movie_name'].'</button></p>
											<p>
													<a class="btn-1 btn-warning btn-lg" style="text-decoration: none;" href="'.$row['trailer_url'].'" role="button">WATCH TRAILER</a>
													<a class="btn-2 btn-danger btn-lg" style="text-decoration: none;" href="buy_tickets.php?movieID='.$row['movie_id'].'" role="button">BUY TICKETS</a>
											</p>
									</div>
							</div>
							';
							$count = $count + 1;
					}
				}
        return $output;
    }
?>

<!--Carousel Code - Start-->
<!--Indicators-->
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
	  <ol class="carousel-indicators">
        <?php echo make_slide_indicators($db); ?>
	  </ol>
	  
	  <div class="carousel-inner">
        <?php echo make_slides($db); ?>
      </div>
      
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<img src="images/buttons/prev_button_1.png">
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<img src="images/buttons/next_button_1.png">
	  </a>
</div>
<!--Carousel Code - End-->





<!--NowShowing Movies - Start-->

<?php
$sql_nowshowing = "SELECT * FROM tbl_movies WHERE `status` = 1 AND DATEDIFF(starting_date, NOW())<0";
$result_nowshowing = mysqli_query($db,$sql_nowshowing);
$rowCount_nowshowing = mysqli_num_rows($result_nowshowing);
if($rowCount_nowshowing>0) {
?>

<div class="now_showing">
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h1>Now Showing</h1>
			</div>
		</div>
	

	<div class="container">
			<div class="row">
			<div class="owl-carousel owl-theme" style="padding: 0 70px;">
			
				<?php while($row_nowshowing = $result_nowshowing->fetch_assoc()){	
				?>
				
				<div class="item">
					<div class="card">
						<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row_nowshowing['poster']);?>" alt="img" class="card-img-top"></a>
						<div class="card-body">
							<a class="movie_name" href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id'];?>"><h5><?php echo $row_nowshowing['movie_name'] ?></h5></a>
							<a class="btn btn-booking btn-danger" href="buy_tickets.php?movieID=<?php echo $row_nowshowing['movie_id'] ?>">Buy Tickets</a>
						</div>
					</div>
				</div>

				<?php } ?>
				
			</div>
		</div>
	</div>

</div>
</div>

<?php } ?>

<!--NowShowing Movies - End-->

	

	

<!--Upcoming Movies - Start-->

<?php
$sql_upcoming = "SELECT * FROM tbl_movies WHERE DATEDIFF(starting_date, NOW())>0";
$result_upcoming = mysqli_query($db,$sql_upcoming);
$rowCount_upcoming = mysqli_num_rows($result_upcoming);
if($rowCount_upcoming>0) {
?>

<div class="upcoming_movies">
	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12">
				<h1>Upcoming Movies</h1>
			</div>
		</div>
	

	<div class="container">
			<div class="row">
			<div class="owl-carousel owl-theme" style="padding: 0 70px;">
			
				<?php while($row_upcoming = $result_upcoming->fetch_assoc()){	
				?>

				<div class="item">
					<div class="card">
						<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>"><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row_upcoming['poster']) ?>" alt="img" class="card-img-top"></a>
						<div class="card-body">
							<a class="movie_name" href="movie.php?movie_id=<?php echo $row_upcoming['movie_id'];?>"><h5><?php echo $row_upcoming['movie_name'] ?></h5></a>
							<a class="btn btn-booking btn-danger <?php if($row_upcoming['status']==0){echo 'disabled';} ?>" <?php if($row_upcoming['status']=='1'){echo 'href="buy_tickets.php?movieID='.$row_upcoming['movie_id'].'"';}?>><?php if($row_upcoming['status']==0){echo 'Tickets not available!';}else{echo 'Buy Tickets';} ?></a>
						</div>
					</div>
				</div>

				<?php } ?>

			</div>
		</div>
	</div>

</div>
</div>

<?php } ?>

<!--Upcoming Movies - End-->





	

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
						<li class="footer-item-1 active"><a href="index.php">Home</a></li>
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

	
	<!--Owl-Carousel Script-->	
		<script>
			$('.owl-carousel').owlCarousel({
					loop:false,
					margin:10,
					nav:true,
					navText: ["<img src='images/buttons/prev_button.png'>","<img src='images/buttons/next_button.png'>"],
					dots:false,
					mouseDrag:false,
					responsive:{
							0:{
									items:1
							},
							600:{
									items:3
							},
							1000:{
									items:4
							}
					}
			})
		</script>
		
		
		<!-- <script>
			var owl = $('.owl-carousel');
			owl.owlCarousel();
			$('.nextButton').click(function(){
				owl.trigger('next.owl.carousel');
			})

			$('.prevButton').click(function(){
				owl.trigger('prev.owl.carousel', [300])
			})
		</script> -->


  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>