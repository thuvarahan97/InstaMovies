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

			/* Trailer Modal*/
			#trailerModal .modal-dialog {
            	max-width: 800px;
			}
			#trailerModal .modal-dialog .modal-content {
				border: none;
			}
			#trailerModal .modal-body {
				position:relative;
				padding:0px;
			}
			#trailerModal .close {
				position:absolute;
				right:-30px;
				top:0;
				z-index:999;
				font-size:2rem;
				font-weight: normal;
				color:#fff;
				opacity:1;
			}

			/* Ad. Modal */
			#ad_modal {
				overflow-x: hidden;
				overflow-y: auto;
			}
			#ad_modal .modal-dialog {
				top: 10%;
			}
			@media (min-width: 768px) {
				#ad_modal .modal-dialog {
					width: 800px;
					margin: 30px auto;
				}
			}
			#ad_modal .modal-content {
				background-color: transparent !important;
				box-shadow: none;
				border: none;
			}
			#ad_modal .modal-header {
				padding: 0;
				border: none;
			}
			#ad_modal .modal-header .close {
				margin-top: -14px;
				opacity: 1;
				color: #fff;
				font-size: 44px;
			}
			#ad_modal .modal-body {
				padding: 0;
			}
			#ad_modal .img-responsive {
				display: block;
				max-width: 100%;
				height: auto;
			}
		</style>
	</head>

	
  <body id="itemid-1">

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
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
															<a class="btn-1 btn-warning btn-lg" style="text-decoration: none;" href="" role="button" data-src="'.$row['trailer_url'].'" data-toggle="modal" data-target="#trailerModal">WATCH TRAILER</a>
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
		$sql_nowshowing = "SELECT * FROM tbl_movies WHERE `status` = 1 AND DATEDIFF(starting_date, NOW())<=0";
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

		<div class="upcoming_movies" style="padding-bottom:15px">
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


		<!-- Trailer Modal -->
		<div class="modal fade" id="trailerModal" tabindex="-1" role="dialog" aria-labelledby="trailerModalTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>        
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Pop-up Ad. -->
		<?php if (file_exists("images/popup.jpg")) { ?>
			<div class="modal fade" id="ad_modal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<a href="buy_tickets.php?movieID=14">
								<img class="img-responsive" src="images/popup.jpg">
							</a>
						</div>      
					</div>
				</div>
			</div>
		<?php } ?>



	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/bootstrap.min.js"></script>

	
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


		<script>
			$(".header_wrapper .main_menu_wrapper .item-1").addClass("active");
			$(".site-footer .bottom-footer .footer-item-1").addClass("active");
		</script>

		<script>
			$(document).ready(function() {
				function getId(url) {
					var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
					var match = url.match(regExp);
					if (match && match[2].length == 11) {
						return match[2];
					} else {
						return 'error';
					}
				}

				// Gets the video src from the data-src on each button
				var $videoSrc;
				$('.btn-1').click(function() {
					$videoSrc = "//www.youtube.com/embed/" + getId($(this).data( "src" ));
				});

				// when the modal is opened autoplay it  
				$('#trailerModal').on('shown.bs.modal', function (e) {
					// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
					$("#video").attr('src',$videoSrc + "?autoplay=0&amp;modestbranding=1&amp;showinfo=0" ); 
				})
				
				// stop playing the youtube video when I close the modal
				$('#trailerModal').on('hide.bs.modal', function (e) {
					// a poor man's stop video
					$videoSrc = "";
					$("#video").attr('src',$videoSrc); 
				}) 
			});
		</script>
		
		<script>
			$(window).ready(function() {
				$('#ad_modal').modal('show');
			});
		</script>
  </body>
</html>