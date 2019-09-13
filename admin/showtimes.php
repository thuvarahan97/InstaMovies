<?php
session_start();
include_once ('db_config.php');

if(!isset($_SESSION['admin_id'])) {
    header('location: index.php');
}
else if($_SESSION['admin_id']=='1'){
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>InstaMovies - Admin | Dashboard</title>
  <!--Favicon-->
  <link rel="shortcut icon" type="image/png" href="images/icon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <!-- MDBootstrap Datatables  -->
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <!-- JQuery UI - Datepicker -->
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <!--JQuery Toast Plugin CSS-->
  <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">
  <!-- Gijgo CSS - Timepicker -->
  <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <style>
    .logo-wrapper-custom{
        margin: 20px 0;
        min-height:30px;
        text-align: center;
        color: white;
        user-select: none;
    }
    .sidebar-fixed{
        background-image: url("images/Sidebar_BG.png");
        background-repeat: no-repeat;
        background-size: 100% auto;
    }
    .sidebar-fixed .list-group a{
        background: none;;
        color: white;
        border: none;
    }
    .sidebar-fixed .list-group a:hover{
        color: #dd44fe;
    }
    .sidebar-fixed .list-group a:focus{
        color: #a564ff;
    }
    .sidebar-fixed .list-group a.active{
        background-color: #4130c2;
        border:none;
    }
    .navbar-nav .logout-button{
        border: 1px solid white;
        border-radius: 4px;
    }
    .navbar-nav .logout-button:hover {
        border: 1px solid red;
    }
    .navbar-brand {
        user-select: none;
        padding: 0;
    }
    .navbar-brand .white-text {
        margin-left:5px;
        font-size: 16px;
    }
    .pt-3-half {
        padding-top: 1.4rem;
    }
    .card {
        margin-bottom: 80px;
    }
    @media only screen and (min-width: 800px)  {
        .card .table-responsive {
            overflow-x: hidden;
        }
    }
    #row_num_column {
        text-align: center;
        width: 40px;
    }
    #show_id_column {
        width: 70px;
        text-align: center;
    }
    #showtime_column {
        text-align: center;
    }
    #action_column {
        text-align: center;
        width: 80px
    }
    .edit_button {
        width: 28px;
        height: 28px;
        border:none;
        box-shadow: none;
        margin: 0 2px;
        background-color: #007ff6;
        color: white;
        border-radius: 5px;
    }
    .edit_button:hover {
        background-color: #349dff;
    }
    .edit_button:active {
        background-color: #267ac8;
        outline: none;
    }
    .edit_button:focus {
        outline: none;
    }
    .delete_button {
        width: 28px;
        height: 28px;
        border:none;
        box-shadow: none;
        margin: 0 3px;
        background-color: #f50000;
        color: white;
        border-radius: 5px;
    }
    .delete_button:hover {
        background-color: #fe1c1c;
    }
    .delete_button:active {
        background-color: #c70000;
        outline: none;
    }
    .delete_button:focus {
        outline: none;
    }
    .add_new_showtime {
        text-align: center;
    }
    .add_button {
        width: auto;
        height: 35px;
        border:none;
        box-shadow: none;
        margin: 0 3px;
        padding-left: 10px;
        padding-right: 10px;
        background-color: #05a501;
        color: white;
        border-radius: 5px;
    }
    .add_button:hover {
        background-color: #04b600;
    }
    .add_button:active {
        background-color: #0c9209;
        outline: none;
    }
    .add_button:focus {
        outline: none;
    }
    #start_date {
        cursor: default;
    }
    #end_date {
        cursor: default;
    }
    #start_date_update {
        cursor: default;
    }
    #end_date_update {
        cursor: default;
    }
    #close_delete {
        background-color: transparent;
        color: red;
        border: 2px solid red;
        border-radius: 5px;
        width: 85px;
        height: 45px;
    }
    #close_delete:hover {
        box-shadow: 0px 0px 8px 2px #bfbfbf;
    }
    #close_delete:active {
        background-color: #f3f2f2; 
        outline: none;
    }
    #close_delete:focus {
        outline: none;
    }
    #delete_confirm {
        background-color: red;
        color: white;
        border-radius: 5px;
        width: 85px;
        height: 45px;
        border: none;
    }
    #delete_confirm:hover {
        box-shadow: 0px 0px 8px 2px #bfbfbf;
    }
    #delete_confirm:active {
        outline: none;
        background-color: #e60000;
    }
    #delete_confirm:focus {
        outline: none;
    }
    #deleteShowtimeModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteShowtimeModal .modal-dialog {
        width: 380px;
    }
    #deleteShowtimeModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteShowtimeModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addShowtimeModal .modal-header{
        user-select: none;
    }
    #updateShowtimeModal .modal-header{
        user-select: none;
    }
    #addShowtimeModal .modal-header .close{
        outline: none;
    }
    #updateShowtimeModal .modal-header .close{
        outline: none;
    }
    .gj-timepicker .input-group-append button i {
        left: 7px !important;
    }
    #add_time {
        width: 38px;
        height: 38px;
        border:none;
        box-shadow: none;
        margin: 0 3px;
        background-color: #05a501;
        color: white;
        border-radius: 5px;
        text-align: center;
    }
    #add_time:hover {
        background-color: #04b600;
    }
    #add_time:active {
        background-color: #0c9209;
        outline: none;
    }
    #add_time:focus {
        outline: none;
    }
    #add_time i {
        padding-top: 3px;
        font-size: 23px;
    }
    #delete_time {
        width: 38px;
        height: 38px;
        border:none;
        box-shadow: none;
        margin: 0 3px;
        background-color: #f50000;
        color: white;
        border-radius: 5px;
        text-align: center;
    }
    #delete_time:hover {
        background-color: #fe1c1c;
    }
    #delete_time:active {
        background-color: #c70000;
        outline: none;
    }
    #delete_time:focus {
        outline: none;
    }
    #delete_time i {
        padding-top: 3px;
        font-size: 23px;
    }
    #addShowtimeModal .modal-body {
        padding-bottom: 0;
    }
    #updateShowtimeModal .modal-body {
        padding-bottom: 0;
        margin-bottom: -12px;
    }
  </style>
