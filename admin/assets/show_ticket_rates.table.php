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
            <th class="th-sm">Seat Category</th>
            <th class="th-sm">Ticket Type</th>
            <th class="th-sm">Ticket Price</th>
            <th id="action_column">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT A.show_id, GROUP_CONCAT(A.ticket_type ORDER BY A.id ASC) AS ticket_type_list, GROUP_CONCAT(A.ticket_price ORDER BY A.id ASC) AS ticket_price_list, C.movie_name, D.theatre_name, D.city, GROUP_CONCAT(E.category_name ORDER BY A.id ASC) AS category_name_list FROM tbl_show_ticket_rates A, tbl_shows B, tbl_movies C, tbl_theatres D, tbl_theater_seat_categories E WHERE A.show_id = B.show_id AND B.movie_id = C.movie_id AND B.theatre_id = D.theatre_id AND A.ticket_category_id = E.seat_category_id AND D.admin_id = '{$_SESSION['admin_id']}' GROUP BY A.show_id ORDER BY A.id DESC";
            $result = $db->query($sql);
            if($result->num_rows>0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    $category_name_array = explode(',', $row['category_name_list']);
                    $ticket_type_array = explode(',', $row['ticket_type_list']);
                    $ticket_price_array = explode(',', $row['ticket_price_list']);
                    echo "<tr>";
                        echo "<td id='row_num_column'>{$i}</td>";
                        echo "<td id='show_id_column'>{$row['show_id']}</td>";
                        echo "<td>{$row['movie_name']}</td>";
                        echo "<td>{$row['theatre_name']} - {$row['city']}</td>";
                        echo "<td style='padding:0; user-select:none' draggable:'false'>";
                            echo "<table align='center' style='margin:0; width:100%'>";
                            for ($j=0; $j<sizeof($category_name_array); $j++)
                            {
                            echo "<tr><td class='th-sm'>{$category_name_array[$j]}</td></tr>";
                            }
                            echo "</table>";
                        echo "</td>";
                        echo "<td style='padding:0; user-select:none' draggable:'false'>";
                            echo "<table align='center' style='margin:0; width:100%'>";
                            for ($j=0; $j<sizeof($category_name_array); $j++)
                            {
                            echo "<tr><td class='th-sm'>{$ticket_type_array[$j]}</td></tr>";
                            }
                            echo "</table>";
                        echo "</td>";
                        echo "<td style='padding:0; user-select:none' draggable:'false'>";
                            echo "<table align='center' style='margin:0; width:100%'>";
                            for ($j=0; $j<sizeof($ticket_price_array); $j++)
                            {
                                $ticket_price = number_format((float)$ticket_price_array[$j], 2, '.', '');
                            echo "<tr><td class='th-sm'>Rs. {$ticket_price}</td></tr>";
                            }
                            echo "</table>";
                        echo "</td>";
                        echo "<td id='action_column'><button type='button' class='delete_button' showID='{$row['show_id']}'><i class='fa fa-trash'></i></button></td>";
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
            <th class="th-sm">Seat Category</th>
            <th class="th-sm">Ticket Type</th>
            <th class="th-sm">Ticket Price</th>
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