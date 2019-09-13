<?php
session_start();
include_once ('db_config.php');

if(!isset($_SESSION['admin_id'])) {
    header('location: index.php');
}
else if($_SESSION['admin_id']!='1'){
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
    #id_column {
        width: 60px;
        text-align: center;
    }
    #image_column {
        text-align: center;
        width: 400px;
    }
    #action_column {
        text-align: center;
        width: 80px
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
    .add_new_carousel_image {
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
    #deleteCarouselImageModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteCarouselImageModal .modal-dialog {
        width: 380px;
    }
    #deleteCarouselImageModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteCarouselImageModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addCarouselImageModal .modal-header{
        user-select: none;
    }
    #addCarouselImageModal .modal-header .close{
        outline: none;
    }
    #addCarouselImageModal .modal-body {
        padding-bottom: 0;
    }
    .custom-image-input {
        display: block;
        background-color: #EEE;
        width: 100%;
        height: 36px;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        position: relative;
        z-index: 1;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
    }
    .custom-image-input input[type="file"] {
        width: 100px;
        height: 36px;
        opacity: 0;
        position: absolute;
        right:0;
        top:0;
        z-index: 3;
        font-size: 0;
        cursor: pointer;
    }
    .custom-image-input:after {
        content: "Upload";
        background-color: #F00;
        color: #FFF;
        width: 100px;
        height: 36px;
        position: absolute;
        top:0;
        right:0;
        line-height: 35px;
        text-align: center;
        border-top-right-radius: .25rem;
        border-bottom-right-radius: .25rem;
    }
    .custom-image-input span {
        user-select: none;
        padding-left: 4px;
        /* display: block;
        width: 200px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis; */
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Carousel</h3>
            <div class="card-body">
                <div class="add_new_carousel_image">
                    <button type="button" class="add_button" data-toggle="modal" data-target="#addCarouselImageModal">Add New Carousel Image</button>
                </div>
                <div id="output" class="table-responsive">

                </div>
            </div>
        </div>
        <!-- Editable table -->


        <!-- Add Carousel Image Modal -->
        <div class="modal fade" id="addCarouselImageModal" tabindex="-1" role="dialog" aria-labelledby="addCarouselImageModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCarouselImageModalLongTitle">New Caousel Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="add_carousel_image_form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="movie_label" class="col-sm-3 col-form-label">Movie:</label>
                                <div class="col-sm-9">
                                    <select id="movie" name="movie" class="form-control" required="required">
                                        <option value="" disabled selected>Select Movie</option>
                                        <?php
                                            $sql = "SELECT * FROM tbl_movies WHERE `status` = '1' ORDER BY movie_name ASC";
                                            $result = mysqli_query($db, $sql);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                echo '<option value="'.$row['movie_id'].'">'.$row['movie_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_label" class="col-sm-3 col-form-label">Image:</label>
                                <div class="col-sm-9">
                                    <div class="custom-image-input">
                                        <span id="image_input_inner_label">Upload Image</span>
                                        <input type="file" id="image" name="image" accept="image/*" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                            <input type="submit" class="btn btn-primary" id="insert" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Delete Carousel Image Confirmation Modal -->
        <div class="modal fade" id="deleteCarouselImageModal" tabindex="-1" role="dialog" aria-labelledby="deleteCarouselImageModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCarouselImageModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this carousel image?
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
        //Fetching table data from mysql
        function fetch_table_data(){
            $.ajax({
                url:"assets/carousel.table.php",
                method:"POST",
                success: function(data){
                    $("#output").html(data);
                }
            });
        }
        fetch_table_data();
        
        //Display uploaded filename in the span area replacing 'upload image' text
        $("#image").change(function() {
            if ($(this).val() != "") {
                filename = this.files[0].name
                if(filename.length>23) {
                    firstpart = filename.substring(0,12);
                    lastpart = filename.substring(filename.length-12,filename.length);
                    filename = firstpart + "..." + lastpart;
                }
                $("#image_input_inner_label").html(filename);
            }else {
                $("#image_input_inner_label").html("Upload Image");
            }
        });

        //Add new row to table
        $("#add_carousel_image_form").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url:"assets/carousel.insert.php",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                processData: false,
                success:function(d){
                    $("#addCarouselImageModal").modal('hide');
                    fetch_table_data();
                    if(d!=""){
                        $.toast({
                            text: "Carousel image was added successfully.",
                            icon: 'success',
                            position: 'top-center',
                            hideAfter: 3000,
                            stack: false,
                            loader: false
                        });
                    }else{
                        $.toast({
                            text: "Carousel image is already available for this movie.",
                            icon: 'warning',
                            position: 'top-center',
                            hideAfter: 3000,
                            stack: false,
                            loader: false
                        });
                    }
                }
            });
        });

        //Reset form on closing modal
        $('#addCarouselImageModal').on('hidden.bs.modal', function() {
            $("#add_carousel_image_form")[0].reset();
        });

        var ID_delete = "";
        //Delete a row from table
        $(document).on("click",".delete_button",function(){
            var id = $(this).attr("ID");
            ID_delete = id;
            $('#deleteCarouselImageModal').modal('show');
        });

        //Confirm deleting a row from table
        $("#delete_confirm").click(function() {
            $.ajax({
                url:"assets/carousel.delete.php",
                type:"post",
                data:{id:ID_delete},
                success:function(){
                    $('#deleteCarouselImageModal').modal('hide');
                    fetch_table_data();
                }
            });
        })
    });
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-7").addClass("active");
</script>

</body>

</html>
