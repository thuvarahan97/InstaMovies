<?php
    session_start();
    include_once ('db_config.php');

    if(!isset($_SESSION['admin_id'])) {
        header('location: index.php');
    }
    
    
    if(isset($_POST['add'])){
        $theatre_name = trim($_POST['theatre_name']);
        $theatre_name = mysqli_real_escape_string($db, $theatre_name);
        
        $city = trim($_POST['city']);
        $city = mysqli_real_escape_string($db, $city);

        $address = trim($_POST['address']);
        $address = mysqli_real_escape_string($db, $address);

        $telephone = trim($_POST['telephone']);
        $telephone= mysqli_real_escape_string($db, $telephone);
        
        $email = trim($_POST['email']);
        $email = mysqli_real_escape_string($db, $email);

        $description = trim($_POST['description']);
        $description = mysqli_real_escape_string($db, $description);
        
        $image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        
        $Facilities = trim($_POST['Facilities']);
        $Facilities = mysqli_real_escape_string($db, $Facilities);
        
        $status = trim($_POST['status']);
        $status = mysqli_real_escape_string($db, $status);
        /* $admin_id = trim($_POST['admin_id']);
        $admin_id = mysqli_real_escape_string($db, $admin_id); */
        
        $admin_id = $_SESSION['admin_id'];

        // add image
        //$query="INSERT INTO tbl_theatres (theatre_name,city,address,telephone,email,description,image,Facilities,status,admin_id) VALUES('$theatre_name','$city','$address','$telephone','$email','$description','$image','$Facilities','$status','$admin_id')";
        //$res=mysqli_query($db,$query);

        $que="SELECT * from tbl_theatres where admin_id='$admin_id'";
        $res=mysqli_query($db,$que);
        if(mysqli_num_rows($res)==0){
            $query="INSERT INTO tbl_theatres (theatre_name,city,address,telephone,email,description,image,Facilities,status,admin_id) VALUES('$theatre_name','$city','$address','$telephone','$email','$description','$image','$Facilities','$status','$admin_id')";
            if(mysqli_query($db,$query)){
             echo '<script>alert("inserted")</script>';
             header("location: theaters.php");
            } 
        }else{
            $que="DELETE FROM tbl_theatres where admin_id='$admin_id'";
            $res=mysqli_query($db,$que);

            $query="INSERT INTO tbl_theatres (theatre_name,city,address,telephone,email,description,image,Facilities,status,admin_id) VALUES('$theatre_name','$city','$address','$telephone','$email','$description','$image','$Facilities','$status','$admin_id')";
            if(mysqli_query($db,$query)){
                echo '<script>alert("updated")</script>';
                header("location: theaters.php");
            } 
        }
    }
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
                <h2>Add New Theater</h2>
            </div>
            <form id="add_form" method="post" enctype="multipart/form-data">
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
                        <input type='textbox' class="form-control" type="text" name="description" title="include description" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label" class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-9">
                        <input name="image" type="file" id="image" accept=".jpg,.jpeg,.png" required/>
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
                <hr style="margin:30px 0 20px">
                <div class="content-footer" align="center">
                    <input type="submit" name="add" value="add" class="btn btn-primary">
                    <button onclick="location.href='theaters.php'" class="btn btn-secondary">Cancel</button>
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
    $(".sidebar-fixed .list-group .list-group-item.item-2").addClass("active");
</script>

</body>
</html>