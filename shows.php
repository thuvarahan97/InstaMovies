<<<<<<< HEAD
<?php include 'assets/show.inc.php';?>

<!doctype html>
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
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Movies</font></a>
        // <a href="shows.php" class="list-group-item list-group-item-action active bg-dark"><font color="white">Add Shows</font></a>
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

      <div class="container-fluid">
        <h2 class="mt-4">Add Show <br><br></h2>
	
      
	  <form action="assets/show.inc.php" method="POST">
	   <table>
		
		<tr>
		 <td>Movie:<font color="red"> *<font></td>
		  
		 <td>
		 <select class="form-control" name="movie" required>
            <?php echo $options;?>
         </select>
		 </td>
		 
		</tr>
		<tr>
		 <td>Theatre:<font color="red"> *<font></td>
		 <td>
		 <select class="form-control" name="theatre" required>
            <?php echo $options2;?>
         </select></td>
		</tr>
		<tr>
		 <td>Date:<font color="red"> *<font></td>
		 <td><input class="form-control" type="Date" name="date" required></td>
		</tr>
		<tr>
		 <td>Show Time:<font color="red"> *<font></td>
		 <td> 
		  <select class="form-control" name="showtime" required>
			<option value="09:00" for="showtime">9:00 AM</option>
			<option value="10:30" for="showtime">10.30 AM</option>
			<option value="13:00" for="showtime">1:00 PM</option>
			<option value="16:15" for="showtime">4:15 PM</option>
			<option value="19:00" for="showtime">7:00 PM</option>
			<option value="21:30" for="showtime">9:30 PM</option>
		  </select>
		
		 </td>
		</tr>
		<tr>
		 <td><h5><br>Class Rates</h5></td>
		</tr>
		<tr>
		 <td>VIP:</td>
		 <td><input class="form-control" type="text" name="vip"></td>
		</tr>
		<tr>
		 <td>Gold:</td>
		 <td><input class="form-control" type="text" name="gold"></td>
		</tr>
		<tr>
		 <td>Balcony:</td>
		 <td><input class="form-control" type="text" name="balcony"></td>
		</tr>
		<tr>
		  <td>ODC:<font color="red"> *<font></td>
		  <td><input class="form-control" type="text" name="odc" required></td>
		</tr>
		<tr>
		 <td><br><input class="btn btn-danger" role="button" type="Submit" name="add" value="Add"></td> 
		</tr>
	   </table>
		</form>
		<table>
			<?php include('assets/show.inc.php');?>
</table>
    </div>
    <!-- /#page-content-wrapper -->

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
=======
<?php include 'assets/show.inc.php';?>

<!doctype html>
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
        <a href="#" class="list-group-item list-group-item-action bg-dark"><font color="white">Add Movies</font></a>
        // <a href="shows.php" class="list-group-item list-group-item-action active bg-dark"><font color="white">Add Shows</font></a>
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

      <div class="container-fluid">
        <h2 class="mt-4">Add Show <br><br></h2>
	
      
	  <form action="assets/show.inc.php" method="POST">
	   <table>
		
		<tr>
		 <td>Movie:<font color="red"> *<font></td>
		  
		 <td>
		 <select class="form-control" name="movie" required>
            <?php echo $options;?>
         </select>
		 </td>
		 
		</tr>
		<tr>
		 <td>Theatre:<font color="red"> *<font></td>
		 <td>
		 <select class="form-control" name="theatre" required>
            <?php echo $options2;?>
         </select></td>
		</tr>
		<tr>
		 <td>Date:<font color="red"> *<font></td>
		 <td><input class="form-control" type="Date" name="date" required></td>
		</tr>
		<tr>
		 <td>Show Time:<font color="red"> *<font></td>
		 <td> 
		  <select class="form-control" name="showtime" required>
			<option value="09:00" for="showtime">9:00 AM</option>
			<option value="10:30" for="showtime">10.30 AM</option>
			<option value="13:00" for="showtime">1:00 PM</option>
			<option value="16:15" for="showtime">4:15 PM</option>
			<option value="19:00" for="showtime">7:00 PM</option>
			<option value="21:30" for="showtime">9:30 PM</option>
		  </select>
		
		 </td>
		</tr>
		<tr>
		 <td><h5><br>Class Rates</h5></td>
		</tr>
		<tr>
		 <td>VIP:</td>
		 <td><input class="form-control" type="text" name="vip"></td>
		</tr>
		<tr>
		 <td>Gold:</td>
		 <td><input class="form-control" type="text" name="gold"></td>
		</tr>
		<tr>
		 <td>Balcony:</td>
		 <td><input class="form-control" type="text" name="balcony"></td>
		</tr>
		<tr>
		  <td>ODC:<font color="red"> *<font></td>
		  <td><input class="form-control" type="text" name="odc" required></td>
		</tr>
		<tr>
		 <td><br><input class="btn btn-danger" role="button" type="Submit" name="add" value="Add"></td> 
		</tr>
	   </table>
		</form>
		<table>
			<?php include('assets/show.inc.php');?>
</table>
    </div>
    <!-- /#page-content-wrapper -->

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
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>