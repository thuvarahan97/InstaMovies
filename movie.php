<?php
session_start();
include_once ('db_config.php');
$movie_id=$_GET["movie_id"];
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
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">

    <!--Favicon Image-->
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    
    <title>InstaMovies</title>

    <style>
        .movie .banner img {
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
            margin-top:20px;
            padding-bottom: 30px;
            margin-top: 20px;
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
            text-align: left;
        }
        @media (max-width: 767px){
            .banner .banner-caption {
                display: none;
            }
            .movie_name_minimal {
                display:block !important;
            }
        }


        /* Trailer Modal*/
        #trailerModal .modal-dialog {
            max-width: 800px;
        }
        #trailerModal .modal-dialog .modal-content {
            border: none;
        }
        #trailerModal .modal-body {
            position:relative;
            padding:0px;
        }
        #trailerModal .close {
            position:absolute;
            right:-30px;
            top:0;
            z-index:999;
            font-size:2rem;
            font-weight: normal;
            color:#fff;
            opacity:1;
        }
        
    </style>

  </head>

    
  <body>

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->


    <div class="movie">

        <?php
        $sql_movie = "SELECT * FROM tbl_movies WHERE movie_id=$movie_id";
        $result_movie = mysqli_query($db,$sql_movie);
        if(mysqli_num_rows($result_movie) > 0){
            $row_movie = mysqli_fetch_array($result_movie);
        ?>

        <!--Banner Code - Start-->
        <div class="banner">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row_movie['wallpaper'])?>" alt="<?php echo $row_movie["movie_name"]?>">
            <div class="banner-caption">
                <p><button class="btn-0 btn-lg" style="min-width:323px" disabled><?php echo $row_movie['movie_name'];?></button></p>
                <p>
                    <a class="btn-1 btn-lg" style="text-decoration: none;" href="" role="button" data-src="<?php echo $row_movie['trailer_url'];?>" data-toggle="modal" data-target="#trailerModal">WATCH TRAILER</a>
                    <?php if ($row_movie['status']=='1') { ?>
                        <a class="btn-2 btn-lg" style="text-decoration: none;" href="buy_tickets.php?movieID=<?php echo $row_movie['movie_id'];?>" role="button">BUY TICKETS</a>
                    <?php } ?>
                </p>
            </div>
        </div>
        <!--Banner Code - End-->

            
        <div class="container mt-4" style="line-height:22px; font-size: 14px; color: #606978; font-family:sans-serif">
        
            <div class="wrp">
                <h3 class="movie_name_minimal" style="text-align:center; display:none; padding:7px; border-radius:5px; color:#FFF; background:#23241d"><?php echo $row_movie['movie_name'] ?></h3><br>
                <h4>Release Date</h4><h6><?php echo date("d F Y", strtotime($row_movie['release_date']))?></h6><br>
                <h4>Running Time</h4><h6><?php echo $row_movie['running_time']?></h6><br>
                <h4>Language</h4><h6><?php echo $row_movie['language']?></h6><br>
                <h4>Director</h4><h6><?php echo $row_movie['director']?></h6><br>
                <h4>Synopsis</h4><h6><?php echo $row_movie['synopsis']?></h6><br>
                <h4>Casts</h4><h6><?php echo $row_movie['casts']?></h6>
            </div>


            <?php
            $sql_theatres = "SELECT * FROM tbl_theatres where theatre_id in(select theatre_id from tbl_shows where movie_id=$movie_id)";
            $result_theatres = mysqli_query($db,$sql_theatres);
            if(mysqli_num_rows($result_theatres) > 0){
            ?>
            <div class="available_theatres">
                <h4>Available Theatres</h4>
                <div class="row">
                    <?php while($row_theatres = mysqli_fetch_array($result_theatres)){ ?>
                        <div class="col-md-3 col-sm-4">
                            <div class="theatre">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row_theatres['image'])?>" class="theatre_image">
                                <div class="theatre_bottom_wrap">
                                    <a class="theatre_name" href="theatre.php?theatre_id=<?php echo $row_theatres['theatre_id']?>"><h6><?php echo $row_theatres['theatre_name'].' - '.$row_theatres['city'] ?></h6></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            

        </div>

        <?php } ?>

    </div>
    


    <!-- Trailer Modal -->
    <div class="modal fade" id="trailerModal" tabindex="-1" role="dialog" aria-labelledby="trailerModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
	<!--Footer Code - Start-->
	<?php include('footer.php') ?>
	<!--Footer Code - End-->

    
    <!-- Optional JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            function getId(url) {
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length == 11) {
                    return match[2];
                } else {
                    return 'error';
                }
            }

            // Gets the video src from the data-src on each button
            var $videoSrc;
            $('.btn-1').click(function() {
                $videoSrc = "//www.youtube.com/embed/" + getId($(this).data( "src" ));
            });

            // when the modal is opened autoplay it  
            $('#trailerModal').on('shown.bs.modal', function (e) {
                // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                $("#video").attr('src',$videoSrc + "?autoplay=0&amp;modestbranding=1&amp;showinfo=0" ); 
            })
            
            // stop playing the youtube video when I close the modal
            $('#trailerModal').on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#video").attr('src',$videoSrc); 
            }) 
        });
    </script>
  
  </body>
</html>