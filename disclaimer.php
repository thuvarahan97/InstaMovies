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
            .disclaimer p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .disclaimer .banner img {
              width:100%
            }
        </style>

	</head>

	
  <body>

		<!--Navbar Code - Start-->
		<?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <!--Disclaimer Body - Start-->
    <div class="disclaimer">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">DISCLAIMER, LIMITATION OF LIABILITY &amp; INDEMNITY</h2>
            
            <div>
							<p style="text-align: justify;">This Website has been compiled in good faith by InstaMovies and all information and data provided on this site is for informational purposes only.</p>
							<p style="text-align: justify;"><br />InstaMovies do not guarantee the accuracy, validity, completeness or the suitability of any information or data on this site (www.instamovies.cf). No representation is made or warranty given, either express or implied as to the completeness or accuracy of the information that it contains, that it will be uninterrupted or error free or that any information is free of bugs, viruses, worms, trojan horses or other harmful components.</p>
							<p style="text-align: justify;"><br />Although we believe that all information which currently appears on the www.instamovies.cf web site is to the best of our knowledge valid and accurate and has been obtained from reliable sources, it is however the sole responsibility of the user to ascertain the validity and accuracy of the information provided on the www.instamovies.cf site prior to making decisions.</p>
							<p style="text-align: justify;"><br />To the maximum extent permitted by law, InstaMovies disclaims all implied warranties with regard to information, products, services and material provided through this Website. All such information, products, services and materials are provided “as is” and “as available” without warranty of any kind.</p>
							<p style="text-align: justify;"><br />This Website may contain links to Web Sites operated by third parties. Such links are provided for your reference only and your use of these sites may be subject to terms and conditions posted on them. InstaMovies inclusion of links to other Websites does not imply any endorsement of the material on such Websites and InstaMovies accepts no liability for their contents. Further, the user agrees that InstaMovies cannot be held responsible for any damage, claims or any mishaps that may happen to occur from any link leading outside this site.</p>
							<p style="text-align: justify;"><br />By accessing this Website (www.instamovies.cf) you agree that InstaMovies will not be liable for any direct, indirect or consequential loss or damages of any nature arising from the use of this Website, including information and material contained in it, from your access of other material on the internet via web links from this Website, delay or inability to use this Website or the availability and utility of the products and services.</p>
							<p style="text-align: justify;"><br />You further agree to indemnify, hold InstaMovies harmless from and covenant not to sue InstaMovies for any claims based on using this Website (www.instamovies.cf). <br /><br /><br /></p>
            </div>
        </div>
    </div>
    <!--Disclaimer Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


		<script>
			$(".site-footer .bottom-footer .footer-item-4").addClass("active");
		</script>
   
  </body>
</html>