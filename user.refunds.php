<<<<<<< HEAD
<?php
session_start();
include_once ('db_config.php');

if(isset($_SESSION['userID']) && !empty($_SESSION['userID']) && !($_SESSION['userID']=='0')) {
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!--JQuery Toast CSS-->
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
        <title>InstaMovies</title>
        
        <style>
            .navbar {
                background:black !important;
            }
			#redeem {
				background:#af0014;
				padding:4px 7px;
				border-radius: 5px;
				color:#FFF;
				font-weight:400;
			}
			#redeem:hover {
				background:#c60016;
			}
			#redeem:active, #redeem:focus {
				box-shadow:none;
			}
			#refunds_table td {
				vertical-align:middle;
			}
        </style>

	</head>

	
  <body id="itemid-3" style="background-color:#ebebeb">

	<!--Navbar Code - Start-->
	<div class="header_wrapper">    
		<div class="main_menu_wrapper">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" role="navigation">
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

	
    <div style="margin-top:100px;margin-bottom:25px">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size: 45px;font-weight: normal;">Refunds</h1></div>
            <div class="table-responsive" style="min-height:285px">
                <?php
                    $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                ?>
                <table class="table table-striped table-bordered table-sm" id="refunds_table">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_refunds WHERE `user_id` = '{$_SESSION['userID']}' ORDER BY transaction_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    echo "<tr style='text-align:center'>";
                                        echo "<td>{$i}</td>";
										echo "<td>";
											if($row['transaction_time'] != '0000-00-00 00:00:00'){
												echo $row['transaction_time'];
											}
										echo "</td>";
										echo "<td>Rs. ".number_format((float)$row['amount'], 2, '.', '')."</td>";
										echo "<td>";
											if($row['status'] == '0'){
												echo "<span style='font-weight:bold;font-size:15px;color:red'>Pending</span>";
											}else if($row['status'] == '1'){
												echo "<span style='font-weight:bold;font-size:15px;color:green'>&#10003;</span>";											
											}
										echo "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='3' style='padding-left:7px'>No refunds available.</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        


	<div class="modal fade" id="redeemModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" style="background:white">
            <div class="modal-header">
                <h5 class="modal-title">Redeem Refund</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="redeemForm">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Account Type:</label>
                        <div class="col-sm-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:0">
                        <label class="col-sm-4 col-form-label">Account Number:</label>
                        <div class="col-sm-8">
                            <input id="ticket_id" type="text" class="form-control" maxlength="15" style="text-transform:uppercase">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="confirm" type="button" class="btn btn-primary">Confirm</button>
            </div>
            </div>
        </div>
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
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.toast.min.js"></script>
		

  </body>
</html>

<?php
}else{
    header('location: index.php');
}
=======
<?php
session_start();
include_once ('db_config.php');

if(isset($_SESSION['userID']) && !empty($_SESSION['userID']) && !($_SESSION['userID']=='0')) {
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!--JQuery Toast CSS-->
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
        <title>InstaMovies</title>
        
        <style>
            .navbar {
                background:black !important;
            }
			#redeem {
				background:#af0014;
				padding:4px 7px;
				border-radius: 5px;
				color:#FFF;
				font-weight:400;
			}
			#redeem:hover {
				background:#c60016;
			}
			#redeem:active, #redeem:focus {
				box-shadow:none;
			}
			#refunds_table td {
				vertical-align:middle;
			}
        </style>

	</head>

	
  <body id="itemid-3" style="background-color:#ebebeb">

	<!--Navbar Code - Start-->
	<div class="header_wrapper">    
		<div class="main_menu_wrapper">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" role="navigation">
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

	
    <div style="margin-top:100px;margin-bottom:25px">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size: 45px;font-weight: normal;">Refunds</h1></div>
            <div class="table-responsive" style="min-height:285px">
                <?php
                    $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                ?>
                <table class="table table-striped table-bordered table-sm" id="refunds_table">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_refunds WHERE `user_id` = '{$_SESSION['userID']}' ORDER BY transaction_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    echo "<tr style='text-align:center'>";
                                        echo "<td>{$i}</td>";
										echo "<td>";
											if($row['transaction_time'] != '0000-00-00 00:00:00'){
												echo $row['transaction_time'];
											}
										echo "</td>";
										echo "<td>Rs. ".number_format((float)$row['amount'], 2, '.', '')."</td>";
										echo "<td>";
											if($row['status'] == '0'){
												echo "<span style='font-weight:bold;font-size:15px;color:red'>Pending</span>";
											}else if($row['status'] == '1'){
												echo "<span style='font-weight:bold;font-size:15px;color:green'>&#10003;</span>";											
											}
										echo "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='3' style='padding-left:7px'>No refunds available.</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        


	<div class="modal fade" id="redeemModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" style="background:white">
            <div class="modal-header">
                <h5 class="modal-title">Redeem Refund</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="redeemForm">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Account Type:</label>
                        <div class="col-sm-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:0">
                        <label class="col-sm-4 col-form-label">Account Number:</label>
                        <div class="col-sm-8">
                            <input id="ticket_id" type="text" class="form-control" maxlength="15" style="text-transform:uppercase">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="confirm" type="button" class="btn btn-primary">Confirm</button>
            </div>
            </div>
        </div>
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
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.toast.min.js"></script>
		

  </body>
</html>

<?php
}else{
    header('location: index.php');
}
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
?>