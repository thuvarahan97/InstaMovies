<<<<<<< HEAD
<!doctype html>
 
  <html lang="en">
  <head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>InstaMovies - Admin | Dashboard</title>
  <!--Favicon-->
  <?php
		session_start();
		$theatre_id = $_GET['theatre_id'];
    $db = mysqli_connect('localhost', 'root', '', 'instamovies');
    
		$query="SELECT * From tbl_theatres Where theatre_id=$theatre_id";
		$result=mysqli_query($db,$query);
		if (!$result){
			echo"can't retrieve data";
			exit;
		}
		$row=mysqli_fetch_assoc($result);
		 
		

		
       
?>
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
    
  </style>
     
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
  <main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">   
     
   <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-body">
     
                    <form id="add_form" method="post" action="edit_book.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="theatre_name"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="city"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="address"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Telephone</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control"type="text" name="telephone"  pattern="[0-9]{10}" title="only 10 digit number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="email"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.xxx" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type='textbox' class="form-control" type="text" name="description" title="include description " required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                            <input name="image" type="file" id="image" accept=".jpg,.jpeg,.png" required onchange="validateFileType(this)"/>
                                <img id="blah" src="#" alt="your image" />
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Facilities</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="Facilities" title="include the facilities available" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="form-control " name="status" required>
                                  <option value="0" for="status">0</option>
                                  <option value="1" for="status">1</option>
                                   
                             </select>   
                            </div>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" name="save_change" value="change" class="btn btn-primary" >
                        <input type="reset"  name="cancel"value="cancel" class="btn btn-secondary">
                    </div>     
                    </form>
                </div> 
            </div>
         </div>
         </main>        
         
        <!-- <input type="submit" name="add" value="add" class="btn btn-primary"  >
        <input type="reset"  name="cancel"value="cancel" class="btn btn-primary">
    

 -->
  
 <footer class="page-footer text-center font-small grey darken-4 mt-4 fixed-bottom">

 
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
<!doctype html>
 
  <html lang="en">
  <head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>InstaMovies - Admin | Dashboard</title>
  <!--Favicon-->
  <?php
		session_start();
		$theatre_id = $_GET['theatre_id'];
    $db = mysqli_connect('localhost', 'root', '', 'instamovies');
    
		$query="SELECT * From tbl_theatres Where theatre_id=$theatre_id";
		$result=mysqli_query($db,$query);
		if (!$result){
			echo"can't retrieve data";
			exit;
		}
		$row=mysqli_fetch_assoc($result);
		 
		

		
       
?>
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
    
  </style>
     
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
  <main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">   
     
   <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-body">
     
                    <form id="add_form" method="post" action="edit_book.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="theatre_name"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="city"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="address"   title="Three or more letter" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Telephone</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control"type="text" name="telephone"  pattern="[0-9]{10}" title="only 10 digit number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="email"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.xxx" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type='textbox' class="form-control" type="text" name="description" title="include description " required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                            <input name="image" type="file" id="image" accept=".jpg,.jpeg,.png" required onchange="validateFileType(this)"/>
                                <img id="blah" src="#" alt="your image" />
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Facilities</label>
                            <div class="col-sm-9">
                                <input type='text' class="form-control" type="text" name="Facilities" title="include the facilities available" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="label" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="form-control " name="status" required>
                                  <option value="0" for="status">0</option>
                                  <option value="1" for="status">1</option>
                                   
                             </select>   
                            </div>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" name="save_change" value="change" class="btn btn-primary" >
                        <input type="reset"  name="cancel"value="cancel" class="btn btn-secondary">
                    </div>     
                    </form>
                </div> 
            </div>
         </div>
         </main>        
         
        <!-- <input type="submit" name="add" value="add" class="btn btn-primary"  >
        <input type="reset"  name="cancel"value="cancel" class="btn btn-primary">
    

 -->
  
 <footer class="page-footer text-center font-small grey darken-4 mt-4 fixed-bottom">

 
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
