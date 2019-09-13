<<<<<<< HEAD
<?php
    session_start();

    include_once ('db_config.php');
    
    if(isset($_GET['movieID'])){
        
        $movieID = mysqli_real_escape_string($db, $_GET['movieID']);
        $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id='$movieID'";
        $result=mysqli_query($db,$sql_movie);
        $row = mysqli_fetch_array($result);
        $startingDate=$row['starting_date'];
        $endingDate=$row['ending_date'];
    }
	else{
        $sql_temp = "SELECT movie_id FROM tbl_movies WHERE `status` = 1 ORDER BY movie_id";
        $result_temp=mysqli_query($db,$sql_temp);
        $row_temp = mysqli_fetch_array($result_temp);
        header('location: buy_tickets.php?movieID='.$row_temp['movie_id']);
    }
	
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!--Bootstrap Fullscreen Modal CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap4-modal-fullscreen.min.css">
    
    <!--JQuery Toast Plugin CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <!--Glyphicons CSS-->
    <link rel="stylesheet" type="text/css" href="css/glyphicon.css">

    <!--JQuery-UI CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <!--Owl Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    
    <!--Custom Style CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/movies_slider.css">

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

  </head>

	
  <body id="itemid-7">

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
									<li class="item-1"><a class="nav-link" href="index.php">HOME</a></li>
									<li class="item-2"><a class="nav-link" href="movies.php">MOVIES</a></li>
									<li class="item-3"><a class="nav-link" href="rates_and_showtimes.php">RATES & SHOW TIMES<span class="sr-only">(current)</span></a></li>
									<li class="item-4"><a class="nav-link" href="theatres.php">THEATRES</a></li>
									<li class="item-5"><a class="nav-link" href="news.php">NEWS</a></li>
									<li class="item-6"><a class="nav-link" href="offers.php">OFFERS</a></li>
									<li class="item-7 active"><a class="nav-link" href="buy_tickets.php">BUY TICKETS</a></li>
									<li class="item-8"><a class="nav-link" href="contact_us.php">CONTACT US</a></li>
                                </ul>
                                <ul class="navbar-nav navbar-right">
									<?php if(isset($_SESSION['userID'])){ ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<?php echo strtoupper($_SESSION['username']) ?>
										</a>
										<ul class="dropdown-menu">
										<li><a href="user.danshboard.php">Dashboard</a></li>
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


    <!--Buy Tickets Body - Start-->
    <div class="buy-tickets">
        <!--Movie Banner-->
        <div class="movie_banner" id="movie_banner">
            <?php 
            if($movieID!=''){
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['banner'] ).'"/>';
            }else{
                echo '<img src="images/banner.jpg?v='.time().'"/>';
            }
            ?>    
        </div>
        <!--Select Movie-->
        <div class="movie-name">
            <div class="container">
                <div class="row">
                    <div class="movie_selection_list col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form>
                            <div class="form-group" id="now-showing-list">
                                <select class="form-control form-control-lg" id="selectMovie" onChange="SelectRedirect();">
                                    <?php
                                        $select_movie = "SELECT * FROM tbl_movies WHERE `status` = 1";
                                        $query_movie=mysqli_query($db,$select_movie);
                                        $rowCount_movie = mysqli_num_rows($query_movie);
                                        if($movieID!=''){
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }else{
                                        echo '<option value="">Select Movie</option>';
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Show-Datepicker-->
        <div class="show-date" id="show_date">
            <div class="container">
                <div class="row">
                    <div class="date_selection col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form >
                            <div class="form-group" >
                                <div class="input-group">
                                    <input type='text' class="form-control" id='datepicker' readonly="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Display Show-Time-Table-->
        <div class="show-time-table" id="time_table">
            <div class="container">
                <div class="row" style="margin:-1px 0px">
                    <table class="table table-responsive" id=table_details>  
                        <!--table link-->
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-fullscreen" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!--Link to Modal Content-->                    
                </div>
            </div>
        </div>
        
        
    <!--Buy Tickets Body - End-->
        
        
        
	
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
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.toast.min.js"></script>

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

    <!--Page Redirecting-->
        <script>
            //Redirecting to selected movie
            function SelectRedirect(){
                var $valueid = document.getElementById('selectMovie').value;
                window.location="buy_tickets.php?movieID="+$valueid;
            }

            //Setting the select option to current movieID
            $("#selectMovie > [value=" + "<?php echo $movieID ?>" + "]").attr("selected", "true");

        </script>

    <!--Date Picker Script-->
		<script>
			$( function() {
				$( "#datepicker" ).datepicker({
					dateFormat: 'yy-mm-dd',
					showOn: "button",
					buttonImage: "images/calendar.png",
					buttonText: "Select Date",
                    minDate: 0,
                    maxDate: +7,
                    beforeShowDay: enableAvailableDays
				});
			});
		</script>
        

    <!--Enabling Dates between Two Dates fetched from database-->
        <script>
            //Converting any number to two digits (for example: (9 -> 09))
            function pad2(number) {
               return (number < 10 ? '0' : '') + number;
            }
            
            //Fetching an array of dates between two dates
            var getDateArray = function(start, end) {
                var array_dates = new Array();
                var cur_date = new Date(start);
                while (cur_date <= end) {
                    var current_date=new Date(cur_date);
                    var formatted_date = current_date.getFullYear() + "-" + pad2(current_date.getMonth() + 1) + "-" + pad2(current_date.getDate());
                    array_dates.push(formatted_date);
                    cur_date.setDate(cur_date.getDate() + 1);
                }
                return array_dates;
            }
            
            
            var startDate = new Date("<?php echo $startingDate?>"); //YYYY-MM-DD
            var endDate = new Date("<?php echo $endingDate?>"); //YYYY-MM-DD
            
            //Enabling an array of dates
            var availableDates = getDateArray(startDate, endDate); //desired Dates
            function enableAvailableDays(date) {
                var sdate = $.datepicker.formatDate('yy-mm-dd', date)
                
                if($.inArray(sdate, availableDates) != -1){
                    return [true];
                }
                return[false];
            }       
        </script>


        <script>
            $('#datepicker').on('change',function(){
                var sel_Date = $(this).val();
                var movieID = jQuery('#selectMovie').val();
                if(sel_Date){
                    $.ajax({
                        type:'POST',
                        url:'assets/buy_tickets.inc.php',
                        data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                        success:function(html){
                            $('#table_details').html(html);
                        }
                    }); 
                }
            })
        </script>

        <script>
            $('#myModal').on('show.bs.modal', function () {
                $('body').css('overflow', 'hidden');
            })

            $('#myModal').on('hidden.bs.modal', function (e) {
                $('body').css('overflow', 'auto');
            })
        </script>
  </body>
=======
<?php
    session_start();

    include_once ('db_config.php');
    
    if(isset($_GET['movieID'])){
        
        $movieID = mysqli_real_escape_string($db, $_GET['movieID']);
        $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id='$movieID'";
        $result=mysqli_query($db,$sql_movie);
        $row = mysqli_fetch_array($result);
        $startingDate=$row['starting_date'];
        $endingDate=$row['ending_date'];
    }
	else{
        $sql_temp = "SELECT movie_id FROM tbl_movies WHERE `status` = 1 ORDER BY movie_id";
        $result_temp=mysqli_query($db,$sql_temp);
        $row_temp = mysqli_fetch_array($result_temp);
        header('location: buy_tickets.php?movieID='.$row_temp['movie_id']);
    }
	
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!--Bootstrap Fullscreen Modal CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap4-modal-fullscreen.min.css">
    
    <!--JQuery Toast Plugin CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <!--Glyphicons CSS-->
    <link rel="stylesheet" type="text/css" href="css/glyphicon.css">

    <!--JQuery-UI CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <!--Owl Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    
    <!--Custom Style CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/movies_slider.css">

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

  </head>

	
  <body id="itemid-7">

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
									<li class="item-1"><a class="nav-link" href="index.php">HOME</a></li>
									<li class="item-2"><a class="nav-link" href="movies.php">MOVIES</a></li>
									<li class="item-3"><a class="nav-link" href="rates_and_showtimes.php">RATES & SHOW TIMES<span class="sr-only">(current)</span></a></li>
									<li class="item-4"><a class="nav-link" href="theatres.php">THEATRES</a></li>
									<li class="item-5"><a class="nav-link" href="news.php">NEWS</a></li>
									<li class="item-6"><a class="nav-link" href="offers.php">OFFERS</a></li>
									<li class="item-7 active"><a class="nav-link" href="buy_tickets.php">BUY TICKETS</a></li>
									<li class="item-8"><a class="nav-link" href="contact_us.php">CONTACT US</a></li>
                                </ul>
                                <ul class="navbar-nav navbar-right">
									<?php if(isset($_SESSION['userID'])){ ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<?php echo strtoupper($_SESSION['username']) ?>
										</a>
										<ul class="dropdown-menu">
										<li><a href="user.danshboard.php">Dashboard</a></li>
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


    <!--Buy Tickets Body - Start-->
    <div class="buy-tickets">
        <!--Movie Banner-->
        <div class="movie_banner" id="movie_banner">
            <?php 
            if($movieID!=''){
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['banner'] ).'"/>';
            }else{
                echo '<img src="images/banner.jpg?v='.time().'"/>';
            }
            ?>    
        </div>
        <!--Select Movie-->
        <div class="movie-name">
            <div class="container">
                <div class="row">
                    <div class="movie_selection_list col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form>
                            <div class="form-group" id="now-showing-list">
                                <select class="form-control form-control-lg" id="selectMovie" onChange="SelectRedirect();">
                                    <?php
                                        $select_movie = "SELECT * FROM tbl_movies WHERE `status` = 1";
                                        $query_movie=mysqli_query($db,$select_movie);
                                        $rowCount_movie = mysqli_num_rows($query_movie);
                                        if($movieID!=''){
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }else{
                                        echo '<option value="">Select Movie</option>';
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Show-Datepicker-->
        <div class="show-date" id="show_date">
            <div class="container">
                <div class="row">
                    <div class="date_selection col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form >
                            <div class="form-group" >
                                <div class="input-group">
                                    <input type='text' class="form-control" id='datepicker' readonly="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Display Show-Time-Table-->
        <div class="show-time-table" id="time_table">
            <div class="container">
                <div class="row" style="margin:-1px 0px">
                    <table class="table table-responsive" id=table_details>  
                        <!--table link-->
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-fullscreen" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!--Link to Modal Content-->                    
                </div>
            </div>
        </div>
        
        
    <!--Buy Tickets Body - End-->
        
        
        
	
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
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.toast.min.js"></script>

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

    <!--Page Redirecting-->
        <script>
            //Redirecting to selected movie
            function SelectRedirect(){
                var $valueid = document.getElementById('selectMovie').value;
                window.location="buy_tickets.php?movieID="+$valueid;
            }

            //Setting the select option to current movieID
            $("#selectMovie > [value=" + "<?php echo $movieID ?>" + "]").attr("selected", "true");

        </script>

    <!--Date Picker Script-->
		<script>
			$( function() {
				$( "#datepicker" ).datepicker({
					dateFormat: 'yy-mm-dd',
					showOn: "button",
					buttonImage: "images/calendar.png",
					buttonText: "Select Date",
                    minDate: 0,
                    maxDate: +7,
                    beforeShowDay: enableAvailableDays
				});
			});
		</script>
        

    <!--Enabling Dates between Two Dates fetched from database-->
        <script>
            //Converting any number to two digits (for example: (9 -> 09))
            function pad2(number) {
               return (number < 10 ? '0' : '') + number;
            }
            
            //Fetching an array of dates between two dates
            var getDateArray = function(start, end) {
                var array_dates = new Array();
                var cur_date = new Date(start);
                while (cur_date <= end) {
                    var current_date=new Date(cur_date);
                    var formatted_date = current_date.getFullYear() + "-" + pad2(current_date.getMonth() + 1) + "-" + pad2(current_date.getDate());
                    array_dates.push(formatted_date);
                    cur_date.setDate(cur_date.getDate() + 1);
                }
                return array_dates;
            }
            
            
            var startDate = new Date("<?php echo $startingDate?>"); //YYYY-MM-DD
            var endDate = new Date("<?php echo $endingDate?>"); //YYYY-MM-DD
            
            //Enabling an array of dates
            var availableDates = getDateArray(startDate, endDate); //desired Dates
            function enableAvailableDays(date) {
                var sdate = $.datepicker.formatDate('yy-mm-dd', date)
                
                if($.inArray(sdate, availableDates) != -1){
                    return [true];
                }
                return[false];
            }       
        </script>


        <script>
            $('#datepicker').on('change',function(){
                var sel_Date = $(this).val();
                var movieID = jQuery('#selectMovie').val();
                if(sel_Date){
                    $.ajax({
                        type:'POST',
                        url:'assets/buy_tickets.inc.php',
                        data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                        success:function(html){
                            $('#table_details').html(html);
                        }
                    }); 
                }
            })
        </script>

        <script>
            $('#myModal').on('show.bs.modal', function () {
                $('body').css('overflow', 'hidden');
            })

            $('#myModal').on('hidden.bs.modal', function (e) {
                $('body').css('overflow', 'auto');
            })
        </script>
  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>