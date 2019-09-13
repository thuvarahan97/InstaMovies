<?php
    session_start();

    include_once ('db_config.php');
    
    date_default_timezone_set("Asia/Colombo");

    $sql_temp = "SELECT movie_id FROM tbl_movies WHERE `status` = 1 ORDER BY movie_id";
    $result_temp=mysqli_query($db,$sql_temp);
    if(mysqli_num_rows($result_temp)>0){
        $row_temp = mysqli_fetch_array($result_temp);
    
        if(isset($_GET['movieID'])){
            
            $movieID = mysqli_real_escape_string($db, $_GET['movieID']);
            $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id='$movieID'";
            $result=mysqli_query($db,$sql_movie);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
                $startingDate=$row['starting_date'];
                $endingDate=$row['ending_date'];
            }
            else{
                header('location: buy_tickets.php?movieID='.$row_temp['movie_id']);
            }
        }
        else{
            header('location: buy_tickets.php?movieID='.$row_temp['movie_id']);
        }
    }
    else{
        header('location:index.php');
    }


    $sql_temp = "SELECT * FROM tbl_bookings_temporary";
    $query_temp=mysqli_query($db,$sql_temp);
    $rowCount_temp = mysqli_num_rows($query_temp);
    if($rowCount_temp > 0){
        while($row_temp=mysqli_fetch_array($query_temp)){        
            $temp_datetime = strtotime($row_temp['timestamp']);
            $curr_datetime = time();
            $timeDiff_temp =  $temp_datetime - $curr_datetime;
            if($timeDiff_temp < 30*60)
            $sql_temp_delete = "DELETE FROM tbl_bookings_temporary WHERE `timestamp` = '{$row_temp['timestamp']}'";
            $db->query($sql_temp_delete);
        }
    }
	
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!--Bootstrap Fullscreen Modal CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap4-modal-fullscreen.min.css">
    
    <!--JQuery Toast Plugin CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <!--Glyphicons CSS-->
    <link rel="stylesheet" type="text/css" href="css/glyphicon.css">

    <!--JQuery-UI CSS-->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <!--Owl Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    
    <!--Custom Style CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/movies_slider.css">

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

  </head>

	
  <body id="itemid-7">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <!--Buy Tickets Body - Start-->
    <div class="buy-tickets">
        <!--Movie Banner-->
        <div class="movie_banner" id="movie_banner">
            <?php 
            if($movieID!=''){
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['banner'] ).'"/>';
            }else{
                echo '<img src="images/banner.jpg?v='.time().'"/>';
            }
            ?>    
        </div>
        <!--Select Movie-->
        <div class="movie-name">
            <div class="container">
                <div class="row">
                    <div class="movie_selection_list col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form>
                            <div class="form-group" id="now-showing-list">
                                <select class="form-control form-control-lg" id="selectMovie" onChange="SelectRedirect();">
                                    <?php
                                        $select_movie = "SELECT * FROM tbl_movies WHERE `status` = 1";
                                        $query_movie=mysqli_query($db,$select_movie);
                                        $rowCount_movie = mysqli_num_rows($query_movie);
                                        if($movieID!=''){
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }else{
                                        echo '<option value="">Select Movie</option>';
                                        if($rowCount_movie > 0){
                                            while($row = $query_movie->fetch_assoc()){
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        <!--Show-Datepicker-->

        <div class="show-date" id="show_date">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="date-container">
                            <ul class="list-inline">
                                
                                <?php
                                if($startingDate>date("Y-m-d")){
                                    $date = $startingDate;
                                }
                                else{
                                    $startingDate = date("Y-m-d");
                                    $date = date("Y-m-d");
                                }

                                $i = 0;

                                while (strtotime($date) <= strtotime("+6 days", strtotime($startingDate))) {
                                    
                                    echo '<li class="datepicker" id = "date-'.$i.'" dateValue = "'.$date.'" onclick="selectDate(this.id)">';

                                        echo '<div class="month">'.date('M', strtotime($date)).'</div>';
                                        echo '<div class="date">'.date('d', strtotime($date)).'</div>';
                                        echo '<div class="day">'.date('D', strtotime($date)).'</div>';
                                    
                                    echo '</li>';
                                    
                                    if($date==$endingDate){
                                        break;
                                    }
                                    $date = date ("Y-m-d", strtotime("+1 days", strtotime($date)));
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="show-date" id="show_date">
            <div class="container">
                <div class="row">
                    <div class="date_selection col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form >
                            <div class="form-group" >
                                <div class="input-group">
                                    <input type='text' class="form-control" id='datepicker' readonly="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        
        <!--Display Show-Time-Table-->
        <div class="show-time-table" id="time_table">
            <div class="container">
                <div class="row" style="margin:-1px 0px">
                    <table class="table table-responsive" id=table_details>  
                        <!--table link-->
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-fullscreen" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!--Link to Modal Content-->                    
                </div>
            </div>
        </div>
        
    </div>
    <!--Buy Tickets Body - End-->
        
        
        
	
	<!--Footer Code - Start-->
    <?php include('footer.php') ?>
	<!--Footer Code - End-->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.toast.min.js"></script>
        

    <!--Page Redirecting-->
        <script>
            //Redirecting to selected movie
            function SelectRedirect(){
                var $valueid = document.getElementById('selectMovie').value;
                window.location="buy_tickets.php?movieID="+$valueid;
            }

            //Setting the select option to current movieID
            $("#selectMovie > [value=" + "<?php echo $movieID ?>" + "]").attr("selected", "true");

        </script>

    <!--Date Picker Script-->
		<script>
        $(document).ready(function(){
            //Set first date as default and fetch showtimes for that date
            $("#date-0").addClass('active');
            var sel_Date = $('#date-0').attr('dateValue');
            var movieID = jQuery('#selectMovie').val();
            if(sel_Date){
                $.ajax({
                    type:'POST',
                    url:'assets/buy_tickets.inc.php',
                    data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                    success:function(html){
                        $('#table_details').html(html);
                    }
                }); 
            }

            //Change active class to selected date and fetch showtimes for that date
            $(".date-container ul[class*=list-inline] li").click(function () {
                $(".date-container ul[class*=list-inline] .active").removeClass('active');
                $(this).addClass('active');
                var sel_Date = $(this).attr('dateValue');
                var movieID = jQuery('#selectMovie').val();
                if(sel_Date){
                    $.ajax({
                        type:'POST',
                        url:'assets/buy_tickets.inc.php',
                        data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                        success:function(html){
                            $('#table_details').html(html);
                        }
                    }); 
                }
            });
        });
        </script>



    <!--------------------- Usual Date Picker Calendar - Start ------------------------->
        <!--Date Picker Script-->
		<!-- <script>
			$( function() {
				$( "#datepicker" ).datepicker({
					dateFormat: 'yy-mm-dd',
					showOn: "button",
					buttonImage: "images/calendar.png",
					buttonText: "Select Date",
                    beforeShowDay: enableAvailableDays
				});
			});
		</script> -->
        

        <!--Enabling Dates between Two Dates fetched from database-->
        <!-- <script>
            //Converting any number to two digits (for example: (9 -> 09))
            function pad2(number) {
               return (number < 10 ? '0' : '') + number;
            }
            
            //Fetching an array of dates between two dates
            var getDateArray = function(start, end) {
                var array_dates = new Array();
                var cur_date = new Date(start);
                for(var l=0;l<7;l++) {
                    var current_date=new Date(cur_date);
                    var formatted_date = current_date.getFullYear() + "-" + pad2(current_date.getMonth() + 1) + "-" + pad2(current_date.getDate());
                    array_dates.push(formatted_date);
                    cur_date.setDate(cur_date.getDate() + 1);
                }
                return array_dates;
            }
            
            
            var startDate = new Date("<?php //echo $startingDate?>"); //YYYY-MM-DD
            if(startDate<new Date()){
                startDate = new Date();
            }
            var endDate = new Date("<?php //echo $endingDate?>"); //YYYY-MM-DD
            
            $("#datepicker").datepicker('option','minDate',startDate);
            $("#datepicker").datepicker('option','maxDate',endDate);

            //Enabling an array of dates
            var availableDates = getDateArray(startDate, endDate); //desired Dates
            function enableAvailableDays(date) {
                var sdate = $.datepicker.formatDate('yy-mm-dd', date)
                
                if($.inArray(sdate, availableDates) != -1){
                    return [true];
                }
                return[false];
            }       
        </script> -->


        <!-- <script>
            $('#datepicker').on('change',function(){
                var sel_Date = $(this).val();
                var movieID = jQuery('#selectMovie').val();
                if(sel_Date){
                    $.ajax({
                        type:'POST',
                        url:'assets/buy_tickets.inc.php',
                        data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                        success:function(html){
                            $('#table_details').html(html);
                        }
                    }); 
                }
            })
        </script> -->

    <!--------------------- Usual Date Picker Calendar - End ------------------------->



        <script>
            $('#myModal').on('show.bs.modal', function () {
                $('body').css('overflow', 'hidden');
            })

            $('#myModal').on('hidden.bs.modal', function (e) {
                $('body').css('overflow', 'auto');
            })
        </script>
        

        <script>
            $(".header_wrapper .main_menu_wrapper .item-7").addClass("active");
        </script>

  </body>
</html>