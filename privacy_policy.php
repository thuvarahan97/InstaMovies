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
            .privacy_policy p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .privacy_policy .banner img {
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

	
    <!--Privacy Policy Body - Start-->
    <div class="privacy_policy">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Privacy Policy</h2>
            
            <div>
              <p>www.instamovies.ga (Web based online tickets reservation solution of InstaMovies (Pvt) Limited.) is committed to maintaining the confidentiality, integrity and security of any personal information of our website users. We are proud of the strength of our site security and want you to know how we protect your information and use it. <br /><br />www.instamovies.ga stresses its privacy and security standards to guard against identity theft and provide security for your account information and other data. We constantly re-evaluate our privacy and security policies and adapt them as necessary to deal with new challenges.</p>
              <p>&nbsp;</p>
              <p style="font-size: 18px;">Your Privacy is not for sale</p>
              <p>&nbsp;</p>
              <p>We at www.instamovies.ga will not sell or rent your personal information to anyone, at any time or for any reason.</p>
              <p>&nbsp;</p>
              <p style="font-size: 18px;">We limit the collection and use of personal information</p>
              <p style="font-size: 18px;"> </p>
              <p>In order to sing-up as a member of www.instamovies.ga, you need to provide us with a Login ID, a valid email address and a password. www.instamovies.ga makes every effort to allow you to retain the anonymity of your personal identity and you are free to choose your Login ID, any valid email address and password that keeps your personal identity anonymous.</p>
              <p>Access to your personal identity information and your personal financial data is strictly restricted. Personally identifiable information generally includes information that could be used to determine your identity, such as your name, address, phone number, e-mail address, birth date and other demographic information.</p>
              <p>All information of personal nature, such as Name, NIC Number, and Contact Number etc are only needed in order to operate, develop or improve the service we provide. www.instamovies.ga requires the above mainly for the following circumstances:</p>
              <ul class="page_bullet">
              <li>To become a member of www.instamovies.ga</li>
              <li>To verify the authenticity of the ticket holder</li>
              <li>To register for any www.instamovies.ga newsletter/ and receive SMS based ticket confirmations / promotions. Note that SMS will only be sent to consented parties to which the service is subscribed for.</li>
              <li>To respond to any correspondence, such as emails or letters, from you.</li>
              </ul>
              <p><strong><br /></strong></p>
              <p style="font-size: 18px;">Your Registration Information is kept private</p>
              <p style="font-size: 18px;"> </p>
              <p>InstaMovies (www.instamovies.ga) uses your Personal Identity Information only for the following:</p>
              <ul class="page_bullet">
              <li>to analyze site usage and improve our service;</li>
              <li>to deliver to you any administrative notices, alerts and communications relevant to your use of InstaMovies (www.instamovies.ga) requires;</li>
              <li>to fulfill your requests for certain products and services;</li>
              <li>for market research, project planning, troubleshooting problems, detecting and protecting against error, fraud or other criminal activity;</li>
              <li>to enforce InstaMovies (www.instamovies.ga) requires Terms of Use; and</li>
              <li>Any item / items set forth in this Privacy and Security Policy.</li>
              </ul>
              <p>In the event that your access to www.instamovies.ga was brought to you by one of our partners, through a partner URL, your email address and other registration /access information used for registration to www.instamovies.ga, may be provided to such a partner.<br /><br /></p>
              <p style="font-size: 18px;">Account Information will not be disclosed</p>
              <p><br />www.instamovies.ga does not disclose your Personal Information and may disclose information and data only in a non-personally identifiable manner to: <br /><br /></p>
              <ul class="page_bullet">
              <li>Advertisers and other third parties for their marketing and promotional purposes;</li>
              <li>Organizations approved by www.instamovies.ga who conduct research into consumer spending.</li>
              <li>Users of the Service for purposes of comparison of their personal financial situation relative to the broader community.</li>
              </ul>
              <p><br />Such information does not identify you individually.<br /><br /></p>
              <p style="font-size: 18px;">Online session information and use is only used to improve your experience</p>
              <p><br />When you visitwww.instamovies.ga, we may collect technical and navigational information, such as computer browser type, Internet protocol address, pages visited, and average time spent on our Web site. This information may be used, for example, to alert you to software compatibility issues, or it may be analyzed to improve our Web design and functionality. <br /><br />External service providers will not be given your personal information without your permission<br /><br />There are a number of separate products and services offered by third parties advertised by us on our site, that may be complementary to your use of and these constitute www.instamovies.ga offers or ways to save. If you choose to use these separate products or services, disclose information to the providers, and/or grant them permission to collect information about you, then their use of your information is governed by their privacy policy. You should evaluate the practices of external service providers before deciding to use their services. These third party web sites may have different privacy policies when compared to www.instamovies.ga and www.instamovies.ga is not responsible for their privacy practices.<br /> <br />If you click on a link to a third party web site, we encourage you to check the privacy policy of that Web site. <br /><br />www.instamovies.ga may present links in a format that enables us to keep track of whether these links have been followed and whether any action has been taken on a third party Web site. We use this information to improve the quality of the www.instamovies.ga Offers and customized content on the Service.<br /><br /></p>
              <p style="font-size: 18px;">Disclosure of your information to protect our rights or if required by law</p>
              <p><br />Notwithstanding the foregoing, www.instamovies.ga reserves the right (and you authorize www.instamovies.ga) to share or disclose your Registration Information and Account information when www.instamovies.ga determines, in its sole discretion, that the disclosure of such information is necessary to identify, contact, or bring legal action against you if:<br /><br /></p>
              <ul class="page_bullet">
              <li>You are or may be violating this Privacy and Security Policy or www.instamovies.ga Terms of Use;</li>
              <li>to prevent potentially prohibited or illegal activities; or</li>
              <li>Necessary or required by any applicable law, rule regulation, subpoena or other legal process.</li>
              </ul>
              <p><strong><br /></strong></p>
              <p style="font-size: 18px;">Your data may be transferred upon acquisition of www.instamovies.ga but only in accordance with this policy</p>
              <p><br />Registration Information and Account Information may be transferred to a third party as a result of a sale, acquisition, merger, reorganization or other transfer (a “Transfer”) involving www.instamovies.ga. <br /><br />www.instamovies.ga specifically reserves the right to transfer Registration and Account Information to a third party in connection with a Transfer. Should such a Transfer occur, we will use our best efforts to require that the new combined entity follow this privacy and security policy with respect to your personal information, as and to the extent required by applicable law and require that you receive prior notice if your personal information could be used contrary to this policy. <br /><br /></p>
              <p style="font-size: 18px;">Cookies and Web Beacons are used to analyze site usage and improve the Service</p>
              <p><br />“Cookies” are alphanumeric identifiers in the form of text files that are inserted and stored by your Web browser on your computer’s hard drive. www.instamovies.ga  may set and access cookies on your computer to track and store preferential information about you. www.instamovies.ga  may gather anonymous information about you through cookie technology on an aggregate level only. For example, www.instamovies.ga may assign a cookie to you, to limit the amount of times you see a particular www.instamovies.ga Offer or to help better determine which www.instamovies.ga offers to serve to you.<br /><br />Please note that most Internet browsers will allow you to stop cookies from being stored on your computer and to delete cookies stored on your computer. If you choose to eliminate cookies, the full functionality of the Service may be impaired for you.<br /><br /></p>
              <p style="font-size: 18px;">Your data is secure and only seen by you</p>
              <p><br />Your data is yours and only you have access to your data on the www.instamovies.ga. We use a combination of firewall barriers, encryption techniques and authentication procedures, among others, to maintain the security of your online session and to protect www.instamovies.ga accounts and systems from unauthorized access.<br /><br />Our servers are in a secure facility. Security personnel are alerted to any external attacks on the network. Our databases are protected from general employee access both physically and logically and access controls implemented to the building that houses our serves.<br /><br /></p>
              <p style="font-size: 18px;">We use authentication to ensure that only you access your account</p>
              <p><br />Authentication is the process you go through on www.instamovies.ga to access secure areas of our Website. This process takes place when you log into your account, the two key components of which are your Login ID and Password. <br /><br />With regards to passwords, we maintain strict rules to help prevent others from guessing your password. We also recommend that you change your password periodically. Your password must be a minimum of 4 characters in length. You are responsible for maintaining the security of your Login ID and Password. You may not provide these credentials to any third party. If you believe that they have been stolen or been made known to others, you must contact us immediately at <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">support@instamovies.com</a> to request a change. We are not responsible if someone else accesses your account through Personal Identification Information which they have obtained from you or through a violation by you of this Privacy and Security Policy or www.instamovies.ga Terms of Use.<br /><br /></p>
              <p style="font-size: 18px;">We will notify you of any changes in this Privacy and Security Policy</p>
              <p> <br />If we change our privacy and security policy, we will update the date upon which this policy, including those changes became effective from at the top of this policy and post those changes to this policy, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. We reserve the right to modify this policy at any time, so please review it frequently.<br /><br /></p>
              <p style="font-size: 18px;">Changes to your Registration Information</p>
              <p><br />If your Personal Identity information changes, during your subscription to www.instamovies.ga, you may update your profile online.<br /><br /></p>
              <p style="font-size: 18px;">Contact us if you have any questions or concerns</p>
              <p>If you have questions, comments, concerns or feedback regarding this Privacy and Security Policy, send an e-mail to <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">support@instamovies.com</a><br/><br/><br/></p>
            </div>
        </div>
    </div>
    <!--Privacy Policy Body - End-->
        
        
        
	
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
						<li class="footer-item-2 active"><a href="privacy_policy.php">Privacy Policy</a></li>
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
            .privacy_policy p {
              text-align: justify;
              margin: 0 0 10px;
            }
            .privacy_policy .banner img {
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

	
    <!--Privacy Policy Body - Start-->
    <div class="privacy_policy">
			
        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px">Privacy Policy</h2>
            
            <div>
              <p>www.instamovies.ga (Web based online tickets reservation solution of InstaMovies (Pvt) Limited.) is committed to maintaining the confidentiality, integrity and security of any personal information of our website users. We are proud of the strength of our site security and want you to know how we protect your information and use it. <br /><br />www.instamovies.ga stresses its privacy and security standards to guard against identity theft and provide security for your account information and other data. We constantly re-evaluate our privacy and security policies and adapt them as necessary to deal with new challenges.</p>
              <p>&nbsp;</p>
              <p style="font-size: 18px;">Your Privacy is not for sale</p>
              <p>&nbsp;</p>
              <p>We at www.instamovies.ga will not sell or rent your personal information to anyone, at any time or for any reason.</p>
              <p>&nbsp;</p>
              <p style="font-size: 18px;">We limit the collection and use of personal information</p>
              <p style="font-size: 18px;"> </p>
              <p>In order to sing-up as a member of www.instamovies.ga, you need to provide us with a Login ID, a valid email address and a password. www.instamovies.ga makes every effort to allow you to retain the anonymity of your personal identity and you are free to choose your Login ID, any valid email address and password that keeps your personal identity anonymous.</p>
              <p>Access to your personal identity information and your personal financial data is strictly restricted. Personally identifiable information generally includes information that could be used to determine your identity, such as your name, address, phone number, e-mail address, birth date and other demographic information.</p>
              <p>All information of personal nature, such as Name, NIC Number, and Contact Number etc are only needed in order to operate, develop or improve the service we provide. www.instamovies.ga requires the above mainly for the following circumstances:</p>
              <ul class="page_bullet">
              <li>To become a member of www.instamovies.ga</li>
              <li>To verify the authenticity of the ticket holder</li>
              <li>To register for any www.instamovies.ga newsletter/ and receive SMS based ticket confirmations / promotions. Note that SMS will only be sent to consented parties to which the service is subscribed for.</li>
              <li>To respond to any correspondence, such as emails or letters, from you.</li>
              </ul>
              <p><strong><br /></strong></p>
              <p style="font-size: 18px;">Your Registration Information is kept private</p>
              <p style="font-size: 18px;"> </p>
              <p>InstaMovies (www.instamovies.ga) uses your Personal Identity Information only for the following:</p>
              <ul class="page_bullet">
              <li>to analyze site usage and improve our service;</li>
              <li>to deliver to you any administrative notices, alerts and communications relevant to your use of InstaMovies (www.instamovies.ga) requires;</li>
              <li>to fulfill your requests for certain products and services;</li>
              <li>for market research, project planning, troubleshooting problems, detecting and protecting against error, fraud or other criminal activity;</li>
              <li>to enforce InstaMovies (www.instamovies.ga) requires Terms of Use; and</li>
              <li>Any item / items set forth in this Privacy and Security Policy.</li>
              </ul>
              <p>In the event that your access to www.instamovies.ga was brought to you by one of our partners, through a partner URL, your email address and other registration /access information used for registration to www.instamovies.ga, may be provided to such a partner.<br /><br /></p>
              <p style="font-size: 18px;">Account Information will not be disclosed</p>
              <p><br />www.instamovies.ga does not disclose your Personal Information and may disclose information and data only in a non-personally identifiable manner to: <br /><br /></p>
              <ul class="page_bullet">
              <li>Advertisers and other third parties for their marketing and promotional purposes;</li>
              <li>Organizations approved by www.instamovies.ga who conduct research into consumer spending.</li>
              <li>Users of the Service for purposes of comparison of their personal financial situation relative to the broader community.</li>
              </ul>
              <p><br />Such information does not identify you individually.<br /><br /></p>
              <p style="font-size: 18px;">Online session information and use is only used to improve your experience</p>
              <p><br />When you visitwww.instamovies.ga, we may collect technical and navigational information, such as computer browser type, Internet protocol address, pages visited, and average time spent on our Web site. This information may be used, for example, to alert you to software compatibility issues, or it may be analyzed to improve our Web design and functionality. <br /><br />External service providers will not be given your personal information without your permission<br /><br />There are a number of separate products and services offered by third parties advertised by us on our site, that may be complementary to your use of and these constitute www.instamovies.ga offers or ways to save. If you choose to use these separate products or services, disclose information to the providers, and/or grant them permission to collect information about you, then their use of your information is governed by their privacy policy. You should evaluate the practices of external service providers before deciding to use their services. These third party web sites may have different privacy policies when compared to www.instamovies.ga and www.instamovies.ga is not responsible for their privacy practices.<br /> <br />If you click on a link to a third party web site, we encourage you to check the privacy policy of that Web site. <br /><br />www.instamovies.ga may present links in a format that enables us to keep track of whether these links have been followed and whether any action has been taken on a third party Web site. We use this information to improve the quality of the www.instamovies.ga Offers and customized content on the Service.<br /><br /></p>
              <p style="font-size: 18px;">Disclosure of your information to protect our rights or if required by law</p>
              <p><br />Notwithstanding the foregoing, www.instamovies.ga reserves the right (and you authorize www.instamovies.ga) to share or disclose your Registration Information and Account information when www.instamovies.ga determines, in its sole discretion, that the disclosure of such information is necessary to identify, contact, or bring legal action against you if:<br /><br /></p>
              <ul class="page_bullet">
              <li>You are or may be violating this Privacy and Security Policy or www.instamovies.ga Terms of Use;</li>
              <li>to prevent potentially prohibited or illegal activities; or</li>
              <li>Necessary or required by any applicable law, rule regulation, subpoena or other legal process.</li>
              </ul>
              <p><strong><br /></strong></p>
              <p style="font-size: 18px;">Your data may be transferred upon acquisition of www.instamovies.ga but only in accordance with this policy</p>
              <p><br />Registration Information and Account Information may be transferred to a third party as a result of a sale, acquisition, merger, reorganization or other transfer (a “Transfer”) involving www.instamovies.ga. <br /><br />www.instamovies.ga specifically reserves the right to transfer Registration and Account Information to a third party in connection with a Transfer. Should such a Transfer occur, we will use our best efforts to require that the new combined entity follow this privacy and security policy with respect to your personal information, as and to the extent required by applicable law and require that you receive prior notice if your personal information could be used contrary to this policy. <br /><br /></p>
              <p style="font-size: 18px;">Cookies and Web Beacons are used to analyze site usage and improve the Service</p>
              <p><br />“Cookies” are alphanumeric identifiers in the form of text files that are inserted and stored by your Web browser on your computer’s hard drive. www.instamovies.ga  may set and access cookies on your computer to track and store preferential information about you. www.instamovies.ga  may gather anonymous information about you through cookie technology on an aggregate level only. For example, www.instamovies.ga may assign a cookie to you, to limit the amount of times you see a particular www.instamovies.ga Offer or to help better determine which www.instamovies.ga offers to serve to you.<br /><br />Please note that most Internet browsers will allow you to stop cookies from being stored on your computer and to delete cookies stored on your computer. If you choose to eliminate cookies, the full functionality of the Service may be impaired for you.<br /><br /></p>
              <p style="font-size: 18px;">Your data is secure and only seen by you</p>
              <p><br />Your data is yours and only you have access to your data on the www.instamovies.ga. We use a combination of firewall barriers, encryption techniques and authentication procedures, among others, to maintain the security of your online session and to protect www.instamovies.ga accounts and systems from unauthorized access.<br /><br />Our servers are in a secure facility. Security personnel are alerted to any external attacks on the network. Our databases are protected from general employee access both physically and logically and access controls implemented to the building that houses our serves.<br /><br /></p>
              <p style="font-size: 18px;">We use authentication to ensure that only you access your account</p>
              <p><br />Authentication is the process you go through on www.instamovies.ga to access secure areas of our Website. This process takes place when you log into your account, the two key components of which are your Login ID and Password. <br /><br />With regards to passwords, we maintain strict rules to help prevent others from guessing your password. We also recommend that you change your password periodically. Your password must be a minimum of 4 characters in length. You are responsible for maintaining the security of your Login ID and Password. You may not provide these credentials to any third party. If you believe that they have been stolen or been made known to others, you must contact us immediately at <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">support@instamovies.com</a> to request a change. We are not responsible if someone else accesses your account through Personal Identification Information which they have obtained from you or through a violation by you of this Privacy and Security Policy or www.instamovies.ga Terms of Use.<br /><br /></p>
              <p style="font-size: 18px;">We will notify you of any changes in this Privacy and Security Policy</p>
              <p> <br />If we change our privacy and security policy, we will update the date upon which this policy, including those changes became effective from at the top of this policy and post those changes to this policy, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it. We reserve the right to modify this policy at any time, so please review it frequently.<br /><br /></p>
              <p style="font-size: 18px;">Changes to your Registration Information</p>
              <p><br />If your Personal Identity information changes, during your subscription to www.instamovies.ga, you may update your profile online.<br /><br /></p>
              <p style="font-size: 18px;">Contact us if you have any questions or concerns</p>
              <p>If you have questions, comments, concerns or feedback regarding this Privacy and Security Policy, send an e-mail to <a style="color:#ee1a03; text-decoration:none" href="mailto:thuvarahan97@gmail.com">support@instamovies.com</a><br/><br/><br/></p>
            </div>
        </div>
    </div>
    <!--Privacy Policy Body - End-->
        
        
        
	
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
						<li class="footer-item-2 active"><a href="privacy_policy.php">Privacy Policy</a></li>
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