<?php
session_start();
include_once ('../db_config.php');
?>
<table id="seat_category_table" class="table table-striped table-bordered table-sm">
    <thead class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="id_column">ID</th>
            <th class="th-sm">Theater</th>
            <th class="th-sm">Category</th>
            <th id="row_column" class="th-sm">No. of Rows</th>
            <th id="col_column" class="th-sm">No. of Columns</th>
            <th id="seat_column" class="th-sm">No. of Seats</th>
            <th id="seat_map_column">Seat Map</th>
            <th id="action_column">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT A.* FROM tbl_theater_seat_categories A, tbl_theatres B WHERE B.admin_id = '{$_SESSION['admin_id']}' AND A.theatre_id = B.theatre_id ORDER BY seat_category_id DESC";
            $result = $db->query($sql);
            if($result->num_rows>0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $theatreID = $row['theatre_id'];

                    $sql_theatre = "SELECT * FROM tbl_theatres WHERE theatre_id = '$theatreID'";
                    $result_theatre = $db->query($sql_theatre);
                    $row_theatre = $result_theatre->fetch_assoc();

                    $i++;

                    echo "<tr>";
                        echo "<td id='row_num_column'>{$i}</td>";
                        echo "<td id='id_column'>{$row['seat_category_id']}</td>";
                        echo "<td>{$row_theatre['theatre_name']} - {$row_theatre['city']}</td>";
                        echo "<td>{$row['category_name']}</td>";
                        echo "<td id='row_column'>{$row['num_of_rows']}</td>";
                        echo "<td id='col_column'>{$row['num_of_columns']}</td>";
                        echo "<td id='seat_column'>{$row['num_of_seats']}</td>";
                        echo "<td id='seat_map_column'><button type='button' class='view_button' seatCategoryID='{$row['seat_category_id']}'>View</button></td>";
                        echo "<td id='action_column'><button type='button' class='delete_button' seatCategoryID='{$row['seat_category_id']}'><i class='fa fa-trash'></i></button></td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
    <tfoot class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="id_column">ID</th>
            <th class="th-sm">Theater</th>
            <th class="th-sm">Category</th>
            <th id="row_column" class="th-sm">No. of Rows</th>
            <th id="col_column" class="th-sm">No. of Columns</th>
            <th id="seat_column" class="th-sm">No. of Seats</th>
            <th id="seat_map_column">Seat Map</th>
            <th id="action_column">ACTION</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function () {
        $('#seat_category_table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
  </script>