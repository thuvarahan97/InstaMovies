<?php
include_once ('../db_config.php');

date_default_timezone_set("Asia/Colombo");

if(isset($_POST["sel_date"]) && isset($_POST['movie_id']) && !empty($_POST["sel_date"]) && !empty($_POST['movie_id'])){
    $movieID = mysqli_real_escape_string($db,$_POST['movie_id']);
    $sel_Date = mysqli_real_escape_string($db,date($_POST['sel_date']));
    $query_details = "SELECT A.*, B.theatre_name, B.city FROM tbl_shows A, tbl_theatres B WHERE A.theatre_id = B.theatre_id AND A.movie_id='$movieID' AND starting_date<='$sel_Date' AND ending_date>='$sel_Date'";
    $result=mysqli_query($db,$query_details);
    $showID='';    
    
    if(mysqli_num_rows($result)>0){

        echo "<tbody class='table-body'>";

        while($row=mysqli_fetch_array($result)){
            $showID = $row["show_id"];
            $theatre_id = $row['theatre_id'];
            
            $query_details_showtimes = "SELECT * FROM tbl_showtimes WHERE show_id='$showID' ORDER BY starting_time";
            $result_showtimes=mysqli_query($db,$query_details_showtimes);

            if(mysqli_num_rows($result_showtimes)>0){

                echo "<tr class='theater-row'>";
                    echo "<td class='theater'>";
                        echo "<div class='theater-name'>";
                            echo $row['theatre_name'];
                        echo "</div>";
                        echo "<div class='theater-city'>";
                            echo $row['city'];
                        echo "</div>";
                    echo "</td>";
                    
                    echo "<td class='theater-showtime' colspan='5'> ";
                        echo "<ul>";

                        while($row=mysqli_fetch_array($result_showtimes)){
                            $time=date("h:i A", strtotime($row['starting_time']));
                            $selected_datetime = strtotime($sel_Date." ".$row['starting_time']);
                            $current_datetime = time();
                            $timeDiff =  $selected_datetime - $current_datetime;
                            echo"<li class='one-theater-showing";
                            if ($timeDiff < 60*60) {
                                echo " disabled";
                            }
                            echo "'>";
                            echo "<a showtimeID='".$row['showtime_id']."' showID='".$showID."' theatreID='".$theatre_id."' onClick='start_booking_process(this)' ";
                            if ($timeDiff < 60*60) {
                                echo "class='disabled'";
                            }
                            echo ">"
                            .$time.
                            "</a>
                            </li>";
                        }

                        echo "</ul>";
                    echo "</td>";
                echo "</tr>";
            }
        }
        echo '</tbody>';
    }
    else{
        echo "<div class='alert alert-danger' role='alert' style='margin-top:18px'>
            Theaters / Showtimes are not available for this date. Please check back again later.
            </div>";
    }    
}

?>


<style>
    .theater{
        width: 200px;
        user-select: none;
    }
    .theater-showtime{
        width: 920px;
    }
    .theater .theater-name{
        font-size:20px;
        font-weight: 600;
    }
    .theater .theater-city{
        font-size: 16px;
        color: #938f8f;
    }
    .theater-showtime ul a{
        list-style-type: none;
        font-size: 20px;
        font-weight: 600;
        text-align:center;
    }
    .theater-showtime li a:hover, .footer-nav > .active > a {
        color: #f50000 !important;
        text-decoration: none;
    }
    .theater-showtime ul li{
        display: inline;
        margin-right: 50px;
        user-select: none;
    }
    .table-body td{
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: none;
        border-bottom: 1px solid black;
    }
    .theater-showtime li{
        color: #cc0000;
    }
    .theater-showtime a {
        cursor: pointer;
    }
    .one-theater-showing a.disabled {
        pointer-events: none;
        color: #666666;
    }
    .one-theater-showing.disabled {
        cursor: not-allowed;
    }
</style>

<script>
    function start_booking_process(a) {
        var show_id = $(a).attr("showID");
        var movie_id = "<?php echo $movieID;?>";
        var theatre_id = $(a).attr("theatreID");;
        var selected_date = "<?php echo $sel_Date;?>";
        var showtime_id = $(a).attr("showtimeID");
        $.ajax({
            url:'assets/booking_process_tickets.php',
            data:"showID="+show_id+"&movieID="+movie_id+"&theatreID="+theatre_id+"&showDate="+selected_date+"&showTimeID="+showtime_id,
            success:function(body){
                $('.modal-content').html(body);
                $('#myModal').modal({show:true});
            }
        });
        //window.location = "assets/booking_process.php?showID="+show_id+"&movieID="+movie_id+"&theatreID="+theatre_id+"&showDate="+selected_date+"&showTime="+selected_showtime;
    };
</script>