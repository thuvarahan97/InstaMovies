<?php
session_start();
include_once ('../db_config.php');

if(isset($_POST['ticketID']) && !empty($_POST['ticketID'])) {
    $ticketID = $_POST['ticketID'];
    $sql = "SELECT A.*, GROUP_CONCAT(A.seat_number ORDER BY A.seat_id) AS seat_number, B.movie_name, C.theatre_name, C.city, E.starting_time FROM tbl_bookings A, tbl_movies B, tbl_theatres C, tbl_shows D, tbl_showtimes E WHERE A.user_id != '{$_SESSION['userID']}' AND A.ticket_id = '$ticketID' AND A.show_id = D.show_id AND B.movie_id = D.movie_id AND C.theatre_id = D.theatre_id AND A.showtime_id = E.showtime_id AND A.status = '1' AND DATE_SUB(CONCAT_WS(' ',A.show_date,E.starting_time), INTERVAL 1 HOUR)>NOW() GROUP BY A.ticket_id ORDER BY booking_id DESC";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['ticketID'] = $ticketID;
        $fee = $row['total_amount'] * 4/100;
        $nbt = $fee * 2/100;
        $vat = ($fee + $nbt) * 15/100;
        $charge = $fee + $nbt + $vat;
        $totalCharge = $row['total_amount'] + $charge;
        $_SESSION['total_amount'] = $row['total_amount'];
        $_SESSION['charge'] = number_format((float)$charge, 2, '.', '');
        $_SESSION['total_charge'] = number_format((float)$totalCharge, 2, '.', '');
?>

<hr style="margin-left:-15px;margin-right:-15px">
<div style="border:15px solid black; margin-top:15px">
    <div style="padding: 15px 30px 0;">
        <div style="margin-bottom:8px;font-size:16px;font-weight:bold"><?php echo $ticketID ?></div>
        <h2 style="margin:0px;font-size:25px;text-align:center"><?php echo $row['movie_name'] ?></h2>
        <div style="margin:3px 0 0;text-align:center"><?php echo $row['theatre_name'] ?> - <?php echo $row['city'] ?></div>
        <div style="margin:10px 0 2px">Total Tickets: <?php echo $row['total_seat_count'] ?></div>
        <div style="margin:2px 0;display:inline-block">Full: <?php echo $row['full_seat_count'] ?>,</div>
        <div style="margin:2px 0;display:inline-block">Kids: <?php echo $row['kids_seat_count'] ?></div>
        <div style="margin:2px 0;">Seats:  <?php echo $row['ticket_category'] ?> - <?php echo $row['seat_number'] ?></div>
        <div style="margin:2px 0;">Show Date: <?php echo date("D, d F, Y", strtotime($row['show_date'])) ?></div>
        <div style="margin:2px 0 15px;">Show Time: <?php echo date("h:i A", strtotime($row['starting_time'])) ?></div>
    </div>
    <div style="margin:0;background:#d6d6d6;padding:10px 30px">
        <div style="font-size:20px;display:inline-block">Amount:</div>
        <div style="float:right;font-size:20px;display:inline-block;font-weight:bold">Rs. <?php echo number_format((float)$row['total_amount'], 2, '.', '') ?></div>
    </div>
</div>

<div style="margin-top:15px; padding:10px 15px 10px; color:#FFF; background:black; font-size: 20px; font-weight:500">
    <div>Internet Handling Fees: <span style="float:right">Rs. <?php echo $_SESSION['charge'] ?></span></div>
    <div>Total Amount: <span style="float:right">Rs. <?php echo $_SESSION['total_charge'] ?></span></div>
</div>

<?php }} ?>