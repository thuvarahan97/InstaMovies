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
  <title>InstaMovies - Admin | Show Ticket Rates</title>
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
    #show_id_column {
        width: 70px;
        text-align: center;
    }
    #action_column {
        text-align: center;
        width: 70px
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
    .delete_button:focus {
        background-color: #c70000;
        outline: none;
    }
    .add_show_ticket_rate {
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
    .add_button:focus {
        background-color: #0c9209;
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
    #close_delete:focus {
        background-color: #f3f2f2; 
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
    #delete_confirm:focus {
        outline: none;
        background-color: #e60000;
    }
    #deleteShowTicketRateModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteShowTicketRateModal .modal-dialog {
        width: 380px;
    }
    #deleteShowTicketRateModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteShowTicketRateModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addShowTicketRateModal .modal-header{
        user-select: none;
    }
    #addShowTicketRateModal .modal-header .close{
        outline: none;
    }
    #currency_input > i {
        position: absolute;
        display: block;
        transform: translate(0, -50%);
        top: 50%;
        pointer-events: none;
        padding-left: 13px;
        padding-top: 1px;
        width: 25px;
        text-align: center;
        font-style: normal;
        font-weight: 400;
        color: #495057;
    }
    #currency_input > input {
        padding-left: 38px;
        padding-right: 0;
    }
    #category {
        border-top: 1px solid #dee2e6;
        padding-top: 15px;
    }
    #addShowTicketRateModal .modal-body {
        padding-bottom: 0;
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Show Ticket Rates</h3>
            <div class="card-body">
                <div class="add_show_ticket_rate">
                    <button type="button" class="add_button" data-toggle="modal" data-target="#addShowTicketRateModal">Add Show Ticket Rates</button>
                </div>
                <div id="output" class="table-responsive">
                    <!--Table Link-->
                </div>
            </div>
        </div>
        <!-- Editable table -->


        <!-- Add Show Ticket Rate Modal -->
        <div class="modal fade" id="addShowTicketRateModal" tabindex="-1" role="dialog" aria-labelledby="addShowTicketRateModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShowTicketRateModalLongTitle">Add Show Ticket Rates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="add_show_ticket_rate_form">

                        <div class="form-group row">
                            <label for="show_label" class="col-sm-2 col-form-label">Show:</label>
                            <div class="col-sm-10">
                                <select id="show" name="show" class="form-control" required="required">
                                    <option value="" disabled selected>Select Show</option>
                                    <?php
                                        $sql_shows_list = "SELECT A.show_id, A.theatre_id, B.movie_name, C.theatre_name, C.city FROM tbl_shows A, tbl_movies B, tbl_theatres C WHERE A.movie_id = B.movie_id AND A.theatre_id = C.theatre_id AND C.admin_id = '{$_SESSION['admin_id']}' ORDER BY B.movie_id ASC";
                                        $result_shows_list = mysqli_query($db, $sql_shows_list);
                                        while($row_shows_list = mysqli_fetch_array($result_shows_list))
                                        {
                                            echo '<option theatreID="'.$row_shows_list['theatre_id'].'" value="'.$row_shows_list['show_id'].'">'.$row_shows_list['movie_name'].' | '.$row_shows_list['theatre_name'].' - '.$row_shows_list['city'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="rates">
                            <!--Rates input fields-->
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
        
        
        <!-- Delete Show Confirmation Modal -->
        <div class="modal fade" id="deleteShowTicketRateModal" tabindex="-1" role="dialog" aria-labelledby="deleteShowTicketRateModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteShowTicketRateModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this movie show?
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
                url:"assets/show_ticket_rates.table.php",
                method:"POST",
                success: function(data){
                    $("#output").html(data);
                }
            });
        }
        fetch_table_data();

        //Display Categories and Input Fields on changing Show Selection
        $('#show').on('change',function(){
            var theatreID = $(this).find('option:selected').attr("theatreID");
            $.ajax({
                url:"assets/show_ticket_rates.categories.php",
                type:"post",
                data: {theatreID:theatreID},
                success:function(data){
                    $("#rates").html(data);
                }
            });
        });

        //Add new row to table
        $("#save").click(function() {
            if($("#rates").children().length != 0) {
                if($("#add_show_ticket_rate_form")[0].checkValidity()) {
                    $.ajax({
                        url:"assets/show_ticket_rates.insert.php",
                        type:"post",
                        data: $("#add_show_ticket_rate_form").serialize(),
                        success:function(d){
                            $('#addShowTicketRateModal').modal('hide');
                            fetch_table_data();
                            if(d!=""){
                                $.toast({
                                    text: "Show ticket prices were added successfully.",
                                    icon: 'success',
                                    position: 'top-center',
                                    hideAfter: 3000,
                                    stack: false,
                                    loader: false
                                });
                            }else{
                                $.toast({
                                    text: "Ticket prices are already available for this show.",
                                    icon: 'warning',
                                    position: 'top-center',
                                    hideAfter: 3000,
                                    stack: false,
                                    loader: false
                                });
                            }
                        }
                    });
                }else{
                    $("#add_show_ticket_rate_form")[0].reportValidity();
                }
            }
        });

        //Reset form on closing modal
        $('#addShowTicketRateModal').on('hidden.bs.modal', function() {
            $("#add_show_ticket_rate_form")[0].reset();
            $("#rates").html("");
        });

        var showID_delete = "";
        //Delete a row from table
        $(document).on("click",".delete_button",function(){
            var id = $(this).attr("showID");
            showID_delete = id;

            $('#deleteShowTicketRateModal').modal('show');

        });

        //Confirm deleting a row from table
        $("#delete_confirm").click(function() {
            $.ajax({
                url:"assets/show_ticket_rates.delete.php",
                type:"post",
                data:{id:showID_delete},
                success:function(){
                    $('#deleteShowTicketRateModal').modal('hide');
                    fetch_table_data();
                }
            });
        })
    });
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-6").addClass("active");
</script>

</body>

</html>
