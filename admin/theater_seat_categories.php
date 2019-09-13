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
    #id_column {
        width: 50px;
        text-align: center;
    }
    #row_column {
        text-align: center;
    }
    #col_column {
        text-align: center;
    }
    #seat_column {
        text-align: center;
    }
    #seat_map_column {
        text-align: center;
        width: 90px;
    }
    #action_column {
        text-align: center;
        width: 70px
    }
    .view_button {
        width: 45px;
        height: 28px;
        border:none;
        box-shadow: none;
        margin: 0 2px;
        background-color: #df00ad;
        color: white;
        border-radius: 5px;
    }
    .view_button:hover {
        background-color: #f800c1;
    }
    .view_button:active {
        background-color: #c9009c;
        outline: none;
    }
    .view_button:focus {
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
    .add_new_seat_category {
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
    #deleteSeatCategoryModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteSeatCategoryModal .modal-dialog {
        width: 380px;
    }
    #deleteSeatCategoryModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteSeatCategoryModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addSeatCategoryModal .modal-header{
        user-select: none;
    }
    #addSeatCategoryModal .modal-header .close{
        outline: none;
    }
    @media (min-width: 768px){
        #addSeatCategoryModal .col-md-6 {
            -ms-flex: none;
            /* flex: 0 0 55%; */
            max-width: 100%;
        }
    }
    #addSeatCategoryModal .form-row>[class*=col-] {
        padding-right: 10px;
        padding-left: 10px;
        margin: 7px 0;
    }
    #addSeatCategoryModal .modal-body {
        border-bottom: 1px solid #dee2e6;
    }
    @media (min-width: 768px){
        #viewSeatMapModal .col-md-6 {
            -ms-flex: none;
            /* flex: 0 0 55%; */
            max-width: 100%;
        }
    }
    #viewSeatMapModal .form-row>[class*=col-] {
        padding-right: 10px;
        padding-left: 10px;
        margin: 7px 0;
    }
    #viewSeatMapModal .modal-body {
        border-bottom: 1px solid #dee2e6;
    }
    #form_submission {
        margin: 20px 0 5px;
    }
    #form_submission #proceed_button {
        background-color: #df0079;
        color: white;
        border-radius: 5px;
        width: 100px;
        height: 45px;
        border: none;
    }
    #form_submission #proceed_button:hover {
        box-shadow: 0px 0px 8px 2px #bfbfbf;
    }
    #form_submission #proceed_button:focus {
        outline: none;
    }
    #form_submission #proceed_button:active {
        outline: none;
        background-color: #cd006f;
    }
    #viewSeatMapModal #view_seat_map_modal_close_top_corner {
        position: absolute;
        top: -15px;
        right: -15px;
        width: 30px;
        height: 30px;
        display:block;
        border: 2px solid #f5f5f5;
        border-radius: 50%;
        color: #f5f5f5;
        text-align:center;
        text-decoration:none;
        background: #464646;
        box-shadow: 0 0 3px gray;
    }
    #viewSeatMapModal #view_seat_map_modal_close_top_corner:hover {
        background: #262626;
    }
    #viewSeatMapModal #view_seat_map_modal_close_top_corner:active {
        background: black;
        outline: none;
    }
    #viewSeatMapModal #view_seat_map_modal_close_top_corner:focus {
        outline: none;
    }
    #viewSeatMapModal .modal-body {
        user-select: none;
    }
    #viewSeatMapModal .modal-content{
        box-shadow: 0 0 10px 3px rgba(0, 0, 0, 0.5);
        border-radius:10px;
        border: 1px solid rgba(0, 0, 0, 0.3);
    }
    .loader {
        margin:0;
        position:fixed;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .8);
        text-align:center;
        cursor: wait;
        user-select: none;
        z-index: 2000;
        display: none;
    }
    .loader img {
        margin: 0;
        position: absolute;
        top: 50%;
        left:50%;
        margin-right: -50%;
        transform:translate(-50%, -50%);
        width: 100px;
        height: 100px;
        user-select: none;
    }
    #output th {
        cursor: default;
        user-select: none;
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Theater Seat Categories</h3>
            <div class="card-body">
                <div class="add_new_seat_category">
                    <button type="button" class="add_button" data-toggle="modal" data-target="#addSeatCategoryModal">Add New Seat Category</button>
                </div>
                <div id="output" class="table-responsive">
                    <!--Table Link-->
                </div>
            </div>
        </div>
        <!-- Editable table -->

        
        <!-- Add Seat Categories Modal -->
        <div class="modal fade" id="addSeatCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSeatCategoryModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSeatCategoryModalLongTitle">Add Theater Seat Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="add_seat_category_form">
                        <div class="form-row">
                            <div class="form-group row col-md-6">
                                <label for="theater_label" class="col-sm-3 col-form-label">Theater:</label>
                                <div class="col-sm-9">
                                    <select id="theater" name="theater" class="form-control" required="required">
                                        <option value="" disabled selected>Select Theater</option>
                                        <?php
                                            $sql_theaters_list = "SELECT * FROM `tbl_theatres` WHERE admin_id = '{$_SESSION['admin_id']}'";
                                            $result_theaters_list = mysqli_query($db, $sql_theaters_list);
                                            while($row_theaters_list = mysqli_fetch_array($result_theaters_list))
                                            {
                                                echo '<option value="'.$row_theaters_list['theatre_id'].'">'.$row_theaters_list['theatre_name'].' - '.$row_theaters_list['city'].'</option>';
                                            }
                                        ?>
                                    </select>    
                                </div>
                            </div>

                            
                            <div class="form-group row col-md-6">
                                <label for="num_of_rows_label" class="col-sm-5 col-form-label">Number of Seat Rows:</label>
                                <div class="col-sm-7">
                                    <select id="num_of_rows" name="num_of_rows" class="form-control" required="required">
                                        <option value="" disabled selected>Select Number of Seat Rows</option>
                                        <?php
                                            for ($r = 1; $r <= 20; $r++)
                                            {
                                                echo "<option value=".$r.">".$r."</option>";
                                            }
                                        ?>
                                    </select>    
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group row col-md-6">
                                <label for="seat_category_label" class="col-sm-3 col-form-label">Seat Category:</label>
                                <div class="col-sm-9">
                                    <select id="seat_category" name="seat_category" class="form-control" required="required">
                                        <option value="" disabled selected>Select Seat Category</option>
                                        <?php
                                            $sql_common_seat_categories = "SELECT * FROM `tbl_common_seat_categories`";
                                            $result_common_seat_categories = mysqli_query($db, $sql_common_seat_categories);
                                            while($row_common_seat_categories = mysqli_fetch_array($result_common_seat_categories))
                                            {
                                                echo '<option value="'.$row_common_seat_categories['category_id'].'">'.$row_common_seat_categories['category_name'].'</option>';
                                            }
                                        ?>
                                    </select>    
                                </div>
                            </div>
                            
                            <div class="form-group row col-md-6">
                                <label for="num_of_cols_label" class="col-sm-5 col-form-label">Number of Seat Columns:</label>
                                <div class="col-sm-7">
                                    <select id="num_of_cols" name="num_of_cols" class="form-control" required="required">
                                        <option value="" disabled selected>Select Number of Seat Columns</option>
                                        <?php
                                            for ($c = 1; $c <= 35; $c++)
                                            {
                                                echo "<option value=".$c.">".$c."</option>";
                                            }
                                        ?>
                                    </select>    
                                </div>
                            </div>
                        </div>

                        <div id="form_submission" align="center">
                            <button type="button" id="proceed_button">Proceed</button>
                        </div>
                    </form>

                    
                </div>

                <div id="seat_map" align="center">
                        <!--View Seat Map-->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
                </div>
            </div>
        </div>
        
        
        <!-- View Seat Map Modal -->
        <div class="modal fade" id="viewSeatMapModal" tabindex="-1" role="dialog" aria-labelledby="viewSeatMapModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header-close-only">
                    <button id="view_seat_map_modal_close_top_corner" type="button" data-dismiss="modal">
                    <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="view_seat_category_form">
                        <div class="form-row">

                            <div class="form-group row col-md-5">
                                <label for="theater_view_label" class="col-sm-3 col-form-label">Theater:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="theater_view" name="theater_view" class="form-control" style="text-align:center;" disabled="disabled">
                                </div>
                            </div>
                            
                            <div class="form-group row col-md-4">
                                <label for="seat_category_view_label" class="col-sm-5 col-form-label">Seat Category:</label>
                                <div class="col-sm-7">
                                    <input type="text" id="seat_category_view" name="seat_category_view" class="form-control" style="text-align:center;" disabled="disabled">    
                                </div>
                            </div>

                            <div class="form-group row col-md-3">
                                <label for="num_of_seats_view_label" class="col-sm-6 col-form-label">No. of Seats:</label>
                                <div class="col-sm-6">
                                    <input type="text" id="num_of_seats_view" name="num_of_seats_view" class="form-control" style="text-align:center;" disabled="disabled">    
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div id="view_seat_map" align="center">
                    <!--View Seat Map-->
                </div>

                </div>
            </div>
        </div>

        
        <!-- Delete Seat_category Confirmation Modal -->
        <div class="modal fade" id="deleteSeatCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteSeatCategoryModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSeatCategoryModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this theater seat category?
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
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

