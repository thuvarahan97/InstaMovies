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
  <title>InstaMovies - Admin | Payments</title>
  
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
            <h3 class="card-header text-center font-weight-bold text-uppercase py-3">Payments</h3>
            <div class="card-body">
                
                <br>
                <div id="output" class="table-responsive">
                    <table id="table" class="table table-striped table-bordered table-sm">
                        <thead class="grey lighten-1" style="text-align:center">
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Ticket ID</th>
                                <th>Transaction Time</th>
                                <th>Transaction Process</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Payment Type</th>
                                <th>Sub Total</th>
                                <th>Service Tax</th>
                                <th>Paid Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $sql = "SELECT A.* FROM tbl_payments A, tbl_bookings B, tbl_shows C, tbl_theatres D WHERE A.ticket_id = B.ticket_id AND B.show_id = C.show_id AND C.theatre_id = D.theatre_id AND D.admin_id = '{$_SESSION['admin_id']}' ORDER BY payment_id DESC";
                                $result = $db->query($sql);
                                if($result->num_rows>0){
                                    $i=0;
                                    while($row=$result->fetch_assoc()){
                                        $i++;
                                        echo "<tr style='text-align:center;'>";
                                            echo "<td style='vertical-align:middle'>{$i}</td>";
                                            echo "<td style='vertical-align:middle'>";
                                            if($row['user_id']==0){
                                                echo "None";
                                            }else{
                                                echo $row['user_id'];
                                            }
                                            echo "</td>";
                                            echo "<td style='vertical-align:middle'>".$row['ticket_id']."</td>";
                                            echo "<td style='vertical-align:middle'>";
                                                if($row['timestamp'] != '0000-00-00 00:00:00'){
                                                    echo $row['timestamp'];
                                                }
                                            echo "</td>";
                                            echo "<td style='vertical-align:middle'>".$row['process']."</td>";
                                            echo "<td style='vertical-align:middle'>".$row['customer_name']."</td>";
                                            echo "<td style='vertical-align:middle'>"."0".$row['customer_phone']."</td>";
                                            echo "<td style='vertical-align:middle'>".$row['customer_email']."</td>";
                                            echo "<td style='vertical-align:middle'>";
                                            if($row['paid_amount']==0){
                                                echo "FREE";
                                            }else{
                                                echo $row['payment_type'];
                                            }
                                            echo "</td>";
                                            echo "<td style='vertical-align:middle'>Rs. ".number_format((float)$row['sub_total'], 2, '.', '')."</td>";
                                            echo "<td style='vertical-align:middle'>Rs. ".number_format((float)$row['service_tax'], 2, '.', '')."</td>";
                                            echo "<td style='vertical-align:middle'>Rs. ".number_format((float)$row['paid_amount'], 2, '.', '')."</td>";
                                        echo "</tr>";
                                    }
                                }else{
                                    echo "<tr><td colspan='12' style='padding-left:7px'>No payments available.</td></tr>";
                                }
                            ?>
                        </tbody>

                        <tfoot class="grey lighten-1" style="text-align:center">
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Ticket ID</th>
                                <th>Transaction Time</th>
                                <th>Transaction Process</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Payment Type</th>
                                <th>Sub Total</th>
                                <th>Service Tax</th>
                                <th>Paid Amount</th>
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

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-11").addClass("active");
</script>

</body>

</html>
