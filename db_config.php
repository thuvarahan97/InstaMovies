<<<<<<< HEAD
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "instamovies";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

=======
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "instamovies";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
?>