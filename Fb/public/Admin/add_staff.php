<?php require_once("../../private/initialize.php");
$page_title = "add customer" ;
require_once(SHARED_PATH .'/header.php');

$test = isset($_GET['test']) ? $_GET['test'] : '' ;

/*
if($test == '404'){
    error_404();
}
elseif($test == '500'){
    error_500();
}
elseif($test = 'redirect'){
redirect_to("index.php");
exit;
}
*/


?>

<?php

  $staffs = [
    ['c_id' => '1', 'c_email' => 'xyz@gmail.com', 'c_phone' => '930333', 'c_name' => 'Marta Joyce', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '2', 'c_email' => 'xyz@gmail.com', 'c_phone' => '378383', 'c_name' => 'Bikky kumar', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '3', 'c_email' => 'xyz@gmail.com', 'c_phone' => '37838292', 'c_name' => 'Paul joyce', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '4', 'c_email' => 'xyz@gmail.com', 'c_phone' => '3738838', 'c_name' => 'Lynne Joyce', 'c_adress' => 'About Globe Bank'],
  ];
?>



<div class = "container">
<div class ="bread-crumb">
<a class="back_link" href="<?php echo url_for('public/admin/index.php'); ?>"> &laquo; Back to Admin</a> 
</div>

<div class = "page-heading">
	<h3>Customer Form</h3>
</div>
<div class="form_container">
  <form action="" method = "post">
    <label for="fname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="enter full name..">

    <label for="lname">email</label>
    <input type="text" id="lname" name="email" placeholder="ex:xyz@abc.com">


    <label for="lname">Phone</label>
    <input type="text" id="phone" name="phone" placeholder="phone number">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="customer address">

    <label for="assign">Assign</label>
    <select id="assign" name="assign">
    	<option>None</option>
		<?php foreach($staffs as $staff){ ?>
		<option><?php echo h($staff['c_name'])?></option>
		<?php } ?>
    </select>

    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" placeholder="leave empty if no comment" style="height:50px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('public/stylesheets/add_customer_style.css'); ?>">


<?php require_once(SHARED_PATH ."/footer.php");?>



