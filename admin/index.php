<?php
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){
  header('location: dashboard.php');
}else{
  header('location: admin.login.php');
}
?>