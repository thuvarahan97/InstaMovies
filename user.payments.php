<?php
session_start();
include_once ('db_config.php');

if(isset($_SESSION['userID']) && !empty($_SESSION['userID']) && !($_SESSION['userID']=='0')) {

    $user = "SELECT * FROM tbl_users WHERE `user_id` = '{$_SESSION['userID']}'";
	$user_result = $db->query($user);
	$user_row = $user_result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
		<!--JQuery Toast CSS-->
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.min.css">

		<!--Custom Style CSS-->
		<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
		
		<link rel="shortcut icon" type="image/png" href="images/icon.png">
		
        <title>InstaMovies - <?php echo $user_row['first_name'];?> | Payments</title>
        
        <style>
            .navbar {
                background:black !important;
            }
        </style>

	</head>

	
  <body id="itemid-3"">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <div style="padding-top:85px;padding-bottom:25px;background-color:#ebebeb">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size: 35px;font-weight: normal;">Payments</h1></div>
            <div class="table-responsive" style="min-height:297px; padding:0 15px">
                <table class="table table-striped table-bordered table-sm">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Payment Time</th>
                            <th>Process</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_payments WHERE `user_id` = '{$_SESSION['userID']}' ORDER BY payment_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    echo "<tr style='text-align:center'>";
                                        echo "<td>{$i}</td>";
                                        echo "<td>{$row['timestamp']}</td>";
                                        echo "<td>{$row['process']}</td>";
                                        echo "<td>Rs. ".number_format((float)$row['paid_amount'], 2, '.', '')."</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='4' style='padding-left:7px'>No payments were made yet!</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Payment Time</th>
                            <th>Process</th>
                            <th>Amount</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        

        
	
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,then Owl_Carousel, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.toast.min.js"></script>
		

  </body>
</html>

<?php
}else{
    header('location: index.php');
}
?>