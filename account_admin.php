<<<<<<< HEAD
<HTML>

<HEAD>

<TITLE> Welcome to InstaMovies </TITLE>

</HEAD>

<BODY BGCOLOR="FFFFFF">


<HR>
<?php 
session_start();
echo $_SESSION['success'];
echo '<br>';
echo "You logged in as ",$_SESSION['email'];
echo '<br>';


?>



<HR>
<h4>Logout</h4>
<p>
<a href="logout_admin.php">Logout</a> </p>


</BODY>


=======
<HTML>

<HEAD>

<TITLE> Welcome to InstaMovies </TITLE>

</HEAD>

<BODY BGCOLOR="FFFFFF">


<HR>
<?php 
session_start();
echo $_SESSION['success'];
echo '<br>';
echo "You logged in as ",$_SESSION['email'];
echo '<br>';


?>



<HR>
<h4>Logout</h4>
<p>
<a href="logout_admin.php">Logout</a> </p>


</BODY>


>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</HTML>