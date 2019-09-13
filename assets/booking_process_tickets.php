<?php
session_start();
$_SESSION['showID']=$_GET['showID'];
$_SESSION['movieID']=$_GET['movieID'];
$_SESSION['theatreID']=$_GET['theatreID'];
$_SESSION['showDate']=$_GET['showDate'];
$_SESSION['showTimeID']=$_GET['showTimeID'];
?>

<div class="modal_content_tickets">
    <div class="modal-header">
        <h6 class="modal-title">TICKETS</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <!--Modal Body-->
        <form class="first_form">
            <div class="container-fluid" align="center">
                <div class="form_area_header">
                    <h5>HOW MANY TICKETS ?</h5>
                </div>
                <div class="form_area col-md-6 col-md-offset-3">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>No. Of Full Tickets</label>
                            <select class="form-control" id="full_ticket_count">
                                <option>0</option>
                                <option selected>1</option>
                                <?php for($f=2; $f<=20; $f++) {
                                    echo '<option>'.$f.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>No. Of Kids Tickets</label>
                            <select class="form-control" id="kids_ticket_count">
                                <?php for($k=0; $k<=20; $k++) {
                                    echo '<option>'.$k.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Total Tickets</label>
                            <div class="ticket_count" id="total_ticket_count"><!--Total Ticket Count Value--></div>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary firstbtn" type="button">CONTINUE</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<style>
.modal_content_tickets .modal-header{
	border-bottom: 2px solid #3e3e3e;
    background-color: #000;
    min-height: 55px;
}
.modal_content_tickets .modal-header h6 {
    color: #fff;
    display: inline-block;
	margin-top: 8px;
	user-select: none;
}
.modal_content_tickets .close {
    font-size: 38px;
    color: #fff;
    opacity: 1;
    outline:none;
}
.modal_content_tickets .modal-body {
    text-align: center;
    background: #000;
}
.modal_content_tickets .modal-body .first_form {
    text-align: center;
}
.modal_content_tickets .modal-body .first_form .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.modal_content_tickets .modal-body .first_form .form_area_header {
	margin-top: 95px;
	margin-bottom: 15px;
}
.modal_content_tickets .modal-body .first_form .form_area_header h5 {
    font-weight: bold;
	font-size: 24px;
	color: #fff;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	font-size: 26px;
	user-select: none;
}
.modal_content_tickets .modal-body .first_form .form_area {
    border: none;
    padding: 10px 10px 0;
    border-radius: 10px;
	color: #fff;
}
.modal_content_tickets .modal-body .first_form .form_area .form-row {
    margin: 10px 0;
}
.modal_content_tickets .modal-body .first_form .form_area .col-sm-4 {
	position: relative;
	min-height: 1px;
	padding-right: 15px;
	padding-left: 15px;
}
.modal_content_tickets .modal-body .first_form .form_area .col-sm-4 label {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    user-select: none;
}
.modal_content_tickets .modal-body .first_form .form_area .col-sm-4 .form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    font-weight: 600;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow:none;
}
.modal_content_tickets .modal-body .first_form .form_area .col-sm-4 .ticket_count {
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    font-weight: 600;
    font-size: 14px;
    color: #000;
    padding: 4px 15px;
    width: 100%;
    margin: 0 auto;
    background: #ccc;
    line-height: 24px;
    user-select: none;
}
.modal_content_tickets .modal-body .first_form .form_area hr{
	border-top: 1px solid #232323;
}
.modal_content_tickets .modal-body .first_form .form_area .col-sm-12 {
	position: relative;
	min-height: 1px;
	padding-right: 15px;
	padding-left: 15px;
}
.modal_content_tickets .modal-body .first_form .form_area .firstbtn {
    background-color: #ad0b0b;
    border-radius: 38px;
    color: #fff;
	display: block;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 20px;
    font-weight: 700;
    outline: medium none;
    padding: 8px 25px;
    transition: all 150ms ease-in-out 0s;
    width: 100%;
    margin-top: 15px;
	border: none !important;
	box-shadow: none !important;
}
.modal_content_tickets .modal-body .first_form .form_area .firstbtn:hover {
	background-color: #d30f0f !important;
	box-shadow: none !important;
}
.modal_content_tickets .modal-body .first_form .form_area .firstbtn:focus{
	background-color:#9b0c0c !important;
	box-shadow: none !important;
}
.loader {
    margin:0;
    position:fixed;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, .8);
    text-align:center;
    cursor: wait;
    user-select: none;
    z-index: 2000;
    display: none;
}
.loader img {
    margin: 0;
    position: absolute;
    top: 50%;
    left:50%;
    margin-right: -50%;
    transform:translate(-50%, -50%);
    width: 100px;
    height: 100px;
    user-select: none;
}
</style>

<script>
jQuery(document).ready(function(){
    var fullTicketCount = Number(document.getElementById('full_ticket_count').value);
    var kidsTicketCount = Number(document.getElementById('kids_ticket_count').value);
    var totalTicketCount = fullTicketCount + kidsTicketCount;
    $('#total_ticket_count').html(totalTicketCount);

	$('#full_ticket_count').change(function(){
		fullTicketCount=Number($(this).val());
        totalTicketCount = fullTicketCount + kidsTicketCount;
		$('#total_ticket_count').html(totalTicketCount);
	});

    $('#kids_ticket_count').change(function(){
		kidsTicketCount=Number($(this).val());
        totalTicketCount = fullTicketCount + kidsTicketCount;
		$('#total_ticket_count').html(totalTicketCount);
	});
    
    jQuery(".firstbtn").on('click',function(){
        if(totalTicketCount>0){
            $.ajax({
                url:'assets/booking_process_seat_map.php',
                data:'fullTicketCount=' + fullTicketCount + '&kidsTicketCount=' + kidsTicketCount + '&totalTicketCount=' + totalTicketCount,
                beforeSend: function() {
                    $(".loader").fadeIn(300);
                },
                success:function(body){
                    $(".loader").fadeOut(300);
                    $('.modal-content').html(body);
                    $('.close').trigger('focus');
                }
            });
        }else{
            $.toast({
                text: "Select number of ticket(s), atleast 1 to continue.",
                icon: 'error',
                position: 'top-center',
                hideAfter: 3000,
                stack: false,
                loader: false
            });
        }
    });
});
</script>

<div class="loader">
    <img draggable="false" src="images/loading.gif">
</div> 