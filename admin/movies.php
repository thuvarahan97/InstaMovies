<?php
session_start();
include_once ('db_config.php');

$query = "SELECT * from tbl_movies ORDER BY movie_id DESC";
$result = mysqli_query($db, $query);

if(!isset($_SESSION['admin_id'])) {
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
    .add_new_movie {
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Movies</h3>
            <div class="card-body">
                <?php if($_SESSION['admin_id']=='1'){ ?>
                <div class="add_new_movie">
                   <a href="movies.add.php"><button type="button" class="add_button">Add New Movie</button></a>
                </div>
                <?php } ?>

                <br>
                <div id="output" class="table-responsive" style="max-height:315px">
                    <table id="table" class="table table-striped table-bordered table-sm">
                        <thead class="grey lighten-1">
                            <tr>
                                <th id="row_num_column">#</th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Year</th>
                                <th class="th-sm">Category</th>
                                <th class="th-sm">Language</th>
                                <th class="th-sm">Casts</th>
                                <th class="th-sm">Director</th>
                                <th class="th-sm">Release Date</th>
                                <th class="th-sm">Running Time</th>
                                <th class="th-sm">Synopsis</th>
                                <th class="th-sm">Trailer URL</th>
                                <th class="th-sm">Poster</th>
                                <th class="th-sm">Banner</th>
                                <th class="th-sm">Wallpaper</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">User Ratings</th>
                                <th class="th-sm">Starting Date</th>
                                <th class="th-sm">Ending Date</th>
                                <?php if($_SESSION['admin_id']=='1'){ ?><th class="th-sm">ACTION</th><?php } ?>
                                 
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
                                <td id='row_num_column'><?php echo $row['movie_id']; ?></td>
                                <td><?php echo $row['movie_name']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['language']; ?></td>
                                <td><?php echo $row['casts']; ?></td>
                                <td><?php echo $row['director']; ?></td>
                                <td><?php echo $row['release_date']; ?></td>
                                <td><?php echo $row['running_time']; ?></td>
                                <td ><?php
                                    echo strlen($row['synopsis']) >= 110 ? 
                                    substr($row['synopsis'], 0, 100).'...' : 
                                    $row['synopsis'];
                                    ?>
                                </td>
                                <td><?php echo $row['trailer_url']; ?></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['poster']).'" style="height:30%;"/>'; ?></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['banner']).'" style="height:30%;"/>'; ?></td>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['wallpaper']).'" style="height:25%;"/>'; ?></td>
                                <td><?php
                                    if ($row['status']=="0"){
                                        echo "Inactive";
                                    }else{
                                        echo "Active";
                                    }
                                ?></td>
                                <td><?php echo $row['avg_ratings']; ?></td>
                                <td><?php echo $row['starting_date']; ?></td>
                                <td><?php echo $row['ending_date']; ?></td>
                                <?php if($_SESSION['admin_id']=='1'){ ?>
                                <td id='action_column'><a href="movies.edit.php?movie_id=<?php echo $row['movie_id']; ?>"><button  type='button' align='center' class='edit_button'><i class='fa fa-edit'></i></button></a><a href="assets/movies.delete.php?movie_id=<?php echo $row['movie_id']; ?>"><button  type='button' class='delete_button'><i class='fa fa-trash'></i></button></a></td>
                                <?php } ?>
                            </tr>
                           <?php }} ?>
                        </tbody>

                        <tfoot class="grey lighten-1">
                            <tr>
                                <th id="row_num_column">#</th>
                                <th id="id_column">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Year</th>
                                <th class="th-sm">Category</th>
                                <th class="th-sm">Language</th>
                                <th class="th-sm">Casts</th>
                                <th class="th-sm">Director</th>
                                <th class="th-sm">Release Date</th>
                                <th class="th-sm">Running Time</th>
                                <th class="th-sm">Synopsis</th>
                                <th class="th-sm">Trailer URL</th>
                                <th class="th-sm">Poster</th>
                                <th class="th-sm">Banner</th>
                                <th class="th-sm">Wallpaper</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">User Ratings</th>
                                <th class="th-sm">Starting Date</th>
                                <th class="th-sm">Ending Date</th>
                                <?php if($_SESSION['admin_id']=='1'){ ?><th id="action_column">ACTION</th><?php } ?>
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
    $(".sidebar-fixed .list-group .list-group-item.item-1").addClass("active");
</script>

</body>
</html>