<?php
session_start();
include_once ('../db_config.php');
?>
<table id="shows_table" class="table table-striped table-bordered table-sm">
    <thead class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="show_id_column">Show ID</th>
            <th class="th-sm">Movie</th>
            <th class="th-sm">Theater</th>
            <th class="th-sm">Start Date</th>
            <th class="th-sm">End Date</th>
            <th id="action_column">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_show = "SELECT A.* FROM tbl_shows A, tbl_theatres B WHERE B.admin_id = '{$_SESSION['admin_id']}' AND A.theatre_id = B.theatre_id ORDER BY show_id DESC";
            $result_show = $db->query($sql_show);
            if($result_show->num_rows>0){
                $i=0;
                while($row=$result_show->fetch_assoc()){
                    $movieID = $row['movie_id'];
                    $theatreID = $row['theatre_id'];

                    $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id = '$movieID'";
                    $result_movie = $db->query($sql_movie);
                    $row_movie = $result_movie->fetch_assoc();

                    $sql_theatre = "SELECT * FROM tbl_theatres WHERE theatre_id = '$theatreID'";
                    $result_theatre = $db->query($sql_theatre);
                    $row_theatre = $result_theatre->fetch_assoc();

                    $i++;

                    echo "<tr>";
                        echo "<td id='row_num_column'>{$i}</td>";
                        echo "<td id='show_id_column'>{$row['show_id']}</td>";
                        echo "<td>{$row_movie['movie_name']}</td>";
                        echo "<td>{$row_theatre['theatre_name']} - {$row_theatre['city']}</td>";
                        echo "<td>{$row['starting_date']}</td>";
                        echo "<td>{$row['ending_date']}</td>";
                        echo "<td id='action_column'><button type='button' align='center' class='edit_button' showID='{$row['show_id']}'><i class='fa fa-edit'></i></button><button type='button' class='delete_button' showID='{$row['show_id']}'><i class='fa fa-trash'></i></button></td>";
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
            <th class="th-sm">Start Date</th>
            <th class="th-sm">End Date</th>
            <th id="action_column">ACTION</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function () {
        $('#shows_table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
  </script>