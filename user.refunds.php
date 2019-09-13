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
		
        <title>InstaMovies - <?php echo $user_row['first_name'];?> | Refunds</title>
        
        <style>
            .navbar {
                background:black !important;
            }
        </style>

	</head>

	
  <body id="itemid-3">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <div style="padding-top:85px;padding-bottom:25px;background-color:#ebebeb">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px">
            <div style="padding:15px"><h1 style="font-size: 35px;font-weight: normal;">Refunds</h1></div>
            <div class="table-responsive" style="min-height:297px; padding:0 15px">
                <table class="table table-striped table-bordered table-sm" id="refunds_table">
                    <thead style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_refunds WHERE `user_id` = '{$_SESSION['userID']}' ORDER BY transaction_id DESC";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                $i=0;
                                while($row=$result->fetch_assoc()){
                                    $i++;
                                    echo "<tr style='text-align:center'>";
                                        echo "<td>{$i}</td>";
										echo "<td>";
											if($row['transaction_time'] != '0000-00-00 00:00:00'){
												echo $row['transaction_time'];
											}
										echo "</td>";
										echo "<td>Rs. ".number_format((float)$row['amount'], 2, '.', '')."</td>";
										echo "<td>";
											if($row['status'] == '0'){
												echo "<span style='font-weight:bold;font-size:15px;color:red'>Pending</span>";
											}else if($row['status'] == '1'){
												echo "<span style='font-weight:bold;font-size:15px;color:green'>&#10003;</span>";											
											}
										echo "</td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='4' style='padding-left:7px'>No refunds available.</td></tr>";
                            }
                        ?>
                    </tbody>
                    <tfoot style="text-align:center">
                        <tr>
                            <th>#</th>
                            <th>Transaction Time</th>
                            <th>Amount</th>
							<th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        


	<div class="modal fade" id="redeemModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" style="background:white">
            <div class="modal-header">
                <h5 class="modal-title">Redeem Refund</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="redeemForm">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Account Type:</label>
                        <div class="col-sm-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:0">
                        <label class="col-sm-4 col-form-label">Account Number:</label>
                        <div class="col-sm-8">
                            <input id="ticket_id" type="text" class="form-control" maxlength="15" style="text-transform:uppercase">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="confirm" type="button" class="btn btn-primary">Confirm</button>
            </div>
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