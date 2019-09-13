<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>InstaMovies - Admin | Dashboard</title>
  <?php include ("assets/admin_add.inc.php");?>
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
        margin: 25px 0;
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
    #row_num_column {
        text-align: center;
        width: 40px;
    }
    #id_column {
        width: 45px;
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
    .edit_button:focus {
        background-color: #267ac8;
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
    .delete_button:focus {
        background-color: #c70000;
        outline: none;
    }
    .add_new_show {
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
    #deleteModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteModal .modal-dialog {
        width: 380px;
    }
    #deleteModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addModal .modal-header{
        user-select: none;
    }
    #updateModal .modal-header{
        user-select: none;
    }
    #addModal .modal-header .close{
        outline: none;
    }
    #updateModal .modal-header .close{
        outline: none;
    }

  </style>
</head>

<body class="grey lighten-4">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark grey darken-4 scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <div class="navbar-brand">
            <img src="images/admin.png" width="42px" height="42px" class="img-fluid z-depth-1 rounded-circle">
            <strong class="white-text">Admin</strong>
        </div>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
              <!--Left Links-->
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link logout-button">
                Logout
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <div class="logo-wrapper-custom">
        <img src="images/logo.png" width="30px" height="30px" class="img-fluid" alt="InstaMovies Private Limited"> InstaMovies
      </div>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
        <a href="profile.php" class="list-group-item">
            <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="movies.php" class="list-group-item active">
            <i class="fas fa-film mr-3"></i>Movies</a>
        <a href="theaters.php" class="list-group-item">
            <i class="fas fa-building mr-3"></i>Theaters</a>
        <a href="seat_maps.php" class="list-group-item">
            <i class="fas fa-table mr-3"></i>Seat Maps</a>
        <a href="shows.php" class="list-group-item">
            <i class="fas fa-calendar-alt mr-3"></i>Shows</a>
        <a href="showtimes.php" class="list-group-item">
            <i class="fas fa-clock mr-3"></i>Showtimes</a>
        <a href="show_ticket_rates.php" class="list-group-item">
            <i class="fas fa-money-bill-alt mr-3"></i>Show Ticket Rates</a>
        <a href="carousel.php" class="list-group-item">
            <i class="fas fa-images mr-3"></i>Carousel</a>
        <a href="bookings.php" class="list-group-item">
            <i class="fas fa-ticket-alt mr-3"></i>Bookings</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->


  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Editable table -->
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Theatres</h3>
            <div class="card-body">
                <div class="add_new_show">
                    <a href="add.php"><button type="button" class="add_button" data-toggle="modal" data-target="#addModal">Add New Theatre</button></a>
                </div>
                <br>
                <div id="output" class="table-responsive">
                    <?php
                    // session_start();
                        function db_connect(){
                        $conn = mysqli_connect("localhost", "root", "", "instamovies");
                        if(!$conn){
                        echo "Can't connect database " . mysqli_connect_error($conn);
                        exit;
                        }
                        function getAll($conn){
                            $query = "SELECT * from tbl_theatres ORDER BY theatre_id DESC";
                            $result = mysqli_query($conn, $query);
                            if(!$result){
                                echo "Can't retrieve data " . mysqli_error($conn);
                                exit;
                            }
                            return $result;
                        }
                        return $conn;
                    }
                    $conn = db_connect();
                    $result = getAll($conn);
                    ?>
                    <table id="table" class="table table-striped table-bordered table-sm">
                        <thead class="grey lighten-1">
                            <tr>
                                <th id="row_num_column">#</th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">City</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Phone_number</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Facilities</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">AdminID</th>
                                <th class="th-sm">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $i = 0;
                                while($row = mysqli_fetch_assoc($result)){
                        $i+=1; ?>     
                                <td id='row_num_column'><?php echo $i;?></td>
                                <td id='id_column'><?php echo $row['theatre_id']; ?></td>
                                <td><?php echo $row['theatre_name']; ?></td>
                                
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['telephone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" style="height:30%;"/>'; ?></td>
                                
                                <td><?php echo $row['Facilities']; ?></td> 
                                <td><?php echo $row['status']; ?></td> 
                                
                                <td><?php echo $row['admin_id']; ?></td>
                                <td id='action_column'><a href="admin_edit.php?theatre_id=<?php echo $row['theatre_id']; ?>"><button  type='button' align='center' class='edit_button'><i class='fa fa-edit'></i></button></a><a href="admin_delete.php?theatre_id=<?php echo $row['theatre_id']; ?>"><button  type='button' class='delete_button'><i class='fa fa-trash'></i></button></a></td>
                            </tr>
                           <?php }?>
                            
                        </tbody>
                        <tfoot class="grey lighten-1">
                            <tr>
                            <th id="row_num_column"></th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">City</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Phone_number</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Facilities</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">AdminID</th>
                                 
                                
                                <th id="action_column">ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- Editable table -->

        
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLongTitle">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="add_form">
                       
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="submit" name="add" value="save" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
        

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLongTitle">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="update_form">
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input1:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input2:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input3:</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input4:</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control">
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
        

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
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
  <footer class="page-footer text-center font-small grey darken-4 mt-4 fixed-bottom">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      <font color="white">© 2019 InstaMovies. All Rights Reserved. Site by <font color="yellow">GenetriX.</font></font>
    </div>
    <!--/.Copyright-->

  </footer>
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
        $('#table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<script>
    $(document).ready(function () {
        //Open Update Modal
        $(document).on("click",".edit_button",function(){
            $('#updateModal').modal('show');
        });
        
        //Open Delete Modal
        $(document).on("click",".delete_button",function(){
            var del = $(this);
            var id = $(this).attr("showID");
            showID_delete = id;

            $('#deleteModal').modal('show');

        });
    });
</script>


<script type="text/javascript">
     function validateFileType(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
    function checkDate(){
        var d1=document.getElementById("date1").value;
        var d2=document.getElementById("date2").value;
        if (d2>=d1){

        }
        else{
            alert("date2 is not allowed to be smaller than date1");}
        }

    }
</script>

</body>

</html>
=======
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>InstaMovies - Admin | Dashboard</title>
  <?php include ("assets/admin_add.inc.php");?>
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
        margin: 25px 0;
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
    #row_num_column {
        text-align: center;
        width: 40px;
    }
    #id_column {
        width: 45px;
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
    .edit_button:focus {
        background-color: #267ac8;
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
    .delete_button:focus {
        background-color: #c70000;
        outline: none;
    }
    .add_new_show {
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
    #deleteModal .modal-content{
        border-radius: 10px !important;
    }
    #deleteModal .modal-dialog {
        width: 380px;
    }
    #deleteModal .modal-header {
        background: red;
        text-align: center;
        color:#FFF;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        user-select: none;
    }
    #deleteModal .modal-body {
        padding-top: 15px;
        padding-bottom: 15px;
        user-select: none;
    }
    #addModal .modal-header{
        user-select: none;
    }
    #updateModal .modal-header{
        user-select: none;
    }
    #addModal .modal-header .close{
        outline: none;
    }
    #updateModal .modal-header .close{
        outline: none;
    }

  </style>
