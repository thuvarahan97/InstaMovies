<?php
session_start();
$_SESSION['fullTicketCount'] = $_GET['fullTicketCount'];
$_SESSION['kidsTicketCount'] = $_GET['kidsTicketCount'];
$_SESSION['totalTicketCount'] = $_GET['totalTicketCount'];
$_SESSION['fullPrice'] = $_GET['fullPrice'];
$_SESSION['kidsPrice'] = $_GET['kidsPrice'];
$_SESSION['totalAmount'] = $_GET['totalAmount'];
$_SESSION['seatCategory'] = $_GET['seatCategory'];
$_SESSION['selectedSeats'] = $_GET['selectedSeats'];
$_SESSION['selectedSeatsID'] = $_GET['selectedSeatsID'];
$_SESSION['selectedSeatsBookingTemporaryID'] = $_GET['selectedSeatsBookingTemporaryID'];
$_SESSION['movieName'] = $_GET['movieName'];
$_SESSION['theaterName'] = $_GET['theaterName'];
$_SESSION['theaterCity'] = $_GET['theaterCity'];
$_SESSION['showTime'] = $_GET['showTime'];
$_SESSION['movieID'];
$_SESSION['theatreID'];
$_SESSION['showID'];
$_SESSION['showTimeID'];
$_SESSION['showDate'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		
		<!--Font Awesome CSS-->
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		
		<!--Glyphicons CSS-->
		<link rel="stylesheet" type="text/css" href="../css/glyphicon.css">

		<!--JQuery-UI CSS-->
		<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">

		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="../css/style.css">
        
		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="../images/icon.png">
		
		<title>Confirm Booking</title>

        <style>
            .booking_process_customer_details .banner img{
                width: 100%;
                height: 100%;
            }
            .booking_process_customer_details .form_details .col-form-label{
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 17px;
            }
            .booking_process_customer_details h1{
                font-size: 40px;
                font-weight: 300 !important;
            }
            .booking_process_customer_details .bookingtimer {
                background: #ad0b0b none repeat scroll 0 0;
                padding: 5px 8px 8px;
                margin-top: 10px;
                margin-bottom: 25px;
            }
            .booking_process_customer_details .bookingtimer > h3 {
                color: #fff;
                margin: 0;
                font-size: 25px;
                font-weight: 400;
            }
            .booking_process_customer_details .customerdetails {
                margin-right:20px;
                margin-bottom:25px;
            }
            .booking_process_customer_details .customerdetails .terms {
                margin: 20px 0 0;
            }
            .booking_process_customer_details .customerdetails .terms > input {
                margin: 0 10px 15px 0;
            }
            .booking_process_customer_details .customerdetails .error-form {
                display: none;
            }
            .booking_process_customer_details .customerdetails .error_code {
                color: #F00;
                font-size: 11px;
                display: none;
            }
            .booking_process_customer_details .ticketdetails {
                box-shadow: 0 0 0 1px #dfe3e7 inset;
                margin-bottom: 25px;
                margin-right:15px;
                padding: 15px 0 0;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails {
                margin: 0 15px;
                color: #606978;
                font-family: sans-serif;
                font-size: 14px;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails .tickets {
                text-align: center;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails .bookingdetails-heading {
                color: #322F36;
                font-size: 18px;
                font-weight: 400;
                margin-bottom: 25px;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails .movie {
                color: #322F36;
                font-size: 25px;
                font-family: sans-serif;
                margin-bottom:0;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails .seatdetails {
                margin-top: 15px;
                margin-bottom: 5px;
            }
            .booking_process_customer_details .ticketdetails .totalamount {
                background: #322F36 none repeat scroll 0 0;
                color: #fff;
                font-size: 24px;
                padding: 1px 15px 5px;
                font-weight: 500;
            }
            .booking_process_customer_details .ticketdetails .totalamount .amount{
                float: right;
            }
            .booking_process_customer_details .ticketdetails .charges {
                color: #606978;
                font-family: sans-serif;
                font-size: 15px;
            }
            .booking_process_customer_details .ticketdetails .subtotal {
                margin: 5px 15px;
            }
            .booking_process_customer_details .ticketdetails .subtotal .subtotalamount{
                float: right;
                font-weight: bold;
                font-size: 17px;
                color: #322F36;
            }
            .booking_process_customer_details .ticketdetails .internetfees {
                margin: 0 15px 15px;
            }
            .booking_process_customer_details .ticketdetails .internetfees .internetfeesamount{
                float: right;
                font-weight: bold;
                font-size: 17px;
                color: #322F36;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails::before {
                background: #FFF;
                border-bottom-right-radius: 22px;
                border-top-right-radius: 22px;
                border-right: 1px solid #dfe3e7;
                left: 0;
                top: 224px;
                content: "";
                display: inline-block;
                height: 22px;
                position: absolute;
                width: 11px;
                z-index: 1;
            }
            .booking_process_customer_details .ticketdetails .bookingdetails::after {
                background: #FFF;
                border-bottom-left-radius: 22px;
                border-top-left-radius: 22px;
                border-left: 1px solid #dfe3e7;
                right: 0;
                top: 224px;
                content: "";
                display: inline-block;
                height: 22px;
                position: absolute;
                width: 11px;
                z-index: 1;
            }
            .booking_process_customer_details .ticketdetails .internetfeesdetails {
                margin: 5px 0 15px 24px;
                font-size: 14px;
            }
            .booking_process_customer_details .ticketdetails .internetfeesdetails .bookingfeesamount, .nbtamount, .vatamount{
                float: right;
            }
            .booking_process_customer_details .ticketdetails #plus_sign {
                padding: 0px 4px;
                border-radius: 50%;
                box-shadow: inset 0 0 2px #606978;
                text-decoration: none;
                color: #606978;
                margin-right: 3px;
                cursor: pointer;
            }
            .booking_process_customer_details .ticketdetails #plus_sign:hover {
                background: #606978;
                color: #FFF;
                border: none;
            }
            #payment_type {
                margin: 0 10px 0 0;
                vertical-align: middle;
            }
            #payment_options_form {
                margin-bottom: 25px;
            }
            .coupon {
                width:350px;
                margin: auto;
            }
            .coupon .input-group-text {
                background: green;
                color: #FFF;
                font-weight: 500;
                user-select: none;
            }
        </style>

	</head>

	
  <body>

	<!--Navbar Code - Start-->
	<?php include('../header_assets.php'); ?>
	<!--Navbar Code - End-->

	
    <!--Rates and ShowTimes Body - Start-->
    <div class="booking_process_customer_details" style="padding-bottom: 45px">
			
        <!--Banner Code - Start-->
        <div class="banner">
            <img src="../images/banner.jpg?v=<?php echo time(); ?>"/>
        </div>
        <!--Banner Code - End-->

        <div class="container mt-4">
            <h1 style="margin-top:70px; font-weight:400">Confirm Booking</h1>

            <hr style="border:1px solid red"/>
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="bookingtimer bookingtimer_3" >
                        <h3>
                            You have 
                            <span id="timer">300</span> 
                            seconds to complete this booking.
                        </h3>
                    </div>
                </div>        
            </div>

            <div class="row">
                <div class="customerdetails col">
                    <div class="alert alert-danger error-form"> 
                    </div>
                    <form id="booking_customer_details">
                        <div class="form-group">
                            <span>Full Name</span>
                            <input id="customer_name" name="customer_name" placeholder="Your name" type="text" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <span>Mobile</span>
                            <input id="customer_phone" name="customer_phone" placeholder="07xxxxxxxx" type="text" class="form-control" maxlength="10" value="" required>
                        </div>
                        <div class="form-group">
                            <span>Email</span>
                            <input id="customer_email" name="customer_email" placeholder="example@email.com" type="text" class="form-control" value="" required>
                        </div>
                        <div class="terms"> 
                            <input type="checkbox" name="terms" id="terms"/>I Agree to <a href="../terms_and_conditions.php">Terms & Conditions</a>.
                            <div id="erromsgterms" class="error_code">Please Agree to Terms &amp; Conditions!</div>
                        </div>
                    </form>
                </div>
                <div class="ticketdetails col">
                    <div class="bookingdetails">
                        <div class="row"> 
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <h4 class="bookingdetails-heading">Booking Details</h4> 
                            </div>
                        </div>
                    
                        <div class="row">                               
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <div><h3 class="movie"><?php echo $_SESSION['movieName'] ?></h3></div>
                                <div class="theater"><?php echo $_SESSION['theaterName']." - ".$_SESSION['theaterCity'] ?></div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <div class="tickets"><h3 style="color: #322F36; margin-bottom: 0;"><?php echo $_SESSION['totalTicketCount'] ?></h3></div>
                                <div class="tickets">Ticket(s)</div>
                            </div>
                        </div>
                        
                        <div class="row">                               
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="seatdetails">
                                    <div>Full : <?php echo $_SESSION['fullTicketCount'] ?> Kids : <?php echo $_SESSION['kidsTicketCount'] ?></div>
                                    <div><?php echo $_SESSION['seatCategory'] ?> - <?php echo $_SESSION['selectedSeats'] ?></div>
                                    <div><?php echo date("D, d F, Y", strtotime($_SESSION['showDate'])) ?></div>
                                    <div><?php echo $_SESSION['showTime'] ?></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <hr style="border-top: 1px dashed #dfe3e7"/>

                    <div class="charges">
                        <div class="subtotal">
                            Sub Total:
                            <div class="subtotalamount">Rs. <?php echo number_format((float)$_SESSION['totalAmount'], 2, '.', '') ?></div>
                        </div>
                        <div class="internetfees">
                            <span id="plus_sign" data-toggle="collapse" href=".internetfeesdetails" aria-expanded="false">+</span>
                            Internet handling Fees:
                            <div id="internetfeesamount" class="internetfeesamount"></div>
                            <div class="internetfeesdetails collapse">
                                <div class="bookingfees">
                                    Booking Fees:
                                    <div id="bookingfeesamount" class="bookingfeesamount"></div>
                                </div>
                                <div class="nbt">
                                    NBT on Booking Fees @ 2%:
                                    <div id="nbtamount" class="nbtamount"></div>
                                </div>
                                <div class="vat">
                                    VAT on Booking Fees + NBT @ 15%:
                                    <div id="vatamount" class="vatamount"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="totalamount">
                        Amount Payable
                        <div id="payableamount" class="amount"></div>
                    </div>
                </div>
            </div>
            
            <?php
                $coupon_enable = "enabled";
                if ($coupon_enable == "enabled" && !isset($_SESSION['userID']) && $_SESSION['totalTicketCount'] == "1" && $_SESSION['movieID'] == 14) {
            ?>
                <div class="coupon input-group mb-4 mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Coupon Code</span>
                    </div>
                    <input type="text" class="form-control" id="coupon_code" placeholder="Coupon Code">
                </div>
            <?php } ?>

            <div class="payment_options" align="center" style="margin-top: 15px;">
                <form id="payment_options_form">
                    <table>
                        <tr><td><input class="pay_method" type="radio" name="payment_type" id="payment_type" value="visa_mastercard" checked = "checked"></td><td>Pay by Credit Card, Visa / Master</td><td style="padding-left:10px;"><img src="../images/pp_master.jpg" /></td></tr>
                        <tr><td><input disabled class="pay_method" type="radio" name="payment_type" id="payment_type" value="union"></td><td>Pay by Union Bank Credit</td><td style="padding-left:10px;"><img src="../images/pp_union.png" /></td></tr>
                        <tr><td><input disabled class="pay_method" type="radio" name="payment_type" id="payment_type" value="dfcc"></td><td>Pay by DFCC Bank Credit</td><td style="padding-left:10px;"><img src="../images/pp_dfcc.png" /></td></tr>
                    </table>                    
                </form>

                <input value="Pay Now" name="submit_payment" class="btn btn-danger btn-lg paybutton" id="submit_payment" type="button" style="padding-top:6px; font-family:Tahoma, Geneva, sans-serif">
                <input value="Cancel" name="cancel_payment" class="btn btn-secondary btn-lg" id="cancel_payment" type="button" style="padding-top:6px; font-family:Tahoma, Geneva, sans-serif">
            </div>

        </div>
    </div>
    <!--Rates and ShowTimes Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
	<?php include('../footer_assets.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-ui.js"></script>

        
    <!-- Booking Timer Script - Start -->
    <script>
        jQuery(document).ready(function(){
            var count = 300;
            var counter = null;
            
            window.onload = function() {
                initCounter();
            };
            
            function initCounter() {
                
                //check whether page is reloaded or loaded for first time
                if (performance.navigation.type == 1) {
                    //page is reloaded
                    //get count from localStorage, or set to initial value of 300
                    count = getLocalStorage('count') || 300;
                } else {
                    //page is loaded for first time
                    count = 300; 
                }
                counter = setInterval(timer, 1000); //1000 will run it every 1 second
            }

            function setLocalStorage(key, val) {
                if (window.localStorage) {
                    window.localStorage.setItem(key, val);
                }
                return val;
            }

            function getLocalStorage(key) {
                return window.localStorage ? window.localStorage.getItem(key) : '';
            }

            function timer() {
                count = setLocalStorage('count', count - 1);
                if (count <= 0) {
                    clearInterval(counter);
                    window.location.replace("../buy_tickets.php");
                }
                document.getElementById("timer").innerHTML = count;
            }
            
            //Another method for Timer
            // var seconds = document.getElementById("timer").textContent;
            // var countdown = setInterval(function() {
            //     seconds--;
            //     document.getElementById("timer").textContent = seconds;
            //     if (seconds <= 0) clearInterval(countdown);
            // }, 1000);
            

        });
        
    </script>
    <!-- Booking Timer Script - End -->
    
    <script>
        jQuery(document).ready(function(){            
            //Insert selected seats into temporary booking table if page loaded not from back or forward action
            if(performance.navigation.type != performance.navigation.TYPE_BACK_FORWARD) {
                $.ajax({
                    url:'booking_process_customer_details.bookings_temporary.insert.php',
                    type: 'POST',
                    data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&selectedSeatsID=' + "<?php echo $_SESSION['selectedSeatsID'] ?>"
                });
            }

            //Payment calculation
            var subtotal = <?php echo $_SESSION['totalAmount'] ?>;
            var fullTicketsCount = <?php echo $_SESSION['fullTicketCount'] ?>;
            var kidsTicketCount = <?php echo $_SESSION['kidsTicketCount'] ?>;
            var bookingfees = <?php echo $_SESSION['fullPrice'] ?> * 5/100 * fullTicketsCount + <?php echo $_SESSION['kidsPrice'] ?> * 5/100 * kidsTicketCount;
            var nbt = bookingfees * 2/100;
            var vat = (bookingfees + nbt) * 15/100;
            var internetfees = bookingfees + nbt + vat;
            var payableAmount = subtotal + internetfees;
            
            document.getElementById('bookingfeesamount').innerHTML = "Rs. " + bookingfees.toFixed(2);
            document.getElementById('nbtamount').innerHTML = "Rs. " + nbt.toFixed(2);
            document.getElementById('vatamount').innerHTML = "Rs. " + vat.toFixed(2);
            document.getElementById('internetfeesamount').innerHTML = "Rs. " + internetfees.toFixed(2);
            document.getElementById('payableamount').innerHTML = "Rs. " + payableAmount.toFixed(2);


            //Page Reload, Close, Back Forward - Actions - start
            var exit = true;
            $(window).on("keydown",function(e){
                if(e.which == 116){
                    exit = false;
                }
            });

            if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
                exit = true;
                window.location = "../buy_tickets.php";
            }

            window.onbeforeunload = function () {
                if (exit == true) {
                    //Delete selected seats from temporary booking table on page exit
                    $.ajax({
                        url:'booking_process_customer_details.bookings_temporary.delete.php',
                        type: 'POST',
                        data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&selectedSeatsID=' + "<?php echo $_SESSION['selectedSeatsID'] ?>"
                    });
                }
            };
            //Page Reload, Close, Back Forward - Actions - end


            $("#cancel_payment").click(function() {
                exit = true;
                window.location.replace("../buy_tickets.php?movieID=" + <?php echo $_SESSION['movieID'] ?>);
            });
            
            //validate customer phone initial number to be 0
            $('#customer_phone').keyup(function() {
                $(this).val(
                    $(this).val()
                        .replace(/^[^0]*/, '') // Remove starting non-zero characters
                        .replace(/[^\d]*/g, '') // Remove non-digit characters
                    );
                }
            );

            $("#submit_payment").click(function() {
                validate();
            });
            
            // jQuery( "#btn-coupon" ).click(function(e) {            
            //     validate(e);
            // });

            function validate(){
                var customername = jQuery("#customer_name").val();
                var customerphone = jQuery("#customer_phone").val();
                var customeremail = jQuery("#customer_email").val();

                var numberfilter = /^((\+[1-9]{1,10}[ \-]*)|(\([0-9]{2,10}\)[ \-]*)|([0-9]{2,10})[ \-]*)*?[0-9]{3,10}?[ \-]*[0-9]{0,10}?$/;
                var emailfilter = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

                if(customername!="" && customerphone!="" && customeremail!=""){
                    // alert(numberfilter.test(customerphone));
                    if (!numberfilter.test(customerphone) || customerphone.length!=10) {
                        jQuery(".error-form").show();
                        jQuery(".error-form").html("Invalid phone number !");

                    }else{
                        if(!emailfilter.test(customeremail)){
                            jQuery(".error-form").show();
                            jQuery(".error-form").html("Invalid email !");
                        }else{
                            jQuery(".error-form").hide();
                            saveUserData();
                        }
                    }
                }else{
                    jQuery(".error-form").show();
                    jQuery(".error-form").html("Fields can not be empty !");
                }
            }

            function saveUserData() {
                if(jQuery('#terms').prop('checked')){
                    jQuery(".error_code").hide();
                    
                    var coupon_code = "";
                    if($('div.coupon').length){
                        coupon_code = jQuery("#coupon_code").val();
                    }
                    if(coupon_code != "") {
                        if(["IM2019TW2032", "IM2019TW1274", "IM2019TW3948"].indexOf(coupon_code) >= 0) {
                            payableAmount = 0;
                        }else{
                            alert("Invalid Coupon Code");
                        }
                    }

                    if(coupon_code == "" || payableAmount == 0) {
                        var user_data = $("#booking_customer_details").serialize();
                        var paymentType = $("input[name='payment_type']:checked").val();
                        window.location = "booking_process_payment.php?" + user_data + "&internetFees=" + internetfees.toFixed(2) + "&paymentType=" + paymentType + "&payableAmount=" + payableAmount.toFixed(2);
                    }
                }else{
                    jQuery(".error_code").show();
                }
            }
            
        });
    </script>
    
  </body>
</html>