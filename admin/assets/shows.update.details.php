<?php
include_once ('../db_config.php');
$movieNameUpdate = $_POST['movieNameUpdate'];    
$sql_movie_edit = "SELECT * FROM `tbl_movies` WHERE movie_name = '$movieNameUpdate'";
$result_movie_edit = mysqli_query($db, $sql_movie_edit);
$row_movie_edit = mysqli_fetch_array($result_movie_edit);
$start_edit = $row_movie_edit['starting_date'];
$end_edit = $row_movie_edit['ending_date'];
echo '<input type="text" id="movie_update" value="'.$movieNameUpdate.'" name="movie_update" class="form-control" startDateEdit="'.$start_edit.'" endDateEdit="'.$end_edit.'" disabled="disabled" required="required">';
?>

<script>
    //DatePicker - StartDateUpdate, EndDateUpdate Conditions
    var startDate_edit = $("#movie_update").attr('startDateEdit');
    var endDate_edit = $("#movie_update").attr('endDateEdit');
    var current_date_edit = new Date();
    $("#end_date_update").datepicker("option", "minDate", $("#start_date_update").val());
    $("#end_date_update").datepicker("option", "maxDate", endDate_edit);
    if(new Date(startDate_edit)>current_date_edit){
        $("#start_date_update").datepicker('option','minDate',startDate_edit);
    }else{
        $("#start_date_update").datepicker('option','minDate',0);
    }
    $("#start_date_update").datepicker('option','maxDate',endDate_edit);
    $('#start_date_update').datepicker('option', {
        onClose: function(selected_edit) {
            $("#end_date_update").datepicker("option", "minDate", selected_edit);
            $("#end_date_update").datepicker("option", "maxDate", endDate_edit);
        }
    });
</script>