<?php
session_start();
include_once ('../db_config.php');
$seatsID = explode(',', $_SESSION['selectedSeatsID']);
$seatsNumber = explode(',', $_SESSION['selectedSeats']);

$userID = "0";
if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
}

date_default_timezone_set("Asia/Colombo");

$paymentTime = time();
$bookingTime = date('Y-m-d H:i:s', $paymentTime);

$i = 0;
$ticketID = "IM".substr(time(), 0, 7).$_SESSION['seatCategory'][2].((string) $_SESSION['showID'])[0].((string) $_SESSION['totalTicketCount'])[0].substr(time(), 7, 11);

if ($_SESSION['fullTicketCount'] > 0) {
    for($f=0; $f < $_SESSION['fullTicketCount']; $f++) {
        $sql_check = "SELECT * FROM tbl_bookings WHERE show_id = '{$_SESSION['showID']}' AND show_date = '{$_SESSION['showDate']}' AND showtime_id = '{$_SESSION['showTimeID']}' AND seat_id = '$seatsID[$f]'";
        $query_check=mysqli_query($db,$sql_check);
        $rowCount_check = mysqli_num_rows($query_check);
        if($rowCount_check == 0){
            $sql_insert = "INSERT INTO tbl_bookings (booking_time, ticket_id, `user_id`, show_id, show_date, showtime_id, ticket_category, ticket_type, ticket_price, seat_id, seat_number, total_seat_count, full_seat_count, kids_seat_count, total_amount) VALUES ('$bookingTime', '$ticketID', '$userID', '{$_SESSION['showID']}', '{$_SESSION['showDate']}', '{$_SESSION['showTimeID']}', '{$_SESSION['seatCategory']}', 'Full', '{$_SESSION['fullPrice']}', '$seatsID[$f]', '$seatsNumber[$f]', '{$_SESSION['totalTicketCount']}', '{$_SESSION['fullTicketCount']}','{$_SESSION['kidsTicketCount']}', '{$_SESSION['totalAmount']}')";
            $db->query($sql_insert);
            $i++;
        }
    }
}

if ($_SESSION['kidsTicketCount'] > 0) {
    for($k=0; $k < $_SESSION['kidsTicketCount']; $k++) {
        $sql_check = "SELECT * FROM tbl_bookings WHERE show_id = '{$_SESSION['showID']}' AND show_date = '{$_SESSION['showDate']}' AND showtime_id = '{$_SESSION['showTimeID']}' AND seat_id = '$seatsID[$i]'";
        $query_check=mysqli_query($db,$sql_check);
        $rowCount_check = mysqli_num_rows($query_check);
        if($rowCount_check == 0){
            $sql_insert = "INSERT INTO tbl_bookings (booking_time, ticket_id, `user_id`, show_id, show_date, showtime_id, ticket_category, ticket_type, ticket_price, seat_id, seat_number, total_seat_count, full_seat_count, kids_seat_count, total_amount) VALUES ('$bookingTime', '$ticketID', '$userID', '{$_SESSION['showID']}', '{$_SESSION['showDate']}', '{$_SESSION['showTimeID']}', '{$_SESSION['seatCategory']}', 'Kids', '{$_SESSION['kidsPrice']}', '$seatsID[$i]', '$seatsNumber[$i]', '{$_SESSION['totalTicketCount']}', '{$_SESSION['fullTicketCount']}','{$_SESSION['kidsTicketCount']}', '{$_SESSION['totalAmount']}')";
            $db->query($sql_insert);
            $i++;
        }
    }
}


