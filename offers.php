<<<<<<< HEAD
<?php
$db = mysqli_connect("localhost", "root", "", "instamovies");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		
		<title>InstaMovies</title>

        <style>
            .movies p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .movies .banner img {
              width:100%
            }
						.movie {
							margin-bottom: 25px;
						}
						.movie_image {
							max-width:100%;
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
        </style>

	</head>

	
  <body>

    <!--Movies Body - Start-->
    <div class="movies">
			
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        	<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px"> Offers & Promotions</h2>
                
                <h5 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:20px; margin-bottom:30px; padding-top:15px">From time to time InstaMovies offers its patrons various offers with third party tie ups. These offers are sometimes linked to a particular movie and or a Theater.

                Listed below are some of the current promotions and offers that are being offered to InstaMovies patrons</h5>
						
						<?php
						$sql_nowshowing = "SELECT offer_id,image,name FROM tbl_offers WHERE start_date<=CURDATE() AND end_date>=CURDATE()"; 
						$result_nowshowing = mysqli_query($db,$sql_nowshowing);
						if(mysqli_num_rows($result_nowshowing) > 0){
						?>
						<div class="nowshowing_movies">
							<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:30px; margin-bottom:30px; padding-top:15px">Now Available Offers</h2>
							<div class="row">
								<?php while($row_nowshowing = mysqli_fetch_array($result_nowshowing)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="offer.php?offer_id=<?php echo $row_nowshowing['offer_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_nowshowing['image'])?>" class="movie_image"></a>


										<div class="movie_bottom_wrap">
											<a href="offer.php?offer_id=<?php echo $row_nowshowing['offer_id'];?>" class="movie_name"><h6><?php echo $row_nowshowing['name']?></h6></a>
											
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php }; ?>



						<?php
						$sql_upcoming = "SELECT offer_id,image,name FROM tbl_offers WHERE start_date>CURDATE()";
						$result_upcoming = mysqli_query($db,$sql_upcoming);
						if(mysqli_num_rows($result_upcoming) > 0){
						?>
						<div class="upcoming_movies">
							<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:30px; margin-bottom:30px; padding-top:15px">Upcoming Offers</h2>
							<div class="row">
								<?php while($row_upcoming = mysqli_fetch_array($result_upcoming)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="offer.php?offer_id=<?php echo $row_upcoming['offer_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_upcoming['image'])?>" class="movie_image"></a>
										<div class="movie_bottom_wrap">
											<a href="offer.php?offer_id=<?php echo $row_upcoming['offer_id'];?>" class="movie_name"><h6><?php echo $row_upcoming['name']?></h6></a>
											
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
	
		
	<!-- Optional JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

  </body>
=======
<?php
$db = mysqli_connect("localhost", "root", "", "instamovies");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		
		<title>InstaMovies</title>

        <style>
            .movies p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .movies .banner img {
              width:100%
            }
						.movie {
							margin-bottom: 25px;
						}
						.movie_image {
							max-width:100%;
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
        </style>

	</head>

	
  <body>

    <!--Movies Body - Start-->
    <div class="movies">
			
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        	<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px"> Offers & Promotions</h2>
                
                <h5 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:20px; margin-bottom:30px; padding-top:15px">From time to time InstaMovies offers its patrons various offers with third party tie ups. These offers are sometimes linked to a particular movie and or a Theater.

                Listed below are some of the current promotions and offers that are being offered to InstaMovies patrons</h5>
						
						<?php
						$sql_nowshowing = "SELECT offer_id,image,name FROM tbl_offers WHERE start_date<=CURDATE() AND end_date>=CURDATE()"; 
						$result_nowshowing = mysqli_query($db,$sql_nowshowing);
						if(mysqli_num_rows($result_nowshowing) > 0){
						?>
						<div class="nowshowing_movies">
							<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:30px; margin-bottom:30px; padding-top:15px">Now Available Offers</h2>
							<div class="row">
								<?php while($row_nowshowing = mysqli_fetch_array($result_nowshowing)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="offer.php?offer_id=<?php echo $row_nowshowing['offer_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_nowshowing['image'])?>" class="movie_image"></a>


										<div class="movie_bottom_wrap">
											<a href="offer.php?offer_id=<?php echo $row_nowshowing['offer_id'];?>" class="movie_name"><h6><?php echo $row_nowshowing['name']?></h6></a>
											
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php }; ?>



						<?php
						$sql_upcoming = "SELECT offer_id,image,name FROM tbl_offers WHERE start_date>CURDATE()";
						$result_upcoming = mysqli_query($db,$sql_upcoming);
						if(mysqli_num_rows($result_upcoming) > 0){
						?>
						<div class="upcoming_movies">
							<h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:30px; margin-bottom:30px; padding-top:15px">Upcoming Offers</h2>
							<div class="row">
								<?php while($row_upcoming = mysqli_fetch_array($result_upcoming)){ ?>
								<div class="col-md-3 col-sm-4">
									<div class="movie">
										<a href="offer.php?offer_id=<?php echo $row_upcoming['offer_id'];?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_upcoming['image'])?>" class="movie_image"></a>
										<div class="movie_bottom_wrap">
											<a href="offer.php?offer_id=<?php echo $row_upcoming['offer_id'];?>" class="movie_name"><h6><?php echo $row_upcoming['name']?></h6></a>
											
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
	
		
	<!-- Optional JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>