</head>

<body class="grey lighten-4">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark grey darken-4 scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <div class="navbar-brand">
            <img src="images/admin.png" width="42px" height="42px" class="img-fluid z-depth-1 rounded-circle">
            <strong class="white-text">Admin</strong>
        </div>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
              <!--Left Links-->
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link logout-button">
                Logout
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <div class="logo-wrapper-custom">
        <img src="images/logo.png" width="30px" height="30px" class="img-fluid" alt="InstaMovies Private Limited"> InstaMovies
      </div>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard</a>
        <a href="profile.php" class="list-group-item">
            <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="movies.php" class="list-group-item active">
            <i class="fas fa-film mr-3"></i>Movies</a>
        <a href="theaters.php" class="list-group-item">
            <i class="fas fa-building mr-3"></i>Theaters</a>
        <a href="seat_maps.php" class="list-group-item">
            <i class="fas fa-table mr-3"></i>Seat Maps</a>
        <a href="shows.php" class="list-group-item">
            <i class="fas fa-calendar-alt mr-3"></i>Shows</a>
        <a href="showtimes.php" class="list-group-item">
            <i class="fas fa-clock mr-3"></i>Showtimes</a>
        <a href="show_ticket_rates.php" class="list-group-item">
            <i class="fas fa-money-bill-alt mr-3"></i>Show Ticket Rates</a>
        <a href="carousel.php" class="list-group-item">
            <i class="fas fa-images mr-3"></i>Carousel</a>
        <a href="bookings.php" class="list-group-item">
            <i class="fas fa-ticket-alt mr-3"></i>Bookings</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->


  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Editable table -->
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Theatres</h3>
            <div class="card-body">
                <div class="add_new_show">
                    <a href="add.php"><button type="button" class="add_button" data-toggle="modal" data-target="#addModal">Add New Theatre</button></a>
                </div>
                <br>
                <div id="output" class="table-responsive">
                    <?php
                    // session_start();
                        function db_connect(){
                        $conn = mysqli_connect("localhost", "root", "", "instamovies");
                        if(!$conn){
                        echo "Can't connect database " . mysqli_connect_error($conn);
                        exit;
                        }
                        function getAll($conn){
                            $query = "SELECT * from tbl_theatres ORDER BY theatre_id DESC";
                            $result = mysqli_query($conn, $query);
                            if(!$result){
                                echo "Can't retrieve data " . mysqli_error($conn);
                                exit;
                            }
                            return $result;
                        }
                        return $conn;
                    }
                    $conn = db_connect();
                    $result = getAll($conn);
                    ?>
                    <table id="table" class="table table-striped table-bordered table-sm">
                        <thead class="grey lighten-1">
                            <tr>
                                <th id="row_num_column">#</th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">City</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Phone_number</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Facilities</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">AdminID</th>
                                <th class="th-sm">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $i = 0;
                                while($row = mysqli_fetch_assoc($result)){
                        $i+=1; ?>     
                                <td id='row_num_column'><?php echo $i;?></td>
                                <td id='id_column'><?php echo $row['theatre_id']; ?></td>
                                <td><?php echo $row['theatre_name']; ?></td>
                                
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['telephone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" style="height:30%;"/>'; ?></td>
                                
                                <td><?php echo $row['Facilities']; ?></td> 
                                <td><?php echo $row['status']; ?></td> 
                                
                                <td><?php echo $row['admin_id']; ?></td>
                                <td id='action_column'><a href="admin_edit.php?theatre_id=<?php echo $row['theatre_id']; ?>"><button  type='button' align='center' class='edit_button'><i class='fa fa-edit'></i></button></a><a href="admin_delete.php?theatre_id=<?php echo $row['theatre_id']; ?>"><button  type='button' class='delete_button'><i class='fa fa-trash'></i></button></a></td>
                            </tr>
                           <?php }?>
                            
                        </tbody>
                        <tfoot class="grey lighten-1">
                            <tr>
                            <th id="row_num_column"></th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">City</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Phone_number</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Description</th>
                                <th class="th-sm">Image</th>
                                <th class="th-sm">Facilities</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">AdminID</th>
                                 
                                
                                <th id="action_column">ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- Editable table -->

        
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLongTitle">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="add_form">
                       
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="submit" name="add" value="save" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>
        

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
        aria-hidden="true">
            <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLongTitle">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="update_form">
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input1:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input2:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input3:</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Input4:</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control">
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
        

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Confirm</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
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
  <footer class="page-footer text-center font-small grey darken-4 mt-4 fixed-bottom">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      <font color="white">© 2019 InstaMovies. All Rights Reserved. Site by <font color="yellow">GenetriX.</font></font>
    </div>
    <!--/.Copyright-->

  </footer>
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
        $('#table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>

<script>
    $(document).ready(function () {
        //Open Update Modal
        $(document).on("click",".edit_button",function(){
            $('#updateModal').modal('show');
        });
        
        //Open Delete Modal
        $(document).on("click",".delete_button",function(){
            var del = $(this);
            var id = $(this).attr("showID");
            showID_delete = id;

            $('#deleteModal').modal('show');

        });
    });
</script>


<script type="text/javascript">
     function validateFileType(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
    function checkDate(){
        var d1=document.getElementById("date1").value;
        var d2=document.getElementById("date2").value;
        if (d2>=d1){

        }
        else{
            alert("date2 is not allowed to be smaller than date1");}
        }

    }
</script>

</body>

</html>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
