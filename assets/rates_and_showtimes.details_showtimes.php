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



                $query_details_showtimes = "SELECT * FROM tbl_showtimes WHERE show_id='$showID' ORDER BY starting_time";
                $result_showtimes=mysqli_query($db,$query_details_showtimes);

                if(mysqli_num_rows($result_showtimes)>0){
                    while($row=mysqli_fetch_array($result_showtimes)){
                        $time=date("h:i A", strtotime($row['starting_time']));
                        echo"<td>".$time."</td>";
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
            padding-left:10px;
            padding-right:10px;
		}
        th{
            text-align:center;
        }
</style>


<script>
$("#buy_tickets_btn").click(function() {
    window.location.href = "buy_tickets.php?movieID=<?php echo $movie_ID ?>";
});
</script>