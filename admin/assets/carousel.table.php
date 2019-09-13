<?php
    include_once ('../db_config.php');
?>
<table id="carousel_table" class="table table-striped table-bordered table-sm">
    <thead class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="id_column">ID</th>
            <th class="th-sm">Movie</th>
            <th id="image_column">Image</th>
            <th id="action_column">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT A.id, A.carousel_image, B.movie_name FROM tbl_carousel A, tbl_movies B WHERE A.movie_id = B.movie_id ORDER BY A.id DESC";
            $result = $db->query($sql);
            if($result->num_rows>0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    echo "<tr>";
                        echo "<td id='row_num_column'>{$i}</td>";
                        echo "<td id='id_column'>{$row['id']}</td>";
                        echo "<td>{$row['movie_name']}</td>";
                        echo "<td id='image_column'>
                            <img src='data:image/jpeg;base64,".base64_encode($row['carousel_image'])."' height='80%' width='80%' class='img-thumbnail'>
                        </td>";
                        echo "<td id='action_column'><button type='button' class='delete_button' ID='{$row['id']}'><i class='fa fa-trash'></i></button></td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
    <tfoot class="grey lighten-1">
        <tr>
            <th id="row_num_column">#</th>
            <th id="id_column">ID</th>
            <th class="th-sm">Movie</th>
            <th id="image_column">Image</th>
            <th id="action_column">ACTION</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function () {
        $('#carousel_table').DataTable({
            "ordering": false,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>