<script>
    $(document).ready(function () {
        //Fetching table data from mysql
        function fetch_table_data(){
            $.ajax({
                url:"assets/theater_seat_categories.table.php",
                method:"POST",
                success: function(data){
                    $("#output").html(data);
                }
            });
        }
        fetch_table_data();

        //Form filling conditions
        $('#theater').on('change',function(){
            $("#seat_category").val("");
            $("#num_of_rows").val("");
            $("#num_of_cols").val("");
            $('#seat_map').html("");
        });

        $('#seat_category').on('change',function(){
            $("#num_of_rows").val("");
            $("#num_of_cols").val("");
            $('#seat_map').html("");
        });

        $('#num_of_rows').on('change',function(){
            $('#seat_map').html("");
        });

        $('#num_of_cols').on('change',function(){
            $('#seat_map').html("");
        });
        
        //Fetch and View Seat Map
        $("#proceed_button").click(function() {
            if($("#add_seat_category_form")[0].checkValidity()) {
                $.ajax({
                    url:"assets/theater_seat_categories.seat_map.php",
                    type:"post",
                    data:$("#add_seat_category_form").serialize(),
                    success:function(seatMap){
                        $('#seat_map').html(seatMap);
                    }
                });
            }
            else {
                $("#add_seat_category_form")[0].reportValidity();
            }
        });

        

        //Add new row to table
        $("#save").click(function() {
            var seatsArrayEncoded = JSON.stringify($("#seatsArray").val());
            var ajaxData = $("#add_seat_category_form").serialize() + "&category_name=" + $("#seat_category option:selected").text() + "&seatsArray=" + seatsArrayEncoded + "&num_of_seats=" + $("#num_of_seats").val();
            if($("#seat_map").html()!="") {
                $.ajax({
                    url:"assets/theater_seat_categories.insert.php",
                    type:"post",
                    data: ajaxData,
                    beforeSend: function() {
                        $(".loader").fadeIn(300);
                    },
                    success:function(d){
                        $(".loader").fadeOut(300);
                        $('#addSeatCategoryModal').modal('hide');
                        fetch_table_data();
                        if(d!==""){
                            $.toast({
                                text: "New theater seat category was added successfully.",
                                icon: 'success',
                                position: 'top-center',
                                hideAfter: 3000,
                                stack: false,
                                loader: false
                            });
                        }else{
                            $.toast({
                                text: "This theater seat category is already available.",
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
        });

        //Reset form on closing modal
        $('#addSeatCategoryModal').on('hidden.bs.modal', function() {
            $("#add_seat_category_form")[0].reset();
            $('#seat_map').html("");
        });


        //Getting a row data from table to modal viewSeatMap
        $(document).on("click",".view_button",function(){
            var row = $(this);
            var id = $(this).attr("seatCategoryID");
            
            $('#viewSeatMapModal').modal('show');
            
            var theater = row.closest("tr").find("td:eq(2)").text()
            $("#theater_view").val(theater);
            
            var seat_category = row.closest("tr").find("td:eq(3)").text()
            $("#seat_category_view").val(seat_category);

            var num_of_seats = row.closest("tr").find("td:eq(6)").text()
            $("#num_of_seats_view").val(num_of_seats);

            var num_of_rows = row.closest("tr").find("td:eq(4)").text()
            var num_of_cols = row.closest("tr").find("td:eq(5)").text()
            $.ajax({
                url: "assets/theater_seat_categories.view.seat_map.php",
                type: "post",
                data: {seatCategoryID:id, num_of_rows:num_of_rows, num_of_cols:num_of_cols},
                success: function(html){
                    $("#view_seat_map").html(html)
                }
            })
        });


        var seatCategoryID_delete = "";
        //Delete a row from table
        $(document).on("click",".delete_button",function(){
            var del = $(this);
            var id = $(this).attr("seatCategoryID");
            seatCategoryID_delete = id;

            $('#deleteSeatCategoryModal').modal('show');

        });

        //Confirm deleting a row from table
        $("#delete_confirm").click(function() {
            $.ajax({
                url:"assets/theater_seat_categories.delete.php",
                type:"post",
                data:{id:seatCategoryID_delete},
                success:function(){
                    $('#deleteSeatCategoryModal').modal('hide');
                    fetch_table_data();
                }
            });
        })
    });
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-3").addClass("active");
</script>

<div class="loader">
    <img draggable="false" src="images/loading.gif">
</div> 
        
</body>

</html>