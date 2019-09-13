<?php
session_start();
include_once ('../db_config.php');

$query_movie = mysqli_query($db,"SELECT * FROM tbl_movies WHERE movie_id='".$_SESSION['movieID']."'");
$row_movie = mysqli_fetch_array($query_movie);
$movieName=$row_movie['movie_name'];

$query_theater = mysqli_query($db,"SELECT * FROM tbl_theatres WHERE theatre_id='".$_SESSION['theatreID']."'");
$row_theater = mysqli_fetch_array($query_theater);
$theaterName=$row_theater['theatre_name'];
$theaterCity=$row_theater['city'];

$query_showtime = mysqli_query($db,"SELECT * FROM tbl_showtimes WHERE showtime_id='".$_SESSION['showTimeID']."'");
$row_showtime = mysqli_fetch_array($query_showtime);
$showTime=date("h:i A", strtotime($row_showtime['starting_time']));

$showDate = date("F d l, Y", strtotime($_SESSION['showDate']));

date_default_timezone_set("Asia/Colombo");

// $sql_clear = "DELETE FROM `tbl_bookings_temporary` WHERE `timestamp` < ADDDATE(NOW(), INTERVAL -10 MINUTE)";
// $db->query($sql_clear);

?>

<div class="modal_content_theater_seat_map">
    <div class="modal-header">
        <h6 class="modal-title">THEATER SEAT MAP</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <div class="modal-body">
        <div class="movie-data">
            <h2><?php echo $movieName?></h2>
            <h4><?php echo $theaterName?>, <?php echo $theaterCity?></h4>
        </div>
        
        <hr>
        <div class="booking_category_showtime" align="center">
            <div class="ticket_count_display">
                <label class="ticket_count_label">Total Tickets:</label>
                <div class="ticket_count"><?php echo $_GET['totalTicketCount']?></div>
            </div>
            <div class="showtime_display">
                <label class="showtime_label">Showtime:</label>
                <div class="showtime"><?php echo $showTime?></div>
            </div>
        </div>
    </div>

    <div class="show-date-total-amount">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 date-left">
                    <h4><?php echo $showDate?></h4>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 total-right">
                    <h4>
                    Total: Rs. <span class="amount_value"><!--Total Amount Value--></span>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="seat-map">
        <div class="container-fluid">
            <div class="table-responsive">

                <?php
                $sql = "SELECT * FROM tbl_theater_seat_categories WHERE theatre_id='".$_SESSION['theatreID']."'";
                $result = $db->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        $sql_price = "SELECT * FROM tbl_show_ticket_rates WHERE show_id='".$_SESSION['showID']."' AND ticket_category_id='".$row['seat_category_id']."'";
                        $result_price = $db->query($sql_price);
                        if($result_price->num_rows>0){
                ?>

                <div class="seat_category">
                    <h3 class="seat_category_name"><?php echo $row['category_name']?></h3>
                    
                    <?php
                        $fullPrice = 0;
                        $kidsPrice = 0;
                        while($row_price=$result_price->fetch_assoc()){
                            if($row_price['ticket_type']=="Full") {
                                $fullPrice = $row_price['ticket_price'];
                            }elseif($row_price['ticket_type']=="Kids"){
                                $kidsPrice = $row_price['ticket_price'];
                            }
                        }
                    ?>
                    
                    <div class="category_price" full_price="<?php echo $fullPrice ?>" kids_price="<?php echo $kidsPrice ?>">
                        (
                        <?php
                        if($fullPrice!="")
                        {
                            echo '<span>F. Rs.'.number_format((float)$fullPrice, 2, '.', '').'</span>';
                        }
                        if($kidsPrice!="")
                        {
                            echo '<span>/ H. Rs.'.number_format((float)$kidsPrice, 2, '.', '').'</span>';
                        }
                        ?>
                        )
                    </div>

                    <table class="table seat_map_wrap" style="border-top: 5px solid #6b6b6b;">
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
                                                    $sql1 = "SELECT * FROM tbl_bookings WHERE show_id = '".$_SESSION['showID']."' AND show_date = '".$_SESSION['showDate']."' AND showtime_id = '".$_SESSION['showTimeID']."' AND seat_id = '".$seatIDArray[$n]."'";
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

                <?php
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <div id="bottom-next-wrapper">
        <button type="button" class="btn next-btn">Next</button>
    </div>

</div>

<style>
.modal .modal-dialog {
    height: auto !important;
}
.modal_content_theater_seat_map {
    background-color: #FFF;
}
.modal_content_theater_seat_map .modal-header{
    border-radius: 0;
	border-bottom: 2px solid #3e3e3e;
	background-color: #000;
	min-height: 55px;
}
.modal_content_theater_seat_map .modal-header h6 {
	color: #fff;
	display: inline-block;
	margin-top: 8px;
	user-select: none;
}
.modal_content_theater_seat_map .close {
	font-size: 38px;
	color: #fff;
    opacity: 1;
    outline:none;
}
.modal_content_theater_seat_map .modal-body {
	background-color: #131313;
	user-select: none;
}
.modal_content_theater_seat_map .modal-body .movie-data {
	margin-top: 15px;
	margin-bottom: 25px;
	text-align: center;
}
.modal_content_theater_seat_map .modal-body .movie-data h2{
	font-size: 28px;
	font-family: sans-serif;
	color: #fff;
	font-weight: 300;
}
.modal_content_theater_seat_map .modal-body .movie-data h4{
	font-size: 14px;
	font-family: sans-serif;
	color: #fff;
	font-weight: 500;
	padding-top: 0;
}
.modal_content_theater_seat_map .modal-body hr {
	border-top: 1px solid #232323;
	width: 33%;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime {
	padding-top: 7px;
	padding-bottom: 7px;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .ticket_count_display{
	display: inline;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .ticket_count_display .ticket_count_label {
	display: inline;
	color: #FFF;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .ticket_count_display .ticket_count{
	display: inline;
	margin-left: 10px;
	text-align: center;
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
	font-weight: 600;
	color: #fff;
	border-radius: 4px;
	padding: 5px 30px;
	background: #333;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .showtime_display{
	display: inline;
	margin-left: 40px;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .showtime_display .showtime_label {
	display: inline;
	color: #FFF;
}
.modal_content_theater_seat_map .modal-body .booking_category_showtime .showtime_display .showtime{
	display: inline;
	margin-left: 10px;
	text-align: center;
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
	font-weight: 600;
	color: #fff;
	border-radius: 4px;
	padding: 5px 20px;
	background: #ad0b0b;
}
.modal_content_theater_seat_map .show-date-total-amount {
	background-color: #f0f0f0;
	margin-top: 0;
	font-size: 32px;
	user-select: none;
}
@media (min-width: 768px) {
.modal_content_theater_seat_map .show-date-total-amount .col-sm-9 {
		width: 75%;
}}
.modal_content_theater_seat_map .show-date-total-amount h4{    
	margin: 20px 0;
	font-size: 24px;
	font-weight: 600;
}
.modal_content_theater_seat_map .show-date-total-amount .date-left h4{    
	text-align: left;
	color: #282828;
}
@media (min-width: 768px) {
.modal_content_theater_seat_map .show-date-total-amount .col-sm-9 {
		width: 25%;
}}
.modal_content_theater_seat_map .show-date-total-amount .total-right h4 {    
	text-align: right;
	color: #ad0b0b;
}
.modal_content_theater_seat_map .seat-map {
	text-align: center;
	margin-top: 60px;
	user-select: none;
}
.modal_content_theater_seat_map .seat-map .container-fluid {
	padding-right: 15px;
	padding-left: 15px;
	margin-right: auto;
	margin-left: auto;
}
@media screen and (max-width: 767px) {
.modal_content_theater_seat_map .seat-map .table-responsive {
	width: 100%;
	margin-bottom: 15px;
	border: 1px solid #ddd;
	overflow-y: hidden;
}}
.modal_content_theater_seat_map .seat-map .table-responsive {
	min-height: .01%;
	overflow-x: auto;
}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category {
	text-align: center;
	margin: 0;
	width: 100%;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category .seat_category_name {
	color: #282828;
	font-size: 25px;
	margin-bottom: 0;
}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category .category_price {
	font-weight: 400;
	color: #777;
}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category .table {
	margin-bottom: 20px;
	border-spacing: 0;
	border-collapse: collapse;
	background-color: transparent;
}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category table.seat_map_wrap {
	display: inline-block;
	text-align: center;
	padding: 2%;
	width: auto;
	margin-top: 10px;
	max-width: 100%;
	margin-bottom: 20px;
}
@media only screen and (max-width: 570px) {
.modal_content_theater_seat_map .seat-map .table.seat_map_wrap {
	width: 1040px !important;
	max-width: 1040px !important;
}}
.modal_content_theater_seat_map .seat-map .table-responsive .seat_category .seat_map_wrap .screen_area span {
	background-color: #6b6b6b;
	display: block;
	font-family: sans-serif;
	font-weight: 600;
	font-size: 20px;
	color: #fff;
	width: 95%;
	padding-top: -5px;
	margin: 0 auto 15px;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap td {
	border-top: none !important;
	padding: 0 !important;
	line-height: 1.42857143;
}
.modal_content_theater_seat_map .seat-map .table td {
	padding: 0;
	vertical-align: middle;
	border-top: none;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat_row_label {
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	color: #4c4d4f;
	font-size: 12px;
	margin-right: 6px;
	margin-top: 4px;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat {
	float: left;
	margin: 4px 3px;
	width: 24px;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat a {
	display: inline-block;
	font-family: inherit;
	font-size: 10px;
	line-height: 26px;
	box-shadow: 0 0 0 1px #f09c0b inset;
	height: 26px;
	text-align: center;
	width: 26px;
	border-radius: 26%;
	color: #6c6c6c;
	cursor: pointer;
	font-weight: bolder;
	text-decoration: none;
    background: #fff9d8;
    user-select: none;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat a:hover {
	color: #fff;
	background: green;
	text-decoration: none;
	transform: scale(1.6);
	transition: .5s;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat .not_available_seat a {
	color: #fff;
	background: red;
	text-decoration: none;
	pointer-events: none;
	box-shadow: 0 0 0 1px red inset;
}
.modal_content_theater_seat_map .seat-map .seat_map_wrap .seat .selected_seat a{
	color: #fff;
	background: green;
	text-decoration: none;
	box-shadow: 0 0 0 1px green inset;
}
.modal_content_theater_seat_map #bottom-next-wrapper {
	background-color: #000;
	padding: 15px 0;
	text-align: center;
}
.modal_content_theater_seat_map #bottom-next-wrapper .next-btn {
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	font-weight: 700;
	background-color: transparent;
	color: #ad0b0b;
	font-size: 25px;
	line-height: 20px;
	padding: 15px 60px;
	display: inline-block;
	border: 2px solid #fff;
	border-radius: 40px;
	box-shadow: none;
}
.modal_content_theater_seat_map #bottom-next-wrapper .next-btn:hover {
	background-color: #d30f0f !important;
	color: #FFF;
	box-shadow: none !important;
}
.modal_content_theater_seat_map #bottom-next-wrapper .next-btn:active {
	background-color:#9b0c0c !important;
	color: #FFF;
	box-shadow: none !important;
}
.modal_content_theater_seat_map #bottom-next-wrapper .next-btn:focus {
	box-shadow: none !important;
}
@media (max-width: 575px){
	.modal_content_theater_seat_map .modal-body .showtime_display{
        display: block !important;
        margin-left: 0 !important;
        margin-top: 15px !important;
    }
    .modal_content_theater_seat_map .show-date-total-amount .total-right h4 {
        text-align: left !important;
        margin-top: 0 !important;
    }
}
</style>

<script>
    $(document).ready(function(){
        var selected_seats = new Array();
        var selected_seats_id = new Array();
        var selected_seats_booking_temporary_id = new Array();
        var movie_name = "<?php echo $movieName?>";
        var theater_name = "<?php echo $theaterName?>";
        var theater_city = "<?php echo $theaterCity?>";
        var show_time = "<?php echo $showTime?>";
        var full_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
        var kids_ticket_count = Number("<?php echo $_GET['kidsTicketCount']?>");
        var total_ticket_count = Number("<?php echo $_GET['totalTicketCount']?>");
        var selected_seat_classes = document.getElementsByClassName("selected_seat");
        var selected_category = "";
        var full_ticket_price = 0;
        var kids_ticket_price = 0;
        var full_amount = 0;
        var kids_amount = 0;
        var total_amount = full_amount + kids_amount;
        $('.amount_value').html(Number(total_amount).toFixed(2));
        
        //Seat_Category and Seat_Map_Wrap - Script - Start
        $("a").click(function(){
            var this_category = $(this).closest(".seat_category").children(".seat_category_name").text();
            if($(this).parent().parent().hasClass("seat")){
                if(!$(this).parent().hasClass("not_available_seat")){
                    if(selected_seat_classes.length < total_ticket_count){
                        if(selected_seat_classes.length == 0){
                            $(this).parent().toggleClass("selected_seat");
                            selected_category = $(this).closest(".seat_category").children(".seat_category_name").text();
                            full_ticket_price = $(this).closest(".seat_category").children(".category_price").attr("full_price");
                            kids_ticket_price = $(this).closest(".seat_category").children(".category_price").attr("kids_price");
                        }else{
                            if(this_category==selected_category){    
                                $(this).parent().toggleClass("selected_seat");
                            }else{
                                $.toast({
                                    text: "Select you seats from the same seat category " + selected_category + ".",
                                    icon: 'error',
                                    position: 'top-center',
                                    hideAfter: 3000,
                                    stack: false,
                                    loader: false
                                });
                            }
                        }
                        if(kids_ticket_price!=0){
                            full_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
                            kids_ticket_count = Number("<?php echo $_GET['kidsTicketCount']?>");
                            total_ticket_count = Number("<?php echo $_GET['totalTicketCount']?>");
                            full_amount = (Number(full_ticket_price) * Number("<?php echo $_GET['fullTicketCount']?>"));
                            kids_amount = (Number(kids_ticket_price) * Number("<?php echo $_GET['kidsTicketCount']?>"));
                        }else{
                            if(Number("<?php echo $_GET['fullTicketCount']?>")!=0) {
                                full_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
                                kids_ticket_count = Number(0);
                                total_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
                                full_amount = (Number(full_ticket_price) * Number("<?php echo $_GET['fullTicketCount']?>"));
                                kids_amount = (Number(0));
                                if((selected_seat_classes.length==1) && ($(this).parent().hasClass("selected_seat") && (total_ticket_count!==Number("<?php echo $_GET['totalTicketCount']?>")))) {
                                    $.toast({
                                        text: "Only FULL TICKETS are available for " + this_category + ".",
                                        icon: 'error',
                                        position: 'top-center',
                                        hideAfter: 3000,
                                        stack: false,
                                        loader: false
                                    });
                                }
                                if(selected_seat_classes.length==0){
                                    full_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
                                    kids_ticket_count = Number("<?php echo $_GET['kidsTicketCount']?>");
                                    total_ticket_count = Number("<?php echo $_GET['totalTicketCount']?>");
                                }
                            }else{
                                $(this).parent().removeClass("selected_seat");
                                full_amount = (Number(0));
                                kids_amount = (Number(0));
                                $.toast({
                                    text: "Only FULL TICKETS are available for " + this_category + ", change the number of FULL TICKET(s) to select your seat(s) in " + this_category + ".",
                                    icon: 'error',
                                    position: 'top-center',
                                    hideAfter: 3000,
                                    stack: false,
                                    loader: false
                                });
                            }
                        }
                        if(selected_seat_classes.length > 0){
                            total_amount = full_amount + kids_amount;                
                        }else{
                            total_amount = Number(0);
                        }
                        $('.ticket_count').html(total_ticket_count);
                        $('.amount_value').html(total_amount.toFixed(2));
                    }else{
                        if($(this).parent().hasClass("selected_seat")){
                            $(this).parent().removeClass("selected_seat");
                            if(selected_seat_classes.length == 0){
                                full_amount = Number(0);
                                kids_amount = Number(0);
                                full_ticket_count = Number("<?php echo $_GET['fullTicketCount']?>");
                                kids_ticket_count = Number("<?php echo $_GET['kidsTicketCount']?>");
                                total_ticket_count = Number("<?php echo $_GET['totalTicketCount']?>");
                            }else{
                                full_amount = (Number(full_ticket_price) * Number("<?php echo $_GET['fullTicketCount']?>"));
                                kids_amount = (Number(kids_ticket_price) * Number("<?php echo $_GET['kidsTicketCount']?>"));
                            }
                            total_amount = full_amount + kids_amount;
                            $('.ticket_count').html(total_ticket_count);
                            $('.amount_value').html(total_amount.toFixed(2));
                        }else{
                            $.toast({
                                text: "All seats are selected, change number of ticket(s) to pick more.",
                                icon: 'error',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        }
                    }
                }
            }

            if($(this).parent().hasClass("selected_seat")) {
                $.ajax({
                    url:'assets/booking_process_seat_map.bookings_temporary.insert.php',
                    type: 'POST',
                    data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&seatID=' + $(this).attr("seatID"),
                    success:(message)=>{
                        if (message!=""){
                            selected_seats.push($(this).text());
                            selected_seats_id.push($(this).attr("seatID"));
                            selected_seats_booking_temporary_id.push(message);
                        }else{
                            $(this).parent().removeClass("selected_seat");
                            $.toast({
                                text: "Sorry! This seat has been SELECTED (by another). Please select another seat or try again later.",
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
                var index = selected_seats.indexOf($(this).text());
                if (index > -1) {
                    $.ajax({
                        url:'assets/booking_process_seat_map.bookings_temporary.delete.php',
                        type: 'POST',
                        data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&seatID=' + $(this).attr("seatID"),
                        success:(msg)=>{
                            selected_seats.splice(index, 1);
                            selected_seats_id.splice(index, 1);
                            selected_seats_booking_temporary_id.splice(index, 1);
                        }
                    });
                }
            }
        });
        //Seat_Category and Seat_Map_Wrap - Script - End

        $('#myModal').on('hide.bs.modal', function (e) {
            if(selected_seats_id.length > 0) {
                for(var z=0; z<selected_seats_id.length; z++) {
                    $.ajax({
                        url:'assets/booking_process_seat_map.bookings_temporary.delete.php',
                        type: 'POST',
                        data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&seatID=' + selected_seats_id[z]
                    });
                }
            }
        })

        var success_array = new Array();
        jQuery(".next-btn").on('click',function(){
            if(selected_seats_id.length == total_ticket_count) {
                // for(var m=0; m<selected_seats_id.length; m++) {
                //     $.ajax({
                //         url:'assets/booking_process_seat_map.bookings_temporary.check.php',
                //         type: 'POST',
                //         data: 'booking_temporary_id=' + selected_seats_booking_temporary_id[m],
                //         async: false,
                //         success: function(check){
                //             if(check=="success"){
                //                 success_array.push(check);
                //             }
                //         }
                //     });
                // }
                // if(selected_seats.length == success_array.length) {
                currentTimestamp = <?php echo time() ?>;
                showTimestamp = <?php echo strtotime($_SESSION['showDate']." ".$row_showtime['starting_time']) ?>;
                timeDifference = Number(showTimestamp) - Number(currentTimestamp);
                if(timeDifference > 3600) {
                    window.location = "assets/booking_process_customer_details.php?fullTicketCount=" + full_ticket_count + "&kidsTicketCount=" + kids_ticket_count + "&totalTicketCount=" + total_ticket_count + "&totalAmount=" + total_amount + "&seatCategory=" + selected_category  + "&selectedSeats=" + selected_seats + "&selectedSeatsID=" + selected_seats_id + "&selectedSeatsBookingTemporaryID=" + selected_seats_booking_temporary_id + "&movieName=" + movie_name + "&theaterName=" + theater_name + "&theaterCity=" + theater_city + "&showTime=" + show_time + "&fullPrice=" + full_ticket_price + "&kidsPrice=" + kids_ticket_price;
                }else{
                    $.toast({
                        text: "Sorry! Booking expired.",
                        icon: 'error',
                        position: 'top-center',
                        hideAfter: 10000,
                        stack: false,
                        loader: false
                    });
                    $('#myModal').modal('hide');
                }
                // }else{
                //     $.toast({
                //         text: "Sorry! Some of your seats have been SELECTED (by another). Please try again.",
                //         icon: 'error',
                //         position: 'top-center',
                //         hideAfter: 10000,
                //         stack: false,
                //         loader: false
                //     });
                // }
            }
        });
        window.onbeforeunload = function () {
            if(selected_seats_id.length > 0) {
                for(var z=0; z<selected_seats_id.length; z++) {
                    $.ajax({
                        url:'assets/booking_process_seat_map.bookings_temporary.delete.php',
                        type: 'POST',
                        data:'showID=' + <?php echo $_SESSION['showID'] ?> + '&showDate=' + "<?php echo $_SESSION['showDate'] ?>" + '&showtimeID=' + <?php echo $_SESSION['showTimeID'] ?> + '&seatID=' + selected_seats_id[z]
                    });
                }
            }
        }

    });
</script>