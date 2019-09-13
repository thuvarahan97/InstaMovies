<?php
session_start();
include_once ('db_config.php');
if(isset($_SESSION['userID']) && !empty($_SESSION['userID']) && !($_SESSION['userID']=='0')) {

    $user = "SELECT * FROM tbl_users WHERE `user_id` = '{$_SESSION['userID']}'";
	$user_result = $db->query($user);
	$user_row = $user_result->fetch_assoc();
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
		
        <title>InstaMovies - <?php echo $user_row['first_name'];?> | Bookings</title>
        
        <style>
            .navbar {
                background:black !important;
            }
            @media (max-width: 575px){
                #ticketIDForm .form-control {
                    margin-bottom: 15px;
                }
                #ticketIDForm .row {
                    margin-left: 0;
                }
                #ticketIDForm .col-sm-8, .col-sm-2 {
                    padding-left: 0;
                    padding-right: 0;
                }
                #publishTicket_ticketIDForm .form-control {
                    margin-bottom: 15px;
                }
                #publishTicket_ticketIDForm .row {
                    margin-left: 0;
                }
                #publishTicket_ticketIDForm .col-sm-7, .col-sm-3 {
                    padding-left: 0;
                    padding-right: 0;
                }
            }
        </style>

	</head>

	
  <body id="itemid-3" style="background-color:#ebebeb">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <div style="margin-top:100px; margin-bottom:25px">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size:35px; font-weight:normal;">Bookings</h1></div>
            <div style="margin:10px 0 30px; text-align:center">
                <button class="btn btn-info" style="margin:0 2px" data-toggle="modal" data-target="#changeSeatModal">Change Seat</button>
                <button class="btn btn-success" style="margin:0 2px" data-toggle="modal" data-target="#publishTicketModal">Publish Ticket</button>
            </div>
            <div class="table-responsive" style="padding:0 15px">
                <table id="bookings_table" class="table table-striped table-bordered table-sm">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Ticket ID</th>
                            <th>Booking Time</th>
                            <th>Movie</th>
                            <th>Theater</th>
                            <th>Show Date</th>
                            <th>Show Time</th>
                            <th>Category</th>
                            <th>Ticket Count</th>
                            <th>Seat(s)</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT A.*, GROUP_CONCAT(A.seat_number ORDER BY A.seat_id ASC) AS seat_number, B.movie_name, C.theatre_name, C.city, E.starting_time FROM tbl_bookings A, tbl_movies B, tbl_theatres C, tbl_shows D, tbl_showtimes E WHERE A.user_id = '{$_SESSION['userID']}' AND A.show_id = D.show_id AND B.movie_id = D.movie_id AND C.theatre_id = D.theatre_id AND A.showtime_id = E.showtime_id GROUP BY A.ticket_id ORDER BY booking_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    $show_datetime = strtotime($row['show_date']." ".$row['starting_time']);
                                    $current_datetime = time();
                                    $timeDiff =  $show_datetime - $current_datetime;
                                    echo "<tr>";
                                        echo "<td>{$i}</td>";
                                        echo "<td>{$row['ticket_id']}</td>";
                                        echo "<td>{$row['booking_time']}</td>";
                                        echo "<td>{$row['movie_name']}</td>";
                                        echo "<td>{$row['theatre_name']} - {$row['city']}</td>";
                                        echo "<td>{$row['show_date']}</td>";
                                        echo "<td>".date('h:i A', strtotime($row['starting_time']))."</td>";
                                        echo "<td>{$row['ticket_category']}</td>";
                                        echo "<td>"."Full: {$row['full_seat_count']}"."<br>"."Kids: {$row['kids_seat_count']}"."</td>";
                                        echo "<td>{$row['seat_number']}</td>";
                                        echo "<td>Rs. ".number_format((float)$row['total_amount'], 2, '.', '')."</td>";
                                        echo "<td style='text-align:center'>";
                                            if($row['status'] == '2'){
                                                echo "<span style='font-weight:bold;color:#c40099'>Sold<br>(&#10003;)</span>";
                                            }else if($row['status'] == '1'){
                                                if ($timeDiff > 3600){
                                                    echo "<span style='font-weight:bold;color:#017ec6'>Published</span>";
                                                }else{
                                                    echo "<span style='font-weight:bold;color:#ce0000'>Not sold<br>(&#10007;)</span>";
                                                }
                                            }else{
                                                if ($timeDiff > 0){
                                                    echo "<span style='font-weight:bold;color:green'>Booked</span>";
                                                }else{
                                                    echo "<span style='font-weight:bold;font-size:20px;color:green'>&#10003;</span>";
                                                }
                                            }
                                            echo "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='12' style='padding-left:7px'>No bookings found.</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Ticket ID</th>
                            <th>Booking Time</th>
                            <th>Movie</th>
                            <th>Theater</th>
                            <th>Show Date</th>
                            <th>Show Time</th>
                            <th>Category</th>
                            <th>Ticket Count</th>
                            <th>Seat(s)</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>


    <div style="margin-top:25px; margin-bottom:25px">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size:35px; font-weight:normal">Purchased Tickets</h1></div>

            <div class="table-responsive" style="padding:0 15px">
                <table id="bookings_table" class="table table-striped table-bordered table-sm">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Ticket ID</th>
                            <th>Booking Time</th>
                            <th>Movie</th>
                            <th>Theater</th>
                            <th>Show Date</th>
                            <th>Show Time</th>
                            <th>Category</th>
                            <th>Ticket Count</th>
                            <th>Seat(s)</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT A.*, GROUP_CONCAT(A.seat_number ORDER BY A.seat_id ASC) AS seat_number, B.movie_name, C.theatre_name, C.city, E.starting_time, F.timestamp FROM tbl_bookings A, tbl_movies B, tbl_theatres C, tbl_shows D, tbl_showtimes E, tbl_bookings_purchase F WHERE F.user_id = '{$_SESSION['userID']}' AND F.ticket_id = A.ticket_id AND A.show_id = D.show_id AND B.movie_id = D.movie_id AND C.theatre_id = D.theatre_id AND A.showtime_id = E.showtime_id GROUP BY A.ticket_id ORDER BY booking_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    $show_datetime = strtotime($row['show_date']." ".$row['starting_time']);
                                    $current_datetime = time();
                                    $timeDiff =  $show_datetime - $current_datetime;
                                    echo "<tr>";
                                        echo "<td>{$i}</td>";
                                        echo "<td>{$row['ticket_id']}</td>";
                                        echo "<td>{$row['timestamp']}</td>";
                                        echo "<td>{$row['movie_name']}</td>";
                                        echo "<td>{$row['theatre_name']} - {$row['city']}</td>";
                                        echo "<td>{$row['show_date']}</td>";
                                        echo "<td>".date('h:i A', strtotime($row['starting_time']))."</td>";
                                        echo "<td>{$row['ticket_category']}</td>";
                                        echo "<td>"."Full: {$row['full_seat_count']}"."<br>"."Kids: {$row['kids_seat_count']}"."</td>";
                                        echo "<td>{$row['seat_number']}</td>";
                                        echo "<td>Rs. ".number_format((float)$row['total_amount'], 2, '.', '')."</td>";
                                        
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='11' style='padding-left:7px'>No purchased tickets found.</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Ticket ID</th>
                            <th>Booking Time</th>
                            <th>Movie</th>
                            <th>Theater</th>
                            <th>Show Date</th>
                            <th>Show Time</th>
                            <th>Category</th>
                            <th>Ticket Count</th>
                            <th>Seat(s)</th>
                            <th>Total Amount</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
        
        
    <div class="modal fade" id="changeSeatModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="background:white">
            <div class="modal-header">
                <h5 class="modal-title">Change Seat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ticketIDForm">
                    <div class="form-group row" style="margin-bottom:0;margin-right:0">
                        <label class="col-sm-2 col-form-label">Ticket ID:</label>
                        <div class="col-sm-8">
                            <input id="changeSeat_ticket_id" type="text" class="form-control" maxlength="15" style="text-transform:uppercase">
                        </div>
                        <button id="changeSeat_viewTicket" type="button" class="btn btn-danger col-sm-2">View</button>
                    </div>
                </form>

                <div id="changeSeat_details">
                </div>

                <div id="changeSeat_invalid" class="alert alert-danger" style="margin:20px 0 0;padding:8px;text-align:center;display:none" role="alert">
                    Ticket ID is invalid!
                </div>
                
                <div id="customerDetails" style="display:none">
                    <div style="background:#000; color:#FFF; padding:5px 10px; margin:0 0 20px; font-size:20px; text-align:center">You have <span id="timer">200</span>  seconds to complete this process.</div>
                    
                    <div id="changeSeat_errorForm" class="alert alert-danger" style="margin:0 0 15px;padding:8px;text-align:center;display:none" role="alert">
                    </div>
                    
                    <form id="customerDetailsForm">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer Name:</label>
                            <div class="col-sm-9">
                                <input id="customer_name" name="customer_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer Mobile:</label>
                            <div class="col-sm-9">
                                <input id="customer_mobile" name="customer_mobile" type="text" maxlength="10" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer Email:</label>
                            <div class="col-sm-9">
                                <input id="customer_email" name="customer_email" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="terms" style="margin:20px 0 0"> 
                            <input style="margin: 0 10px 15px 0" type="checkbox" name="terms" id="terms"/>I Agree to <a href="terms_and_conditions.php">Terms & Conditions</a>.
                            <div class="error_code" style="color:red; font-size:11px; display: none;">Please Agree to Terms &amp; Conditions!</div>
                        </div>
                    </form>

                    <div class="payment_options" align="center" style="margin-top: 20px">
                        <form id="payment_options_form">
                            <table>
                                <tr><td><input class="pay_method" type="radio" name="payment_type" id="payment_type" value="visa_mastercard" checked = "checked"></td><td>Pay by Credit Card, Visa / Master</td><td style="padding-left:10px;"><img src="images/pp_master.jpg" /></td></tr>
                                <tr><td><input disabled class="pay_method" type="radio" name="payment_type" id="payment_type" value="union"></td><td>Pay by Union Bank Credit</td><td style="padding-left:10px;"><img src="images/pp_union.png" /></td></tr>
                                <tr><td><input disabled class="pay_method" type="radio" name="payment_type" id="payment_type" value="dfcc"></td><td>Pay by DFCC Bank Credit</td><td style="padding-left:10px;"><img src="images/pp_dfcc.png" /></td></tr>
                            </table>                    
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="changeSeat_confirm" type="button" class="btn btn-primary">Confirm</button>
                <button id="changeSeat_pay" type="button" class="btn btn-primary" style="display:none">Pay Now</button>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="publishTicketModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" style="background:white">
            <div class="modal-header">
                <h5 class="modal-title">Cancel & Publish Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="publishTicket_ticketIDForm">
                    <div class="form-group row" style="margin-bottom:0;margin-right:0">
                        <label class="col-sm-3 col-form-label">Ticket ID:</label>
                        <div class="col-sm-7">
                            <input id="ticket_id" type="text" class="form-control" maxlength="15" style="text-transform:uppercase">
                        </div>
                        <button id="viewTicket" type="button" class="btn btn-danger col-sm-2">View</button>
                    </div>
                </form>

                <div id="ticketDetails">
                </div>
                
                <div id="invalid" class="alert alert-danger" style="margin:20px 0 0;padding:8px;text-align:center;display:none" role="alert">
                    Ticket ID is invalid!
                </div>
                
                <div id="publishTicket_customerDetails" style="display:none">
                    <div style="background:#000; color:#FFF; padding:5px 10px; margin:0 0 20px; font-size:20px; text-align:center">You have <span id="publishTicket_timer">200</span>  seconds to complete this process.</div>
                    
                    <div id="publishTicket_errorForm" class="alert alert-danger" style="margin:0 0 15px;padding:8px;text-align:center;display:none" role="alert">
                    </div>
                    
                    <form id="publishTicket_customerDetailsForm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Customer Name:</label>
                            <div class="col-sm-8">
                                <input id="publishTicket_customer_name" name="customer_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Customer Mobile:</label>
                            <div class="col-sm-8">
                                <input id="publishTicket_customer_mobile" name="customer_mobile" type="text" maxlength="10" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Customer Email:</label>
                            <div class="col-sm-8">
                                <input id="publishTicket_customer_email" name="customer_email" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="terms" style="margin:20px 0 0"> 
                            <input style="margin: 0 10px 15px 0" type="checkbox" name="publishTicket_terms" id="publishTicket_terms"/>I Agree to <a href="terms_and_conditions.php">Terms & Conditions</a>.
                            <div class="publishTicket_error_code" style="color:red; font-size:11px; display: none;">Please Agree to Terms &amp; Conditions!</div>
                        </div>
                    </form>

                    <div class="payment_options" align="center" style="margin-top: 20px">
                        <form id="publishTicket_payment_options_form">
                            <table>
                                <tr><td><input class="pay_method" type="radio" name="publishTicket_payment_type" id="publishTicket_payment_type" value="visa_mastercard" checked = "checked"></td><td>Pay by Credit Card, Visa / Master</td><td style="padding-left:10px;"><img src="images/pp_master.jpg" /></td></tr>
                                <tr><td><input disabled class="pay_method" type="radio" name="publishTicket_payment_type" id="publishTicket_payment_type" value="union"></td><td>Pay by Union Bank Credit</td><td style="padding-left:10px;"><img src="images/pp_union.png" /></td></tr>
                                <tr><td><input disabled class="pay_method" type="radio" name="publishTicket_payment_type" id="publishTicket_payment_type" value="dfcc"></td><td>Pay by DFCC Bank Credit</td><td style="padding-left:10px;"><img src="images/pp_dfcc.png" /></td></tr>
                            </table>                    
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="publishTicket_confirm" type="button" class="btn btn-primary">Confirm</button>
                <button id="publishTicket_pay" type="button" class="btn btn-primary" style="display:none">Pay Now</button>
            </div>
            </div>
        </div>
    </div>

        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.toast.min.js"></script>
		

    <script>
        jQuery(document).ready(function(){
            //Publish Ticket -start
            $('#publishTicketModal').on('shown.bs.modal', function () {
                $('#ticket_id').focus();
            });

            $("#ticketDetails").html("");

            $("#ticket_id").on("input", function(){
                $("#ticketDetails").html("");
                $("#invalid").hide();
            })
  
            $("#viewTicket").on("click", function(){
                var ticketID = $("#ticket_id").val();
                if(ticketID != ""){
                    $.ajax({
                        url:'assets/user.bookings.publishTicket.view_ticket.php',
                        type:'POST',
                        data:'ticketID=' + ticketID,
                        success:function(html){
                            if(html!=""){
                                $("#ticketDetails").html(html);
                            }else{
                                $("#invalid").show();
                            }
                        }
                    });
                }
            });
  
            $('#publishTicketModal').on('hidden.bs.modal', function () {
                $("#ticket_id").val("");
                $("#ticketDetails").html("");
                $("#invalid").hide();
                $("#publishTicket_customerDetails").hide();
                $("#publishTicket_customerDetailsForm")[0].reset();
                $("#publishTicket_ticketIDForm").show();
                $("#publishTicket_confirm").show();
                $("#publishTicket_pay").hide();
                $("#ticketDetails").show();
                $("#publishTicket_errorForm").hide();
                $(".publishTicket_error_code").hide();
            });

            $("#publishTicket_confirm").on("click", function(){
                if($("#ticketDetails").html()!=""){
                    var ticketID = $("#ticket_id").val();
                    $.ajax({
                        url:'assets/user.bookings.publishTicket.check.php',
                        type:'POST',
                        data:'ticketID=' + ticketID,
                        success:function(success){
                            if(success=="success"){
                                $("#publishTicket_ticketIDForm").hide();
                                $("#publishTicket_confirm").hide();
                                $("#publishTicket_pay").show();
                                $("#ticketDetails").hide();
                                $("#publishTicket_customerDetails").show();

                                $('#publishTicket_customer_name').focus();
                                
                                var remaining_time = 200;
                                document.getElementById("publishTicket_timer").innerHTML = remaining_time;
                                var publishTicket_Timer = setInterval(function(){
                                    remaining_time -= 1;
                                    document.getElementById("publishTicket_timer").innerHTML = remaining_time;
                                    if(remaining_time <= 0){
                                        remaining_time = 0;
                                        clearInterval(publishTicket_Timer);
                                        $("#publishTicketModal").modal("hide");
                                    }
                                    $('#publishTicketModal').on('hidden.bs.modal', function () {
                                        clearInterval(publishTicket_Timer);
                                    });
                                }, 1000);
                            }else{
                                $.toast({
                                    text: "Ticket was already published.",
                                    icon: 'error',
                                    position: 'top-center',
                                    hideAfter: 4000,
                                    stack: false,
                                    loader: false
                                });
                            }
                        }
                    }); 
                }
            });

            $("#publishTicket_pay").on("click", function(){
                var customername = jQuery("#publishTicket_customer_name").val();
                var customerphone = jQuery("#publishTicket_customer_mobile").val();
                var customeremail = jQuery("#publishTicket_customer_email").val();
                
                var numberfilter = /^((\+[1-9]{1,10}[ \-]*)|(\([0-9]{2,10}\)[ \-]*)|([0-9]{2,10})[ \-]*)*?[0-9]{3,10}?[ \-]*[0-9]{0,10}?$/;
                var emailfilter = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

                if(customername!="" && customerphone!="" && customeremail!=""){
                    if (!numberfilter.test(customerphone) || customerphone.length!=10) {
                        jQuery("#publishTicket_errorForm").show();
                        jQuery("#publishTicket_errorForm").html("Invalid phone number !");

                    }else{
                        if(!emailfilter.test(customeremail)){
                            jQuery("#publishTicket_errorForm").show();
                            jQuery("#publishTicket_errorForm").html("Invalid email !");
                        }else{
                            jQuery("#publishTicket_errorForm").hide();
                            publishTicket_saveUserData();
                        }
                    }
                }else{
                    jQuery("#publishTicket_errorForm").show();
                    jQuery("#publishTicket_errorForm").html("Fields can not be empty !");
                }
            });

            function publishTicket_saveUserData() {
                if(jQuery('#publishTicket_terms').prop('checked')){
                    jQuery(".publishTicket_error_code").hide();

                    var user_data = $("#publishTicket_customerDetailsForm").serialize();
                    var paymentType = $("input[name='publishTicket_payment_type']:checked").val();
                    window.location = "assets/user.bookings.publishTicket.payment.php?" + user_data + "&paymentType=" + paymentType;
                
                }else{
                    jQuery(".publishTicket_error_code").show();
                }
            }

            $('#publishTicket_customer_mobile').keyup(function() {
                $(this).val(
                    $(this).val()
                        .replace(/^[^0]*/, '') // Remove starting non-zero characters
                        .replace(/[^\d]*/g, '') // Remove non-digit characters
                    );
                }
            );
            //Publish Ticket - end



            //Change Seat - start
            $('#changeSeatModal').on('shown.bs.modal', function () {
                $('#changeSeat_ticket_id').focus();
            });

            $("#changeSeat_details").html("");
            $("#changeSeat_seats").html("");

            $("#changeSeat_ticket_id").on("input", function(){
                $("#changeSeat_details").html("");
                $("#changeSeat_invalid").hide();
            });
  
            $("#changeSeat_viewTicket").on("click", function(){
                var ticketID = $("#changeSeat_ticket_id").val();
                if(ticketID != ""){
                    $.ajax({
                        url:'assets/user.bookings.changeSeat.view_details.php',
                        type:'POST',
                        data:'ticketID=' + ticketID,
                        success:function(html1){
                            if(html1!=""){
                                $("#changeSeat_details").html(html1);
                            }else{
                                $("#changeSeat_invalid").show();
                            }
                        }
                    });
                }
            });
  
            $('#changeSeatModal').on('hidden.bs.modal', function () {
                $("#changeSeat_ticket_id").val("");
                $("#changeSeat_details").html("");
                $("#changeSeat_invalid").hide();
                $("#customerDetails").hide();
                $("#customerDetailsForm")[0].reset();
                $("#ticketIDForm").show();
                $("#changeSeat_details").show();
                $("#changeSeat_confirm").show();
                $("#changeSeat_pay").hide();
                $("#errorForm").hide();
                $(".error_code").hide();
            });

            $("#changeSeat_confirm").on("click", function(){
                if($("#changeSeat_details").html()!=""){
                    var ticketID = $("#changeSeat_ticket_id").val();
                    var seatsChanged = $("#changeSeatsForm").serializeArray();
                    var changedSeatsArray = new Array();
                    var pass = "";
                    $.each(seatsChanged, function(seatsChanged, field){
                        changedSeatsArray.push(field.value);
                        if(field.value !=  "") {
                            pass = "success";
                        }
                    });

                    if(pass == "success") {
                        $.ajax({
                            url:'assets/user.bookings.changeSeat.check.php',
                            type:'POST',
                            data:'changedSeats=' + JSON.stringify(changedSeatsArray),
                            success:function(html2){
                                if(html2==changedSeatsArray.length){
                                    $("#ticketIDForm").hide();
                                    $("#changeSeat_confirm").hide();
                                    $("#changeSeat_pay").show();
                                    $("#changeSeat_details").hide();
                                    $("#customerDetails").show();

                                    $('#customer_name').focus();
                                    
                                    var timeleft = 200;
                                    document.getElementById("timer").innerHTML = timeleft;
                                    var Timer = setInterval(function(){
                                        timeleft -= 1;
                                        document.getElementById("timer").innerHTML = timeleft;
                                        if(timeleft <= 0){
                                            timeleft = 0;
                                            clearInterval(Timer);
                                            $("#changeSeatModal").modal("hide");
                                        }
                                        $('#changeSeatModal').on('hidden.bs.modal', function () {
                                            clearInterval(Timer);
                                        });
                                    }, 1000);

                                }else{
                                    $.toast({
                                        text: "Some seats were entered incorrectly!",
                                        icon: 'error',
                                        position: 'top-center',
                                        hideAfter: 5000,
                                        stack: false,
                                        loader: false
                                    });
                                }
                            }
                        });
                    }else{
                        $.toast({
                            text: "No seats were entered.",
                            icon: 'error',
                            position: 'top-center',
                            hideAfter: 5000,
                            stack: false,
                            loader: false
                        });
                    }
                }
            });

            $("#changeSeat_pay").on("click", function() {
                var customername = jQuery("#customer_name").val();
                var customerphone = jQuery("#customer_mobile").val();
                var customeremail = jQuery("#customer_email").val();
                
                var numberfilter = /^((\+[1-9]{1,10}[ \-]*)|(\([0-9]{2,10}\)[ \-]*)|([0-9]{2,10})[ \-]*)*?[0-9]{3,10}?[ \-]*[0-9]{0,10}?$/;
                var emailfilter = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

                if(customername!="" && customerphone!="" && customeremail!=""){
                    if (!numberfilter.test(customerphone) || customerphone.length!=10) {
                        jQuery("#changeSeat_errorForm").show();
                        jQuery("#changeSeat_errorForm").html("Invalid phone number !");

                    }else{
                        if(!emailfilter.test(customeremail)){
                            jQuery("#changeSeat_errorForm").show();
                            jQuery("#changeSeat_errorForm").html("Invalid email !");
                        }else{
                            jQuery("#changeSeat_errorForm").hide();
                            saveUserData();
                        }
                    }
                }else{
                    jQuery("#changeSeat_errorForm").show();
                    jQuery("#changeSeat_errorForm").html("Fields can not be empty !");
                }
            });

            if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
                window.location = "user.bookings.php";
            }

            function saveUserData() {
                if(jQuery('#terms').prop('checked')){
                    jQuery(".error_code").hide();

                    var user_data = $("#customerDetailsForm").serialize();
                    var paymentType = $("input[name='payment_type']:checked").val();
                    window.location = "assets/user.bookings.changeSeat.payment.php?" + user_data + "&paymentType=" + paymentType;
                
                }else{
                    jQuery(".error_code").show();
                }
            }

            $('#customer_mobile').keyup(function() {
                $(this).val(
                    $(this).val()
                        .replace(/^[^0]*/, '') // Remove starting non-zero characters
                        .replace(/[^\d]*/g, '') // Remove non-digit characters
                    );
                }
            );

            //Change Seat - end
        });
    </script>

  </body>
</html>

<?php
}else{
    header('location: index.php');
}
?>