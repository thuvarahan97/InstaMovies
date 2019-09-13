<<<<<<< HEAD
<table>
	<tr>
		<th>Movie_id</th>
		<th>Name</th>
		<th>Director</th>
		<th>Type</th>
		<th>Releasing_date</th>
		<th>Premire_date</th>
		 
		 
		 
	</tr>
	
	<?php
                           
                                $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                                $query="SELECT Movie_id,Name,Director,Type,Releasing_date,Premire_date from details";
                                $result=mysqli_query($db,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result)){
										
										
										echo"<tr><td>".$row["Movie_id"]."</td><td>".$row["Name"]."</td><td>".$row["Director"]."</td><td>".$row["Type"]."</td><td>".$row["Releasing_date"]."</td><td>".$row["Premire_date"]."</td></tr>";
									}
									echo"</table>";
								}
								else{
									echo"0 result";
								}
								
    ?>
</table>										 
</body>
=======
<table>
	<tr>
		<th>Movie_id</th>
		<th>Name</th>
		<th>Director</th>
		<th>Type</th>
		<th>Releasing_date</th>
		<th>Premire_date</th>
		 
		 
		 
	</tr>
	
	<?php
                           
                                $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                                $query="SELECT Movie_id,Name,Director,Type,Releasing_date,Premire_date from details";
                                $result=mysqli_query($db,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result)){
										
										
										echo"<tr><td>".$row["Movie_id"]."</td><td>".$row["Name"]."</td><td>".$row["Director"]."</td><td>".$row["Type"]."</td><td>".$row["Releasing_date"]."</td><td>".$row["Premire_date"]."</td></tr>";
									}
									echo"</table>";
								}
								else{
									echo"0 result";
								}
								
    ?>
</table>										 
</body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>	