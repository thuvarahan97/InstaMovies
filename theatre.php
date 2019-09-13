<?php
session_start();
include_once ('db_config.php');
$theatre_id=$_GET["theatre_id"];
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
            .theatre .banner img {
              width:100%
            }
						.theatre {
							padding-bottom: 25px;
						}
						.theatre_name {
							margin-top: 15px;
							margin-bottom: 20px;
						}
						.theatre_name h3 {
								color: #23241d;
								font-size: 45px;
								font-weight: normal;
								text-align: left;
								background-color:#f5f5f5;
								padding:5px 10px 10px;
								font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
						}
						.wrp {
							padding-right:15px;
						}
						.theatre_image {
							width:100%;
						}
						.theatre_bottom_wrap {
							background: #f5f5f5;
							padding: 20px;
							text-align: center;
						}
						.theatre_details {
							text-align:left;
							margin-bottom:20px;
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
        </style>

	</head>

	
  <body>

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
    <!--Navbar Code - End-->


		<div class="theatre">

			<!--Banner Code - Start-->
			<div class="banner">
				<img src="images/banner.jpg?v=<?php echo time(); ?>">
			</div>
			<!--Banner Code - End-->

			<div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
			<?php
			$sql_theatre = "SELECT * FROM tbl_theatres where theatre_id=$theatre_id";
			$result_theatre = mysqli_query($db,$sql_theatre);
			if(mysqli_num_rows($result_theatre) > 0){
				$row_theatre = mysqli_fetch_array($result_theatre);
			?>
			<div class="row">
				<div class="theatre_name col-sm-12">
						<h3><?php echo $row_theatre['theatre_name'].' - '.$row_theatre['city']?></h3>
				</div>
				<div class="col-sm-8">
					<div class="theatre_image">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatre['image'])?>" class="theatre_image">
					</div>
					<p style="margin-top:20px; text-align:justify; margin-bottom:20px"><?php echo $row_theatre['description']?></p>
				</div>
				<div class="wrp col-sm-4">
					<h4 style="color:#3f3545; font-size:20px; line-height:30px;">Contact Details</h4>
					<table class="theatre_details">
						<tr>
								<td width="30%">Address : </td>
								<td width="70%"><?php echo $row_theatre['address']?></td>
						</tr>
						<tr height="10"></tr>
						<tr>
								<td>Telephone : </td>
								<td><a href="tel:+94<?php echo $row_theatre['telephone']?>">+94<?php echo $row_theatre['telephone']?></a> </td>
						</tr>
						<tr height="10"></tr>
						<tr>
								<td>Email :</td>
								<td><a href="mailto:<?php echo $row_theatre['email']?>"><?php echo $row_theatre['email']?></a></td>
						</tr>
						<tr height="10"></tr>
					</table>
					<h4 style="color:#3f3545; font-size:20px; line-height:30px;">Facilities</h4>
					<h6 style="font-size:16px; line-height:30px;"><?php echo nl2br($row_theatre['Facilities'])?></h6>
				</div>
			</div>
				
			

			<?php
				$sql_nowshowing =   "SELECT * FROM tbl_movies WHERE movie_id in (SELECT movie_id FROM tbl_shows WHERE theatre_id='$theatre_id' AND starting_date<=CURDATE() AND ending_date>=CURDATE())";
				$result_nowshowing = mysqli_query($db,$sql_nowshowing);
				if(mysqli_num_rows($result_nowshowing) > 0){
				?>
				<div class="nowshowing_movies">
				<h4 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:36px; margin-bottom:30px; padding-top:15px">Now Showing Movies at <?php echo $row_theatre['theatre_name']?></h4>
				<div class="row">
						<?php while($row_nowshowing = mysqli_fetch_array($result_nowshowing)){ ?>
						<div class="col-md-3 col-sm-4">
							<div class="movie">
								<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_nowshowing['poster'])?>" class="movie_image"></a>
								<div class="movie_bottom_wrap">
									<a href="movie.php?movie_id=<?php echo $row_nowshowing['movie_id']; ?>" class="movie_name"><h6><?php echo $row_nowshowing['movie_name']?></h6></a>
									<a href="buy_tickets.php?movieID=<?php echo $row_nowshowing['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>

			<?php
				$sql_upcoming =   "SELECT * FROM tbl_movies WHERE movie_id in (SELECT movie_id FROM tbl_shows WHERE theatre_id='$theatre_id' AND starting_date>CURDATE())";
				$result_upcoming = mysqli_query($db,$sql_upcoming);
				if(mysqli_num_rows($result_upcoming) > 0){
				?>
				<div class="nowshowing_movies">
				<h4 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:36px; margin-bottom:30px; padding-top:15px">Upcoming Movies at <?php echo $row_theatre['theatre_name']?></h4>
				<div class="row">
						<?php while($row_upcoming = mysqli_fetch_array($result_upcoming)){ ?>
						<div class="col-md-3 col-sm-4">
							<div class="movie">
								<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id']; ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row_upcoming['poster'])?>" class="movie_image"></a>
								<div class="movie_bottom_wrap">
									<a href="movie.php?movie_id=<?php echo $row_upcoming['movie_id']; ?>" class="movie_name"><h6><?php echo $row_upcoming['movie_name']?></h6></a>
									<a href="buy_tickets.php?movieID=<?php echo $row_upcoming['movie_id'];?>" class="btn btn-danger" style="width:100%; font-size: 18px;">Buy Tickets</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
				
			<?php } ?>

			</div>
		</div>



	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
   
  </body>
</html>