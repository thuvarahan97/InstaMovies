<<<<<<< HEAD
<table>
	<tr>
		<th>Movie</th>
		<th>Theatre</th>
		<th>Date</th>
		<th>ShowTime</th>
		<th>VIP</th>
		<th>Gold</th>
		<th>Balcony</th>
		<th>ODC</th>
		 
	</tr>
	
	<?php
                           
                                $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                                $query="SELECT movie,theatre,date,showtime,vip,gold,balcony,odc FROM shows";
                                $result=mysqli_query($db,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result)){
										
										
										echo"<tr><td>".$row["movie"]."</td><td>".$row["theatre"]."</td><td>".$row["date"]."</td><td>".$row["showtime"]."</td><td>".$row["vip"]."</td><td>".$row["gold"]."</td><td>".$row["balcony"]."</td><td>".$row["odc"]."</td></tr>";
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
		<th>Movie</th>
		<th>Theatre</th>
		<th>Date</th>
		<th>ShowTime</th>
		<th>VIP</th>
		<th>Gold</th>
		<th>Balcony</th>
		<th>ODC</th>
		 
	</tr>
	
	<?php
                           
                                $db = mysqli_connect('localhost', 'root', '', 'instamovies');
                                $query="SELECT movie,theatre,date,showtime,vip,gold,balcony,odc FROM shows";
                                $result=mysqli_query($db,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result)){
										
										
										echo"<tr><td>".$row["movie"]."</td><td>".$row["theatre"]."</td><td>".$row["date"]."</td><td>".$row["showtime"]."</td><td>".$row["vip"]."</td><td>".$row["gold"]."</td><td>".$row["balcony"]."</td><td>".$row["odc"]."</td></tr>";
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