<?php
session_start();
include_once ('../db_config.php');

if(isset($_POST['ticketID']) && !empty($_POST['ticketID'])) {
    $ticketID = $_POST['ticketID'];
    $sql = "SELECT A.*, GROUP_CONCAT(A.seat_number ORDER BY A.seat_id ASC) AS seat_number, GROUP_CONCAT(A.seat_id ORDER BY A.seat_id ASC) AS seat_id, B.movie_name, C.theatre_name, C.city, D.theatre_id, E.starting_time, F.* FROM tbl_bookings A, tbl_movies B, tbl_theatres C, tbl_shows D, tbl_showtimes E, tbl_theater_seat_categories F WHERE A.user_id = '{$_SESSION['userID']}' AND A.ticket_id = '$ticketID' AND A.show_id = D.show_id AND B.movie_id = D.movie_id AND C.theatre_id = D.theatre_id AND A.showtime_id = E.showtime_id AND D.theatre_id = F.theatre_id AND A.ticket_category = F.category_name AND F.theatre_id = D.theatre_id AND A.status = '0' AND DATE_SUB(CONCAT_WS(' ',A.show_date,E.starting_time), INTERVAL 2 HOUR)>NOW() GROUP BY A.ticket_id";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $seats = explode(',', $row['seat_number']);
        $seatsID = explode(',', $row['seat_id']);
        $_SESSION['seatsID'] = json_encode($seatsID);
        $_SESSION['theatreID'] = $row['theatre_id'];
        $_SESSION['categoryID'] = $row['seat_category_id'];
        $_SESSION['category'] = $row['ticket_category'];
        $_SESSION['showID'] = $row['show_id'];
        $_SESSION['showtimeID'] = $row['showtime_id'];
        $_SESSION['showDate'] = $row['show_date'];
        $charge = $row['total_amount'] * 5/100;
        $_SESSION['charge'] = number_format((float)$charge, 2, '.', '');
        $_SESSION['ticketID'] = $row['ticket_id'];
?>

<div align="center">
    <hr style="margin-left:-15px;margin-right:-15px">
    <div style="border:15px solid black; margin-top:15px; min-width:450px; max-width:500px; text-align:left">
        <div style="padding: 15px 30px 0;">
            <h2 style="margin:0px;font-size:25px;text-align:center"><?php echo $row['movie_name'] ?></h2>
            <div style="margin:3px 0 0;text-align:center"><?php echo $row['theatre_name'] ?> - <?php echo $row['city'] ?></div>
            <div style="margin:10px 0 2px;display:inline-block">Total Tickets: <?php echo $row['total_seat_count'] ?></div>
            <div style="margin:2px 0;display:inline-block">( Full: <?php echo $row['full_seat_count'] ?>,</div>
            <div style="margin:2px 0;display:inline-block">Kids: <?php echo $row['kids_seat_count'] ?> )</div>
            <div style="margin:2px 0;">Seat Category:  <?php echo $row['ticket_category'] ?></div>
            <div style="margin:2px 0;">Show Date: <?php echo date("D, d F, Y", strtotime($row['show_date'])) ?></div>
            <div style="margin:2px 0 15px;">Show Time: <?php echo date("h:i A", strtotime($row['starting_time'])) ?></div>
        </div>
    </div>
</div>

<div style="margin-top:15px" align="center">
    <table class="table seat_map_wrap" style="border: 2px solid #6b6b6b;">
        <tbody>
            <tr>
                <td colspan="2">
                    <div class="screen_area">
                        <span>THEATER SCREEN</span>
                    </div>
                </td>
            </tr>

            <?php
            $seatMapArray = array();
            $seatIDArray = array();
            $sql_seatMap = "SELECT * FROM tbl_seat_maps WHERE seat_category_id = '".$row['seat_category_id']."'";
            $result_seatMap = $db->query($sql_seatMap);
            if($result_seatMap->num_rows>0){
                while($row_seatMap=$result_seatMap->fetch_assoc()){
                    array_push($seatMapArray, $row_seatMap['seat_number']);
                    array_push($seatIDArray, $row_seatMap['seat_id']);
                }
            }

            $alpha = range('A', 'Z');
            $n = 0;
            for ($r = 1; $r <= $row['num_of_rows']; $r++)
            {
            ?>

            <tr class="seat_row">
                <td>
                    <div class="seat_row_label"><?php echo $alpha[$row['num_of_rows'] - $r] ?></div>
                </td>
                <td class="seat_row_seats">
                    <?php for ($c = 1; $c <= $row['num_of_columns']; $c++) { ?>
                        <span class="seat">
                            <?php if ($seatMapArray[$n]!="0"){ ?>
                                <div
                                    <?php
                                    if(in_array($seatMapArray[$n], $seats)) {
                                        echo " class='selected_seat'";
                                    }
                                    $sql1 = "SELECT * FROM tbl_bookings WHERE show_id = '".$row['show_id']."' AND show_date = '".$row['show_date']."' AND showtime_id = '".$row['showtime_id']."' AND seat_id = '".$seatIDArray[$n]."'";
                                    $result1 = $db->query($sql1);
                                    if($result1->num_rows>0){
                                        echo " class='not_available_seat'";
                                    }
                                    ?>
                                    >
                                    <a seatID="<?php echo $seatIDArray[$n] ?>"><?php echo $seatMapArray[$n] ?></a>
                                </div>
                            <?php } ?>
                        </span>
                    <?php $n++; } ?>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>


<div style="margin:10px 140px 0">
    <form id="changeSeatsForm">
        <?php 
            for($i=0;$i<sizeOf($seats);$i++){
        ?>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label"><?php echo $seats[$i] ?></label>
            <label class="col-sm-1 col-form-label">&#10132;</label>
            <div class="col-sm-10">
                <input name="seat<?php echo $i ?>" type="text" class="form-control" style="text-transform:uppercase">
            </div>
        </div>

        <?php } ?>

    </form>
</div>

<div style="margin-top:35px; padding:10px 15px 10px; color:#FFF; background:black; font-size: 20px; font-weight:500">
    Charges: <span style="float:right">Rs. <?php echo $_SESSION['charge'] ?></span>
</div>


<style>

table.seat_map_wrap {
	display: inline-block;
	text-align: center;
	padding: 2%;
	width: auto;
	margin-top: 10px;
	max-width: 100%;
	margin-bottom: 20px;
}
@media only screen and (max-width: 570px) {
.table.seat_map_wrap {
	width: 1040px !important;
	max-width: 1040px !important;
    user-select:none;
}}
.seat_map_wrap .screen_area span {
	background-color: #6b6b6b;
	display: block;
	font-family: sans-serif;
	font-weight: 600;
	font-size: 15px;
	color: #fff;
	width: 95%;
	padding: 2px;
	margin: 0 auto 15px;
}
.seat_map_wrap td {
	border-top: none !important;
	padding: 0 !important;
	line-height: 1.1;
    user-select:none;
}
.table.seat_map_wrap td {
	padding: 0;
	vertical-align: middle;
	border-top: none;
}
.seat_map_wrap .seat_row_label {
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	color: #4c4d4f;
	font-size: 10px;
	margin-right: 6px;
	margin-top: 4px;
}
.seat_map_wrap .seat {
	float: left;
	margin: 2px 2px;
	width: 17px;
}
.seat_map_wrap .seat a {
	display: inline-block;
	font-family: inherit;
	font-size: 7.5px;
	line-height: 17px;
	box-shadow: 0 0 0 1px #f09c0b inset;
	height: 17px;
	text-align: center;
	width: 17px;
	border-radius: 26%;
	color: #6c6c6c;
	font-weight: bold;
	text-decoration: none;
    background: #fff9d8;
    user-select: none;
    pointer-events:none;
}
.seat_map_wrap .seat .not_available_seat a {
	color: #fff;
	background: red;
	text-decoration: none;
	pointer-events: none;
	box-shadow: 0 0 0 1px red inset;
}
.seat_map_wrap .seat .selected_seat a{
	color: #fff;
	background: green;
	text-decoration: none;
	box-shadow: 0 0 0 1px green inset;
}

</style>

<!-- <script>
$(function() {
    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
</script> -->


<?php }} ?>