<?php require_once("../../private/initialize.php");
$page_title = "add staff" ;
require_once(SHARED_PATH .'/header.php');

if (is_post_request()){
  $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : ''; 
  $email = isset($_POST['email']) ? $_POST['email'] : ''; 
  $phone = isset($_POST['phone']) ? $_POST['phone'] : ''; 
  $password = isset($_POST['password']) ? $_POST['password'] : ''; 
  

  insert_staff($fullname, $email, $phone, $password);
}
?>

<div class = "container">
<div class = "page-heading">
	<h3>Staff Form</h3>
</div>
<div class ="bread-crumb">
<a class="back_link" href="<?php echo url_for('public/admin/index.php'); ?>"> &laquo; Back to Admin</a> 
</div>
<div class="form_container">
  <form action="<?php echo url_for('public/admin/add_staff.php'); ?>" method = "post">
    <label for="fname">Full Name</label>
    <input type="text" id="fullname" name="fullname" value="" required>

    <label for="lname">email</label>
    <input type="text" id="lname" name="email"  value="ex:xyz@abc.com">


    <label for="lname">Phone</label>
    <input type="text" id="phone" name="phone"  value="phone number">

    <label for="password">Assign Password</label>
    <input type="password" id="password" name="password"  value="" required>

    <input type="submit" value="Submit">
  </form>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('public/stylesheets/add_customer_style.css'); ?>">


<?php require_once(SHARED_PATH ."/footer.php");?>



