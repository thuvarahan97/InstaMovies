<?php
    include_once ('../db_config.php');

    session_start();
    $transaction_id = $_GET['transaction_id'];
    
    $date = date("Y-m-d H:i:s");

    $sql = "UPDATE tbl_refunds SET `status` = '1' WHERE transaction_id = '$transaction_id'";
    mysqli_query($db, $sql);
    header('location: ../refunds.php');
?>