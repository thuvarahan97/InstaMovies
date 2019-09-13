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
            .career p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .career .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

	<!--Navbar Code - Start-->
	<?php include('header.php'); ?>
	<!--Navbar Code - End-->

	
    <!--Career Body - Start-->
    <div class="career">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Careers</h2>
            
            <div>
              <p>On this section of our website, you can view the current job vacancies at InstaMovies.</p>
              <p>With the vision of becoming the best cinema chain in Asia, we welcome high caliber &amp; dynamic individuals who wish to join our team. We have a very friendly culture &amp; a strong core value system, where you will be treated uniformly &amp; respectively. If you wish to live your dream with us, we warmly welcome you to join with our team.</p>
              <p>&nbsp;</p>
              <p>There are currently no vacancies available.</p>
              <br/>
            </div>
        </div>
    </div>
    <!--Career Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

   
	 	<script>
			$(".site-footer .bottom-footer .footer-item-9").addClass("active");
		</script>

  </body>
</html>