<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<!--Font Awesome CSS-->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		
		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

        <style>
            .about_us p {
                text-align: justify;
                margin: 0 0 10px;
            }
            .about_us .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <!--About Us Body - Start-->
    <div class="about_us">
			
        <!--Banner Code - Start-->
        <div class="banner">
            <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">About Us</h2>
            
            <div>
                <p style="font-size: 18px;"><strong>Project Overview</strong></p>
                <p>InstaMovies is an online cinema ticket booking website consisting the simulations of booking payments. This website has been designed by the team GenetriX as a project for the course module CS2062 - Object Oriented Software Development in the second semester of the Department of Computer Science and Engineering, University of Moratuwa.</p>
                <p>The project took a duration from mid of March 2019 upto end of May 2019 to get coampleted as a functioning website.</p>
                <p>This website is under simulation. This does not actually accept payments, provide refunds or book actual tickets in theatres.</p>
                <p>The basic design and features of this website <a href="http://www.instamovies.cf">www.instamovies.cf</a> has been inspired from the design and features of official website of EAP Films and Theatres i.e. <a href="http://www.eapmovies.com">www.eapmovies.com</a>.</p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;"><strong>Objective</strong></p>
                <p>This website has been built for easy access of ticket bookings in all the theatres all over Sri Lanka, and for enabling the users to get refunds by cancelling their booked seats pertaining to certain terms and conditions.</p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;"><strong>Key Features</strong></p>
                <p class="double_indent">Stunning theme and easy handling</p>
                <p class="indent">User accounts can be created and deleted when needed.</p>
                <p class="double_indent">Tickets can be booked for movies in theatres.</p>
                <p class="indent">Booked seats can be changed (when only booked with a user account).</p>
                <p class="double_indent">Booked ticket can be cancelled until two hours before the showtime.</p>
                <p class="indent">Cancelled tickets can be purchased by any InstaMovies account holder except the ticket cancelled user.</p>
                <p class="double_indent">Every ticket booking includes extra internet fees other than free ticket booking.</p>
                <p class="indent">Free tickets are available for certain movies according to available offers.</p>
                <p class="double_indent">Valid Coupon Codes can be applied to book tickets for certain movies having offers.</p>
                <p class="indent">Available movies, theatres and offers can be viewed in relevant pages of InstaMovies.</p>
                <p class="double_indent">Ticket rates and showtimes for every movies in different theatres can be viewed in Rates and Showtime page of InstaMovies.</p>
                <p class="indent">Available movies and theatres can be rated by the users.</p>
                <p class="indent">User account can be recovered when password is forgotten.</p>
                <p class="double_indent">User account password can be changed when required.</p>
                <p class="indent">Refunds can be obtained by obtaining confirmation from InstaMovies Admin.</p>
                <p class="double_indent">Users can contact the admin online through contact us section.</p>
                <p class="indent">Advertisements can be displayed in the InstaMovies Advertise page by contacting the administrator.</p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;"><strong>GenetriX Team Members</strong></p>
                <p class="double_indent">~ Sivaneswaran Thuvarahan</p>
                <p class="indent">~ Santhirakumar Thenusan</p>
                <p class="double_indent">~ Dilani Rajendran</p>
                <p class="indent">~ Thukaraka Pakeerathan</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
    <!--About Us Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		

		<script>
			$(".site-footer .bottom-footer .footer-item-5").addClass("active");
		</script>

  </body>
</html>