<?php
session_start();
include_once ('db_config.php');
$offer_id=$_GET["offer_id"];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
    <!--Custom Style CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

    <style>
        .offer .banner img {
            width:100%
        }
        .banner-caption{
            text-align:center;
            margin-top:-157px;
            margin-bottom:100px;
        }
        .banner-caption .btn-0{
            color: rgb(255, 255, 255);
            background: #23241d;
            border: none;	
            padding: 3px 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 33px;
            font-weight: normal;
        }
        .banner-caption .btn-1:focus, .btn-1:active:focus, .btn-1.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-1{
            color: #000;
            background: -moz-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fae156 50%, #f7c900 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fae156 50%, #f7c900 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fae156 50%, #f7c900 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fae156', endColorstr='#f7c900',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:hover, .btn-1:focus, .btn-1:active, .btn-1.active, .open > .dropdown-toggle.btn-1 {
            background: -moz-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fce97f 50%, #fcd62f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fce97f 50%, #fcd62f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fce97f 50%, #fcd62f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fce97f', endColorstr='#fcd62f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-1:active, .btn-1.active {
            background: -moz-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #eed547 50%, #e4ba00 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #eed547 50%, #e4ba00 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #eed547 50%, #e4ba00 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #eed547', endColorstr='#e4ba00',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .banner-caption .btn-2:focus, .btn-2:active:focus, .btn-2.active:focus {
            outline: 0 none;
        }
        .banner-caption .btn-2{
            color: #FFF;
            background: -moz-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fa5656 50%, #f70000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fa5656 50%, #f70000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fa5656 50%, #f70000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fa5656', endColorstr='#f70000',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:hover, .btn-2:focus, .btn-2:active, .btn-2.active, .open > .dropdown-toggle.btn-2 {
            background: -moz-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #fc7f7f 50%, #fc2f2f 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #fc7f7f 50%, #fc2f2f 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #fc7f7f 50%, #fc2f2f 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' #fc7f7f', endColorstr='#fc2f2f',GradientType=0 ); /* IE6-9 */
        }
        .banner-caption .btn-2:active, .btn-2.active {
            background: -moz-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* FF3.6+ */
            background: -webkit-linear-gradient(top,  #ee4747 50%, #e40000 50%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,   #ee4747 50%, #e40000 50%); /* IE10+ */
            background: linear-gradient(to bottom,   #ee4747 50%, #e40000 50%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ee4747', endColorstr='#e40000',GradientType=0 ); /* IE6-9 */
            box-shadow: none;
        }
        .theatre_name {
            text-decoration:none;
        }
        .theatre_name:hover {
            text-decoration:none;
        }
        .theatre_name h6 {
            font-size: 18px;
            color: #000;
            margin-bottom: 0;
            text-align: center;
            line-height: 22px;
        }
        .theatre_name h6:hover {
            color:#bf0000;
        }
        .theatres .banner img {
            width:100%
        }
        .theatre {
            margin-bottom: 25px;
        }
        .theatre_image {
            width:100%;
        }
        @media (max-width: 480px){
            .theatre_image {
                width: 100%;
            }
        }
        @media (max-width: 767px) and (min-width: 481px){
            .theatre_image {
                width: 100%;
            }
        }
        .theatre_bottom_wrap {
            background: #f5f5f5;
            padding: 20px;
            text-align: center;
        }
        .wrp{
            margin-bottom: 30px;
            margin-top: 35px;
            text-align: left;
        }
        .wrp h4 {
            color: #3f3545;
        }
        .wrp h6 {
            color: #606978;
            line-height: 22px;
        }
        .available_theatres h4{
            color: #3f3545;
            font-weight: normal;
            line-height: 20px;
            margin-bottom: 25px;
            margin-top: 50px;
            text-align: left;
        }
    </style>

  </head>

    
  <body>

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <div class="offer" style="padding-bottom:15px;">

        <!--Banner Code - Start-->
        <div class="banner">
          <img src="images/banner.jpg?v=<?php echo time(); ?>">
        </div>
        <!--Banner Code - End-->


        <?php
        $sql_offer = "SELECT * FROM tbl_offers where offer_id =$offer_id ";
        $result_offer = mysqli_query($db,$sql_offer);
        if(mysqli_num_rows($result_offer)=='1'){
            $row_offer = mysqli_fetch_array($result_offer);
        ?>
    
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
            <h2 style="font-weight:normal; color: #3f3545; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:48px; margin-bottom:30px; padding-top:15px"><?php echo $row_offer['name']?></h2>
    
            <div>
                <img style="width:100%" src="data:image/jpeg;base64,<?php echo base64_encode($row_offer['banner'])?>" class="offer_image">
            </div>
    
            <div class="wrp">
                <h4>Start date</h4><h6><?php echo $row_offer['start_date']?></h6><br>
                <h4>End date</h4><h6><?php echo $row_offer['end_date']?></h6><br>
                <h4>Description</h4><h6 style="line-height:25px"><?php echo nl2br($row_offer['description'])?></h6>
            </div>

        </div>

        <?php } ?>

    </div>
    
    
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->

    
    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>