</head>

<body class="grey lighten-4">

  <!--Main Navigation-->
  <?php include ('header.php'); ?>
  <!--Main Navigation-->


  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">


        <!-- Editable table -->
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Showtimes</h3>
            <div class="card-body">
                <div class="add_new_showtime">
                    <button type="button" class="add_button" data-toggle="modal" data-target="#addShowtimeModal">Add New Showtimes</button>
                </div>
                <div id="output" class="table-responsive">

                </div>
            </div>
        </div>
        <!-- Editable table -->


        <!-- Add Showtime Modal -->
        <div class="modal fade" id="addShowtimeModal" tabindex="-1" role="dialog" aria-labelledby="addShowtimeModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShowtimeModalLongTitle">New Movie Showtimes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="add_showtime_form">
                        <div class="form-group row">
                            <label for="show_label" class="col-sm-3 col-form-label">Show:</label>
                            <div class="col-sm-9">
                                <select id="show" name="show" class="form-control" required="required">
                                    <option value="" disabled selected>Select Show</option>
                                    <?php
                                        $sql_shows_list = "SELECT A.show_id, B.movie_name, C.theatre_name, C.city FROM tbl_shows A, tbl_movies B, tbl_theatres C WHERE A.movie_id = B.movie_id AND A.theatre_id = C.theatre_id AND C.admin_id = '{$_SESSION['admin_id']}' ORDER BY B.movie_id ASC";
                                        $result_shows_list = mysqli_query($db, $sql_shows_list);
                                        while($row_shows_list = mysqli_fetch_array($result_shows_list))
                                        {
                                            echo '<option value="'.$row_shows_list['show_id'].'">'.$row_shows_list['movie_name'].' | '.$row_shows_list['theatre_name'].' - '.$row_shows_list['city'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="showtimes_div">
                            <div class="form-group row">
                                <label for="showtime_label" class="col-sm-3 col-form-label">Showtime(s):</label>
                                <div class="col-sm-9">
                                    <table id="showtimes_input_table_initial_fixed">
                                        <tr>
                                            <td>
                                                <input type="text" width="296px" id="showtime" name="showtime[]" class="form-control" placeholder="Select Time" onfocus="this.blur()" required="required">
                                            </td>
                                            <td>
                                                <button type="button" id="add_time" style="margin-left: 7px;"><i class="fas fa-plus fa-2x"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                    <table id="showtimes_input_table">

                                    </table>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
                </div>
            </div>
        </div>
        

        <!-- Update Showtime Modal -->
        <div class="modal fade" id="updateShowtimeModal" tabindex="-1" role="dialog" aria-labelledby="updateShowtimeModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLongTitle">Update Movie Showtimes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="update_showtime_form">
                    <div class="form-group row">
                            <label for="show_update_label" class="col-sm-3 col-form-label">Show:</label>
                            <div class="col-sm-9">
                                <input type="text" id="show_update" name="show_update" class="form-control" disabled="disabled">
                            </div>
                        </div>

                        <div id="showtimes_update_div">
                            <div class="form-group row">
                                <label for="showtime_update_label" class="col-sm-3 col-form-label">Showtime(s):</label>
                                <div class="col-sm-9">
                                    <table id="showtimes_update_table" width="100%">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="update">Save</button>
                </div>
                </div>
            </div>
        </div>
        

        <!-- Delete Showtimes Confirmation Modal -->
        <div class="modal fade" id="deleteShowtimeModal" tabindex="-1" role="dialog" aria-labelledby="deleteShowtimeModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteShowtimeModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete these movie showtimes?
                    This process cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_delete" data-dismiss="modal">No</button>
                    <button type="button" id="delete_confirm">Yes</button>
                </div>
                </div>
            </div>
        </div>
        
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php include ('footer.php'); ?>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  <!-- JQuery UI - Datepicker -->
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <!-- JQuery Toast Plugin JS-->
  <script src="js/jquery.toast.min.js"></script>
  <!-- Gijgo Script - Timepicker -->
  <script type="text/javascript" src="js/gijgo.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

<script>
    $(document).ready(function () {    
        //Initiating Timepicker
        $("#showtime").timepicker({
            uiLibrary: 'bootstrap4',
            format: 'hh:MM TT'
        });
        
        $(".gj-timepicker").children('.input-group-append').children('button').removeClass("btn btn-secondary btn-outline-secondary border-left-0");
 
        //Fetching table data from mysql
        function fetch_table_data(){
            $.ajax({
                url:"assets/showtimes.table.php",
                method:"POST",
                success: function(data){
                    $("#output").html(data);
                }
            });
        }
        fetch_table_data();
        
        //Adding a new time input field in add-showtimes form
        var i = 0;
        $("#add_time").click(function(){
            i++;
            //Appending new time input field with different IDs
            $("#showtimes_input_table").append('<tr><td style="padding-top:12px;"><input type="text" width="296px" id="showtime'+ i +'" name="showtime[]" class="form-control" placeholder="Select Time" onfocus="this.blur()" required="required"></td><td style="padding-top:12px;"><button type="button" id="delete_time" style="margin-left: 7px;"><i class="fas fa-minus fa-2x"></i></button></td></tr>')
            
            //Initiating Timepicker for added time input field
            $("#showtime"+i).timepicker({
                uiLibrary: 'bootstrap4',
                format: 'hh:MM TT'
            });
            $(".gj-timepicker").children('.input-group-append').children('button').removeClass("btn btn-secondary btn-outline-secondary border-left-0");
        })

        //Deleting a time input field in add-showtimes form
        $(document).on("click","#delete_time", function() {
            $(this).closest("tr").remove();
        })

        //Add new row to table
        $("#save").click(function() {
            if($("#add_showtime_form")[0].checkValidity()) {
                $.ajax({
                    url:"assets/showtimes.insert.php",
                    type:"post",
                    data:$("#add_showtime_form").serialize(),
                    success:function(d){
                        $('#addShowtimeModal').modal('hide');
                        fetch_table_data();
                        if(d!=""){
                            $.toast({
                                text: "Showtimes were added successfully.",
                                icon: 'success',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        }else{
                            $.toast({
                                text: "Showtimes are already available for this show.",
                                icon: 'warning',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        }
                    }
                });
            }
            else {
                $("#add_showtime_form")[0].reportValidity();
            }
        });

        //Reset form on closing modal
        $('#addShowtimeModal').on('hidden.bs.modal', function() {
            $("#add_showtime_form")[0].reset();
            $("#showtimes_input_table").html("");
        });

        // Converting 12 hours time to 24 hours
            // function timeConvertor(time) {
            //     var PM = time.match('PM') ? true : false
                
            //     time = time.split(':')
            //     var min = time[1]
                
            //     if (PM) {
            //         var hour = 12 + parseInt(time[0],10)
            //         var sec = time[2].replace('PM', '')
            //     } else {
            //         var hour = time[0]
            //         var sec = time[2].replace('AM', '')       
            //     }
            
            //     console.log(hour + ':' + min + ':' + sec)
            // }

        var showID_update = "";
        var showtimeID_update = new Array();
        //Getting a row data from table to modal update form
        $(document).on("click",".edit_button",function(){
            var row = $(this);
            var id = $(this).attr("showID");
            showID_update = id;
            
            $('#updateShowtimeModal').modal('show');
            
            var movie = row.closest("tr").find("td:eq(2)").text();
            var theater = row.closest("tr").find("td:eq(3)").text();
            $("#show_update").val(movie + " | " +theater);

            var showtimeCount = $(this).attr("showtimeCount");
            var st_array = new Array();
            for(var x=0; x<showtimeCount; x++) 
            {
                var time = row.closest("tr").find("td:eq(4)").children("table").find("tr:eq("+ x +")").children("td").text();
                var st_id = row.closest("tr").find("td:eq(4)").children("table").find("tr:eq("+ x +")").children("td").attr("showtimeID");
                st_array.push(st_id);
                $("#showtimes_update_table").append('<tr><td style="padding-bottom:12px;"><input type="text" id="showtime_update'+ x +'" name="showtime_update[]" value="'+ time +'" class="form-control" placeholder="Select Time" onfocus="this.blur()"></td>')
                
                //Initiating Timepicker for added time update field
                $("#showtime_update"+x).timepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'hh:MM TT'
                });
                $(".gj-timepicker").children('.input-group-append').children('button').removeClass("btn btn-secondary btn-outline-secondary border-left-0");
            }
            showtimeID_update = st_array;
        });

        //Update a row data in the table
        $("#update").click(function() {
            var showtimeID_update_Encoded = JSON.stringify(showtimeID_update);
            $.ajax({
                url:"assets/showtimes.update.php",
                type:"post",
                data:$("#update_showtime_form").serialize() + "&showtimeID_update=" + showtimeID_update_Encoded,
                success:function(){
                    $('#updateShowtimeModal').modal('hide');
                    fetch_table_data();
                    $.toast({
                        text: "Showtimes were updated successfully.",
                        icon: 'success',
                        position: 'top-center',
                        hideAfter: 3000,
                        stack: false,
                        loader: false
                    });
                }
            });
        });

        //Clear Showtimes division on closing update modal
        $('#updateShowtimeModal').on('hidden.bs.modal', function() {
            $("#showtimes_update_table").html("");
        });

        var showID_delete = "";
        //Delete a row from table
        $(document).on("click",".delete_button",function(){
            var id = $(this).attr("showID");
            showID_delete = id;
            $('#deleteShowtimeModal').modal('show');

        });

        //Confirm deleting a row from table
        $("#delete_confirm").click(function() {
            $.ajax({
                url:"assets/showtimes.delete.php",
                type:"post",
                data:{id:showID_delete},
                success:function(){
                    $('#deleteShowtimeModal').modal('hide');
                    fetch_table_data();
                }
            });
        })
    });
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-5").addClass("active");
</script>

</body>

</html>
