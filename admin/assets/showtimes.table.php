<?php
    session_start();
    include_once ('../db_config.php');
?>
<table id="showtimes_table" class="table table-striped table-bordered table-sm">
    <thead class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="show_id_column">Show ID</th>
            <th class="th-sm">Movie</th>
            <th class="th-sm">Theater</th>
            <th id="showtime_column" class="th-sm">Showtimes</th>
            <th id="action_column">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT A.show_id, GROUP_CONCAT(A.showtime_id ORDER BY A.starting_time ASC) AS showtime_id_list, GROUP_CONCAT(A.starting_time ORDER BY A.starting_time ASC) AS starting_time_list, C.movie_name, D.theatre_name, D.city FROM tbl_showtimes A, tbl_shows B, tbl_movies C, tbl_theatres D WHERE A.show_id = B.show_id AND B.movie_id = C.movie_id AND B.theatre_id = D.theatre_id AND D.admin_id = '{$_SESSION['admin_id']}' GROUP BY A.show_id ORDER BY A.showtime_id DESC";
            $result = $db->query($sql);
            if($result->num_rows>0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    $starting_time_array = explode(',', $row['starting_time_list']);
                    $showtime_id_array = explode(',', $row['showtime_id_list']);
                    $count = sizeof($starting_time_array);
                    echo "<tr>";
                        echo "<td id='row_num_column'>{$i}</td>";
                        echo "<td id='show_id_column'>{$row['show_id']}</td>";
                        echo "<td>{$row['movie_name']}</td>";
                        echo "<td>{$row['theatre_name']} - {$row['city']}</td>";
                        echo "<td id='showtime_column' style='padding:0; user-select:none' draggable:'false'>";
                            echo "<table align='center' style='margin:0; width:100%'>";
                            for ($j=0; $j<sizeof($starting_time_array); $j++)
                            {
                            $startTime = date("h:i A", strtotime($starting_time_array[$j]));
                            echo "<tr><td style='height: 45px' class='th-sm' showtimeID='".$showtime_id_array[$j]."'>{$startTime}</td></tr>";
                            }
                            echo "</table>";
                        echo "</td>";
                        echo "<td id='action_column'><button type='button' align='center' class='edit_button' showID='{$row['show_id']}' showtimeCount='{$j}'><i class='fa fa-edit'></i></button><button type='button' class='delete_button' showID='{$row['show_id']}'><i class='fa fa-trash'></i></button></td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
    <tfoot class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="show_id_column">Show ID</th>
            <th class="th-sm">Movie</th>
            <th class="th-sm">Theater</th>
            <th id="showtime_column" class="th-sm">Showtimes</th>
            <th id="action_column">ACTION</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function () {
        $('#showtimes_table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>