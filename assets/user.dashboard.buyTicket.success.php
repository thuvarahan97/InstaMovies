<?php
session_start();
include_once ('../db_config.php');

date_default_timezone_set("Asia/Colombo");

$paymentTime = time();
$bookingTime = date('Y-m-d H:i:s', $paymentTime);

if(isset($_SESSION['payment'])) {
    $sql_ticket = "SELECT A.*, GROUP_CONCAT(A.seat_number ORDER BY A.seat_id) AS seat_number, GROUP_CONCAT(A.seat_id ORDER BY A.seat_id) AS seat_id, B.movie_name, C.theatre_name, C.city, E.starting_time FROM tbl_bookings A, tbl_movies B, tbl_theatres C, tbl_shows D, tbl_showtimes E WHERE A.user_id != '{$_SESSION['userID']}' AND A.ticket_id = '{$_SESSION['ticketID']}' AND A.show_id = D.show_id AND B.movie_id = D.movie_id AND C.theatre_id = D.theatre_id AND A.showtime_id = E.showtime_id AND A.status = '1' GROUP BY A.ticket_id ORDER BY booking_id DESC";
    $result_ticket = mysqli_query($db,$sql_ticket);
    if(mysqli_num_rows($result_ticket) > 0){
    $row_ticket = mysqli_fetch_array($result_ticket);

    $sql_update = "UPDATE tbl_bookings SET `status` = '2' WHERE ticket_id = '{$_SESSION['ticketID']}'";
    $db->query($sql_update);

    $sql_insert = "INSERT INTO tbl_bookings_purchase (ticket_id, `timestamp`, `user_id`) VALUES ('{$_SESSION['ticketID']}', '$bookingTime', '{$_SESSION['userID']}')";
    $db->query($sql_insert);
    
    // $sql_delete = "DELETE FROM tbl_bookings_publish WHERE ticket_id = '{$_SESSION['ticketID']}'";
    // $db->query($sql_delete);

    $sql_payment = "INSERT INTO `tbl_payments`(`timestamp`, `user_id`, `process`, `ticket_id`, `customer_name`, `customer_phone`, `customer_email`, `payment_type`, `sub_total`, `service_tax`, `paid_amount`) VALUES ('$bookingTime', '{$_SESSION['userID']}', '{$_SESSION['ticketID']}', 'booking', '{$_SESSION['customer_name']}','{$_SESSION['customer_phone']}','{$_SESSION['customer_email']}','{$_SESSION['paymentType']}','{$_SESSION['total_amount']}','{$_SESSION['charge']}','{$_SESSION['total_charge']}')";
    $db->query($sql_payment);
    $paymentNumber = $db->insert_id;

    $sql_refund = "INSERT INTO tbl_refunds (`user_id`, transaction_time, ticket_id, amount, `status`) VALUES ('{$row_ticket['user_id']}', '$bookingTime', '{$_SESSION['ticketID']}', '{$row_ticket['total_amount']}', '0')";
    $db->query($sql_refund);

    unset($_SESSION['payment']);

    
    $to = $_SESSION['customer_email'];
    $subject = 'Ticket Purchased - Payment Received';
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
        <div style="margin-bottom:15px;font-size:16px;font-weight:bold;color: #0e1422;">'.$_SESSION['ticketID'].' (purchased)'.'</div>
        <h2 style="margin:0px; color:#0e1422;font-size:25px">'.$row_ticket['movie_name'].'</h2>
        <div style="margin:0px;">'.$row_ticket['theatre_name'].' - '.$row_ticket['city'].'</div>
        <div style="float:right">
        <div style="margin:-40px 0 15px; text-align:center"><div style="font-weight:bold;font-size:20px;">'.$row_ticket['total_seat_count'].'</div><div>Ticket(s)</div></div>
        <div><img style="border:1px solid black;height:120px;width:120px" src="http://localhost/InstaMovies/assets/booking_process.success.ticket_QRCode.php?ticketID='.$_SESSION['ticketID'].'" alt="qr_code"></div>
        </div>
        <div style="margin-top:30px">
        <div style="margin:0 0;display:inline-block">Full: '.$row_ticket['full_seat_count'].'</div>
        <div style="margin:0 0;display:inline-block">Kids: '.$row_ticket['kids_seat_count'].'</div>
        <div style="margin:5px 0;">'.$row_ticket['ticket_category'].' - '.$row_ticket['seat_number'].'</div>
        <div style="margin:5px 0;">'.date("D, d F, Y", strtotime($row_ticket['show_date'])).'</div>
        <div style="margin:5px 0;">'.date("h:i A", strtotime($row_ticket['starting_time'])).'</div>
        </div>
        <div style="margin:35px 0 5px;">Customer Name - '.$_SESSION['customer_name'].'</div>
        <div style="margin:5px 0;">Customer Mobile - '.$_SESSION['customer_phone'].'</div>
        <div style="margin:5px 0;">Customer Email - <a href="'.$_SESSION['customer_email'].'">'.$_SESSION['customer_email'].'</a></div>
        <div style="margin:5px 0;">QR Link - <a href="http://localhost/InstaMovies/assets/booking_process.success.ticket_QRCode.php?ticketID='.$_SESSION['ticketID'].'">Click Here</a></div>
        <hr style="border-top:1px dashed; margin:25px 0">
        <div style="margin:5px 0;font-size:12px;font-weight:bold">Note:</div>
        <div style="margin:5px 0;font-size:12px;line-height:1rem">All sales are final and there will be no refunds, cancellations and or amendments to the confirmed and finalized bookings.</div>
        <div style="margin:25px 0 5px;font-size:12px;">Payment Transaction No. - '.$paymentNumber.'</div>
        <div style="margin:5px 0 25px;font-size:12px;">Transaction Date - '.date("Y-m-d H:i:s", $paymentTime).'</div>
        </div>
        <div style="margin:0;background:#d6d6d6;padding:20px 30px">
        <div style="color:#000;font-size:20px;display:inline-block">Amount:</div>
        <div style="float:right;color:#000;font-size:20px;display:inline-block;font-weight:bold">Rs. '.$_SESSION['total_charge'].'</div>
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
    <p style="font-size:20px;margin-bottom:0">Your payment has been confirmed.</p>
    <p style="font-size:20px;"><strong>Please check your email</strong> for details.</p>
    <hr>
    <div style="margin-bottom:15px; color:#5c5c5c">Your browser will automatically redirect to your bookings page in <span id="timer" style="font-weight:bold"></span> seconds.</div>
    <p>
        <a class="btn btn-success" href="../index.php" role="button" style="font-size:20px; background: #7ed321; border:none">Continue</a>
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
            window.location = "../user.dashboard.php";
        }
        else if(performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            window.location = "../user.dashboard.php";
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
                    window.location.replace("../user.dashboard.php");
                }
            }, 1000);
        }, 1500);
        
    });
</script>

</body>
</html>