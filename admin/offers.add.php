<?php
session_start();
include ("assets/offers.add.insert.php");
?>
 
<!doctype html>
 
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
    @media (min-width: 767px) {
        .content{
            min-width:700px!important;
        }
    }
    @media (max-width: 767px) {
        .content{
            min-width:400px!important;
        }
    }
  </style>
     

</head>
<body class="grey lighten-4">

  <!--Main Navigation-->
  <?php include ('header.php'); ?>
  
  
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card">   
        <div class="content" style="max-width:700px;display:block;margin:auto;margin-top:45px;margin-bottom:25px;">
            <div class="content-header" align="center" style="margin-bottom:40px">
                <h2>Add New Offer</h2>
            </div>
            <form id="add_form" method="post" enctype="multipart/form-data">
                <div class="content-body">
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Name of the offer</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="start_date" id="start_date" required min=<?php echo date('Y-m-d'); ?> >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">End Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="end_date" id="end_date" required min=<?php echo date('Y-m-d'); ?> >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="7" name="description" id="description" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input name="image" type="file" id="image" accept=".jpg,.jpeg,.png" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Banner</label>
                        <div class="col-sm-9">
                            <input name="banner" type="file" id="image" accept=".jpg,.jpeg,.png" required/>
                        </div>
                    </div>
                </div>
                <hr style="margin:30px 0 20px">
                <div class="content-footer" align="center">
                    <input type="submit" name="add" value="add" class="btn btn-primary">
                    <button onclick="location.href='offers.php'" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>



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
    function checkdate(form){
        date1=form.start_date.value;
        date2=form.end_date.value;
        if (date1>= date2){
            alert("Ending Date must be greater than Starting Date!") 
            return false;
        }else{ 
            return true;
        }
    }
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-8").addClass("active");
</script>

</body>
</html>