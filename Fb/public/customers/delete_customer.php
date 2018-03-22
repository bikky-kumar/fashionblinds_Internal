<?php require_once("../../private/initialize.php"); ?>
<?php require_admin_login(); ?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for('/public/admin/index.php'));
}
else{
  $id = $_GET['id'];
  delete_customer($id);
  }
?>