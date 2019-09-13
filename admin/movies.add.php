<?php
session_start();
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
  <!--Main Navigation-->
  
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card">   
        <div class="content" style="max-width:700px;display:block;margin:auto;margin-top:45px;margin-bottom:25px;">
            <div class="content-header" align="center" style="margin-bottom:40px">
                <h2>Add New Movie</h2>
            </div>
            <form id="add_form" action="assets/movies.add.insert.php" method="post" enctype="multipart/form-data" onsubmit="return checkDate(this)">            
                <div class="content-body">
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type='text' class="form-control" type="text" name="movie_name"   title="Three or more letter" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Year</label>
                        <div class="col-sm-9">
                            <input type='number' class="form-control"  name="year" value="<?php echo date('Y')?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input  class="form-control" type="text" name="category" title="Three or more letter" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Language</label>
                        <div class="col-sm-9">
                        <select class="form-control " name="language" id="language">
                            <option value="English" for="language">English</option>
                            <option value="Tamil" for="language">Tamil</option>
                            <option value="Sinhala" for="language">Sinhala</option>
                            <option value="Telugu" for="language">Telugu</option>
                            <option value="Malayalam" for="language">Malayalam</option>
                            <option value="Hindi" for="language">Hindi</option>
                        </select>
                    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Casts</label>
                        <div class="col-sm-9">
                            <input  class="form-control" type="text" name="casts"  title="include casts!" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Director</label>
                        <div class="col-sm-9">
                            <input  class="form-control" type="text" name="director" title="include director name! " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Release Date</label>
                        <div class="col-sm-9">
                            <input  class="form-control" type="date" name="release_date" title="include release_date! " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Running Time</label>
                        <div class="col-sm-9">
                            <div class="row" style="margin-left:0; margin-right:0">
                                <input  style="width:30%" class="form-control" type="number" name="running_time_hours" title="include running time hours!" min="0" max="10" value="0" required>
                                <label  style="width:5%; text-align:center; margin:auto">:</label>
                                <input  style="width:30%" class="form-control" type="number" name="running_time_minutes" title="include running time minutes!" min="0" max="60" value="0" required>
                                <label  style="width:5%; text-align:center; margin:auto">:</label>
                                <input  style="width:30%"  class="form-control" type="number" name="running_time_seconds" title="include running time seconds!" min="0" max="60" value="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Synopsis</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" rows="7" name="synopsis" title="include synopsis! " required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Trailer URL</label>
                        <div class="col-sm-9">
                            <input  class="form-control" type="text" name="trailer_url" title="include trailerurl! " required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Poster</label>
                        <div class="col-sm-9">
                            <input name="poster" type="file" id="image" accept=".jpg,.jpeg,.png" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Banner</label>
                        <div class="col-sm-9">
                            <input name="banner" type="file" id="" accept=".jpg,.jpeg,.png" required/>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Wallpaper</label>
                        <div class="col-sm-9">
                            <input name="wallpaper" type="file" id="" accept=".jpg,.jpeg,.png" required/>                        
                        </div>
                    </div>     -->
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control " name="status" required>
                                <option value="0" for="status">0</option>
                                <option value="1" for="status">1</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Starting Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="starting_date" title="include release_date! " min=<?php echo date('Y-m-d'); ?> required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="label" class="col-sm-3 col-form-label">Ending Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="ending_date" title="include release_date! " min=<?php echo date('Y-m-d'); ?> required>
                        </div>
                    </div>
                </div>
                <hr style="margin:30px 0 20px">
                <div class="content-footer" align="center">
                    <input type="submit" name="add" value="add" class="btn btn-primary">
                    <a onclick="location.href='movies.php'" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>
  

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


<script type="text/javascript">
    function checkDate(form){
        d1=form.starting_date.value;
        d2=form.ending_date.value;
        if (d2>=d1){
            return true;
        }
        else{
            alert("Ending Date must be greater than Starting Date!");
            return false;
        }
    }
</script>

<script>
    $(".sidebar-fixed .list-group .list-group-item.item-1").addClass("active");
</script>

</body>
</html>