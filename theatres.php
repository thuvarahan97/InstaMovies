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
		<?php include('header.php'); ?>
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
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jRating.jquery.js"></script>
		

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

		<script>
			$(".header_wrapper .main_menu_wrapper .item-4").addClass("active");
		</script>
		
  </body>
</html>