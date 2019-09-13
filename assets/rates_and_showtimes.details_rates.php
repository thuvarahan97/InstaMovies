<table>

<?php
include_once ('../db_config.php');
if(isset($_POST['action']) && ($_POST['action']!='')){

    $action = $_POST['action'];
    switch($action){
        case "submitForm" :
            if ( (isset($_POST['movie_id'])) && (isset($_POST['selected_date'])) && (isset($_POST['theatre_id'])) ){
                $movie_ID = mysqli_real_escape_string($db,$_POST['movie_id']);
                $selected_Date = mysqli_real_escape_string($db,date($_POST['selected_date']));
                $theatre_ID = mysqli_real_escape_string($db,$_POST['theatre_id']);
                $query_details = "SELECT * FROM tbl_shows WHERE movie_id='$movie_ID' AND starting_date<='$selected_Date' AND ending_date>='$selected_Date' AND theatre_id='$theatre_ID'";
                $result=mysqli_query($db,$query_details);
                $showID='';

                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        $showID = $row["show_id"];
                    }
                }
                else{
                    echo"Not available";
                }



                $query_details_rates = "SELECT A.*, B.category_name FROM tbl_show_ticket_rates A, tbl_theater_seat_categories B WHERE show_id='$showID' AND A.ticket_category_id = B.seat_category_id ORDER By B.seat_category_id";
                $result_rates=mysqli_query($db,$query_details_rates);

                if(mysqli_num_rows($result_rates)>0){
                    echo "<tr>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Ticket Price</th> 
                        </tr>";

                    while($row=mysqli_fetch_array($result_rates)){
                        $showID = $row["show_id"];
                        echo"<tr><td>".$row["category_name"]."</td><td>".$row["ticket_type"]."</td><td>Rs. ".number_format((float)$row["ticket_price"], 2, '.', '')."</td></tr>";
                    }
                    echo"</table>";
                }
            }
        break;
    }

}
?>

</table>


<style>
		table,th,td{
		border:1px solid black;
		}
		th,td{
			padding: 5px;
		}
        th{
            text-align:center;
        }
</style>