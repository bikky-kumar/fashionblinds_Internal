<?php require_once("../private/initialize.php");?>
<?php 
unset($_SESSION['username']);
unset($_SESSION['admin_id']);
unset($_SESSION['staff_id']);
redirect_to(url_for('/public/login.php'));
?>