if(isset($_SESSION['payment'])) {
    if($_SESSION['totalTicketCount'] > 0) {
        $sql_payment = "INSERT INTO `tbl_payments`(`timestamp`, `user_id`, `ticket_id`, `process`, `customer_name`, `customer_phone`, `customer_email`, `payment_type`, `sub_total`, `service_tax`, `paid_amount`) VALUES ('$bookingTime', '$userID', '$ticketID', 'booking','{$_SESSION['customer_name']}','{$_SESSION['customer_phone']}','{$_SESSION['customer_email']}','{$_SESSION['paymentType']}','{$_SESSION['totalAmount']}','{$_SESSION['internetFees']}','{$_SESSION['payableAmount']}')";
        $db->query($sql_payment);
        $paymentNumber = $db->insert_id;

        unset($_SESSION['payment']);


        if($_SESSION['payableAmount'] == 0){
            $paidAmount = "FREE";
        }else{
            $paidAmount = "Rs. ".strval($_SESSION['payableAmount']);
        }

        
        $to = $_SESSION['customer_email'];
        $subject = 'Payment Received';
        $from = 'thuvarahan97@gmail.com';
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        // Compose a simple HTML email message
        $message = '<html>
        <body style="font-family:sans-serif;font-size:15px;color:#58595b">
        <div style="width:600px;
                    border:30px solid black;
                    left:50%;
                    position:absolute;
                    transform:translate(-50%,0);
                    box-sizing:border-box;
                    background: #FFF;">
        <div style="padding: 30px 30px 0;">
        <div style="margin-bottom:15px;font-size:16px;font-weight:bold;color: #0e1422;">'.$ticketID.'</div>
        <h2 style="margin:0px; color:#0e1422;font-size:25px">'.$_SESSION['movieName'].'</h2>
        <div style="margin:0px;">'.$_SESSION['theaterName'].' - '.$_SESSION['theaterCity'].'</div>
        <div style="float:right">
        <div style="margin:-40px 0 15px; text-align:center"><div style="font-weight:bold;font-size:20px;">'.$_SESSION['totalTicketCount'].'</div><div>Ticket(s)</div></div>
        <div ><img style="border:1px solid black;height:120px;width:120px" src="http://localhost/InstaMovies/assets/booking_process.success.ticket_QRCode.php?ticketID='.$ticketID.'" alt="qr_code"></div>
        </div>
        <div style="margin-top:30px">
        <div style="margin:0 0;display:inline-block">Full: '.$_SESSION['fullTicketCount'].'</div>
        <div style="margin:0 0;display:inline-block">Kids: '.$_SESSION['kidsTicketCount'].'</div>
        <div style="margin:5px 0;">'.$_SESSION['seatCategory'].' - '.$_SESSION['selectedSeats'].'</div>
        <div style="margin:5px 0;">'.date("D, d F, Y", strtotime($_SESSION['showDate'])).'</div>
        <div style="margin:5px 0;">'.$_SESSION['showTime'].'</div>
        </div>
        <div style="margin:35px 0 5px;">Customer Name - '.$_SESSION['customer_name'].'</div>
        <div style="margin:5px 0;">Customer Mobile - '.$_SESSION['customer_phone'].'</div>
        <div style="margin:5px 0;">Customer Email - <a href="'.$_SESSION['customer_email'].'">'.$_SESSION['customer_email'].'</a></div>
        <div style="margin:5px 0;">QR Link - <a href="http://localhost/InstaMovies/assets/booking_process.success.ticket_QRCode.php?ticketID='.$ticketID.'">Click Here</a></div>
        <hr style="border-top:1px dashed; margin:25px 0">
        <div style="margin:5px 0;font-size:12px;font-weight:bold">Note:</div>
        <div style="margin:5px 0;font-size:12px;line-height:1rem">All sales are final and there will be no refunds, cancellations and or amendments to the confirmed and finalized bookings.</div>
        <div style="margin:25px 0 5px;font-size:12px;">Payment Transaction No. - '.$paymentNumber.'</div>
        <div style="margin:5px 0 25px;font-size:12px;">Transaction Date - '.date("Y-m-d H:i:s", $paymentTime).'</div>
        </div>
        <div style="margin:0;background:#d6d6d6;padding:20px 30px">
        <div style="color:#000;font-size:20px;display:inline-block">Amount:</div>
        <div style="float:right;color:#000;font-size:20px;display:inline-block;font-weight:bold">'.$paidAmount.'</div>
        </div>
        </div>
        </body>
        </html>';

        // Sending email
        mail($to, $subject, $message, $headers);
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/>
  
    <title>Payment Gateway</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            text-align: center;
            background: #ededed;
        }
        .content {
            width: 450px;
            top:50%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
            box-sizing:border-box;
            padding: 30px 30px;
            background: #FFF;
            border-radius: 10px;
        }
        .icon-box {
            top:0%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
        }
        .btn-success:hover {
            background:#6bb61a !important;
        }
        .loader {
            margin:0;
            position:fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            background: #ededed;
            text-align:center;
            cursor: wait;
            user-select: none;
            z-index: 2000;
        }
        .loader img {
            width: 100px;
            height: 100px;
            user-select: none;
        }
        .loader .loading-content {
            margin: 0;
            position: absolute;
            top: 50%;
            left:50%;
            margin-right: -50%;
            transform:translate(-50%, -50%);
        }
    </style>
</head>

<body>

<div class="loader">
    <div class="loading-content">
        <img draggable="false" src="../images/loading.gif">
        <h1 style="margin-top:30px;">Please wait while processing your payment... </h1>
    </div>
</div> 

<div class="content">
    <div class="icon-box">
        <img src="../images/success_icon.png" height="100px" width="100px">
    </div>	
    <h1 style="font-size:55px;margin-top:40px;">Thank You!</h1>
    <p style="font-size:20px;margin-bottom:0">Your booking has been confirmed.</p>
    <p style="font-size:20px;"><strong>Please check your email</strong> for details.</p>
    <hr>
    <div style="margin-bottom:15px; color:#5c5c5c">Your browser will automatically redirect to InstaMovies homepage in <span id="timer" style="font-weight:bold"></span> seconds.</div>
    <p>
        <a class="btn btn-success" href="../index.php" role="button" style="font-size:20px; background: #7ed321; border:none">Continue to homepage</a>
    </p>
</div>


<script src="../js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(window).on('load', function () {
        setTimeout(function() {
            jQuery('.loader').fadeOut(500);
        }, 2000);
    });

    $(document).ready(function() {
        if(performance.navigation.type == performance.navigation.TYPE_BACK_FORWARD) {
            window.location = "../index.php";
        }
        else if(performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            window.location = "../index.php";
        }

        //Disable form re-submission
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        
        //Timer
        setTimeout(function() {
            var timeleft = 10;
            var Timer = setInterval(function(){
                document.getElementById("timer").innerHTML = timeleft;
                timeleft -= 1;
                if(timeleft < 0){
                    timeleft = 0;
                    clearInterval(Timer);
                    window.location.replace("../index.php");
                }
            }, 1000);
        }, 1500);

    });
</script>

</body>
</html>


<script>
    
</script>