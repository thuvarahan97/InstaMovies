<<<<<<< HEAD
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
            .terms_and_conditions p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .terms_and_conditions .banner img {
              width:100%
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

	
    <!--Terms and Conditions Body - Start-->
    <div class="terms_and_conditions">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Terms and Conditions</h2>
            
            <div>
                <p style="font-size: 18px;">01. Introduction</p>
                <p>&nbsp;</p>
                <p>This website – www.instamovies.ga is owned and operated by Team GenetriX in the name of InstaMovies Private Limited.</p>
                <p>PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS SITE</p>
                <p>By using this Site or by clicking a box that states that you accept or agree to these terms, you signify your agreement to these terms of use. If you do not agree to these terms of use, you may not use this Site.</p>
                <p>You acknowledge that these terms of use are supported by reasonable and valuable consideration, the receipt and adequacy of which are hereby acknowledged. Without limiting the generality of the foregoing, you acknowledge that such consideration includes your use of this Site and receipt of data, materials and information available at or through this Site, the possibility of our use or display of your Submissions (as defined below in Section 3, entitled "SUBMISSIONS") and the possibility of the publicity and promotion from our use or display of your Submissions.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">02. Using the Site and Content</p>
                <p>&nbsp;</p>
                <p>The Site is only for your personal use. You may not use the Site for commercial purposes or in any way that is unlawful, or harms us or any other person or entity, as determined in our sole discretion.</p>
                <p>The following are the terms and conditions applicable to access and use of this website (or ‘site’). By gaining access to and using this site, you agree to comply with these terms and conditions and all applicable laws, rules and regulations.</p>
                <p>If you are not agreeable with these Terms of Use, kindly refrain from accessing and using the service provided by www.instamovies.ga.</p>
                <p>Registering with and/or the use of the www.instamovies.ga services and products, including and without limitation the www.instamovies.ga web site, purchase of movie and/or DVD –CD purchasing online, and other similar products or services offered by www.instamovies.ga, is indicative that you have read and understood the terms and conditions set forth below and agree to be legally bound by the said terms and conditions.<br />We reserve the right to change these terms of use from time to time by posting the new version on the website. It is your responsibility to check regularly this page for the latest terms and conditions.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">03. Permitted Use</p>
                <p>&nbsp;</p>
                <p>The service provided by www.instamovies.ga  is for personal &amp; non-commercial use.</p>
                <p>You hereby agree that you will not duplicate, download, publish, modify, distribute and/or use any material included in www.instamovies.ga for any purpose, unless and otherwise you have obtained prior written permission from www.instamovies.ga.<br /><br />You also agree that you will not use the services provided by www.instamovies.ga for any purpose other than to subscribe and review the information in www.instamovies.ga and purchase movie tickets and /or DVD – CD’s for your personal use.</p>
                <p>Use of the material and / or content contained in www.instamovies.ga for any purpose not set forth in these Terms of Use is strictly prohibited.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">04. Suppliers Terms and Conditions for the Sale of Items</p>
                <p>&nbsp;</p>
                <p>Where applicable, terms and conditions will apply to individual items or groups of items in your transaction based upon who is supplying those items. The supplier of each item or group of items will be clearly displayed at time of booking and on your confirmation of purchase documents. Please make sure to read and understand the individual supplier’s terms and conditions in addition to these general conditions<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">05. Payment</p>
                <p>&nbsp;</p>
                <p>All payments are subject to the terms and conditions of each bank and we have no authority over any payments made through the bank payment gateway. We do not retain your payment details or any other significant information such as your credit card number, passwords, pin number etc. Details of your credit / debit card may be securely held by the bank which processes your transaction.<br />All prices include Value Added Tax (VAT) and Nation Building Tax as applicable.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">06. Amendments in Bookings</p>
                <p>&nbsp;</p>
                <p><strong>Note:</strong> You should have made your bookings through your InstaMovies account in order to make amendments in bookings. A certain amount will be charged according to the type of amendment and ticket price.</p>
                <p>Tickets can be cancelled by publishing the ticket on InstaMovies website by entering your ticket number in the publish ticket prompt menu of your bookings page. Refunds will be made only if the published ticket is sold out to another customer. Seats can be changed even after bookings were made by entering your ticket number in the seat change prompt menu of your bookings page. These amendments are valid until 2 hours before the time of the booked movie show.</p>
                <p>Amendments such as date or time changes and lost tickets will NOT be entertained for any reason. Therefore make sure to check your payment details before you make your payments.</p>
                <p>www.instamovies.ga reserves the right to NOT to screen a movie ( and due to unavoidable circumstances) and in such cases refunds will be made to valid ticket holders.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">07. Change or Suspension of Site</p>
                <p>&nbsp;</p>
                <p>We reserve the right to modify or discontinue, temporarily or permanently, this Site or any part of this Site with or without notice. You agree that we shall not be liable to you or any third party for any modification, suspension or discontinuance of the Site and / or any Services under this agreement, for any reason. We do not guarantee continuous, uninterrupted or secure access to our service, and operation of our Site which may be interfered with by numerous factors outside of our control. In addition, the Site could be unavailable during certain periods of time while it is being updated and modified. During this time, the Site will be temporarily unavailable.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">08. Duplication of tickets (False ticket generation)</p>
                <p>&nbsp;</p>
                <p>It is your responsibility to ensure that you carry the original confirmation receipt to theater with you.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">09. Registration, Accounts and Passwords</p>
                <p>&nbsp;</p>
                <p>You agree to provide accurate, current and complete data about yourself on the www.instamovies.ga registration form and keep your profile updated with accurate, current and complete information.</p>
                <p>You also understand that failure to maintain accurate, current and complete information in your profile will give www.instamovies.ga adequate cause to suspend or terminate your use of its services.</p>
                <p>Upon registration you will receive a User Name and Password. Continued maintenance of confidentiality with regard to your User Name and Password will always remain your sole responsibility. You agree to bring to the immediate notice of www.instamovies.ga any unauthorized use of your password or account or any other breach of security. You also agree to ensure that you exit from your account each time you use www.instamovies.ga. Access to and use of password protected and/or secure areas of www.instamovies.ga is restricted to its registered users only. Unauthorized attempts to access these areas of www.instamovies.ga may be subject to prosecution.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">10. Privacy Policy</p>
                <p>&nbsp;</p>
                <p>Your use of www.instamovies.ga is governed by its Privacy Policy. You hereby agree to www.instamovies.ga collection, use and sharing of your information as set forth in the www.instamovies.ga Privacy Policy.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">11. User Conduct</p>
                <p>&nbsp;</p>
                <p>You agree that you will not use www.instamovies.ga to upload, post, or otherwise distribute or facilitate distribution of any material that is</p>
                <ul class="page_bullet">
                <li>Libelous, defamatory or slanderous;</li>
                <li>Sexually suggestive or contains explicit sexual content (including nudity) and Child Pornography;</li>
                <li>Does or may denigrate or offend any individual or group on the basis of religion, gender, sexual orientation, race, ethnicity, age, or disability;</li>
                <li>Does or may threaten, abuse, harass, or invade the privacy of any third party;</li>
                <li>Infringes the rights of any third party, including, without limitation, patent, trademark, trade secret, copyright, right of publicity, or other proprietary rights;</li>
                <li>Condones, promotes, contains or links to cracks, hacks or similar utilities or programs;</li>
                <li>Constitutes unauthorized or unsolicited advertising, junk or bulk e-mail (also known as “spam”), chain letters, any other form of unauthorized solicitation, or any form of lottery or gambling;</li>
                <li>Contains a software virus or any other computer code that is designed or intended to disrupt, damage, or limit the functioning of any software, hardware, or telecommunications equipment, or to damage or obtain unauthorized access to any data or other information of any third party;</li>
                <li>Impersonates any person or entity, including any employee or representative of www.instamovies.ga; or</li>
                <li>Violates any applicable law or these Terms of Use.</li>
                </ul>
                <p><br />You also agree that you will not collect information about third parties via www.instamovies.ga or use any such information for the purpose of transmitting and / or facilitating transmission of unauthorized or unsolicited advertising, junk or bulk e-mail, chain letters, or any other form of unauthorized solicitation.<br /><br />You agree that you will not engage in the systematic retrieval of data or other content from www.instamovies.ga to create or compile, directly or indirectly, a collection, compilation, database or directory, without www.instamovies.ga’s prior written consent. You agree not to take any actions for the purpose of manipulating or distorting, or that may undermine the integrity and accuracy of, any ratings or reviews of any movie or other entertainment program, service or product that may be presented by www.instamovies.ga.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">12. Copyrights</p>
                <p>&nbsp;</p>
                <p>www.instamovies.ga respects the intellectual property of others, and we ask our users to do the same. If notified of allegedly infringing, defamatory, damaging, illegal, or offensive content, www.instamovies.ga may, in its sole discretion, investigate the allegation and/or edit, remove or request the removal of such content. Notwithstanding the foregoing, www.instamovies.ga does not ensure that any such content will be edited or removed. www.instamovies.ga may terminate the accounts of users who infringe the intellectual property rights of others.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">13. Proprietary Rights</p>
                <p>&nbsp;</p>
                <p>www.instamovies.ga owns all right, title and interest in and to this service and all materials and content contained in www.instamovies.ga, including, without limitation, all content, site design, logos, button icons, images, digital downloads, data compilations, text, and graphics are protected by copyright, trademark and other intellectual property laws. Any unauthorized use of the materials provided as part of the www.instamovies.ga is strictly prohibited.<br /><br />Permission is granted to individual consumers to electronically copy and to print hard copy portions of the Site solely for personal use. Any other use of materials on the site, including reproduction for purposes other than those noted above, modification, distribution, or republication, any form of data extraction or data mining, or other commercial exploitation of any kind, without prior written permission of an authorized officer of www.instamovies.ga is strictly prohibited. You agree that you will not use any robot, spider, other automatic device, or manual process to monitor or copy our Web pages or the content contained therein without prior written permission of an authorized officer of www.instamovies.ga.</p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">14. Termination</p>
                <p>&nbsp;</p>
                <p>In its sole and absolute discretion, with or without notice to you www.instamovies.ga may</p>
                <ul class="page_bullet">
                <li>Suspend or terminate your use of the services provided by www.instamovies.ga,</li>
                <li>Terminate your account at www.instamovies.ga;</li>
                </ul>
                <p>You may terminate your account by informing in writing to www.instamovies.ga about your decision to terminate your account and www.instamovies.ga will de-activate your account upon receipt of such notification.  www.instamovies.ga shall not be liable to you or any third party for any claims or damages arising out of any termination or suspension of its service.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">15. General</p>
                <p>&nbsp;</p>
                <p>The Terms of Use and the relationship between you and www.instamovies.ga shall be governed by the laws of the Republic of Sri Lanka. The section titles in these Terms of Use are for convenience only and have no legal or contractual effect.</p>
                <p>These terms and conditions are binding upon and shall ensure the benefit of both parties, their respective successors, heirs, executor, administrators, personal representatives and permitted assigns.<br />You shall not assign your rights or obligations hereunder without www.instamovies.ga’s prior written consent. <br /><br /><br /></p> 
            </div>
        </div>
    </div>
    <!--Terms and Conditions Body - End-->
        
        
        
	
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
						<li class="footer-item-3 active"><a href="terms_and_conditions.php">Terms of Use</a></li>
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
            .terms_and_conditions p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .terms_and_conditions .banner img {
              width:100%
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

	
    <!--Terms and Conditions Body - Start-->
    <div class="terms_and_conditions">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Terms and Conditions</h2>
            
            <div>
                <p style="font-size: 18px;">01. Introduction</p>
                <p>&nbsp;</p>
                <p>This website – www.instamovies.ga is owned and operated by Team GenetriX in the name of InstaMovies Private Limited.</p>
                <p>PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS SITE</p>
                <p>By using this Site or by clicking a box that states that you accept or agree to these terms, you signify your agreement to these terms of use. If you do not agree to these terms of use, you may not use this Site.</p>
                <p>You acknowledge that these terms of use are supported by reasonable and valuable consideration, the receipt and adequacy of which are hereby acknowledged. Without limiting the generality of the foregoing, you acknowledge that such consideration includes your use of this Site and receipt of data, materials and information available at or through this Site, the possibility of our use or display of your Submissions (as defined below in Section 3, entitled "SUBMISSIONS") and the possibility of the publicity and promotion from our use or display of your Submissions.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">02. Using the Site and Content</p>
                <p>&nbsp;</p>
                <p>The Site is only for your personal use. You may not use the Site for commercial purposes or in any way that is unlawful, or harms us or any other person or entity, as determined in our sole discretion.</p>
                <p>The following are the terms and conditions applicable to access and use of this website (or ‘site’). By gaining access to and using this site, you agree to comply with these terms and conditions and all applicable laws, rules and regulations.</p>
                <p>If you are not agreeable with these Terms of Use, kindly refrain from accessing and using the service provided by www.instamovies.ga.</p>
                <p>Registering with and/or the use of the www.instamovies.ga services and products, including and without limitation the www.instamovies.ga web site, purchase of movie and/or DVD –CD purchasing online, and other similar products or services offered by www.instamovies.ga, is indicative that you have read and understood the terms and conditions set forth below and agree to be legally bound by the said terms and conditions.<br />We reserve the right to change these terms of use from time to time by posting the new version on the website. It is your responsibility to check regularly this page for the latest terms and conditions.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">03. Permitted Use</p>
                <p>&nbsp;</p>
                <p>The service provided by www.instamovies.ga  is for personal &amp; non-commercial use.</p>
                <p>You hereby agree that you will not duplicate, download, publish, modify, distribute and/or use any material included in www.instamovies.ga for any purpose, unless and otherwise you have obtained prior written permission from www.instamovies.ga.<br /><br />You also agree that you will not use the services provided by www.instamovies.ga for any purpose other than to subscribe and review the information in www.instamovies.ga and purchase movie tickets and /or DVD – CD’s for your personal use.</p>
                <p>Use of the material and / or content contained in www.instamovies.ga for any purpose not set forth in these Terms of Use is strictly prohibited.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">04. Suppliers Terms and Conditions for the Sale of Items</p>
                <p>&nbsp;</p>
                <p>Where applicable, terms and conditions will apply to individual items or groups of items in your transaction based upon who is supplying those items. The supplier of each item or group of items will be clearly displayed at time of booking and on your confirmation of purchase documents. Please make sure to read and understand the individual supplier’s terms and conditions in addition to these general conditions<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">05. Payment</p>
                <p>&nbsp;</p>
                <p>All payments are subject to the terms and conditions of each bank and we have no authority over any payments made through the bank payment gateway. We do not retain your payment details or any other significant information such as your credit card number, passwords, pin number etc. Details of your credit / debit card may be securely held by the bank which processes your transaction.<br />All prices include Value Added Tax (VAT) and Nation Building Tax as applicable.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">06. Amendments in Bookings</p>
                <p>&nbsp;</p>
                <p><strong>Note:</strong> You should have made your bookings through your InstaMovies account in order to make amendments in bookings. A certain amount will be charged according to the type of amendment and ticket price.</p>
                <p>Tickets can be cancelled by publishing the ticket on InstaMovies website by entering your ticket number in the publish ticket prompt menu of your bookings page. Refunds will be made only if the published ticket is sold out to another customer. Seats can be changed even after bookings were made by entering your ticket number in the seat change prompt menu of your bookings page. These amendments are valid until 2 hours before the time of the booked movie show.</p>
                <p>Amendments such as date or time changes and lost tickets will NOT be entertained for any reason. Therefore make sure to check your payment details before you make your payments.</p>
                <p>www.instamovies.ga reserves the right to NOT to screen a movie ( and due to unavoidable circumstances) and in such cases refunds will be made to valid ticket holders.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">07. Change or Suspension of Site</p>
                <p>&nbsp;</p>
                <p>We reserve the right to modify or discontinue, temporarily or permanently, this Site or any part of this Site with or without notice. You agree that we shall not be liable to you or any third party for any modification, suspension or discontinuance of the Site and / or any Services under this agreement, for any reason. We do not guarantee continuous, uninterrupted or secure access to our service, and operation of our Site which may be interfered with by numerous factors outside of our control. In addition, the Site could be unavailable during certain periods of time while it is being updated and modified. During this time, the Site will be temporarily unavailable.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">08. Duplication of tickets (False ticket generation)</p>
                <p>&nbsp;</p>
                <p>It is your responsibility to ensure that you carry the original confirmation receipt to theater with you.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">09. Registration, Accounts and Passwords</p>
                <p>&nbsp;</p>
                <p>You agree to provide accurate, current and complete data about yourself on the www.instamovies.ga registration form and keep your profile updated with accurate, current and complete information.</p>
                <p>You also understand that failure to maintain accurate, current and complete information in your profile will give www.instamovies.ga adequate cause to suspend or terminate your use of its services.</p>
                <p>Upon registration you will receive a User Name and Password. Continued maintenance of confidentiality with regard to your User Name and Password will always remain your sole responsibility. You agree to bring to the immediate notice of www.instamovies.ga any unauthorized use of your password or account or any other breach of security. You also agree to ensure that you exit from your account each time you use www.instamovies.ga. Access to and use of password protected and/or secure areas of www.instamovies.ga is restricted to its registered users only. Unauthorized attempts to access these areas of www.instamovies.ga may be subject to prosecution.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">10. Privacy Policy</p>
                <p>&nbsp;</p>
                <p>Your use of www.instamovies.ga is governed by its Privacy Policy. You hereby agree to www.instamovies.ga collection, use and sharing of your information as set forth in the www.instamovies.ga Privacy Policy.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">11. User Conduct</p>
                <p>&nbsp;</p>
                <p>You agree that you will not use www.instamovies.ga to upload, post, or otherwise distribute or facilitate distribution of any material that is</p>
                <ul class="page_bullet">
                <li>Libelous, defamatory or slanderous;</li>
                <li>Sexually suggestive or contains explicit sexual content (including nudity) and Child Pornography;</li>
                <li>Does or may denigrate or offend any individual or group on the basis of religion, gender, sexual orientation, race, ethnicity, age, or disability;</li>
                <li>Does or may threaten, abuse, harass, or invade the privacy of any third party;</li>
                <li>Infringes the rights of any third party, including, without limitation, patent, trademark, trade secret, copyright, right of publicity, or other proprietary rights;</li>
                <li>Condones, promotes, contains or links to cracks, hacks or similar utilities or programs;</li>
                <li>Constitutes unauthorized or unsolicited advertising, junk or bulk e-mail (also known as “spam”), chain letters, any other form of unauthorized solicitation, or any form of lottery or gambling;</li>
                <li>Contains a software virus or any other computer code that is designed or intended to disrupt, damage, or limit the functioning of any software, hardware, or telecommunications equipment, or to damage or obtain unauthorized access to any data or other information of any third party;</li>
                <li>Impersonates any person or entity, including any employee or representative of www.instamovies.ga; or</li>
                <li>Violates any applicable law or these Terms of Use.</li>
                </ul>
                <p><br />You also agree that you will not collect information about third parties via www.instamovies.ga or use any such information for the purpose of transmitting and / or facilitating transmission of unauthorized or unsolicited advertising, junk or bulk e-mail, chain letters, or any other form of unauthorized solicitation.<br /><br />You agree that you will not engage in the systematic retrieval of data or other content from www.instamovies.ga to create or compile, directly or indirectly, a collection, compilation, database or directory, without www.instamovies.ga’s prior written consent. You agree not to take any actions for the purpose of manipulating or distorting, or that may undermine the integrity and accuracy of, any ratings or reviews of any movie or other entertainment program, service or product that may be presented by www.instamovies.ga.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">12. Copyrights</p>
                <p>&nbsp;</p>
                <p>www.instamovies.ga respects the intellectual property of others, and we ask our users to do the same. If notified of allegedly infringing, defamatory, damaging, illegal, or offensive content, www.instamovies.ga may, in its sole discretion, investigate the allegation and/or edit, remove or request the removal of such content. Notwithstanding the foregoing, www.instamovies.ga does not ensure that any such content will be edited or removed. www.instamovies.ga may terminate the accounts of users who infringe the intellectual property rights of others.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">13. Proprietary Rights</p>
                <p>&nbsp;</p>
                <p>www.instamovies.ga owns all right, title and interest in and to this service and all materials and content contained in www.instamovies.ga, including, without limitation, all content, site design, logos, button icons, images, digital downloads, data compilations, text, and graphics are protected by copyright, trademark and other intellectual property laws. Any unauthorized use of the materials provided as part of the www.instamovies.ga is strictly prohibited.<br /><br />Permission is granted to individual consumers to electronically copy and to print hard copy portions of the Site solely for personal use. Any other use of materials on the site, including reproduction for purposes other than those noted above, modification, distribution, or republication, any form of data extraction or data mining, or other commercial exploitation of any kind, without prior written permission of an authorized officer of www.instamovies.ga is strictly prohibited. You agree that you will not use any robot, spider, other automatic device, or manual process to monitor or copy our Web pages or the content contained therein without prior written permission of an authorized officer of www.instamovies.ga.</p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">14. Termination</p>
                <p>&nbsp;</p>
                <p>In its sole and absolute discretion, with or without notice to you www.instamovies.ga may</p>
                <ul class="page_bullet">
                <li>Suspend or terminate your use of the services provided by www.instamovies.ga,</li>
                <li>Terminate your account at www.instamovies.ga;</li>
                </ul>
                <p>You may terminate your account by informing in writing to www.instamovies.ga about your decision to terminate your account and www.instamovies.ga will de-activate your account upon receipt of such notification.  www.instamovies.ga shall not be liable to you or any third party for any claims or damages arising out of any termination or suspension of its service.<strong></strong></p>
                <p>&nbsp;</p>
                <p style="font-size: 18px;">15. General</p>
                <p>&nbsp;</p>
                <p>The Terms of Use and the relationship between you and www.instamovies.ga shall be governed by the laws of the Republic of Sri Lanka. The section titles in these Terms of Use are for convenience only and have no legal or contractual effect.</p>
                <p>These terms and conditions are binding upon and shall ensure the benefit of both parties, their respective successors, heirs, executor, administrators, personal representatives and permitted assigns.<br />You shall not assign your rights or obligations hereunder without www.instamovies.ga’s prior written consent. <br /><br /><br /></p> 
            </div>
        </div>
    </div>
    <!--Terms and Conditions Body - End-->
        
        
        
	
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
						<li class="footer-item-3 active"><a href="terms_and_conditions.php">Terms of Use</a></li>
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