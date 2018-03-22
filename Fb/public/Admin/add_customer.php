<?php require_once("../../private/initialize.php"); ?>
<?php require_any_login(); ?>

<?php
$page_title = "add customer" ;
require_once(SHARED_PATH .'/header.php');

$staff_set = find_all_staff();

if (is_post_request()){
  $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : ''; 
  $email = isset($_POST['email']) ? $_POST['email'] : ''; 
  $phone = isset($_POST['phone']) ? $_POST['phone'] : ''; 
  $address = isset($_POST['address']) ? $_POST['address'] : ''; 
  $date = isset($_POST['date']) ? $_POST['date'] : ''; 
  $status = isset($_POST['status']) ? $_POST['status'] : ''; 
  $source = isset($_POST['source']) ? $_POST['source'] : ''; 
  $assign = isset($_POST['assign']) ? $_POST['assign'] : ''; 
  $comment = isset($_POST['comment']) ? $_POST['comment'] : ''; 


//getting staff_id from stafftable
  $staff_id = return_staff_id($assign) ;
  insert_customers($fullname, $email, $phone, $address, $date, $status, $source, $staff_id, $comment);
  redirect_to_dashboard();
  
}

?>

<div class = "container">
<div class = "page-heading">
	<h3>Customer Form</h3>
</div>
<div class ="bread-crumb">
<a class="back_link" href="<?php echo return_dashboard(); ?>"> &laquo; Back to Admin</a> 
</div>
<div class="form_container">
  <form action="<?php echo url_for('public/admin/add_customer.php')?>" method = "post">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="enter full name..">

    <label for="email">email</label>
    <input type="text" id="email" name="email" placeholder="ex:xyz@abc.com">


    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" placeholder="phone number">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="customer address">

    <label for="date">Date</label><br />   
    <input type="Date" id="date" name="date"><br /><br />

    <label for="status">Status</label>
    <select id="status" name="status">
    	<option value = "2">In Process</option>
		<option value = "1">Quoted</option>
    <option value = "0">Ordered</option>
    </select>


    <label for="source">Source</label>
    <select id="source" name="source">
    	<option>None</option>
		<option>Facebook</option>
    <option>Linkedin</option>
    <option>Google</option>
    <option>Instagram</option>
    <option>Main Website</option>
    <option>In Store Call</option>
    </select>

    <label for="assign">Assign</label>
    <select id="assign" name="assign">
    	<option>None</option>
		<?php while($staff = mysqli_fetch_assoc($staff_set)){ ?>
		<option><?php echo h($staff['staff_fullname'])?></option>
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



