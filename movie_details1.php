<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
     
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!-- Custom Style CSS -->
		<link href="css/sidebar.css" type="text/css" rel="stylesheet">
      
    
		<title>Admin - InstaMovies</title>
 
    </head>
	 <body>
	
	
	<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="images/admin.png" width="100" height="100"> </div>
	  <div class="sidebar-heading">Admin </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Dashboard</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Shows</font></a>
        <a href="#" class="list-group-item list-group-item-action active bg-dark"><font color="white">Add Movies</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Theatres</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">User Management</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Ticket Management</font></a>
      </div>
	  
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <form class="form-inline ml-auto">
				<button class="btn btn-primary" type="button">LOGOUT</button>
			</form>
      </nav>
         
        <style>
    table,th,td{
    border:1px solid black;
    }
    th,td{
            padding: 15px;

    }
    table{
        border-spacing: 5px;
    }

</style>
	
		
           
         	<div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <div class="col-md-8">
                            <?php include('assets/movie_detail1.inc.php');?>
                            <div class="col-md-8">
                             
                            
                            <hr class="margin-bottom-40">
                           </div>
                       
                        </div>
                    </div>
                </div>
	                        

                            
						
            </div>
            
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  </body>
</html>
             
=======
<!DOCTYPE html>
<html lang="en">
     
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!-- Custom Style CSS -->
		<link href="css/sidebar.css" type="text/css" rel="stylesheet">
      
    
		<title>Admin - InstaMovies</title>
 
    </head>
	 <body>
	
	
	<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="images/admin.png" width="100" height="100"> </div>
	  <div class="sidebar-heading">Admin </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Dashboard</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Shows</font></a>
        <a href="#" class="list-group-item list-group-item-action active bg-dark"><font color="white">Add Movies</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Theatres</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">User Management</font></a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Ticket Management</font></a>
      </div>
	  
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <form class="form-inline ml-auto">
				<button class="btn btn-primary" type="button">LOGOUT</button>
			</form>
      </nav>
         
        <style>
    table,th,td{
    border:1px solid black;
    }
    th,td{
            padding: 15px;

    }
    table{
        border-spacing: 5px;
    }

</style>
	
		
           
         	<div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <div class="col-md-8">
                            <?php include('assets/movie_detail1.inc.php');?>
                            <div class="col-md-8">
                             
                            
                            <hr class="margin-bottom-40">
                           </div>
                       
                        </div>
                    </div>
                </div>
	                        

                            
						
            </div>
            
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  </body>
</html>
             
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
