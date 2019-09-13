<<<<<<< HEAD

<?php
$db = mysqli_connect("localhost", "root", "", "instamovies");
$offer_id=$_GET["offer_id"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
    <title>InstaMovies</title>

    <style>
        .wrp{
        color: #3f3545;
        font-family: "Raleway-Light",Arial,Helvetica,sans-serif;
        font-size: 20px;
        font-weight: normal;
        line-height: 10px;
        margin-bottom: 5px;
        margin-top: 0;
        text-align: left;
        }
        .offer_name {
			text-decoration:none;
		}
        .offer_name:hover {
			text-decoration:none;
		}
		.offer_name h6 {
			font-size: 18px;
			color: #000;
			margin-bottom: 10px;
			text-align: center;
			line-height: 15px;
		}
		.offer_name h6:hover {
			color:#bf0000;
            widows: 310%;
		}

        .offer {
            margin-bottom: 25px;
        }
        .offer_image {
            width:100%;
        }
        @media (max-width: 480px){
            .offer_image {
                    width: 310%;
            }
        }
        @media (max-width: 767px) and (min-width: 481px){
            .offer_image {
                    width: 310%;
            }
        }
        .offer_bottom_wrap {
            background: #f5f5f5;
            padding: 20px;
            width: 310%;
            text-align: center;
        }
        .offer_bottom_wrap .btn:hover {
            background: #ad0b0b;
            color: #fff;
            border:1px solid transparent;
            width: 310%;
        }
        .offer_bottom_wrap .btn:active {
            box-shadow:none !important;
            background-color:#c60506 !important;
        }
        .offer_bottom_wrap .btn:focus {
            box-shadow:none !important;
        }
        .btn-danger {
    				background-color:#c60506;
    			}
    	.btn-danger:hover {
    				background-color:#ec0405;
    				border:1px solid transparent;
    			}
    	.btn-danger:active {
    				box-shadow:none !important;
    				background-color:#c60506 !important;
    			}
    	.btn-danger:focus {
    				box-shadow:none !important;
    			}
    </style>

  </head>

    
  <body>

    <!--offers Body - Start-->
    <div class="offer">
            
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
                        
            <?php
            $sql_offer = "SELECT * FROM tbl_offers where offer_id =$offer_id ";
            $result_offer = mysqli_query($db,$sql_offer);
            if(mysqli_num_rows($result_offer)=='1'){
                $row_offer = mysqli_fetch_array($result_offer);
            ?>

            <div class="offer_name"><h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px"> <?php echo $row_offer['name']?> </h2>
            </div>
                
            <div class="row">
                <div class="col-sm-12">
                    <div class="offer">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row_offer['banner'])?>" class="offer_image">
                    </div>
                </div>
            </div>

            <div class="wrp">
                <h4>Start date</h4><h6><?php echo $row_offer['start_date']?></h6><br>
                <h4>End date</h4><h6><?php echo $row_offer['end_date']?></h6><br>
                <h4>Description</h4><h6><?php echo nl2br($row_offer['description'])?></h6>
                </div>  
            </div>
            
            <?php } ?>
        
        </div>
    </div>
    <!--offers Body - End-->
        
    
    
    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
=======

<?php
$db = mysqli_connect("localhost", "root", "", "instamovies");
$offer_id=$_GET["offer_id"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        
    <title>InstaMovies</title>

    <style>
        .wrp{
        color: #3f3545;
        font-family: "Raleway-Light",Arial,Helvetica,sans-serif;
        font-size: 20px;
        font-weight: normal;
        line-height: 10px;
        margin-bottom: 5px;
        margin-top: 0;
        text-align: left;
        }
        .offer_name {
			text-decoration:none;
		}
        .offer_name:hover {
			text-decoration:none;
		}
		.offer_name h6 {
			font-size: 18px;
			color: #000;
			margin-bottom: 10px;
			text-align: center;
			line-height: 15px;
		}
		.offer_name h6:hover {
			color:#bf0000;
            widows: 310%;
		}

        .offer {
            margin-bottom: 25px;
        }
        .offer_image {
            width:100%;
        }
        @media (max-width: 480px){
            .offer_image {
                    width: 310%;
            }
        }
        @media (max-width: 767px) and (min-width: 481px){
            .offer_image {
                    width: 310%;
            }
        }
        .offer_bottom_wrap {
            background: #f5f5f5;
            padding: 20px;
            width: 310%;
            text-align: center;
        }
        .offer_bottom_wrap .btn:hover {
            background: #ad0b0b;
            color: #fff;
            border:1px solid transparent;
            width: 310%;
        }
        .offer_bottom_wrap .btn:active {
            box-shadow:none !important;
            background-color:#c60506 !important;
        }
        .offer_bottom_wrap .btn:focus {
            box-shadow:none !important;
        }
        .btn-danger {
    				background-color:#c60506;
    			}
    	.btn-danger:hover {
    				background-color:#ec0405;
    				border:1px solid transparent;
    			}
    	.btn-danger:active {
    				box-shadow:none !important;
    				background-color:#c60506 !important;
    			}
    	.btn-danger:focus {
    				box-shadow:none !important;
    			}
    </style>

  </head>

    
  <body>

    <!--offers Body - Start-->
    <div class="offer">
            
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
                        
            <?php
            $sql_offer = "SELECT * FROM tbl_offers where offer_id =$offer_id ";
            $result_offer = mysqli_query($db,$sql_offer);
            if(mysqli_num_rows($result_offer)=='1'){
                $row_offer = mysqli_fetch_array($result_offer);
            ?>

            <div class="offer_name"><h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px"> <?php echo $row_offer['name']?> </h2>
            </div>
                
            <div class="row">
                <div class="col-sm-12">
                    <div class="offer">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row_offer['banner'])?>" class="offer_image">
                    </div>
                </div>
            </div>

            <div class="wrp">
                <h4>Start date</h4><h6><?php echo $row_offer['start_date']?></h6><br>
                <h4>End date</h4><h6><?php echo $row_offer['end_date']?></h6><br>
                <h4>Description</h4><h6><?php echo nl2br($row_offer['description'])?></h6>
                </div>  
            </div>
            
            <?php } ?>
        
        </div>
    </div>
    <!--offers Body - End-->
        
    
    
    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
>>>>>>> 751b5b9b89cd52670fc7fa7d93d583b6bb43fb78
</html>