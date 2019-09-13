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
		
        <title>InstaMovies - <?php echo $user_row['first_name'];?> | Profile</title>
        
        <style>
            .navbar {
                background:black !important;
            }
            #close_delete {
                background-color: transparent;
                color: red;
                border: 2px solid red;
                border-radius: 5px;
                width: 85px;
                height: 45px;
            }
            #close_delete:hover {
                box-shadow: 0px 0px 8px 2px #bfbfbf;
            }
            #close_delete:focus {
                background-color: #f3f2f2; 
                outline: none;
            }
            #delete_confirm {
                background-color: red;
                color: white;
                border-radius: 5px;
                width: 85px;
                height: 45px;
                border: none;
            }
            #delete_confirm:hover {
                box-shadow: 0px 0px 8px 2px #bfbfbf;
            }
            #delete_confirm:focus {
                outline: none;
                background-color: #e60000;
            }
            #deleteAccountModal .modal-content{
                border-radius: 10px !important;
                background: #FFF;
                font-size: 17px;
                border: none;
            }
            #deleteAccountModal .modal-dialog {
                width: 380px;
            }
            #deleteAccountModal .modal-header {
                background: red;
                text-align: center;
                color:#FFF;
                padding-top: 10px;
                padding-bottom: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                user-select: none;
            }
            #deleteAccountModal .modal-body {
                padding-top: 15px;
                padding-bottom: 15px;
                user-select: none;
                color: #212529;
                font-weight: 300;
            }
            #editUserProfileModal .modal-content {
                background: #FFF;
            }
            #editUserProfileModal .modal-header{
                user-select: none;
            }
            #editUserProfileModal .modal-header .close{
                outline: none;
            }
            @media (max-width: 767px){
                #deleteAccountModal .modal-dialog {
                    margin: auto;
                }
            }
        </style>

	</head>

	
  <body id="itemid-3" style="background-color:#ebebeb">

	<!--Navbar Code - Start-->
    <?php include('header.php'); ?>
    <!--Navbar Code - End-->

	
    <div style="margin-top:100px;margin-bottom:25px; min-height:392px">
        <div class="container mt-3" style="background:#FFF;padding-bottom:15px; max-width:800px">
            <div style="padding:15px"><h1 style="font-size:35px; font-weight:normal;">User Profile</h1></div>
            
            <form id="user_profile_details" style="margin:10px 15px 0">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $user_row['first_name'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $user_row['last_name'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $user_row['email'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Username:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $user_row['username'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mobile:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mobile" placeholder="Mobile" value="0<?php echo $user_row['mobile'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <a class="btn btn-primary" style="font-weight:500; float:right; box-shadow:none; color:white" data-toggle="modal" data-target="#editUserProfileModal">Edit Profile</a>
                    </div>
                </div>
                <hr/>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password:</label>
                    <div class="col-sm-3">
                        <a class="btn btn-warning" href="user.change_password.php" style="font-weight:500; width:100%; box-shadow:none">Change Password</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Account:</label>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-danger" style="font-weight:500; width:100%; box-shadow:none" data-toggle="modal" data-target="#deleteAccountModal">Delete Account</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
        

    <!-- Edit User Profile Modal -->
    <div class="modal fade" id="editUserProfileModal" tabindex="-1" role="dialog" aria-labelledby="editUserProfileModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserProfileModalLongTitle">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="edit_user_profile_form">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">First Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $user_row['first_name'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Last Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $user_row['last_name'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-sm-4 col-form-label">Mobile:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="mobile" id="mobile" pattern="[0-9]{10}" placeholder="Mobile" value="0<?php echo $user_row['mobile'] ?>">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="update">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLongTitle">Confirm</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account?
                This process cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" id="close_delete" data-dismiss="modal">No</button>
                <button type="button" class="btn" id="delete_confirm">Yes</button>
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
    

    <script>
        $(document).ready(function(){
            $("#update").on("click",function(){
                if($("#edit_user_profile_form")[0].checkValidity()) {
                    $.ajax({
                        type:'POST',
                        url:'assets/user.profile.update.php',
                        data:$("#edit_user_profile_form").serialize(),
                        success:function(){
                            $('#editUserProfileModal').modal('hide');
                            location.reload();
                        }
                    });
                }
                else{
                    $("#edit_user_profile_form")[0].reportValidity();
                }
            });

            $("#delete_confirm").on("click",function(){
                $.ajax({
                    type:'POST',
                    url:'assets/user.profile.delete_account.php',
                    success:function(){
                        window.location.href = "logout.php";
                    }
                });
            });
        });
    </script>


  </body>
</html>

<?php
}else{
    header('location: index.php');
}
?>