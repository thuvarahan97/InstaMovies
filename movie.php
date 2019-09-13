<<<<<<< HEAD
<?php
session_start();
include_once ('db_config.php');
$movie_id=$_GET["movie_id"];
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

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

    <style>
        .movie .banner img {
            width:100%
        }
        .banner-caption{
            text-align:center;
            margin-top:-157px;
            margin-bottom:100px;
        }
        .banner-caption .btn-0{
            color: rgb(255, 255, 255);
            background: #23241d;
            border: none;	
            padding: 3px 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 33px;
            font-weight: normal;
        }
        .banner-caption .btn-1:focus, .btn-1:active:focus, .btn-1.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-1{
            color: #000;
            background: -moz-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fae156 50%, #f7c900 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fae156', endColorstr='#f7c900',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:hover, .btn-1:focus, .btn-1:active, .btn-1.active, .open > .dropdown-toggle.btn-1 {
            background: -moz-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fce97f 50%, #fcd62f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fce97f', endColorstr='#fcd62f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:active, .btn-1.active {
            background: -moz-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #eed547 50%, #e4ba00 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #eed547', endColorstr='#e4ba00',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .banner-caption .btn-2:focus, .btn-2:active:focus, .btn-2.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-2{
            color: #FFF;
            background: -moz-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fa5656 50%, #f70000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fa5656', endColorstr='#f70000',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:hover, .btn-2:focus, .btn-2:active, .btn-2.active, .open > .dropdown-toggle.btn-2 {
            background: -moz-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fc7f7f 50%, #fc2f2f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fc7f7f', endColorstr='#fc2f2f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:active, .btn-2.active {
            background: -moz-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #ee4747 50%, #e40000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ee4747', endColorstr='#e40000',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .theatre_name {
            text-decoration:none;
        }
        .theatre_name:hover {
            text-decoration:none;
        }
        .theatre_name h6 {
            font-size: 18px;
            color: #000;
            margin-bottom: 0;
            text-align: center;
            line-height: 22px;
        }
        .theatre_name h6:hover {
            color:#bf0000;
        }
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
        .wrp{
            margin-top:20px;
            margin-bottom: 30px;
            margin-top: 20px;
            text-align: left;
        }
        .wrp h4 {
            color: #3f3545;
        }
        .wrp h6 {
            color: #606978;
            line-height: 22px;
        }
        .available_theatres h4{
            color: #3f3545;
            font-weight: normal;
            line-height: 20px;
            margin-bottom: 25px;
            margin-top: 50px;
            text-align: left;
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


    

    <div class="movie">

        <?php
        $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id=$movie_id";
        $result_movie = mysqli_query($db,$sql_movie);
        if(mysqli_num_rows($result_movie) > 0){
            $row_movie = mysqli_fetch_array($result_movie);
        ?>

        <!--Banner Code - Start-->
        <div class="banner">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row_movie['wallpaper'])?>" alt="<?php echo $row_movie["movie_name"]?>">
            <div class="banner-caption">
                <p><button class="btn-0 btn-lg" style="min-width:323px" disabled><?php echo $row_movie['movie_name'];?></button></p>
                <p>
                    <a class="btn-1 btn-lg" style="text-decoration: none;" href="<?php echo $row_movie['trailer_url'];?>" role="button">WATCH TRAILER</a>
                    <a class="btn-2 btn-lg" style="text-decoration: none;" href="buy_tickets.php?movieID=<?php echo $row_movie['movie_id'];?>" role="button">BUY TICKETS</a>
                </p>
            </div>
        </div>
        <!--Banner Code - End-->

            
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        
            <div class="wrp">
                <h4>Release Date</h4><h6><?php echo date("d F Y", strtotime($row_movie['release_date']))?></h6><br>
                <h4>Running Time</h4><h6><?php echo $row_movie['running_time']?></h6><br>
                <h4>Language</h4><h6><?php echo $row_movie['language']?></h6><br>
                <h4>Director</h4><h6><?php echo $row_movie['director']?></h6><br>
                <h4>Synopsis</h4><h6><?php echo $row_movie['synopsis']?></h6><br>
                <h4>Casts</h4><h6><?php echo $row_movie['casts']?></h6>
            </div>


            <?php
            $sql_theatres = "SELECT * FROM tbl_theatres where theatre_id in(select theatre_id from tbl_shows where movie_id=$movie_id)";
            $result_theatres = mysqli_query($db,$sql_theatres);
            if(mysqli_num_rows($result_theatres) > 0){
            ?>
            <div class="available_theatres">
                <h4>Available Theatres</h4>
                <div class="row">
                    <?php while($row_theatres = mysqli_fetch_array($result_theatres)){ ?>
                        <div class="col-md-3 col-sm-4">
                            <div class="theatre">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatres['image'])?>" class="theatre_image">
                                <div class="theatre_bottom_wrap">
                                    <a class="theatre_name" href="theatre.php?theatre_id=<?php echo $row_theatres['theatre_id']?>"><h6><?php echo $row_theatres['theatre_name']?></h6></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            

        </div>

        <?php } ?>

    </div>
    
    
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
include_once ('db_config.php');
$movie_id=$_GET["movie_id"];
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

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

    <style>
        .movie .banner img {
            width:100%
        }
        .banner-caption{
            text-align:center;
            margin-top:-157px;
            margin-bottom:100px;
        }
        .banner-caption .btn-0{
            color: rgb(255, 255, 255);
            background: #23241d;
            border: none;	
            padding: 3px 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 33px;
            font-weight: normal;
        }
        .banner-caption .btn-1:focus, .btn-1:active:focus, .btn-1.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-1{
            color: #000;
            background: -moz-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fae156 50%, #f7c900 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fae156', endColorstr='#f7c900',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:hover, .btn-1:focus, .btn-1:active, .btn-1.active, .open > .dropdown-toggle.btn-1 {
            background: -moz-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fce97f 50%, #fcd62f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fce97f', endColorstr='#fcd62f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:active, .btn-1.active {
            background: -moz-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #eed547 50%, #e4ba00 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #eed547', endColorstr='#e4ba00',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .banner-caption .btn-2:focus, .btn-2:active:focus, .btn-2.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-2{
            color: #FFF;
            background: -moz-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fa5656 50%, #f70000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fa5656', endColorstr='#f70000',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:hover, .btn-2:focus, .btn-2:active, .btn-2.active, .open > .dropdown-toggle.btn-2 {
            background: -moz-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fc7f7f 50%, #fc2f2f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fc7f7f', endColorstr='#fc2f2f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:active, .btn-2.active {
            background: -moz-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #ee4747 50%, #e40000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ee4747', endColorstr='#e40000',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .theatre_name {
            text-decoration:none;
        }
        .theatre_name:hover {
            text-decoration:none;
        }
        .theatre_name h6 {
            font-size: 18px;
            color: #000;
            margin-bottom: 0;
            text-align: center;
            line-height: 22px;
        }
        .theatre_name h6:hover {
            color:#bf0000;
        }
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
        .wrp{
            margin-top:20px;
            margin-bottom: 30px;
            margin-top: 20px;
            text-align: left;
        }
        .wrp h4 {
            color: #3f3545;
        }
        .wrp h6 {
            color: #606978;
            line-height: 22px;
        }
        .available_theatres h4{
            color: #3f3545;
            font-weight: normal;
            line-height: 20px;
            margin-bottom: 25px;
            margin-top: 50px;
            text-align: left;
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


    

    <div class="movie">

        <?php
        $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id=$movie_id";
        $result_movie = mysqli_query($db,$sql_movie);
        if(mysqli_num_rows($result_movie) > 0){
            $row_movie = mysqli_fetch_array($result_movie);
        ?>

        <!--Banner Code - Start-->
        <div class="banner">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row_movie['wallpaper'])?>" alt="<?php echo $row_movie["movie_name"]?>">
            <div class="banner-caption">
                <p><button class="btn-0 btn-lg" style="min-width:323px" disabled><?php echo $row_movie['movie_name'];?></button></p>
                <p>
                    <a class="btn-1 btn-lg" style="text-decoration: none;" href="<?php echo $row_movie['trailer_url'];?>" role="button">WATCH TRAILER</a>
                    <a class="btn-2 btn-lg" style="text-decoration: none;" href="buy_tickets.php?movieID=<?php echo $row_movie['movie_id'];?>" role="button">BUY TICKETS</a>
                </p>
            </div>
        </div>
        <!--Banner Code - End-->

            
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        
            <div class="wrp">
                <h4>Release Date</h4><h6><?php echo date("d F Y", strtotime($row_movie['release_date']))?></h6><br>
                <h4>Running Time</h4><h6><?php echo $row_movie['running_time']?></h6><br>
                <h4>Language</h4><h6><?php echo $row_movie['language']?></h6><br>
                <h4>Director</h4><h6><?php echo $row_movie['director']?></h6><br>
                <h4>Synopsis</h4><h6><?php echo $row_movie['synopsis']?></h6><br>
                <h4>Casts</h4><h6><?php echo $row_movie['casts']?></h6>
            </div>


            <?php
            $sql_theatres = "SELECT * FROM tbl_theatres where theatre_id in(select theatre_id from tbl_shows where movie_id=$movie_id)";
            $result_theatres = mysqli_query($db,$sql_theatres);
            if(mysqli_num_rows($result_theatres) > 0){
            ?>
            <div class="available_theatres">
                <h4>Available Theatres</h4>
                <div class="row">
                    <?php while($row_theatres = mysqli_fetch_array($result_theatres)){ ?>
                        <div class="col-md-3 col-sm-4">
                            <div class="theatre">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatres['image'])?>" class="theatre_image">
                                <div class="theatre_bottom_wrap">
                                    <a class="theatre_name" href="theatre.php?theatre_id=<?php echo $row_theatres['theatre_id']?>"><h6><?php echo $row_theatres['theatre_name']?></h6></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            

        </div>

        <?php } ?>

    </div>
    
    
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