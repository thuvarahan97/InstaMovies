<?php
session_start();
include_once ('db_config.php');

$query = "SELECT * from tbl_theatres WHERE admin_id = '{$_SESSION['admin_id']}' ORDER BY theatre_id DESC";
$result = mysqli_query($db, $query);

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
        overflow-x: auto;
    }
    .card .table-responsive {
            overflow-x: auto;
        }
    @media only screen and (min-width: 800px)  {
        .card .table-responsive {
            overflow-x: auto;
        }
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
    .add_new_theater {
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Theaters</h3>
            <div class="card-body">
                <div class="add_new_theater">
                   <a href="theaters.add.php"><button type="button" class="add_button">Add New Theater</button></a>
                </div>
                <br>
                <div id="output" class="table-responsive" style="max-height:315px">
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
                                <th class="th-sm">User Ratings</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Admin ID</th>
                                <th class="th-sm">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                            $i+=1; ?>
                            <tr>
                                <td id='row_num_column'><?php echo $i;?></td>
                                <td id='id_column'><?php echo $row['theatre_id']; ?></td>
                                <td><?php echo $row['theatre_name']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['telephone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php
                                    echo strlen($row['description']) >= 110 ? 
                                    substr($row['description'], 0, 100).'...' : 
                                    $row['description'];
                                    ?>
                                </td>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" style="height:30%;"/>'; ?></td>
                                <td><?php echo $row['Facilities']; ?></td>
                                <td><?php echo $row['avg_ratings']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['admin_id']; ?></td>
                                <td id='action_column'><a href="assets/theaters.delete.php?theatre_id=<?php echo $row['theatre_id']; ?>"><button  type='button' class='delete_button'><i class='fa fa-trash'></i></button></a></td>
                            </tr>
                           <?php }} ?>
                            
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
                                <th class="th-sm">User Ratings</th>
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
   
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-2").addClass("active");
</script>

</body>

</html>
