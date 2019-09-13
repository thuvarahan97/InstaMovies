<?php

include_once ('../db_config.php');
$seatCategoryID = $_POST['seatCategoryID'];
$num_of_rows = $_POST['num_of_rows'];
$num_of_cols = $_POST['num_of_cols'];

$seatMapArray = array();

$sql = "SELECT * FROM tbl_seat_maps WHERE seat_category_id = '$seatCategoryID'";
$result = $db->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        array_push($seatMapArray, $row['seat_number']);
    }
}

echo '<table class="table seat_map_wrap_view">';
    echo '<tbody>';
        echo '<tr>
            <td colspan="2">
                <div class="screen_area">
                    <span>THEATER SCREEN</span>
                </div>
            </td>
        </tr>';


        $alpha = range('A', 'Z');
        $n = 0;
        for ($row = 1; $row <= $num_of_rows; $row++)
        {
            echo '<tr class="seat_row">';
                echo '<td>';
                    echo '<div class="seat_row_label">'.$alpha[$num_of_rows - $row].'</div>';
                echo '</td>';
                echo '<td class="seat_row_seats">';
                    for ($col = 1; $col <= $num_of_cols; $col++)
                    {
                        echo '<span class="seat">';
                            echo '<div>';
                                if ($seatMapArray[$n]!="0"){
                                    echo '<a i="seat_label">'.$seatMapArray[$n].'</a>';
                                }
                            echo '</div>';
                        echo '</span>';
                        $n++;
                    }
                echo '</td>';
            echo '</tr>';
        }
    echo '</tbody>';
echo '</table>';

?>

<style>
.seat_map_wrap_view {
    margin-top: 10px;
    margin-bottom: 0;
	border-spacing: 0;
	border-collapse: collapse;
    background-color: transparent;
    display: inline-block;
	text-align: center;
	padding: 2%;
	width: auto;
	max-width: 100%;
}
@media only screen and (max-width: 570px) {
.seat_map_wrap_view {
	width: 1040px !important;
	max-width: 1040px !important;
}}
.seat_map_wrap_view .screen_area span {
	background-color: #6b6b6b;
	display: block;
	font-family: sans-serif;
	font-weight: 600;
	font-size: 20px;
	color: #fff;
	width: 95%;
	padding-top: -5px;
    margin: 0 auto 15px;
    user-select: none;
}
.seat_map_wrap_view td {
	border-top: none !important;
	padding: 0 !important;
    line-height: 1.42857143;
    padding: 0;
	vertical-align: middle;
	border-top: none;
}
.seat_map_wrap_view .seat_row_label {
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	color: #4c4d4f;
	font-size: 12px;
	margin-right: 6px;
    margin-top: 4px;
    user-select: none;
}
.seat_map_wrap_view .seat {
	float: left;
	margin: 4px 3px;
	width: 24px;
}
.seat_map_wrap_view .seat a {
	display: inline-block;
	font-family: inherit;
	font-size: 10px;
	line-height: 26px;
	box-shadow: 0 0 0 1px #f09c0b inset;
	height: 26px;
	text-align: center;
	width: 26px;
	border-radius: 26%;
	color: #000;
	cursor: pointer;
	font-weight: bolder;
    text-decoration: none;
    background: #fff9d8;
    pointer-events: none;
    user-select: none;
}
</style>

<script>
$(document).ready(function () {
    var num_of_rows = Number("<?php echo $num_of_rows ?>");
    var num_of_cols = Number("<?php echo $num_of_cols ?>");
    var seats_array = new Array(num_of_rows);
    for (var r = 0; r < num_of_rows; r++) {
        seats_array[r] = new Array(num_of_cols);
        for (var c = 0; c < num_of_cols; c++) { 
            seats_array[r][c] = 1;
        }
    }

    var seatsCount = 0;
    var seats_label_array = new Array(num_of_rows);
    for (var i = 0; i < num_of_rows; i++) {
        seats_label_array[i] = new Array(num_of_cols);
        var row_label = String.fromCharCode(65 + (num_of_rows - i - 1));
        var seat_num = 1;
        for (var j = 0; j < num_of_cols; j++) {
            if(seats_array[i][j] == 1) {
                seats_label_array[i][j] = row_label + seat_num;
                seat_num++;
                seatsCount++;
            }else{
                seats_label_array[i][j] = 0;
            }
        }
    }

    $("#seatsArray").val(seats_label_array);
    $("#num_of_seats").val(seatsCount);


    $("a").click(function() {
        var row_index = $(this).attr("row_index");
        var col_index = $(this).attr("col_index");
        $(this).parent().toggleClass("selected");
        
        if($(this).parent().hasClass("selected")) {
            seats_array[row_index-1][col_index-1] = 0;
        }else{
            seats_array[row_index-1][col_index-1] = 1;
        }

        seatsCount = 0;
        seats_label_array = new Array(num_of_rows);
        for (var i = 0; i < num_of_rows; i++) {
            seats_label_array[i] = new Array(num_of_cols);
            var row_label = String.fromCharCode(65 + (num_of_rows - i - 1));
            var seat_num = 1;
            for (var j = 0; j < num_of_cols; j++) {
                if(seats_array[i][j] == 1) {
                    seats_label_array[i][j] = row_label + seat_num;
                    seat_num++;
                    seatsCount++;
                }else{
                    seats_label_array[i][j] = 0;
                }
            }
        }

        $("#seatsArray").val(seats_label_array);
        $("#num_of_seats").val(seatsCount);
    });
});
</script>

<?php
echo '<div id="seatsArray"></div>';
echo '<div id="num_of_seats"></div>';
?>
