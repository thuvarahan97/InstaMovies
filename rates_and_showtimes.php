<?php
session_start();
include 'assets/rates_and_showtimes.inc.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
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
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/movies_slider.css">

		<!--Favicon Image-->
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
		<title>InstaMovies</title>

	</head>

	
  <body id="itemid-3">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <!--Rates and ShowTimes Body - Start-->
    <div class="rates_and_showtimes">
			
				<!--Banner Code - Start-->
				<div class="banner">
						<img src="images/banner.jpg?v=<?php echo time(); ?>">
				</div>
				<!--Banner Code - End-->

        <div class="container mt-4">
                <h1>Rates and Show Times</h1>
                <p>
                    Please select the required movie and the theatre from the dropdown lists and it will display current ticket rates and show times for the relevant theater.
                    <br>
                    <strong>Note:</strong>
                    <br>	
                    The Ticket Rates and Show Times displayed are standard rates and showtimes for the Theatre ONLY. Ticket Rates and Show Times may differ from Movie to Movie.
                </p>


                <form class="form_details mt-4" action="request.php" id="detailsFrm" name="frmName" method="POST">
                    <div class="form-group row">
                        <label for="inputMovie" class="col-sm-2 col-form-label">Movie</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="movie" name="movie">
                                <option value="">Select Movie</option>
                                <?php echo $options_movie;?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row" >
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="date col-sm-10">
                            <div class="input-group">
                                    <input type='text' class="form-control" id='datepicker' name="date" readonly="true">
                                </div>								
                        </div>
                    </div>

                    <div class="form-group" action="assets/rates_and_showtimes.inc.php" method="POST">
                        <div class="row">
                            <label for="inputTheatre" class="col-sm-2 col-form-label">Theatre</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="theatre" name="theatre">
                                    <option value="">Select Theatre</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input class="btn btn-warning" role="button" name="view" value="View Details" type="submit">
                        </div>
                    </div>
                </form>
                
                <div class="output_details" id="output_details" style="display:none;">
                    <div class="rates_details mt-4">
                        <label class="heading">Rates:</label>
                        <div class="rates_table mt-2" id="output_details_rates_table">
                            <!--table file link-->
                        </div>
                    </div>
                    <div class="showtimes_details mt-4">
                        <label class="heading">Show Times:</label>
                        <div class="showtimes_table mt-2" id="output_details_showtimes_table">
                            <!--table file link-->
                        </div>
                    </div>
                    <button id="buy_tickets_btn" class="btn btn-danger mt-4">Buy Tickets</button>
                </div>

            </div>
        </div>
    </div>
    <!--Rates and ShowTimes Body - End-->
        
        
        
	
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


	<!--Date Picker Script-->
		<script>
			$( function() {
				$( "#datepicker" ).datepicker({
					dateFormat: 'yy-mm-dd',
					showOn: "button",
					buttonImage: "images/calendar.png",
					buttonText: "Select Date",
                    minDate: 0,
				});
			});
		</script>
        
        
    <!--Output_Details Script-->
        <script>
            jQuery(document).ready(function(){ 

                jQuery("#detailsFrm").submit(function (e) {
                    
                    e.preventDefault();
                    var frm = jQuery('#detailsFrm');
                    var outPut1 = jQuery('#output_details_rates_table');
                    var outPut2 = jQuery('#output_details_showtimes_table');

                    var movieID = jQuery('#movie').val();
                    var selectedDate = jQuery('#datepicker').val();
                    var theatreID = jQuery('#theatre').val();
                    if (movieID!='',selectedDate!='',theatreID!=''){
                        document.getElementById('output_details').style.display = "block";
                    
                        jQuery.ajax({
                            type: 'POST',
                            data:'action=submitForm&movie_id=' + movieID + '&selected_date=' + selectedDate + '&theatre_id=' + theatreID,
                            url: 'assets/rates_and_showtimes.details_rates.php',
                            success: function(data) {
                                outPut1.html(data);
                            }
                        });

                        jQuery.ajax({
                            type: 'POST',
                            data:'action=submitForm&movie_id=' + movieID + '&selected_date=' + selectedDate + '&theatre_id=' + theatreID,
                            url: 'assets/rates_and_showtimes.details_showtimes.php',
                            success: function(data) {
                                outPut2.html(data);
                            }
                        });

                    }
                });

            });
            </script>

    <!---------------------------------------------------------------------------->
    <!--Output Details Script -------- draft-->
		<!-- <script>
			function show_output_details() {
                var movieID = document.getElementById('movie').value;
                var selectedDate = document.getElementById('datepicker').value;
                var theatreID = document.getElementById('theatre').value;
                $.ajax({
                    type:"POST",
                    url:'assets/rates_and_showtimes.inc.php',
                    data:'movieID' + movieID +  '&theatreID' + theatreID,
                    cache:false,
                    success:function(response){
                        $('#output_details_table').html(response);
                    }
                })
			}
        </script> -->
    <!---------------------------------------------------------------------------->

    <!--Select Options Data Dependancy-->
        <script>
            //Datepicker minDate Dependant on Movie Option
            //Hiding Output_Details division when changing selection of Movie
            $('#movie').on('change',function(){
                document.getElementById('output_details').style.display = "none";
                document.getElementById('datepicker').value='';
                document.getElementById('theatre').value='';
                var movieID = $(this).val();
                if(movieID){
                    $.ajax({
                        type:'POST',
                        url:'assets/rates_and_showtimes.inc.php',
                        data:'movie_id_1=' + movieID,
                        success:function(data){
                            var start_Date = data;
                            $('#datepicker').datepicker('option','minDate',start_Date);
                            $('#theatre').html('<option value="">Select Theatre</option>');
                        }
                    }); 
                }else{
                    $('#theatre').html('<option value="">Select Theatre</option>');
                }
            });
            
            //Hiding Output_Details division when changing selection of Theatre
            $('#theatre').on('change',function(){
                document.getElementById('output_details').style.display = "none";
            })
            
            //Theatre Option Dependant on Date Selection in Datepicker
            //Hiding Output_Details division when changing selection of Date
            $('#datepicker').on('change',function(){
                document.getElementById('output_details').style.display = "none";

                var sel_Date = $(this).val();
                var movieID = jQuery('#movie').val();
                if(sel_Date){
                    $.ajax({
                        type:'POST',
                        url:'assets/rates_and_showtimes.inc.php',
                        data:'sel_date=' + sel_Date + '&movie_id=' + movieID,
                        success:function(html){
                            $('#theatre').html(html);
                        }
                    }); 
                }else{
                    $('#theatre').html('<option value="">Select Theatre</option>');
                }

            })

            // $('#movie').on('change',function(){
            //     var movieID = $(this).val();
            //     $('#datepicker').datepicker('option','maxDate',+20);
            // });
        </script>


    <!------------------------------------------------------------------------------------>
    <!--Enabling Dates between Two Dates-->
        <!-- <script>
            //Converting any number to two digits (for example: (9 -> 09))
            function pad2(number) {
               return (number < 10 ? '0' : '') + number;
            }
            
            //Fetching an array of dates between two dates
            var getDateArray = function(start, end) {
                var array_dates = new Array();
                var cur_date = new Date(start);
                while (cur_date <= end) {
                    var current_date=new Date(cur_date);
                    var formatted_date = current_date.getFullYear() + "-" + pad2(current_date.getMonth() + 1) + "-" + pad2(current_date.getDate());
                    array_dates.push(formatted_date);
                    cur_date.setDate(cur_date.getDate() + 1);
                }
                return array_dates;
            }
            
            
            var startDate = new Date("<?php echo $start_date?>"); //YYYY-MM-DD
            var endDate = new Date("<?php echo $end_date?>"); //YYYY-MM-DD
            
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
    <!---------------------------------------------------------------------------------->
   
    <script>
        $(".header_wrapper .main_menu_wrapper .item-3").addClass("active");
    </script>

  </body>
</html>