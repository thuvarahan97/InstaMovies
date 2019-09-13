<table>
<tr>
		<th>Movie</th>
		<th>Date</th>
		<th>Theatre</th>
		
		 
	</tr>
<?php
if(isset($_POST['action']) && ($_POST['action']!='')){

    $action = $_POST['action'];
    switch($action){
        case "submitForm" :
            $db = new mysqli('localhost', 'root', '', 'instamovies');
            if ( (isset($_POST['fname'])) && (isset($_POST['lname'])) ){
                $fn = mysqli_real_escape_string($db,$_POST['fname']);
                $ln = mysqli_real_escape_string($db,$_POST['lname']);
                $query_details = "SELECT * FROM tbl_shows WHERE movie_id='$fn' AND theatre_id='$ln'";
                $result=mysqli_query($db,$query_details);
                
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        echo"<tr><td>".$row["movie_name"]."</td><td>".$row["starting_date"]."</td><td>".$row["theatre_name"]."</td></tr>";
                    }
                    echo"</table>";
                }
                else{
                    echo"No result";
                }
            }
        break;
    }

}
?>

</table>